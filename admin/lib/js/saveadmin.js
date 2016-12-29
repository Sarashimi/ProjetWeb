/* jquery pour admin */
$(document).ready(function () {
    $("#login_form").css('display', 'none');
    $("#login_form").fadeIn(3000);
    $("#login").focus();
    $("#annuler").click(function () {
        $("#login_form").fadeOut("2000");
        $("#shadow").fadeOut();
    });
    $("#login_form").ready(function () {

        $('input#submit_login').on('click', function (event) {
            login = $("#login").val();
            password = $("#password").val();
            if ($.trim(login) != '' && $.trim(password != '')) {
                var data_form = $('form#form_auth').serialize();
                $.ajax({
                    type: 'GET',
                    data: data_form, // si sérialisé
                   // data: "login=" + login + "&password=" + password, // si pas sérialisé
                    dataType: "json",
                    url: './lib/php/ajax/AjaxLogin.php',
                    success: function (data) {
                        if (data.retour === 1) {
                            $('#login_form').remove();
                            window.location.href = "./index.php";
                            $("#shadow").fadeOut();
                        }
                        else {
                            $('#message').html("Données incorrectes");
                        }
                    },
                    fail: function () {
                    }
                });
            }
            else {
                $('#message').html("Remplissez les champs");
            }
            return false;
        });

    });

});



