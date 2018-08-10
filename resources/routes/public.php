<?php
$app->get('/', \App\Controller\Base::class);

$app->get('/migrate', function($req, $res, $args) {
  $migrator = new App\Service\Migrator(config('app.namespace'));
  $migrator->migrate();
  return $res->withRedirect(url());
});
$app->get('/migrations/rollback', function($req, $res, $args) {
  $migrator = new App\Service\Migrator(config('app.namespace'));
  $migrator->rollback();
  return $res->withRedirect(url());
});

$people_routes = [
  'controller' => App\Controller\People::class,
  'routes' => [
    '/people' => [
      'get' => 'list'
    ],
    '/people/add' => [
      'get' => 'add',
      'post' => 'do_add'
    ],
    '/people/{id}' => [
      'get' => 'show'
    ],
    '/people/edit/{id}' => [
      'get' => 'edit',
      'post' => 'do_edit'
    ],
    '/people/remove/{id}' => [
      'get' => 'remove'
    ]
  ]
];
registerRoutes($app, $people_routes);
