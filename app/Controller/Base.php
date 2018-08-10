<?php
namespace App\Controller;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

use App\Definition\Controller;

class Base extends Controller
{
  public function __invoke(RequestInterface $req, ResponseInterface $res, $args)
  {
    return $this->container->view->render($res, 'home');
  }
}
