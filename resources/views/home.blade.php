@extends('layouts.app')

@section('sidenav')
    @parent
    {{-- SideNav styles --}}
    <link href="{{asset('css/w3.css')}}" rel="stylesheet">

    <div id="mySidenav" class="sidenav">
        <div style="width: 100%; height: 50px; color: black;">
            <img class="side-nav-own-avatar"
                 style="width: 64px; height: 64px; border-radius: 50%; margin-left: 5px;"
                 src="{{asset('icons/avatars/img_avatar_man.png')}}">
            {{Auth::user()->name}}
        </div>
        <div class="w3-container">
            <h2>Friend's List</h2>
            {{--<p>An example of how to create an avatar list:</p>--}}

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
@endsection

@section('content')
    {{--Chat's style--}}
    <link href="{{asset('css/chat_window.css')}}" rel="stylesheet">

    {{--<div class="container">--}}
    {{--<div class="chat_window">--}}
    {{--<div class="row" style="color:#5b84c6;">--}}
    {{--<div style="height: 63px" class="col-xs-12 col-md-12">--}}
    {{--<div class="top-chat">--}}
    {{-- Заглушки для фото профиля и имени собеседника --}}
    {{--<img class="chat_user_img" src="{{asset('icons/avatars/img_avatar_man.png')}}">--}}
    {{--<span style="position: absolute; z-index: -1; left: 100px; top: 20px;"--}}
    {{--class="chat_user_name">{{Auth::user()->name}}</span>--}}
    {{--<img class="settings" src="{{asset('icons/ic_more_vert_black_24px.svg')}}"--}}
    {{--style="cursor: pointer; position: absolute; right: 30px; top: 20px; z-index: 999;">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    <div class="chat">
        {{--<div class="chat-top">--}}
        {{--<div class="container">--}}
        {{--<div class="panel panel-default">--}}
        {{--<div class="panel-body">--}}
        {{--<img class="chat_user_img" src="{{asset('icons/avatars/img_avatar_man.png')}}">--}}
        {{--{{Auth::user()->name}}--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                Level 1: .col-sm-9
                <div class="chat-messages"
                     style="overflow-y: auto; overflow-x: hidden;">
                    <!-- Left-aligned media object -->
                    <div class="media">
                        <div class="media-left">
                            <img src="{{asset('icons/avatars/img_avatar_unknown.png')}}"
                                 class="media-object img-circle"
                                 style="width:64px; height: 64px">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Left-aligned</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut
                                labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <hr>

                    <!-- Right-aligned media object -->
                    <div class="media">
                        <div class="media-body" style="text-align: right;">
                            <h4 class="media-heading">Right-aligned</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
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
                    <!-- Left-aligned media object -->
                    <div class="media">
                        <div class="media-left">
                            <img src="{{asset('icons/avatars/img_avatar_unknown.png')}}"
                                 class="media-object img-circle"
                                 style="width:64px; height: 64px">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Left-aligned</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut
                                labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <hr>

                    <!-- Right-aligned media object -->
                    <div class="media">
                        <div class="media-body" style="text-align: right;">
                            <h4 class="media-heading">Right-aligned</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
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
                    <!-- Left-aligned media object -->
                    <div class="media">
                        <div class="media-left">
                            <img src="{{asset('icons/avatars/img_avatar_unknown.png')}}"
                                 class="media-object img-circle"
                                 style="width:64px; height: 64px">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Left-aligned</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut
                                labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <hr>

                    <!-- Right-aligned media object -->
                    <div class="media">
                        <div class="media-body" style="text-align: right;">
                            <h4 class="media-heading">Right-aligned</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
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
                    <!-- Left-aligned media object -->
                    <div class="media">
                        <div class="media-left">
                            <img src="{{asset('icons/avatars/img_avatar_unknown.png')}}"
                                 class="media-object img-circle"
                                 style="width:64px; height: 64px">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Left-aligned</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut
                                labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <hr>

                    <!-- Right-aligned media object -->
                    <div class="media">
                        <div class="media-body" style="text-align: right;">
                            <h4 class="media-heading">Right-aligned</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
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
                    <!-- Left-aligned media object -->
                    <div class="media">
                        <div class="media-left">
                            <img src="{{asset('icons/avatars/img_avatar_unknown.png')}}"
                                 class="media-object img-circle"
                                 style="width:64px; height: 64px">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Left-aligned</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut
                                labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <hr>

                    <!-- Right-aligned media object -->
                    <div class="media">
                        <div class="media-body" style="text-align: right;">
                            <h4 class="media-heading">Right-aligned</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
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
                <div class="row">
                    <div class="col-8 col-sm-6">
                        Level 2: .col-8 .col-sm-6
                    </div>
                    <div class="col-4 col-sm-6">
                        Level 2: .col-4 .col-sm-6
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>
    <script>
        $(document).ready(function () {
            var chat_selected = false;
            if (chat_selected) {
                $(".chat").hide();
            }
            console.log("chat module loaded");
            $(".settings").click(function () {
                alert('Settings');
            });
        });

    </script>

@endsection
