import {notification} from "./push";
$('#send_comment_phone').click(function (e) {
    e.preventDefault()
    let phone = $('#phone').val()

    if (phone === '') {
        $('.error4').show().text('Введите комментарий')
        return false

    } else {
        $('.errorBlock').hide()
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
    })
    $.ajax({
        url: '',
        method: "POST",
        data: {
            phone: phone,
        },
        success: function (result) {
            let addComment = document.querySelectorAll('.add_comment')
            $('#phone').val('')
            $("#comments_phone").load(location.href + " #comments_phone > *")
            $('#block_phone').removeClass('active').css('max-height','0')
            $(addComment[4]).text('+')
            notification()
        }
    })
})


