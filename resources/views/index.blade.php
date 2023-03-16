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
<div class="center">
  <div class="chat">
    <div class="contact bar">
      <div class="pic stark"></div>
      <div class="name">
        Ross Edlin
      </div>
      <div class="seen">
        Today at 12:56
      </div>
    </div>
    <div class="messages" id="chat">
      <div class="time">
        Today at 11:41
      </div>
      @include('right', ['message' => "Hey, man! What's up, Mr Stark? 👋"])
      @include('left', ['message' => "Kid, where'd you come from?"])
      @include('right', ['message' => "Field trip! 🤣"])
      @include('right', ['message' => "Uh, what is this guy's problem, Mr. Stark? 🤔"])
      @include('left', ['message' => "Uh, he's from space, he came here to steal a necklace from a wizard."])
    </div>
    <div class="input">
      <i class="fas fa-camera"></i>
      <i class="far fa-laugh-beam"></i>
      <input placeholder="Type your message here!" type="text" />
      <i class="fas fa-microphone"></i>


{{--      <form id="chat-form" method="post" action="/">--}}
{{--        <input type="hidden" name="_token" value="">--}}
{{--        <div class="mb-3">--}}
{{--          <div class="input-group mb-0">--}}
{{--            <div class="input-group-prepend">--}}
{{--              <button type="submit" class="btn"><em class="fa fa-send"></em></button>--}}
{{--            </div>--}}
{{--            <input type="text" id="message" name="message" class="form-control" placeholder="Enter text here...">--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </form>--}}
    </div>
  </div>
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
        $(".row").last().after(res.html);
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
        $(".row").last().after(res.html);
        $(document).scrollTop($(document).height());
      });
  });

</script>
</html>
