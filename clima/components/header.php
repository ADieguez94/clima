<div class="navbar-fixed">
    <nav class="transparent z-depth-3">
        <div class="nav-wrapper">
            <a href="clima.php" class="brand-logo"><img class="responsive-img" src="images/logo.png" style="max-width:50px;" /></a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li>
                    <a href="#!">
                        <i class="material-icons left">account_circle</i><?= $_SESSION['usuario'] ?>
                    </a>
                </li>
                <li class="sidenav-close"><a href="funciones_php/logout.php"><i class="material-icons left">exit_to_app</i>Cerrar Sesion</a></li>
            </ul>
        </div>
    </nav>
    <ul class="sidenav" id="mobile-demo">
        <li class="center mt-30">MENU</li>
        <li class="mt-30">
            <a href="#!">
                <i class="material-icons left">account_circle</i><?= $_SESSION['usuario'] ?>
            </a>
        </li>
        <li class="divider"></li>
        <li class="sidenav-close">
            <a href="funciones_php/logout.php"><i class="material-icons left">exit_to_app</i>Cerrar Sesion</a>
        </li>
    </ul>
</div>