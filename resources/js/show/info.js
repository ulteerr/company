import {notification} from "./push";
$('#send_comment_info').click(function (e) {
    e.preventDefault()
    let info = $('#info').val()

    if (info === '') {
        $('.error2').show().text('Введите комментарий')
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
            info: info,
        },
        success: function (result) {
            let addComment = document.querySelectorAll('.add_comment')
            $('#info').val('')
            $("#comments_info").load(location.href + " #comments_info > *")
            $('#block_info').removeClass('active').css('max-height','0')
            $(addComment[2]).text('+')
            notification()
        }
    })
})


