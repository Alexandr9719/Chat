@extends('layouts.app')

@section('sidenav')
    @parent
    {{-- SideNav styles --}}
    <link href="{{asset('css/w3.css')}}" rel="stylesheet">
    <link href="{{asset('css/side_nav.css')}}" rel="stylesheet">

    <div id="mySidenav" class="sidenav">
        <div style="width: 100%; height: 50px; color: black;">
            <img class="side-nav-own-avatar"
                 style="width: 64px; height: 64px; border-radius: 50%; margin-left: 5px;"
                 src="{{asset('icons/avatars/img_avatar_man.png')}}">
            {{Auth::user()->name}}
        </div>
        <div class="w3-container">
            <h2>Friend's List</h2>

            <ul class="w3-ul w3-card-4">
                <li class="w3-padding-16">
      <span onclick="this.parentElement.style.display='none'"
            class="w3-closebtn w3-padding w3-margin-right w3-medium">&times;</span>
                    <img src="{{asset('icons/avatars/img_avatar_man.png')}}"
                         class="w3-left w3-circle w3-margin-right"
                         style="width:60px">
                    <span class="w3-xlarge">Mike</span><br>
                    <span>Status</span>
                </li>
                <li class="w3-padding-16">
      <span onclick="this.parentElement.style.display='none'"
            class="w3-closebtn w3-padding w3-margin-right w3-medium">&times;</span>
                    <img src="{{asset('icons/avatars/img_avatar_woman.png')}}"
                         class="w3-left w3-circle w3-margin-right"
                         style="width:60px">
                    <span class="w3-xlarge">Jill</span><br>
                    <span>Status</span>
                </li>
                <li class="w3-padding-16">
      <span onclick="this.parentElement.style.display='none'"
            class="w3-closebtn w3-padding w3-margin-right w3-medium">&times;</span>
                    <img src="{{asset('icons/avatars/img_avatar_woman.png')}}"
                         class="w3-left w3-circle w3-margin-right"
                         style="width:60px">
                    <span class="w3-xlarge">Jane</span><br>
                    <span>Status</span>
                </li>
            </ul>
        </div>
    </div>
    <script>
        $(".w3-padding-16").click(function () {
            console.log("click friend's list");
        });
    </script>
@endsection

