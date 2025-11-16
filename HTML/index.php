<?php
    include_once '../php/textos.php';
    session_start(); //Iniciando una sesion
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> <!--Codificación por defecto-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--Contenido adaptable al ancho del dispositivo-->
    <title>EnRelieve</title> <!--Titulo de la página-->

    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#09f">
    <meta name="description" content="EnRelieve es una plataforma especializada en la traducción del idioma 
    español al sistema de lectoescritura Braille, facilitando el acceso a herramientas educativas y de inclusión.">

    <!--Puedes usar open graph para cuando se comparte la página-->

    <link rel="icon" type="image/png" href="../image/icon-page.png">

    <!--Styles-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg background_navbar">
            <a class="navbar-brand me-5 ms-5" href="../html/index.php">
                <figure>
                    <img src="../image/logo.png" alt="Logo de EnRelieve" class="logo-navbar">
                </figure>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarnavigation" aria-controls="navbarnavigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!--Contenedor colapsable-->
            <section class="collapse navbar-collapse" id="navbarnavigation">
                <!-- Buscador -->
                <form class="d-flex justify-content-center w-100" role="search">
                    <fieldset class="input-group">
                        <input type="search" class="form-control input-search" aria-label="Search" placeholder="Buscar">

                        <button class="btn btn-light border-start-0" type="submit">
                            <img src="../image/lupa.png" class="icon-search img-fluid">
                        </button>
                    </fieldset>
                </form>

                <ul class="navbar-nav ms-5 me-2 mb-2 mb-lg-0">
                    <li class="nav-item me-1">
                        <a class="nav-link nav-btn" aria-current="page" href="translate.php">Traductor</a>
                    </li>

                    <?php if (empty($_SESSION['usuario'])): ?>
                        <li class="nav-item me-1">
                            <a class="nav-link disable" aria-current="page" href="#">Lecciones</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item me-1">
                            <a class="nav-link nav-btn" aria-current="page" href="#">Lecciones</a>
                        </li>
                    <?php endif; ?>

                    <!-- HTML que solo se muestra si el usuario es Administrador o Supervisor -->
                    <?php if (isset($_SESSION['nivel']) && isset($_SESSION['usuario']) &&
                            ($_SESSION['nivel'] === 'Administrador' || $_SESSION['nivel'] === 'Supervisor')): ?>
                        <li class="nav-item me-1">
                            <a class="nav-link nav-btn" href="dashboard.php">Administrar</a>
                        </li>
                    <?php endif; ?>

                    <!-- HTML que cambia el botón si no hay un login valido -->
                    <?php if (empty($_SESSION['usuario'])): ?>
                        <li class="nav-item me-1">
                            <a class="nav-link nav-btn" href="#" data-bs-toggle="offcanvas" data-bs-target="#offCanvasAccounts" aria-controls="offCanvasAccounts">Ingresa</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item me-1">
                            <a class="nav-link nav-btn" href="#" data-bs-toggle="offcanvas" data-bs-target="#offCanvasAccounts" aria-controls="offCanvasAccounts">Usuario</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </section>
        </nav>
    </header>

    <main class="container text-dark pt-2 pb-2">
        <section id="carouselBraille" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li type="button" data-bs-target="#carouselBraille" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></li>
                <li type="button" data-bs-target="#carouselBraille" data-bs-slide-to="1" aria-label="Slide 2"></li>
                <li type="button" data-bs-target="#carouselBraille" data-bs-slide-to="2" aria-label="Slide 3"></li>
            </ol>

            <section class="carousel-inner mt-2 mb-2">
                <article class="carousel-item active" data-bs-interval="10000">
                    <figure class="w-100 m-0">
                        <img src="../image/Braille1.jpg" class="d-block w-100 img-fluid rounded" alt="Imagen accesibilidad 1">

                        <figcaption class="carousel-caption d-none d-md-block text-white">
                            <h5>Accesibilidad y Orientación</h5>
                            <p>Una persona utiliza un mapa táctil en un espacio público.</p>
                        </figcaption>
                    </figure>
                </article>

                <article class="carousel-item" data-bs-interval="2000">
                    <figure class="w-100 m-0">
                        <img src="../image/Braille2.jpg" class="d-block w-100 img-fluid rounded" alt="Imagen braille 2">

                        <figcaption class="carousel-caption d-none d-md-block text-white">
                            <h5>Lectura Táctil</h5>
                            <p>Un primer plano de una mano deslizando las yemas de los dedos.</p>
                        </figcaption>
                    </figure>
                </article>

                <article class="carousel-item">
                    <figure class="w-100 m-0">
                        <img src="../image/Braille3.jpg" class="d-block w-100 img-fluid rounded" alt="Imagen braille 3">

                        <figcaption class="carousel-caption d-none d-md-block text-white">
                            <h5>Aprender a "Ver" con las Manos</h5>
                            <p>Un fotomontaje que contrasta dos escenas de aprendizaje.</p>
                        </figcaption>
                    </figure>
                </article>
            </section>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselBraille" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselBraille" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </section>
    </main>
        
    <footer class="container-fluid background_footer text-dark pt-5 pb-4">
        <section class="text-center text-md-start">
            <div class="row text-center text-md-start">
                <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3">
                    <h2 class="text-uppercase mb-4 font-weight-bold text-primary">Nosotros</h2>
                    <hr class="mb-4">

                    <article class="justificado">
                        En EnRelieve trabajamos para impulsar la inclusión mediante soluciones tecnológicas accesibles. 
                        Desarrollamos un traductor web que convierte texto a Braille en tiempo real y lo envía a un sistema físico 
                        controlado por Arduino, donde servomotores representan cada carácter en un módulo táctil. 
                        Así, las personas con discapacidad visual pueden percibir mediante el tacto la información mostrada en pantalla.
                    </article>
                </div>

                <!-- Columna legal -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h2 class="text-uppercase mb-4 font-weight-bold text-primary">Legal</h2>
                    <hr class="mb-4">

                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <a class="nav-link footer-btn" href="#" data-bs-toggle="modal" data-bs-target="#terminosYCondiciones">
                                Términos y Condiciones
                            </a>
                        </li>
                        <li>
                            <a class="nav-link footer-btn" href="#" data-bs-toggle="modal" data-bs-target="#avisoPrivacidad">
                                Aviso de Privacidad
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Columna de ayuda -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h2 class="text-uppercase mb-4 font-weight-bold text-primary">Déjanos ayudarte</h2>
                    <hr class="mb-4">

                    <nav>
                        <ul class="list-unstyled">
                            <li class="mb-3"><a href="#" class="text-dark">Contacto</a></li>
                            <li><a href="#" class="text-dark">Preguntas frecuentes</a></li>
                        </ul>
                    </nav>
                </div>

                <hr class="mb-4">

                <section class="text-center mb-2">
                    <p>Copyright En Relieve - 2025. Todos los derechos reservados.</p>
                </section>

            </div>
        </section>
    </footer>

    <!-- OffCANVAS Accounts -->
    <aside class="offcanvas offcanvas-end text-bg-dark" data-bs-backdrop="static" tabindex="-1" id="offCanvasAccounts" aria-labelledby="offcanvaOfAccount">

        <?php if (empty($_SESSION['usuario'])): ?>
            <header class="offcanvas-header">
                <h2 class="offcanvas-title" id="offcanvaOfAccount">Inicio de sesión</h2>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
            </header>

            <hr class="mb-2 hr-grueso">

            <section class="offcanvas-body">
                <form action="../php/login.php" method="POST" onsubmit="return valUser(this.elements['usuario'].value, this.elements['contrasena'].value);" 
                    class="p-3 border rounded shadow-sm needs-validation" novalidate>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario" required>
                        <label for="usuario">Usuario</label>
                        <div class="invalid-feedback">
                            Agrega un usuario válido.
                        </div>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="contrasena" id="contrasena" placeholder="Contraseña" required>
                        <label for="contrasena">Contraseña</label>
                        <div class="invalid-feedback">
                            Agrega la contraseña correcta.
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Iniciar sesión</button>
                </form>

                <hr class="mb-2 hr-grueso">

                <nav class="d-flex justify-content-center mt-3">
                    <ul class="list-unstyled m-0">
                        <li>
                            <a class="nav-link" href="#" onclick="cerrarOffcanvas('offCanvasAccounts', 'modalRegistro')">
                                Registrarse
                            </a>
                        </li>
                    </ul>
                </nav>
            </section>
        <?php else: ?>
            <?php
                echo obtenerTexto('usuario');
            ?>
        <?php endif; ?>
    </aside>

    <!-- MODAL REGISTRO -->
    <div class="modal fade" id="modalRegistro" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <header class="modal-header">
                    <h1 class="modal-title fs-5">Regístrate</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </header>

                <section class="modal-body">
                    <form action="../php/agregarU.php" method="POST" 
                        onsubmit="return validar(this.email.value);" autocomplete="off">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name"
                            name="name" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñÜü\s]{3,}$" 
                            placeholder="Nombre" title="Agrega un nombre válido" required>
                            <label for="name">Nombre</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="aPaterno" 
                            name="aPaterno" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñÜü\s]{3,}$" 
                            title="Agrega un apellido paterno válido" required>
                            <label for="aPaterno">Apellido Paterno</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="aMaterno" 
                            name="aMaterno" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñÜü\s]{3,}$" 
                            title="Agrega un apellido materno válido" required>
                            <label for="aMaterno">Apellido Materno</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" 
                            name="email" placeholder="Correo" title="Agrega un correo válido." required>
                            <label for="email">Correo</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="user" 
                            name="user" pattern="^[a-zA-Z0-9]{4,}$" placeholder="Usuario" 
                            title="Debe tener mínimo 4 caracteres alfanuméricos." required>
                            <label for="user">Usuario</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" 
                            name="password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$" 
                            placeholder="Contraseña" title="Debe incluir mayúscula, minúscula y número." required>
                            <label for="password">Contraseña</label>
                        </div>

                        <footer class="modal-footer d-flex justify-content-center">
                            <input type="submit" value="Registrar" class="btn btn-primary me-2">
                            <input type="reset" value="Limpiar" class="btn btn-secondary">
                        </footer>
                    </form>
                </section>
            </div>
        </div>
    </div>

    <!-- MODAL Términos y Condiciones -->
    <div class="modal fade" id="terminosYCondiciones" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tycLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Header -->
                <header class="modal-header">
                    <h1 class="modal-title fs-5" id="tycLabel">Términos y Condiciones</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </header>

                <!-- Body -->
                <section class="modal-body justificado">
                    <?php
                        echo obtenerTexto('terminos');
                    ?>
                </section>
            </div>
        </div>
    </div>

    <!-- MODAL Aviso de Privacidad -->
    <div class="modal fade" id="avisoPrivacidad" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="apLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                
                <!-- Header -->
                <header class="modal-header">
                    <h1 class="modal-title fs-5" id="apLabel">Aviso de Privacidad</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </header>

                <!-- Body -->
                <section class="modal-body justificado">
                    <?php
                        echo obtenerTexto('privacidad');
                    ?>
                </section>
            </div>
        </div>
    </div>

    <!--Scripts-->
    <script src="../js/componentes.js"></script>
    <script src="../js/validaciones.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>

    <?php if (isset($_GET['error'])): ?>
        <script>
            window.onload = function () {
                alert("Usuario no encontrado");
            };
        </script>
    <?php endif; ?>
</body>
</html>