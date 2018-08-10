<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Migrations</title>
    @include('layout.assets')
  </head>
  <body>
    <div class="ui container">
      <div class="ui warning message"><i class="window close outline icon"></i><p>Migrations table not created.</p></div>
      <a href="{{url('/migrate')}}">Migrate</a>
    </div>
  </body>
</html>
