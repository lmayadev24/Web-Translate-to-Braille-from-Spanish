<?php
include_once '../php/textos.php';
include_once '../php/consultas.php';
include_once '../php/conexion.php';
session_start(); //Iniciando una sesion

$con = conectar();
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
                        <a class="nav-link nav-btn" aria-current="page" href="#">Traductor</a>
                    </li>

                    <li class="nav-item me-1">
                        <a class="nav-link nav-btn" aria-current="page" href="#">Lecciones</a>
                    </li>

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

    <!-- TABLE -->
    <main class="container bg-light text-dark pt-2 pb-2">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido Paterno</th>
                <th scope="col">Apellido Materno</th>
                <th scope="col">Usuario</th>
                <th scope="col">Email</th>
                <th scope="col">Nivel</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $datos = datos($con);
                    while($fila = $datos->fetch_assoc()){
                        ?>
                        <tr>
                            <th scope="row"> <?php echo $fila['ID_Usuario'] ?> </th>
                            <td> <?php echo $fila['Nombre'] ?> </td>
                            <td> <?php echo $fila['aPaterno'] ?> </td>
                            <td> <?php echo $fila['aMaterno'] ?> </td>
                            <td> <?php echo $fila['Usuario'] ?> </td>
                            <td> <?php echo $fila['Correo'] ?> </td>  
                            <td> <?php echo $fila['nivel'] ?>  </td>
                        </tr>
                    <?php } 
                ?>
            </tbody>
        </table>
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
    <aside class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offCanvasAccounts" aria-labelledby="offcanvaOfAccount">

        <?php if (empty($_SESSION['usuario'])): ?>
            <header class="offcanvas-header">
                <h2 class="offcanvas-title" id="offcanvaOfAccount">Inicio de sesión</h2>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
            </header>

            <hr class="mb-2 hr-grueso">

            <section class="offcanvas-body">
                <form action="../php/login.php" method="POST" autocomplete="off" onsubmit="return valUser(this.elements['usuario'].value, this.elements['contrasena'].value);" 
                    class="p-3 border rounded bg-light shadow-sm needs-validation" novalidate>

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
                        onsubmit="return validar(this.email.value);">

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

    <!-- MODAL Avsio de Privacidad -->
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
</body>
</html>