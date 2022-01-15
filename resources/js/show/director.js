import {notification} from "./push";
$('#send_comment_director').click(function (e) {
    e.preventDefault()
    let director = $('#director').val()

    if (director === '') {
        $('.error1').show().text('Введите комментарий')
        return false

    } else {
        $('.error1').hide()
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
            director: director,
        },
        success: function (result) {
            let addComment = document.querySelectorAll('.add_comment')
            $('#director').val('')
            $("#comments_director").load(location.href + " #comments_director > *")
            $('#block_director').removeClass('active').css('max-height','0')
            $(addComment[1]).text('+')
            notification()
        }
    })
})


