<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('admins/dist/css/adminlte.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  @stack('styles')
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
  <div class="app-wrapper">
    @include('admin_panel.partials.header')
    @include('admin_panel.partials.sidebar')

    <main class="app-main">
      @yield('content')
    </main>

    @include('admin_panel.partials.footer')
  </div>

  <!-- Scripts -->
  <script src="{{ asset('admins/dist/js/adminlte.js') }}"></script>
  @stack('scripts')
</body>
</html>
