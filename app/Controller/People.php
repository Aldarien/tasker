<?php
namespace App\Controller;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

use App\Definition\Controller;
use Tasker\Person as PeopleModel;

class People extends Controller
{
  public function list(RequestInterface $req, ResponseInterface $res, $args)
  {
    $people = \model(PeopleModel::class)->orderByAsc('last_name')->orderByAsc('last_name2')->findMany();
    return $this->container->view->render($res, 'people.list', compact('people'));
  }
  public function show(RequestInterface $req, ResponseInterface $res, $args)
  {
    $person = \model(PeopleModel::class)->findOne($args['id']);
    return $this->container->view->render($res, 'people.show', compact('person'));
  }
  public function add(RequestInterface $req, ResponseInterface $res, $args)
  {
    return $this->container->view->render($res, 'people.add');
  }
  public function do_add(RequestInterface $req, ResponseInterface $res, $args)
  {
    $person = \model(PeopleModel::class)
      ->where('names', $_POST['names'])
      ->where('last_name', $_POST['last_name'])
      ->where('last_name2', $_POST['last_name2'])
      ->findOne();
    if (!$person) {
      $data = [
        'names' => $_POST['names'],
        'last_name' => $_POST['last_name'],
        'last_name2' => $_POST['last_name2']
      ];
      $person = \model(PeopleModel::class)->create($data);
      $person->save();
    }
    return $res->withRedirect(url('/people/' . $person->id));
  }
  public function edit(RequestInterface $req, ResponseInterface $res, $args)
  {
    $person = \model(PeopleModel::class)->findOne($args['id']);
    return $this->container->view->render($res, 'people.edit', compact('person'));
  }
  public function do_edit(RequestInterface $req, ResponseInterface $res, $args)
  {
    $person = \model(PeopleModel::class)->findOne($args['id']);
    foreach ($_POST as $name => $value) {
      if ($person->{$name} != $value) {
        $person->{$name} = $value;
      }
    }
    $person->save();
    return $res->withRedirect(url('/people/' . $person->id));
  }
  public function remove(RequestInterface $req, ResponseInterface $res, $args)
  {
    $person = \model(PeopleModel::class)->findOne($args['id']);
    $person->delete();
    return $res->withRedirect(url('/people'));
  }
  public function assign(RequestInterface $req, ResponseInterface $res, $args)
  {
    $person = \model(PeopleModel::class)->findOne($args['id']);
    $tasks = \model(Task::class)->orderByAsc('title')->findMany();
    return $this->container->view->render($res, 'people.assign', compact('person', 'tasks'));
  }
  public function do_assign(RequestInterface $req, ResponseInterface $res, $args)
  {
    $person = \model(PeopleModel::class)->findOne($args['id']);
    $data = [
      $_POST['task'],
      'person',
      $person->id
    ];
    $q = "INSERT INTO task_asociations (task_id, asociated, asociated_id) VALUES (?, ?, ?)";
    $st = \ORM::getDb()->prepare($q);
    $st->execute($data);
    return $res->withRedirect(url('/people/' . $person->id));
  }
}
