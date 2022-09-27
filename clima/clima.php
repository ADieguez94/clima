<?php
session_start();
if (!$_SESSION['verificar']) {
    header("location:login.php");
}
$user_id = $_SESSION['id_usuario'];
$user = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require 'components/includes_css.php'; ?>
</head>

<?php require 'components/header.php'; ?>

<body class="back">
    <main class="container">
        <input type="hidden" id="user_id" name="" value="<?= $user_id ?>">
        <input type="hidden" id="user" name="" value="<?= $user ?>">

        <div class="row">
            <div class="col s12 m12 l4 center-align">
                <div class="card mt-30">
                    <div class="search">
                        <input type="text" class="input-field col s12 m12 l12 search-bar" placeholder="Buscar">
                        <button class="waves-effect waves-light btn grey"><i class="material-icons">search</i></button>
                    </div>
                    <div class="clima loading">
                        <h2 class="ciudad"></h2>
                        <h1 class="temp"></h1>
                        <div class="center">
                            <img src="" alt="" class="icon" />
                            <div class="descripcion"></div>
                        </div>
                        <div class="humedad"></div>
                        <div class="viento"></div>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 l8 center-align">
                <div id="pronosticos" class="card mt-30">
                    <div class="Ponostico loading">
                        <h2 class="ciudad-pronostico">Pronóstico</h2>
                        <table class="striped responsive-table">
                            <thead>
                                <tr>
                                    <th>Fecha/Hora</th>
                                    <th>Temp. Max</th>
                                    <th>Temp. Min</th>
                                    <th>Humedad</th>
                                    <th>Vientos</th>
                                    <th>Descripcion</th>
                                </tr>
                            </thead>
                            <tbody id="tabla-body" height="300">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require 'components/includes_js.php'; ?>
    <script type="text/javascript" src="js/view_controllers/clima_vs.js"></script>
</body>

</html>