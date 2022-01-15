$('.btn_delete_x').click(function (e) {
    e.preventDefault()

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
    })
    $.ajax({
        url: '',
        method: "DELETE",
        success: function (result) {
            location.reload();
        }
    })
})


