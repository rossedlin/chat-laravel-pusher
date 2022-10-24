<!DOCTYPE html>
<head>
  <title>Chat Laravel Pusher | Edlin App</title>
  <link rel="icon" href="https://assets.edlin.app/favicon/favicon.ico"/>
  <script src="https://js.pusher.com/7.2/pusher.min.js"></script>

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        rel="stylesheet"/>

  <!-- jQuery -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js"
          integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
          crossorigin="anonymous"></script>
  <!-- End jQuery -->

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
        crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
          crossorigin="anonymous"></script>
  <!-- End Bootstrap -->

  <link rel="stylesheet" href="/app.css/">

  <script>
    // TODO: Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    const pusher = new Pusher('{{config('pusher.app.key')}}', {
      cluster: 'eu'
    });

    const channel = pusher.subscribe('{{config('pusher.channel')}}');
    channel.bind('{{config('pusher.event')}}', function (data) {
      alert(JSON.stringify(data));
    });
  </script>
</head>
<body>

<div class="container">
  <div class="row clearfix">
    <div class="col-lg-12">
      @yield('content')
    </div>
  </div>
</div>
</body>
