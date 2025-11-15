<?php
include_once '../PHP/textos.php';
include_once '../PHP/consultas.php';
include_once '../PHP/conexion.php';
session_start(); //Iniciando una sesion

$con = conectar();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EnRelieve</title>

    <!-- CSS principal -->
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/styles.css">
</head>
<body>
    <!-- NAVBAR -->
    <header class="container-fluid">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid background_navbar rounded">

                <a class="navbar-brand me-5" href="../HTML/index.php">
                    <img src="../IMG/Bienvenidos.png" class="logo-navbar rounded">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <form class="d-flex justify-content-center w-100" role="search">
                        <div class="input-group">
                            <input type="search" class="form-control input-search" aria-label="Search" placeholder="Buscar">
                            <button class="btn btn-light border-start-0" type="submit">
                                <img src="../IMG/lupa.png" class="icon-search img-fluid">
                            </button>
                        </div>
                    </form>

                    <ul class="navbar-nav ms-5 me-2 mb-2 mb-lg-0">
                        <li class="nav-item me-1">
                            <a class="btn btn-link boton-btn" aria-current="page" href="../HTML/Traductor.php">Traductor</a>
                        </li>

                        <li class="nav-item me-1">
                            <a class="btn btn-link boton-btn" aria-current="page" href="#">Lecciones</a>
                        </li>

                        <?php if (isset($_SESSION['nivel']) && ($_SESSION['nivel'] === 'Administrador' || $_SESSION['nivel'] === 'Supervisor')): ?>
                            <!-- HTML que solo se muestra si el usuario es Administrador o Supervisor -->
                            <li class="nav-item me-1">
                                <a class="btn btn-link boton-btn" href="admin.php">Dashboard</a>
                            </li>
                        <?php endif; ?>

                        <?php if (empty($_SESSION['usuario'])): ?>
                            <!-- HTML que solo se muestra si el usuario es Administrador o Supervisor -->
                            <li class="nav-item me-1">
                                <button type="button" class="btn btn-link boton-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLogin" aria-controls="offcanvasWithBothOptions">Ingresa</button>
                            </li>
                        <?php else: ?>
                            <!-- Button offcanvas  -->
                            <li class="nav-item me-1">
                                <button type="button" class="btn btn-link boton-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLogin" aria-controls="offcanvasWithBothOptions">Usuario</button>
                            </li>
                        <?php endif; ?>
                    </ul>

                </div>
            </div>
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

    <!-- FOOTER -->
    <footer class="container-fluid background_footer text-dark pt-5 pb-4">
        <div class="text-center text-md-start">
            <div class="row text-center text-md-start">

                <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-primary">Nosotros</h5>
                    <hr class="mb-4">
                    <p class="justificado">
                        En EnRelieve trabajamos para impulsar la inclusión mediante soluciones tecnológicas accesibles. Desarrollamos un traductor web que convierte texto a Braille en tiempo real y lo envía a un sistema físico controlado por Arduino, donde servomotores representan cada carácter en un módulo táctil. Así, las personas con discapacidad visual pueden percibir mediante el tacto la información mostrada en pantalla.
                    </p>
                </div>

                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-primary">Legal</h5>
                    <hr class="mb-4">
                    <p><button type="button" class="btn btn-link footer-btn" data-bs-toggle="modal" data-bs-target="#terminosYCondiciones">Términos y Condiciones</button></p>
                    <p><button type="button" class="btn btn-link footer-btn" data-bs-toggle="modal" data-bs-target="#avisoPrivacidad">Aviso de Privacidad</button></p>
                </div>

                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-primary">Déjanos ayudarte</h5>
                    <hr class="mb-4">
                    <p><a href="#" class="text-dark">Contacto</a></p>
                    <p><a href="#" class="text-dark">Preguntas frecuentes</a></p>
                </div>

                <hr class="mb-4">
                <div class="text-center mb-2">
                    <p>Copyright En Relieve - 2025. Todos los derechos reservados.</p>
                </div>

            </div>
        </div>
    </footer>

    <!-- OffCANVAS LOGIN -->
    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasLogin" aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvaOfLogin">Inicio de sesión</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <hr class="mb-2 hr-grueso">

        <div class="offcanvas-body">
            <div >
                <form action="../PHP/login.php" method="POST" onsubmit="return valUser(this.elements['usuario'].value, this.elements['contrasena'].value);" class="p-3 border rounded bg-light shadow-sm needs-validation" novalidate>
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

                <!-- Botón abrir modal -->
                <div class="d-flex justify-content-center mt-3">
                    <button type="button" class="btn btn-primary" onclick="cerrarOffcanvas('offcanvasLogin', 'modalRegistro')">Registrarse</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL REGISTRO -->
    <div class="modal fade" id="modalRegistro" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Regístrate</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <form action="../PHP/agregarU.php" method="POST" onsubmit="return validar(this.name.value, this.aPaterno.value, this.aMaterno.value, this.email.value, this.user.value, this.password.value);">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name" name="name" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñÜü\s]{3,}$" placeholder="Nombre" title="Agrega un nombre válido">
                            <label for="name">Nombre</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="aPaterno" name="aPaterno" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñÜü\s]{3,}$" title="Agrega un apellido paterno válido">
                            <label for="aPaterno">Apellido Paterno</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="aMaterno" name="aMaterno" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñÜü\s]{3,}$" title="Agrega un apellido materno válido">
                            <label for="aMaterno">Apellido Materno</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Correo" title="Agrega un correo válido.">
                            <label for="email">Correo</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="user" name="user" pattern="^[a-zA-Z0-9]{4,}$" placeholder="Usuario" title="Debe tener mínimo 4 caracteres alfanuméricos.">
                            <label for="user">Usuario</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$" placeholder="Contraseña" title="Debe incluir mayúscula, minúscula y número.">
                            <label for="password">Contraseña</label>
                        </div>

                        <div class="modal-footer d-flex justify-content-center">
                            <input type="submit" value="Registrar" class="btn btn-primary me-2">
                            <input type="reset" value="Limpiar" class="btn btn-secondary">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- MODAL TyC -->
    <div class="modal fade" id="terminosYCondiciones" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tycLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                
                <!-- Header -->
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tycLabel">Términos y Condiciones</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <!-- Body -->
                <div class="modal-body justificado">
                    <?php
                        echo obtenerTexto('terminos');
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL Avsio de Privacidad -->
    <div class="modal fade" id="avisoPrivacidad" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="apLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                
                <!-- Header -->
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="apLabel">Aviso de Privacidad</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <!-- Body -->
                <div class="modal-body justificado">
                    <?php
                        echo obtenerTexto('privacidad');
                    ?>
                </div>
            </div>
        </div>
    </div>


    <!-- Scripts -->
    <script src="../JS/componentes.js"></script>
    <script src="../JS/validaciones.js"></script>
    <script src="../JS/bootstrap.bundle.min.js"></script>
</body>
</html>