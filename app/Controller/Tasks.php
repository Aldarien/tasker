<?php
namespace App\Controller;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

use App\Definition\Controller;
use Tasker\Task as TaskModel;
use Tasker\Person;
use Tasker\Place;
use Tasker\Project;

class Tasks extends Controller
{
  public function list(RequestInterface $req, ResponseInterface $res, $args)
  {
    $tasks = \model(TaskModel::class)->orderByAsc('description')->findMany();
    return $this->container->view->render($res, 'tasks.list', compact('tasks'));
  }
  public function show(RequestInterface $req, ResponseInterface $res, $args)
  {
    $task = \model(TaskModel::class)->findOne($args['id']);
    return $this->container->view->render($res, 'tasks.show', compact('task'));
  }
  public function add(RequestInterface $req, ResponseInterface $res, $args)
  {
    if (isset($args['asociated'])) {
      $asociated = $args['asociated'] . '-' . $args['asociated_id'];
      return $this->container->view->render($res, 'tasks.add', compact('asociated'));
    }
    return $this->container->view->render($res, 'tasks.add');
  }
  public function do_add(RequestInterface $req, ResponseInterface $res, $args)
  {
    $task = \model(TaskModel::class)
      ->where('title', $_POST['title'])
      ->findOne();
    \ORM::getDB()->beginTransaction();
    try {
      if (!$task) {
        $data = [
          'title' => $_POST['title'],
          'description' => $_POST['description']
        ];
        $task = \model(TaskModel::class)->create($data);
        $task->new();
      }
      if (isset($_POST['asociated'])) {
        $q = "INSERT INTO task_asociations (task_id, asociated, asociated_id) VALUES (?, ?, ?)";
        $st = \ORM::getDb()->prepare($q);
        list($asoc, $asoc_id) = explode('-', $_POST['asociated']);
        $data = [
          $task->id,
          $asoc,
          $asoc_id
        ];
        $st->execute($data);
      }
      \ORM::getDb()->commit();
    } catch (\Exception $e) {
      \ORM::getDb()->rollBack();
      throw $e;
    }

    return $res->withRedirect(url('/tasks/' . $task->id));
  }
  public function edit(RequestInterface $req, ResponseInterface $res, $args)
  {
    $task = \model(TaskModel::class)->findOne($args['id']);
    return $this->container->view->render($res, 'tasks.edit', compact('task'));
  }
  public function do_edit(RequestInterface $req, ResponseInterface $res, $args)
  {
    $task = \model(TaskModel::class)->findOne($args['id']);
    foreach ($_POST as $name => $value) {
      if ($task->{$name} != $value) {
        $task->{$name} = $value;
      }
    }
    $task->save();
    return $res->withRedirect(url('/tasks/' . $task->id));
  }
  public function remove(RequestInterface $req, ResponseInterface $res, $args)
  {
    $task = \model(TaskModel::class)->findOne($args['id']);
    $task->delete();
    return $res->withRedirect(url('/tasks'));
  }
  public function assign(RequestInterface $req, ResponseInterface $res, $args)
  {
    $task = \model(TaskModel::class)->findOne($args['id']);
    $people = \model(Person::class)->orderByAsc('last_name')->orderByAsc('last_name2')->findMany();
    $places = \model(Place::class)->orderByAsc('description')->findMany();
    $projects = \model(Project::class)->orderByAsc('description')->findMany();
    $tasks = \model(TaskModel::class)->orderByAsc('title')->findMany();
    return $this->container->view->render($res, 'tasks.assign', compact('task', 'people', 'places', 'projects', 'tasks'));
  }
  public function do_assign(RequestInterface $req, ResponseInterface $res, $args)
  {
    $task = \model(TaskModel::class)->findOne($args['id']);
    $q = "INSERT INTO task_asociations (task_id, asociated, asociated_id) VALUES (?, ?, ?)";
    $st = \ORM::getDb()->prepare($q);
    list($asoc, $asoc_id) = explode('-', $_POST['asociated']);
    $data = [
      $task->id,
      $asoc,
      $asoc_id
    ];
    $st->execute($data);
    return $res->withRedirect(url('/tasks/' . $task->id));
  }
}
