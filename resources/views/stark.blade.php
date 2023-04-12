<div class="container">
  <div class="chat">
    <div class="contact bar">
      <div class="pic me"></div>
      <div class="name">
        Ross Edlin
      </div>
      <div class="seen">
        Today at 11:56
      </div>
    </div>
    <div class="messages" id="chat">
      <div class="time">
        Today at 15:41
      </div>
      @include('right', ['message' => "Hey! What's up!  👋"])
      @include('right', ['message' => "Ask a friend to open this link and you can chat with them!"])
    </div>
    <div class="input">
      <i class="fas fa-camera"></i>
      <i class="far fa-laugh-beam"></i>
      <input placeholder="Type your message here!" type="text"/>
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
