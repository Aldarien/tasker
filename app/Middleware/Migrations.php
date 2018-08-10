<?php
namespace App\Middleware;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

use App\Service\Migrator;

class Migrations
{
  protected $app;
  protected $config;

  public function __construct($app)
  {
    $this->app = $app;
    $this->config = [
      'root' => root(),
      'src' => root() . '/src',
      'location' => config('locations.migrations'),
      'namespace' => config('app.namespace')
    ];
  }
  public function __invoke(RequestInterface $request, ResponseInterface $response, $next)
  {
    $path = trim($request->getUri()->getPath(), '/');
    if ($path != 'migrate' and $path != 'migrations/rollback') {
      $migrator = new Migrator($this->config);
      if ($migrator->created()) {
        return $this->app->getContainer()->view->render($response, 'migrations.alert');
      } elseif (!$migrator->checkTableMigration()) {
        return $this->app->getContainer()->view->render($response, 'migrations.check');
      } else {
        $response = $next($request, $response);
      }
    } else {
      $response = $next($request, $response);
    }
    return $response;
  }
}
