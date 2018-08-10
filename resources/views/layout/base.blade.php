<!DOCTYPE html>
<html lang="{{config('app.language') ?: 'es'}}">
<head>
  <meta charset="utf-8" />
  <title>Tasker</title>
  @include('layout.assets')
  @stack('styles')
</head>
<body>
  @include('layout.header')
  <div class="ui container">
    <h2 class="ui inverted block header">
      @yield('heading')
    </h2>
    <br />
    @yield('content')
  </div>
  <br />
  @include('layout.footer')
  @stack('scripts')
</body>
</html>
