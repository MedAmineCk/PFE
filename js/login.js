$('.input input').each(function () {
    if ($(this).val() != '' || $(this).length > 0) {
        $(this).siblings("label").css({
            'top': '-11px',
            'font-size': '12px',
            'background': '#f7f7f7',
            'padding': '2px'
        });
    }
})
$('.input input').focus(function () {
    $(this).siblings("label").css({
        'top': '-11px',
        'font-size': '12px',
        'background': '#f7f7f7',
        'padding': '2px'
    });
    $(this).parent().css({
        'border': '2px solid #03A9F4'
    });
})
$('.input input').focusout(function () {
    if ($(this).val() != '') {
        $(this).parent().css({
            'border': '1px solid #ccc'
        });
        $(this).siblings('.err').css({
            'display': 'none'
        })
    } else {
        $(this).siblings("label").css({
            'left': '10px',
            'top': '10px',
            'font-size': '18px'
        });
        $(this).parent().css({
            'border': '1px solid #ccc'
        });
    }
})
$('.input input').on('input', function () {
    $(this).siblings('.err').css({
        'display': 'none'
    })
});

function isEmpty() {
    var isEmpty = true;
    $("#admin-login-form input").each(function () {
        var element = $(this);
        if (element.val() == "") {
            $(this).siblings('.err').css({
                'display': 'block'
            })
            $(this).parent().css({
                'border': '1px solid #E91E63'
            });
            isEmpty = true;
        } else {
            isEmpty = false;
        }
    })
    return isEmpty;
}
$('#admin-login-form').submit(function () {
    if (isEmpty()) {
        return false;
    }
})