jQuery(document).ready(function ($) {
    // sroll up page
    $("#swipe-up").on("click", function () {
        $(window).scrollTop(0);
    })

    // Footer slider
    $(window).resize(function () {
        if (screen.width > 660) {
            $('footer ul').css({'display': 'block'});
        } else {
            $(' footer ul').css({'display': 'none'});
        }
    })


    $('.slider-span').on("click", function (e) {
        if (screen.width < 660) {
            if ($(this).next().css('display') == 'none') {
                $(this).next().css({'display': 'block'})
            } else {
                $(this).next().css({'display': 'none'})
            }
        }
    })

    // authorization
    $('#my-account').on('click', function () {
        $('#authorization').css({'display': 'flex'})
    })
    $('#close').on('click', function () {
        $('#authorization').css({'display': 'none'})
    })


    // Registration validator
   /* $('.box-registar input:submit').click(function (event) {
        let status = false;
        $('.box-registar input').each(function (i, e) {
            $(e).nextAll('p').remove();
            if ($(e).val() == false) {
                $(e).addClass('input-error').after("<p style='color:red'>поле не может быть пустым</p>")
                status = true;
            } else {
                $(e).removeClass('input-error')
            }
        })

        if (!$('.box-registar input[name=confirm]:checked').val()) {
            $('.box-registar input[name=confirm]').next().after("<p style='color:red'>Согласитесь с условиями</p>")
            status = true;
        }
        if ($('.box-registar input[name=password]').val() !== $('.box-registar input[name=confirm-password]').val()) {
            $('.box-registar input[name=password]').after("<p style='color:red'>Пароли не совпадают</p>")
            status = true;
        }
        $.post("/registration/checkEmail", {"email": "asdasdsa@sdsad.com"}, function (d_data) {
            console.log(d_data)
                // if (d_data) {
                //     alert("Пользователь с таким email уже зарегистрирован");
                //     status = true;
                //     console.log(d_data)
                // }
            }
        )
        if (status) {
            event.preventDefault();
        }

    })*/
})

