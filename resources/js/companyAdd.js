require('./error/errorBlock')
$(function () {
    $('#add_company__btn').click(function () {
        $('#form_company').show()
    })

    $('#add_btn').on('click', function (e) {
        e.preventDefault()
        let name = $('#name').val()
        let inn = $('#inn').val()
        let info = $('#info').val()
        let director = $('#director').val()
        let address = $('#address').val()
        let phone = $('#phone').val()


        if (name === '') {
            $('.error0').show().text('Введите название компании')
            return false

        } else if (inn.length < 10) {
            $('.error1').show().text('Введите инн компании, минимум 10 символов')
            return false
        } else if (info.length  < 3) {
            $('.error2').show().text('Введите описание компании, минимум 3 символа')
            return false
        } else if (director === '') {
            $('.error3').show().text('Введите директора компании')
            return false
        } else if (address === '') {
            $('.error4').show().text('Введите адресс компании')
            return false
        } else if (phone.length  < 7) {
            $('.error5').show().text('Введите описание телефон, минимум 7 символов')
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
            url: '/',
            method: "POST",
            data: {
                name: name,
                inn: inn,
                info: info,
                director: director,
                address: address,
                phone: phone
            },
            success: function (result) {
                $('.form_block').show().html(result.success)
                $('.form_company')[0].reset();
                $("#last_company").load(location.href + " #last_company");
                setTimeout(function () {
                    $(".form_block").hide()
                    $('#form_company').hide()
                }, 5000);
            }
        })
    })

})
