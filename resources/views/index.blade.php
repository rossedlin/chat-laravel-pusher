<!DOCTYPE html>
<html>
<head>
  <title>Chat Laravel Pusher | Edlin App</title>
  <link rel="icon" href="https://assets.edlin.app/favicon/favicon.ico"/>
  <script src="https://js.pusher.com/7.2/pusher.min.js"></script>

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <!-- End jQuery -->

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- End Bootstrap -->

  <link rel="stylesheet" href="/app.css">
</head>

<body>
<div class="container">
  <div class="row clearfix">
    <div class="col-lg-12">
      <div class="card">
        <div class="chat">
          <div class="chat-header clearfix">
            <div class="row">
              <div class="col-lg-6">
                <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                  <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                </a>
                <div class="chat-about">
                  <h6 class="m-b-0">Ross Edlin</h6>
                </div>
              </div>
            </div>
          </div>
          <div class="chat-history">
            <ul class="m-b-0">
              @include('left', ['timestamp' => '14th March 2023', 'message' => 'Open up this page on two different computers and start chatting!'])
            </ul>
          </div>
          <div class="chat-message clearfix">
            <form id="chat-form" method="post" action="/">
              <input type="hidden" name="_token" value="">
              <div class="mb-3">
                <div class="input-group mb-0">
                  <div class="input-group-prepend">
                    <button type="submit" class="btn"><em class="fa fa-send"></em></button>
                  </div>
                  <input type="text" id="message" name="message" class="form-control" placeholder="Enter text here...">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
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
        $(".message-item").last().after(res.html);
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
        $(".message-item").last().after(res.html);
        $(document).scrollTop($(document).height());
      });
  });

</script>
</html>
