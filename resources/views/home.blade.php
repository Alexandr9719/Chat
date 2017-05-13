@extends('layouts.app')

@section('sidenav')
    @parent
    {{-- SideNav styles --}}
    <link href="{{asset('css/w3.css')}}" rel="stylesheet">
    <link href="{{asset('css/side_nav.css')}}" rel="stylesheet">

    <div id="mySidenav" class="sidenav">{{-- Sidenav menu for online users --}}
        <div style="width: 100%; height: 50px; color: black;">
            <img class="side-nav-own-avatar"
                 style="width: 64px; height: 64px; border-radius: 50%; margin-left: 5px;"
                 src="{{asset('icons/avatars/img_avatar_man.png')}}">
            {{Auth::user()->name}}
        </div>
        <div class="w3-container">
            <h2>Friend's List</h2>

            {{-- Users online --}}
            <ul class="w3-ul w3-card-4 friends_list">
                {{--<li class="w3-padding-16">--}}
      {{--<span onclick="this.parentElement.style.display='none'"--}}
            {{--class="w3-closebtn w3-padding w3-margin-right w3-medium">&times;</span>--}}
                    {{--<img src="{{asset('icons/avatars/img_avatar_man.png')}}"--}}
                         {{--class="w3-left w3-circle w3-margin-right"--}}
                         {{--style="width:60px">--}}
                    {{--<span class="w3-xlarge">Mike</span><br>--}}
                    {{--<span>Status</span>--}}
                {{--</li>--}}
                {{--<li class="w3-padding-16">--}}
      {{--<span onclick="this.parentElement.style.display='none'"--}}
            {{--class="w3-closebtn w3-padding w3-margin-right w3-medium">&times;</span>--}}
                    {{--<img src="{{asset('icons/avatars/img_avatar_woman.png')}}"--}}
                         {{--class="w3-left w3-circle w3-margin-right"--}}
                         {{--style="width:60px">--}}
                    {{--<span class="w3-xlarge">Jill</span><br>--}}
                    {{--<span>Status</span>--}}
                {{--</li>--}}
                {{--<li class="w3-padding-16">--}}
      {{--<span onclick="this.parentElement.style.display='none'"--}}
            {{--class="w3-closebtn w3-padding w3-margin-right w3-medium">&times;</span>--}}
                    {{--<img src="{{asset('icons/avatars/img_avatar_woman.png')}}"--}}
                         {{--class="w3-left w3-circle w3-margin-right"--}}
                         {{--style="width:60px">--}}
                    {{--<span class="w3-xlarge">Jane</span><br>--}}
                    {{--<span>Status</span>--}}
                {{--</li>--}}
            </ul>
        </div>
    </div>
@endsection

@section('content')
    {{--Chat's style--}}
    <link href="{{asset('css/chat_window.css')}}" rel="stylesheet">

    {{--Chat's scripts--}}
    <script src="https://cdn.rawgit.com/samsonjs/strftime/master/strftime-min.js"></script>//{{-- удалить!!! --}}
    <script src="https://js.pusher.com/4.0/pusher.min.js"></script>

    {{-- Section for displaying messages --}}
    <div class="chat">{
        <div class="chat-window">
            <div class="container">
                <div class="row">
                    <div style="margin-top: 60px; margin-bottom: 20px;" class="col-md-offset-2 col-md-8 col-xs-12">
                        <div class="chat-messages"
                             style="overflow-y: auto; overflow-x: hidden; bottom: auto">
                            {{--<div class="chat-message-left">--}}
                                {{--<!-- Left-aligned media object -->--}}
                                {{--<div class="media">--}}
                                    {{--<div class="media-left">--}}
                                        {{--<img class="media-object img-circle"--}}
                                             {{--style="width:64px; height: 64px"--}}
                                             {{--src="{{asset('icons/avatars/img_avatar_unknown.png')}}">--}}
                                    {{--</div>--}}
                                    {{--<div class="media-body">--}}
                                        {{--<h4 class="media-heading">Left-aligned</h4>--}}
                                        {{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod--}}
                                            {{--tempor--}}
                                            {{--incididunt ut--}}
                                            {{--labore et dolore magna aliqua.</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<hr>--}}
                            {{--</div>--}}

                            {{--<div class="chat-message-right">--}}
                                {{--<!-- Right-aligned media object -->--}}
                                {{--<div class="media">--}}
                                    {{--<div class="media-body" style="text-align: right;">--}}
                                        {{--<h4 class="media-heading">Right-aligned</h4>--}}
                                        {{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod--}}
                                            {{--tempor--}}
                                            {{--incididunt ut--}}
                                            {{--labore et dolore magna aliqua.</p>--}}
                                    {{--</div>--}}
                                    {{--<div class="media-right">--}}
                                        {{--<img src="{{asset('icons/avatars/img_avatar_unknown.png')}}"--}}
                                             {{--class="media-object img-circle"--}}
                                             {{--style="width:64px; height: 64px;">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<hr>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    {{-- Text input section --}}
    <footer class="chat-input"
            style="position: fixed; bottom: 0px; left: 0px; right: 0px; width: 100%; height: 50px; z-index: 99;">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8 col-xs-12">
                    <div class="input-group">
                        <input type="text" class="form-control text-message" placeholder="Input message here!">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <img src="{{asset('icons/ic_attach_file_black_24px.svg')}}" class="chat-message-attach-file">
                            </button>
                            <button class="btn btn-default" type="button">
                                <img src="{{asset('icons/ic_send_black_24px.svg')}}" class="chat-message-send">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    {{-- Script for messaging --}}
    <script>
        $(document).ready(function () {

            var all_messages = '{{$messages}}';
            all_messages = all_messages.replace(/&quot;/g, "\"").replace(/&amp;/g, "&").replace(/&gt;/g, ">").replace(/&lt;/g, "<");
            var json = JSON.parse(all_messages);
            json.forEach(function (item) {
                item.username = item.name;
                item.text = item.message;
                add_message(item)
            });

            Pusher.log = function (msg) {
                console.log(msg);
            }
            function init() {
                $(".chat-message-send").click(sendMessage);

                $(".chat-message-attach-file").click(attachFile);

                $(".text-message").keypress(function (e) {
                    if (e.which == 13) {
                        sendMessage();
                    }
                });
            }


            function sendMessage() {
                var message_text = $(".text-message").val();
                if (message_text.length < 1)
                    return false;

                var data = {chat_text: message_text};

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

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
            }

            function add_message(data) {
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
                    message = "<div class='chat-message-left'>" +
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
                $('html, body').animate({scrollTop: $(document).height()}, 1000);

            }


            function addToUsersList(member) {
                var friend =
                    "<li class='w3-padding-16' id = 'id_" + member.id + "'>" +
                        "<img src='{{asset('icons/avatars/img_avatar_man.png')}}' " +
                        "class='w3-left w3-circle w3-margin-right' " +
                        "style='width:60px'> " +
                        "<span class='w3-xlarge'>" + member.info.name + "</span><br>" +
                        "<span>" + member.id + "</span>" +
                    "</li>";
                $('.friends_list').append(friend);
            }
            function rmFromUersList(member) {
                $("#id_" + member.id).remove();
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

            channel.bind('pusher:subscription_succeeded', function(members) {
                members.each(function (member) {
                    if (channel.members.me.id != member.id)
                        addToUsersList(member);
                });
            });
            channel.bind('pusher:member_removed', function (member) {
                rmFromUersList(member);

            });
            channel.bind('pusher:member_added', function (member) {
               addToUsersList(member);
            });

        });


    </script>

@endsection
