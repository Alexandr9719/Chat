@extends('layouts.app')

@section('content')
    {{--Chat's style--}}
    <link href="{{asset('css/chat_window.css')}}" rel="stylesheet">

    <div class="container">
        {{--<div class="chat_window">--}}
        {{--<div class="top_menu">--}}
        {{--<div class="buttons">--}}
        {{--<div class="button close"></div>--}}
        {{--<div class="button minimize"></div>--}}
        {{--<div class="button maximize"></div>--}}
        {{--</div>--}}
        {{--<div class="title">Chat</div>--}}
        {{--</div>--}}
        {{--<ul class="messages"></ul>--}}
        {{--<div class="bottom_wrapper clearfix">--}}
        {{--<div class="message_input_wrapper"><input class="message_input"--}}
        {{--placeholder="Type your message here..."/></div>--}}
        {{--<div class="send_message">--}}
        {{--<div class="icon"></div>--}}
        {{--<div class="text">Send</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="message_template">--}}
        {{--<li class="message">--}}
        {{--<div class="avatar"></div>--}}
        {{--<div class="text_wrapper">--}}
        {{--<div class="text"></div>--}}
        {{--</div>--}}
        {{--</li>--}}
        {{--</div>--}}
        {{--</div>--}}
        <div class="chat_window">
            <div class="row ">
                <div class="col-xs-12 col-md-12">
                    {{-- Заглушки для фото профиля и имени собеседника --}}
                    <img class="chat_user_img" src="http://wearesmile.com/assets/themes/s5/img/logo.png">
                    <span style="text-align: right" class="chat_user_name">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                    <img src="{{asset('icons/ic_more_vert_black_24px.svg')}}" style="cursor: pointer; position: absolute;
                    right: 30px; top: 20px; z-index: -1;">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-12">

                </div>
            </div>
        </div>

        <script>
            $(window).ready(function () {
               console.log("chat module loaded");
            });
        </script>


    </div>

@endsection
