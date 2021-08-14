@push('js')
<script>
    $(".messages").animate({
        scrollTop: $(document).height()
    }, "fast");

    function newMessage() {
        message = $(".message-input input").val();
        if ($.trim(message) == '') {
            return false;
        }
        $('<li class="sent"><img src="http://127.0.0.1:8000/backend/images/avatar.png" alt="" /><p>' + message + '</p></li>')
            .appendTo($('.messages ul'));
        $('.message-input input').val(null);
        $('.contact.active .preview').html('<span>You: </span>' + message);
        $(".messages").animate({
            scrollTop: $('.messages').scrollTop() + 200
        }, "fast");
    };

    $('.submit').click(function() {
        newMessage();
    });

    $(window).on('keydown', function(e) {
        if (e.which == 13) {
            newMessage();
            return false;
        }
    });



</script>
@endpush