@section('content')
    {{--Chat's style--}}
    <link href="{{asset('css/chat_window.css')}}" rel="stylesheet">

    {{--Chat's scripts--}}
    <script src="https://cdn.rawgit.com/samsonjs/strftime/master/strftime-min.js"></script>//{{-- удалить!!! --}}
    <script src="https://js.pusher.com/4.0/pusher.min.js"></script>

    <div class="chat">
        <div class="chat-window">
            <div class="container">
                <div class="row">
                    <div style="margin-top: 60px;" class="col-md-offset-2 col-md-8 col-xs-12">
                        <div class="chat-messages"
                             style="overflow-y: auto; overflow-x: hidden;">
                            <div class="chat-message-left">
                                <!-- Left-aligned media object -->
                                <div class="media">
                                    <div class="media-left">
                                        <img class="media-object img-circle"
                                             style="width:64px; height: 64px"
                                             src="{{asset('icons/avatars/img_avatar_unknown.png')}}">
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">Left-aligned</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor
                                            incididunt ut
                                            labore et dolore magna aliqua.</p>
                                    </div>
                                </div>
                                <hr>
                            </div>

                            <div class="chat-message-right">
                                <!-- Right-aligned media object -->
                                <div class="media">
                                    <div class="media-body" style="text-align: right;">
                                        <h4 class="media-heading">Right-aligned</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor
                                            incididunt ut
                                            labore et dolore magna aliqua.</p>
                                    </div>
                                    <div class="media-right">
                                        <img src="{{asset('icons/avatars/img_avatar_unknown.png')}}"
                                             class="media-object img-circle"
                                             style="width:64px; height: 64px;">
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <footer class="chat-input"
            style="position: fixed; bottom: 0px; left: 0px; right: 0px; width: 100%; height: 50px; z-index: 99;">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8 col-xs-12">
                    <div class="input-group">
                        <input type="text" class="form-control text-message" placeholder="Input message here!">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <img src="{{asset('icons/ic_send_black_24px.svg')}}" class="chat-message-send">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="chat-message-template-left" hidden>
        <div class="chat-message-left">
            <div class="media">
                <div class="media-left">
                    <img class="media-object img-circle"
                         style="width:64px; height: 64px"
                         src="{{asset('icons/avatars/img_avatar_unknown.png')}}">
                </div>
                <div class="media-body">
                    <h4 class="media-heading message-author"></h4>{{-- Имя автора сообщения --}}
                    <p class="message-text"></p>{{-- Текст сообщения --}}
                </div>
            </div>
            <hr>
        </div>
    </div>
    <div class="chat-message-template-right" hidden>
        <div class="chat-message_right">
            <div class="media">
                <div class="media-body" style="text-align: right;">
                    <h4 class="media-heading message-author"></h4>{{-- В тэг добавляется имя написавшего --}}
                    <p class="message-text"></p> {{-- В тэг добавляется текст сообщения --}}
                </div>
                <div class="media-right">
                    <img src="{{asset('icons/avatars/img_avatar_unknown.png')}}"
                         class="media-object img-circle"
                         style="width:64px; height: 64px;">
                </div>
            </div>
            <hr>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            console.log("chat module loaded");

            Pusher.log = function (msg) {
                console.log(msg);
            }
            function init() {
                $(".chat-message-send").click(sendMessage);

                $(".text-message").keypress(function (e) {
                    if (e.which == 13) {
                        console.log('successfully send');
                        sendMessage();
                    }
                });
            }


            function sendMessage() {
                var message_text = $(".text-message").val();
                if (message_text.length < 1)
                    return false;

                var data = {chat_text: message_text};
                console.log(data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
//                $.post('home', data, sendMessageSuccess);
                $.ajax({
                    type: 'POST',
                    url: '/public/home',
                    data: data,
                    success: sendMessageSuccess
                });
                return false;
            }

            function sendMessageSuccess() {
                $(".text-message").val('');
                console.log('message send successfully');
            }

            function add_message(data) {
                console.log('message added');
                console.log(data);
                if (data.username == '{{Auth::user()->name}}') {
                    var message = "<div class='chat-message_right'>" +
                        "<div class='media'>" +
                            "<div class='media-body'  style='text-align: right;'>" +
                                "<h4 class='media-heading message-author'>"+ data.username +"</h4>" +
                                "<p class='message-text'>"+ data.text +"</p>" +
                            "</div>" +
                            "<div class='media-right'>" +
                                "<img src='{{asset('icons/avatars/img_avatar_unknown.png')}}' " +
                                "class='media-object img-circle' " +
                                "style='width:64px; height: 64px;'> " +
                            "</div>" +
                            "</div>" +
                            "<hr>" +
                        "</div>";
                }
                else{
                    console.log(data.username);
                    var message = "<div class='chat-message-left'>" +
                        "<div class='media'>" +
                        "<div class='media-left'>" +
                        "<img class='media-object img-circle' style='width:64px; height: 64px' src='{{asset('icons/avatars/img_avatar_unknown.png')}}'>" +
                        "</div>" +
                        "<div class='media-body'>" +
                        "<h4 class='media-heading message-author'>"+ data.username +"</h4>" +
                        "<p class='message-text'>"+ data.text +"</p>" +
                        "</div>" +
                        "</div>" +
                        "<hr>" +
                        "</div>";
                }

                $('.chat-messages').append(message);
                
                //messages.scrollTop(messages[0].scrollHeight);


            }

            $(init);

            var options = {
                auth: {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                },
                'cluster': 'eu',
                'encrypted': true,
                authEndpoint: '/public/auth'

            };

            var pusher = new Pusher('{{env('PUSHER_APP_KEY')}}', options);

            var channel = pusher.subscribe('{{$chatChannel}}');
            channel.bind('new-message', add_message);

        });


    </script>

@endsection
