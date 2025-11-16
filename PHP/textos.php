<?php

function obtenerTexto($tipo) {
    if ($tipo === 'usuario') {
        /* ============================================================
            Usuario
        ============================================================ */
        // Si existe sesión, extraemos los datos
        $usuario  = $_SESSION['usuario'] ?? '';
        $nombre   = $_SESSION['nombre'] ?? '';
        $paterno  = $_SESSION['paterno'] ?? '';
        $materno  = $_SESSION['materno'] ?? '';
        $email    = $_SESSION['email'] ?? '';

        // Construimos el HTML
        return "
            <header class='offcanvas-header'>
                <h2 class='offcanvas-title' id='offcanvaOfAccount'>Mi cuenta</h2>
                <button type='button' class='btn-close btn-close-white' data-bs-dismiss='offcanvas' aria-label='Cerrar'></button>
            </header>

            <hr class='mb-2 hr-grueso'>

            <section class='offcanvas-body'>
                <div class='p-3 border rounded shadow-sm'>
                    <h5 class='mb-3'>Información del usuario</h5>

                    <p><strong>Usuario:</strong> {$usuario}</p>
                    <p><strong>Nombre:</strong> {$nombre} {$paterno} {$materno}</p>
                    <p><strong>Correo:</strong> {$email}</p>
                </div>

                <hr class='my-3 hr-grueso'>

                <form action='../php/logout.php' method='POST'>
                    <button type='submit' class='btn btn-danger w-100'>
                        Cerrar sesión
                    </button>
                </form>
            </section>
        ";
    }

    $textos = [

        /* ============================================================
            TÉRMINOS Y CONDICIONES
        ============================================================ */
        'terminos' => '
            <h5>Términos y Condiciones de Uso de EnRelieve</h5>
            <p class="text-muted mb-3">Última actualización: 10/11/2025</p>

            <p>
                Bienvenido a EnRelieve. Al acceder o utilizar nuestro sitio web, usted acepta los presentes Términos y Condiciones.
                Si no está de acuerdo con alguno de ellos, deberá abstenerse de utilizar el servicio.
            </p>

            <hr>

            <h6>1. Objeto del servicio</h6>
            <p>
                EnRelieve ofrece un mecanismo de inicio de sesión para permitir el acceso a las funcionalidades internas de la plataforma.
                El servicio se limita exclusivamente a gestionar dicho acceso y salvaguardar la seguridad del sistema.
            </p>

            <hr>

            <h6>2. Registro y cuenta del usuario</h6>
            <p>Para ingresar, el usuario deberá contar con un nombre de usuario y contraseña. Estos datos:</p>
            <ul>
                <li>Son personales e intransferibles.</li>
                <li>Deben ser protegidos adecuadamente.</li>
                <li>No deben compartirse bajo ninguna circunstancia.</li>
                <li>Son responsabilidad del usuario para todas las acciones realizadas desde su cuenta.</li>
            </ul>

            <hr>

            <h6>3. Uso adecuado del sitio</h6>
            <p>El usuario se compromete a utilizar EnRelieve de forma responsable. Se prohíbe:</p>
            <ul>
                <li>Acceder o intentar acceder a cuentas ajenas.</li>
                <li>Manipular, modificar o alterar componentes del sistema.</li>
                <li>Utilizar la plataforma con fines ilícitos.</li>
                <li>Realizar acciones que comprometan la estabilidad o seguridad del servicio.</li>
            </ul>
            <p>El incumplimiento podrá derivar en la suspensión o cancelación de la cuenta.</p>

            <hr>

            <h6>4. Disponibilidad del servicio</h6>
            <p>
                EnRelieve puede presentar interrupciones debido a mantenimiento, actualizaciones o factores ajenos a nuestro control.
                Aunque se implementan medidas para garantizar disponibilidad, no se asegura un funcionamiento ininterrumpido.
            </p>

            <hr>

            <h6>5. Propiedad intelectual</h6>
            <p>
                Todo el contenido del sitio —código, diseño, logotipos y elementos gráficos— es propiedad de EnRelieve o de terceros autorizados.
                Su uso, reproducción o distribución sin autorización previa está estrictamente prohibido.
            </p>

            <hr>

            <h6>6. Privacidad y protección de datos</h6>
            <p>
                El tratamiento de datos personales se realiza conforme al Aviso de Privacidad vigente. Al utilizar EnRelieve,
                el usuario acepta dicho tratamiento.
            </p>

            <hr>

            <h6>7. Limitación de responsabilidad</h6>
            <p>EnRelieve no será responsable por:</p>
            <ul>
                <li>Daños derivados del mal uso del sitio.</li>
                <li>Interrupciones o fallos técnicos fuera de nuestro control.</li>
                <li>Pérdida o daño de información debido a errores del usuario o factores externos.</li>
            </ul>
            <p>El uso del sitio es responsabilidad exclusiva del usuario.</p>

            <hr>

            <h6>8. Modificaciones a los Términos y Condiciones</h6>
            <p>
                EnRelieve podrá modificar estos términos en cualquier momento. Los cambios serán publicados en el sitio y entrarán en vigor
                al momento de su publicación.
            </p>

            <hr>

            <h6>9. Legislación aplicable y jurisdicción</h6>
            <p>
                Estos términos se rigen por las leyes de los Estados Unidos Mexicanos. Las controversias se resolverán ante tribunales competentes en México.
            </p>

            <hr>

            <h6>10. Contacto</h6>
            <p>
                En caso de requerir asistencia o aclaraciones, este apartado se actualizará cuando se habilite un medio oficial de contacto.
            </p>
        ',

        /* ============================================================
            AVISO DE PRIVACIDAD
        ============================================================ */
        'privacidad' => '
            <h5>Aviso de Privacidad de EnRelieve</h5>
            <p class="text-muted mb-3">Última actualización: 10/11/2025</p>

            <p>
                EnRelieve, con domicilio por definir, es responsable del tratamiento de los datos personales proporcionados con motivo del uso de nuestro sitio web.
                Este Aviso de Privacidad se emite en cumplimiento de la Ley Federal de Protección de Datos Personales en Posesión de los Particulares.
            </p>

            <hr>

            <h6>1. Datos personales que se recaban</h6>
            <p>Para permitir el acceso al sistema mediante inicio de sesión, EnRelieve recaba únicamente:</p>
            <ul>
                <li>Nombre de usuario o correo electrónico</li>
                <li>Contraseña</li>
            </ul>
            <p>No se solicitan datos personales sensibles.</p>

            <hr>

            <h6>2. Finalidades del tratamiento</h6>
            <p>Los datos proporcionados serán utilizados únicamente para:</p>
            <ul>
                <li>Gestionar el acceso al sitio mediante inicio de sesión.</li>
                <li>Verificar la identidad del usuario.</li>
                <li>Mantener la seguridad y correcto funcionamiento del sistema.</li>
            </ul>
            <p>EnRelieve no utiliza la información para publicidad, mercadotecnia ni perfiles automatizados.</p>

            <hr>

            <h6>3. Transferencias de datos</h6>
            <p>
                EnRelieve no comparte ni transfiere sus datos personales a terceros, salvo en los casos legalmente exigidos por una autoridad competente.
            </p>

            <hr>

            <h6>4. Medidas de seguridad</h6>
            <p>
                Implementamos medidas administrativas, técnicas y físicas para proteger los datos contra daño, pérdida, alteración, destrucción o uso no autorizado.
                Las contraseñas se almacenan mediante métodos seguros de cifrado o hashing.
            </p>

            <hr>

            <h6>5. Derechos ARCO</h6>
            <p>El usuario tiene derecho a:</p>
            <ul>
                <li>Acceder a sus datos personales</li>
                <li>Rectificarlos cuando sean inexactos o incompletos</li>
                <li>Cancelarlos cuando ya no sean necesarios</li>
                <li>Oponerse a su tratamiento</li>
            </ul>
            <p>
                Para ejercer estos derechos, EnRelieve habilitará un medio de contacto. Este apartado será actualizado cuando esté disponible.
            </p>

            <hr>

            <h6>6. Revocación del consentimiento</h6>
            <p>
                El usuario podrá solicitar la revocación del consentimiento para el tratamiento de sus datos personales,
                siempre que ello no impida la operación esencial del servicio.
            </p>

            <hr>

            <h6>7. Uso de cookies</h6>
            <p>
                EnRelieve puede utilizar cookies estrictamente técnicas para mantener la sesión activa.
                Estas cookies no recopilan datos adicionales ni se utilizan para análisis o seguimiento.
            </p>

            <hr>

            <h6>8. Cambios al Aviso de Privacidad</h6>
            <p>
                Cualquier modificación al presente Aviso será publicada en la página web de EnRelieve.
                Las actualizaciones entrarán en vigor al momento de su publicación.
            </p>

            <hr>

            <h6>9. Contacto</h6>
            <p>
                En cuanto se establezca un medio oficial de contacto, este apartado será actualizado.
            </p>
        '
    ];

    return $textos[$tipo] ?? "<p>Contenido no encontrado.</p>";
}

?>
