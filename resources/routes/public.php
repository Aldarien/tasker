<?php
$app->get('/', \App\Controller\Base::class);

$migration_config = [
  'root' => root(),
  'src' => root() . '/src',
  'location' => config('locations.migrations'),
  'namespace' => config('app.namespace'),
  'seed_files' => config('locations.seeds')
];
$app->get('/migrate', function($req, $res, $args) use ($migration_config) {
  $migrator = new App\Service\Migrator($migration_config);
  $migrator->migrate();
  return $res->withRedirect(url());
});
$app->get('/migrations/rollback', function($req, $res, $args) use ($migration_config) {
  $migrator = new App\Service\Migrator($migration_config);
  $migrator->rollback();
  return $res->withRedirect(url());
});

$tasks_routes = [
  'controller' => App\Controller\Tasks::class,
  'routes' => [
    '/tasks' => [
      'get' => 'list'
    ],
    '/tasks/add' => [
      'get' => 'add',
      'post' => 'do_add'
    ],
    '/tasks/{id}' => [
      'get' => 'show'
    ],
    '/tasks/edit/{id}' => [
      'get' => 'edit',
      'post' => 'do_edit'
    ],
    '/tasks/remove/{id}' => [
      'get' => 'remove'
    ],
    '/tasks/assign/{id}' => [
      'get' => 'assign',
      'post' => 'do_assign'
    ]
  ]
];
registerRoutes($app, $tasks_routes);
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
$places_routes = [
  'controller' => App\Controller\Places::class,
  'routes' => [
    '/places' => [
      'get' => 'list'
    ],
    '/places/add' => [
      'get' => 'add',
      'post' => 'do_add'
    ],
    '/places/{id}' => [
      'get' => 'show'
    ],
    '/places/edit/{id}' => [
      'get' => 'edit',
      'post' => 'do_edit'
    ],
    '/places/remove/{id}' => [
      'get' => 'remove'
    ]
  ]
];
registerRoutes($app, $places_routes);
$projects_routes = [
  'controller' => App\Controller\Projects::class,
  'routes' => [
    '/projects' => [
      'get' => 'list'
    ],
    '/projects/add' => [
      'get' => 'add',
      'post' => 'do_add'
    ],
    '/projects/{id}' => [
      'get' => 'show'
    ],
    '/projects/edit/{id}' => [
      'get' => 'edit',
      'post' => 'do_edit'
    ],
    '/projects/remove/{id}' => [
      'get' => 'remove'
    ]
  ]
];
registerRoutes($app, $projects_routes);
