<?php
return [
  "base" => root(),
  "cache" => "{locations.base}/cache",
  "resources" => "{locations.base}/resources",
  "routes" => "{locations.resources}/routes",
  "views" => "{locations.resources}/views",
  "languages" => "{locations.resources}/languages",
  "database" => "{locations.resources}/database",
  "migrations" => "{locations.database}/migrations",
];
