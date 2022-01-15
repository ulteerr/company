import {notification} from "./push";
$('#send_comment_address').click(function (e) {
    e.preventDefault()
    let address = $('#address').val()

    if (address === '') {
        $('.error3').show().text('Введите комментарий')
        return false

    } else {
        $('.error3').hide()
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
            address: address,
        },
        success: function (result) {
            let addComment = document.querySelectorAll('.add_comment')
            $('#address').val('')
            $("#comments_address").load(location.href + " #comments_address > *")
            $('#block_address').removeClass('active').css('max-height','0')
            $(addComment[3]).text('+')
            notification()
        }
    })
})


