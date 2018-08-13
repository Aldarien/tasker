<?php
namespace App\Controller;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

use App\Definition\Controller;
use Tasker\Task;

class Base extends Controller
{
  public function __invoke(RequestInterface $req, ResponseInterface $res, $args)
  {
    $tasks = \model(Task::class)
      ->select('tasks.*')
      ->rawJoin('JOIN (SELECT t1.* FROM (SELECT task_id, MAX(id) AS id FROM task_states GROUP BY task_id) t0 JOIN task_states t1 ON t1.id = t0.id)', ['ts.task_id', '=', 'tasks.id'], 'ts')
      ->whereGte('ts.state', 0)
      ->orderByAsc('title')
      ->findMany();
    if (count($tasks) > 0) {
      return $this->container->view->render($res, 'home', compact('tasks'));
    }
    return $this->container->view->render($res, 'home');
  }
}
