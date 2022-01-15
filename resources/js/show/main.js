import {notification} from "./push";

$('#main_send').click(function (e) {
    e.preventDefault()
    let main = $('#main').val()

    if (main == '') {
        $('.error5').show().text('Введите комментарий')
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
            main: main,
        },
        success: function (result) {
            $('#main').val('')
            $("#comments_main").load(location.href + " #comments_main > *")
            notification()
        }
    })
})


