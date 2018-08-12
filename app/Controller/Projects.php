<?php
namespace App\Controller;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

use App\Definition\Controller;
use Tasker\Project as ProjectModel;

class Projects extends Controller
{
  public function list(RequestInterface $req, ResponseInterface $res, $args)
  {
    $projects = \model(ProjectModel::class)->orderByAsc('description')->findMany();
    return $this->container->view->render($res, 'projects.list', compact('projects'));
  }
  public function show(RequestInterface $req, ResponseInterface $res, $args)
  {
    $project = \model(ProjectModel::class)->findOne($args['id']);
    return $this->container->view->render($res, 'projects.show', compact('project'));
  }
  public function add(RequestInterface $req, ResponseInterface $res, $args)
  {
    return $this->container->view->render($res, 'projects.add');
  }
  public function do_add(RequestInterface $req, ResponseInterface $res, $args)
  {
    $project = \model(ProjectModel::class)
      ->where('description', $_POST['description'])
      ->findOne();
    if (!$project) {
      $data = [
        'description' => $_POST['description']
      ];
      $project = \model(ProjectModel::class)->create($data);
      $project->save();
    }
    return $res->withRedirect(url('/projects/' . $project->id));
  }
  public function edit(RequestInterface $req, ResponseInterface $res, $args)
  {
    $project = \model(ProjectModel::class)->findOne($args['id']);
    return $this->container->view->render($res, 'projects.edit', compact('project'));
  }
  public function do_edit(RequestInterface $req, ResponseInterface $res, $args)
  {
    $project = \model(ProjectModel::class)->findOne($args['id']);
    foreach ($_POST as $name => $value) {
      if ($project->{$name} != $value) {
        $project->{$name} = $value;
      }
    }
    $project->save();
    return $res->withRedirect(url('/projects/' . $project->id));
  }
  public function remove(RequestInterface $req, ResponseInterface $res, $args)
  {
    $project = \model(ProjectModel::class)->findOne($args['id']);
    $project->delete();
    return $res->withRedirect(url('/projects'));
  }
}
