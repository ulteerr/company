import {notification} from "./push";
$('#send_comment_inn').click(function (e) {
    e.preventDefault()
    let inn = $('#inn').val()

    if (inn === '') {
        $('.error0').show().text('Введите комментарий')
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
            inn: inn,
        },
        success: function (result) {
            let addComment = document.querySelectorAll('.add_comment')
            $('#inn').val('')
            $('#comments_inn').load(location.href + " #comments_inn > *")
            $('#block_inn').removeClass('active').css('max-height','0')
            $(addComment[0]).text('+')
            notification()
        }
    })
})


