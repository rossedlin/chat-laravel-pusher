<!DOCTYPE html>
<html lang="en">
<head>
  <title>Chat Laravel Pusher | Edlin App</title>
  <link rel="icon" href="https://assets.edlin.app/favicon/favicon.ico"/>

  <!-- JavaScript -->
  <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <!-- End JavaScript -->

  <!-- CSS -->
  <link rel="stylesheet" href="/style.css">
  <!-- End CSS -->

</head>

<body>

<div class="container">

  <!-- Header -->
  <div class="header">
    <div class="d-flex">
      <img src="https://i.pravatar.cc/150?img=5" alt="Avatar">
      <div class="overflow-hidden ms-3">
        <a class="text-dark mb-0 h6 d-block text-truncate" href="/page-chat">
          Ross Edlin
        </a>
        <small class="text-muted">
          <i class="mdi mdi-checkbox-blank-circle text-success on-off align-text-bottom"></i> Online
        </small>
      </div>
    </div>
  </div>
  <!-- End Header -->

  <!-- Chat -->
  <div class="chat">
    @include('right', ['message' => "Hey! What's up!  👋"])
    @include('left', ['message' => "Ask a friend to open this link and you can chat with them!"])
  </div>
  <!-- End Chat -->

  <!-- Footer -->
  <div class="footer">
    <form id="chat-form" method="post" action="/">
      <input type="hidden" name="_token" value="">
      <input type="text" id="message" name="message" placeholder="Enter message...">
      <button type="submit" class="btn"></button>
    </form>

  </div>
  <!-- End Footer -->
</div>

</body>

<script>
  // TODO: Enable pusher logging - don't include this in production
  Pusher.logToConsole = true;

  const pusher = new Pusher('{{config('pusher.app.key')}}', {
    cluster: 'eu'
  });

  const channel = pusher.subscribe('{{config('pusher.channel')}}');
  channel.bind('{{config('pusher.event')}}', function (data) {
    $.post("/message", {
      _token: '{{csrf_token()}}',
      message: data.message,
    })
      .done(function (res) {
        $(".chat > .message").last().after(res.html);
        $(document).scrollTop($(document).height());
      });
  });

  $("#chat-form").submit(function (event) {
    event.preventDefault();

    const data = {
      _token: '{{csrf_token()}}',
      message: $("#chat-form #message").val(),
    };

    $.post("/", data)
      .done(function (res) {
        console.log(res);
        $(".chat > .message").last().after(res.html);
        $(document).scrollTop($(document).height());
      });
  });

</script>
</html>
