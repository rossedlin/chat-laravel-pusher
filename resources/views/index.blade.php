@extends('layout')

@section('content')
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
              <small>Last seen: 2 hours ago</small>
            </div>
          </div>
        </div>
      </div>
      <div class="chat-history">
        <ul class="m-b-0">
          <li class="clearfix">
            <div class="message-data text-right">
              <span class="message-data-time">10:10 AM, Today</span>
              <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
            </div>
            <div class="message other-message float-right"> Hi Aiden, how are you? How is the
              project coming along?
            </div>
          </li>
          <li class="clearfix">
            <div class="message-data">
              <span class="message-data-time">10:12 AM, Today</span>
            </div>
            <div class="message my-message">Are we meeting today?</div>
          </li>
          <li class="clearfix">
            <div class="message-data">
              <span class="message-data-time">10:15 AM, Today</span>
            </div>
            <div class="message my-message">
              Project has been already finished and I have results to show you.
            </div>
          </li>
        </ul>
      </div>
      <div class="chat-message clearfix">
        <form method="post" action="/">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="mb-3">
            <div class="input-group mb-0">
              <div class="input-group-prepend">
                <button type="submit" class="btn"><em class="fa fa-send"></em></button>
              </div>
              <input type="text" name="message" class="form-control" placeholder="Enter text here...">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
