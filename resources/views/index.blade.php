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
          Cristino Murphy
        </a>
        <small class="text-muted">
          <i class="mdi mdi-checkbox-blank-circle text-success on-off align-text-bottom"></i> Online
        </small>
      </div>
    </div>
  </div>
  <!-- End Header -->

  <!-- Chat -->
  <div class="p-4 list-unstyled mb-0 chat">
    <div style="margin: -24px;">
      <div>
        <div style="right: 0px; bottom: 0px;">
          <div style="height: auto; overflow: hidden scroll;">
            <div style="padding: 24px;">
              <li>
                <div class="d-inline-block">
                  <div class="d-flex chat-type mb-3">
                    <div class="position-relative">
                      <img src="https://i.pravatar.cc/150?img=5" alt="Avatar">
                      <i class="mdi mdi-checkbox-blank-circle text-success on-off align-text-bottom"></i></div>
                    <div class="chat-msg" style="max-height: 500px;"><p
                        class="text-muted small msg px-3 py-2 bg-light rounded mb-1">Nice to meet you</p></div>
                  </div>
                </div>
              </li>
              <li class="chat-right">
                <div class="d-inline-block">
                  <div class="d-flex chat-type mb-3">
                    <div class="position-relative chat-user-image">
                      <img src="https://i.pravatar.cc/150?img=5"
                           class="avatar avatar-md-sm rounded-circle border shadow"
                           alt="">
                      <i class="mdi mdi-checkbox-blank-circle text-success on-off align-text-bottom"></i></div>
                    <div class="chat-msg" style="max-height: 500px;"><p
                        class="text-muted small msg px-3 py-2 bg-light rounded mb-1">Welcome</p>
                    </div>
                  </div>
                </div>
              </li>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Chat -->

  <!-- Footer -->
  <div class="footer">
    <div class="row">
      <div class="col">
        <input type="text" class="form-control" placeholder="Enter Message...">
      </div>
      <div class="col">
        <a href="/page-chat"><i></i></a>
      </div>
    </div>
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
