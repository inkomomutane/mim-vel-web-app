@extends('layouts.backend.dashboard')
@include('backend.messages.messages-css')
@section('content')
    <div id="frame">
        <div id="sidepanel">
            <div id="search">
                <label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
                <input type="text" placeholder="Search contacts..." />
            </div>
            <div id="contacts">
                <ul>

                    @foreach ($contacts as $user)
                        <li class="contact" data-id="{{ $user->id }}">
                            <div class="wrap">
                                <img src="http://127.0.0.1:8000/backend/images/avatar.png" alt="" />
                                <div class="meta">
                                    @if ($user->nonReaded > 0)
                                        <div class="contact-status online">
                                            {{ $user->nonReaded > 99 ? ⁺99 : $user->nonReaded }}
                                        </div>
                                    @endif

                                    <p class="name">{{ $user->name }} </p>
                                </div>
                            </div>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
        <div class="content">
            <div class="contact-profile">
                <img src="http://127.0.0.1:8000/backend/images/avatar.png" alt="" />
                <p></p>
            </div>
            <div class="messages" data-size="270">
                <ul>

                </ul>
            </div>
            <div class="message-input">
                <div class="wrap">
                    <input type="text" placeholder="Write your message..." />
                    <button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>

    </div>
@endsection


@include('backend.messages.messages-js')

@push('js')
    <script>
        $('div#contacts ul li.contact').on('click', function() {
            $('div#contacts ul li.contact').removeClass('active');
            var name = $(this).find('p.name')[0].textContent;
            var id = $(this).attr('data-id');
            $('div.contact-profile p').text(name);
            $(this).addClass('active');
            $('.messages ul').empty();
            var ajres = $.ajax({
                type: "get",
                url: '{{ asset('') }}' + 'mm/' + {!! auth()->user()->id !!} + '/' + parseInt($(this).attr(
                    'data-id')),
                data: "messages",
                dataType: "json",
                success: function(messages) {

                    var messages = Object.keys(messages).map(function(key) {
                        return messages[key];
                    });
                    messages.sort((a, b) => a.created_at.localeCompare(b.created_at));
                    messages.forEach(
                        message => {
                            if (parseInt(message.from_id) == parseInt(id)) {
                                $('<li class="replies"><img src="http://127.0.0.1:8000/backend/images/avatar.png" alt="" /><p>' +
                                        message.message + '</p></li>')
                                    .appendTo($('.messages ul'));
                                var scrollSize = $('.messages').attr('data-size');
                                $('.messages').attr('data-size', '' + (parseInt(scrollSize) + 150));
                            } else {
                                $('<li class="sent"><img src="http://127.0.0.1:8000/backend/images/avatar.png" alt="" /><p>' +
                                        message.message + '</p></li>')
                                    .appendTo($('.messages ul'));
                                var scrollSize = $('.messages').attr('data-size');
                                $('.messages').attr('data-size', '' + (parseInt(scrollSize) + 150));
                            }
                    });
                    $('li.contact.active div.wrap div.meta div.contact-status.online').remove();
                    return messages;
                }
            });

            var scrollSize = $('.messages').attr('data-size');
            console.log(scrollSize);
            $(".messages").animate({
                scrollTop: parseInt(scrollSize)
            }, "fast");
            $('.messages').attr('data-size', '1');



        });
    </script>
@endpush
@push('css')
    <style>
        .contact-status {
            width: 24px;
            padding: 0px;
            text-align: center;
            border-radius: 20px;
            height: 24px;
            text-align-last: center;
            float: right;
            color: #fff;
            font-size: 12px;
            font-weight: 800;
        }

        .contact-status.online {
            background: #0f9748;
        }

    </style>
@endpush
