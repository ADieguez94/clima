<!DOCTYPE html>
<html lang="en">

<head>
    <?php require 'components/includes_css.php'; ?>
</head>

<body style="background-image: url('images/land.jpg');  background-size: cover; min-height: 100vh;">
    <main>
        <div id="container-login" class="container mt-30">
            <div class="row">
                <div class="col s3 m2 l3"></div>
                <div class="col s12 m8 l6 center-align">
                    <div class="card z-depth-5">
                        <div class="card-content">
                            <span class="card-title">BIENVENIDO</span>
                            <form id="login">
                                <div class="row">
                                    <div class="input-field col s12 m12 l12">
                                        <i class="material-icons prefix">account_box</i>
                                        <input id="user_mail" name="user_mail" type="email" style="color:white;">
                                        <label for="user_mail">Correo</label>
                                    </div>
                                    <div class="input-field col s12 m12 l12">
                                        <i class="material-icons prefix">lock_outline</i>
                                        <input id="user_pass" name="user_pass" type="password" style="color:white;">
                                        <label for="user_pass">Contraseña</label>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <button class="btn waves-effect waves-grey black-text white" onclick="login()">ENTRAR
                                        <i class="material-icons right grey-text">send</i>
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <a class="pointer white-text modal-trigger" href="#modal1">Registrarse</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s3 m2 l3"></div>
            </div>
        </div>
        <!-- Modal registro -->
        <section>
            <div id="modal1" class="modal grey darken-4">
                <div class="modal-content">
                    <h4>Registro</h4>
                    <form id="registro">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="correo" name="correo" type="email" class="validate"  style="color:white;">
                                <label for="correo">Correo</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="user" name="user" type="text" class="validate"  style="color:white;">
                                <label for="user">Usuario</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="pass" name="pass" type="password" class="validate"  style="color:white;">
                                <label for="pass">Contraseña</label>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer grey darken-4">
                    <a onclick="addUser()" class="waves-effect waves-green white-text btn">Registrar <i class="material-icons right">send</i></a>
                </div>
            </div>
        </section>

    </main>
    <?php require 'components/includes_js.php'; ?>
    <script type="text/javascript" src="js/view_controllers/login_vs.js"></script>
</body>

</html>