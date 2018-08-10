<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Migrations</title>
    @include('layout.assets')
  </head>
  <body>
    <div class="ui container">
      <div class="ui negative message"><i class="close icon"></i><p>Please check migrations.</p></div>
      <a href="{{url('/migrate')}}">Migrate</a>
    </div>
  </body>
</html>
