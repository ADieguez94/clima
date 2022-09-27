//evento keyup para login
document
    .querySelector("#user_pass")
    .addEventListener("keyup", function (event) {
        if (event.key == "Enter") {
            login();
        }
    });


//evento keyup para registrar
document
    .querySelector("#pass")
    .addEventListener("keyup", function (event) {
        if (event.key == "Enter") {
            addUser();
        }
    });


// funcion login
function login() {
    console.log("entra")
    const mail = $("#user_mail").val();
    const pass = $("#user_pass").val();
    if (user != '' && pass != '') {
        $.ajax({
            url: "funciones_php/funciones_login.php?action=login",
            type: 'POST',
            dataType: 'json',
            data: {
                'mail': mail,
                'pass': pass,
            },
            success: function (data, textStatus, jqXHR) {
                if (data.error == true) {
                    M.toast({ html: data.message, classes: 'rounded red' });
                } else if (data.error == false) {
                    window.location.href = "clima.php";
                }
            }
        });
    } else {
        M.toast({ html: 'ATENCION! Faltan datos', classes: 'rounded red' });
    }
}

// funcion registrar
function addUser() {
    if (validateForm()) {
        let data = new FormData();
        let other_data = $('#registro').serializeArray();
        $.each(other_data, function (key, input) {
            data.append(input.name, input.value);
        });
        $.ajax({
            url: "funciones_php/funciones_login.php?action=add",
            type: 'POST',
            headers: {
                'contentType': 'multipart/form-data',
            },
            contentType: false,
            cache: false,
            processData: false,
            data: data,
            success: function (data, textStatus, jqXHR) {
                if (data.error == false) {
                    M.toast({ html: data.message, classes: 'rounded green' });
                    $('#registro')[0].reset();
                    $('#modal1').modal('close');
                } else if (data.error == true) {
                    M.toast({ html: 'ATENCION! Faltan datos', classes: 'rounded red' });
                }
            },
            error: function (errorThrown) {
                alert(errorThrown.responseJSON['error']);
            }
        });
    }
}

// validacion de form de registro
function validateForm() {
    var flag = true;
    var msg = "";
    if ($("#correo").val() == '') {
        msg += "-Correo<br>";
        flag = false;
    }
    if ($("#correo").val() != '') {
        if (!validateEmail($("#correo").val())) {
            msg += "-Formato de correo invalido<br>";
            flag = false;
        }
    }
    if ($("#user").val() == '') {
        msg += "-Usuario<br>";
        flag = false;
    }
    if ($("#pass").val() == '') {
        msg += "-Contraseña<br>";
        flag = false;
    }
    if ($("#pass").val().length < 8) {
        msg += "-Contraseña con al menos 8 caracteres<br>";
        flag = false;
    }
    if (flag == false) {
        M.toast({ html: 'ATENCION! Faltan datos:<br>' + msg, classes: 'rounded red' });
        flag = false;
    } else {
        flag = true;
    }
    return flag;
}


function validateEmail(str) {
    let pattern = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/
    return pattern.test(str);
}

