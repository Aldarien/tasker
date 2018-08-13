<?php
namespace App\Controller;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

use App\Definition\Controller;
use Tasker\Place as PlaceModel;

class Places extends Controller
{
  public function list(RequestInterface $req, ResponseInterface $res, $args)
  {
    $places = \model(PlaceModel::class)->orderByAsc('description')->findMany();
    return $this->container->view->render($res, 'places.list', compact('places'));
  }
  public function show(RequestInterface $req, ResponseInterface $res, $args)
  {
    $place = \model(PlaceModel::class)->findOne($args['id']);
    return $this->container->view->render($res, 'places.show', compact('place'));
  }
  public function add(RequestInterface $req, ResponseInterface $res, $args)
  {
    return $this->container->view->render($res, 'places.add');
  }
  public function do_add(RequestInterface $req, ResponseInterface $res, $args)
  {
    $place = \model(PlaceModel::class)
      ->where('description', $_POST['description'])
      ->findOne();
    if (!$place) {
      $data = [
        'description' => $_POST['description']
      ];
      $place = \model(PlaceModel::class)->create($data);
      $place->save();
    }
    return $res->withRedirect(url('/places/' . $place->id));
  }
  public function edit(RequestInterface $req, ResponseInterface $res, $args)
  {
    $place = \model(PlaceModel::class)->findOne($args['id']);
    return $this->container->view->render($res, 'places.edit', compact('place'));
  }
  public function do_edit(RequestInterface $req, ResponseInterface $res, $args)
  {
    $place = \model(PlaceModel::class)->findOne($args['id']);
    foreach ($_POST as $name => $value) {
      if ($place->{$name} != $value) {
        $place->{$name} = $value;
      }
    }
    $place->save();
    return $res->withRedirect(url('/places/' . $place->id));
  }
  public function remove(RequestInterface $req, ResponseInterface $res, $args)
  {
    $place = \model(PlaceModel::class)->findOne($args['id']);
    $place->delete();
    return $res->withRedirect(url('/places'));
  }
  public function assign(RequestInterface $req, ResponseInterface $res, $args)
  {
    $place = \model(PlaceModel::class)->findOne($args['id']);
    $tasks = \model(Task::class)->orderByAsc('title')->findMany();
    return $this->container->view->render($res, 'places.assign', compact('place', 'tasks'));
  }
  public function do_assign(RequestInterface $req, ResponseInterface $res, $args)
  {
    $place = \model(PlaceModel::class)->findOne($args['id']);
    $data = [
      $_POST['task'],
      'place',
      $place->id
    ];
    $q = "INSERT INTO task_asociations (task_id, asociated, asociated_id) VALUES (?, ?, ?)";
    $st = \ORM::getDb()->prepare($q);
    $st->execute($data);
    return $res->withRedirect(url('/places/' . $place->id));
  }
}
