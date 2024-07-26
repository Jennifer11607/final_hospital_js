

<?php 

include_once '../../includes/navbar.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOSPITAL ESPERANZA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- enlace boton waze -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- css boostrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<style>

/* css navbar */
.navbar-nav {
    margin-left: auto;
}

.navbar-nav .nav-item .dropdown-menu {
    position: absolute;
    right: 0;
    left: auto;
    font-family: 'Courier New', Courier, monospace;
    text-align: center;
    font-size: 17px;
}

.navbar .navbar-brand, .navbar .nav-link {
    color: white;
    font-family: 'Courier New', Courier, monospace;
    font-size: 23px;
}

.navbar .navbar-brand:hover, .navbar .nav-link:hover {
    color: #ffc107; /* Color de hover */
}

.navbar .dropdown-menu {
    min-width: 200px; /* Ajusta esto según tus necesidades */
}

.navbar .dropdown-menu .nav-link {
    color: white;
}

.navbar .dropdown-menu .nav-link:hover {
    background-color: #2471A3; /* Color de fondo de hover */
}

.navbar .dropdown-menu.bg-dark .nav-link {
    color: white;
}

.navbar .dropdown-menu.bg-dark .nav-link:hover {
    background-color: #343a40; /* Color de fondo de hover */
}

.navbar .dropdown-menu.bg-warning .nav-link {
    color: black;
}

.navbar .dropdown-menu.bg-warning .nav-link:hover {
    background-color: #ffc107; /* Color de fondo de hover */
}




/* css carrousel */
.carousel-caption {
    background-color: rgba(28, 79, 120, 0.517); /* Color de fondo transparente */
    font-family: "Bebas Neue", sans-serif;
    font-weight: 400;
    font-style: normal; /* Cambiar la fuente a Arial */
    text-align: center; /* Centrar el texto */
    position: absolute; /* Posicionamiento absoluto */
    
    transform: translateY(-140%); /* Centrar verticalmente */
   
    
}

/* finaliza carrousel */


/* css footer */
/* Estilos para el footer */
.footer {
    background-color: #2471A3; /* Color de fondo del footer */
}

/* Estilos para los títulos de las secciones */
.footer h4 {
    font-family:'Courier New', Courier, monospace; /* Fuente */
    font-weight: bold; /* Peso de la fuente */
    letter-spacing: 1px; /* Espaciado entre letras */
}

/* Estilos para los párrafos del footer */
.footer p {
    font-family:'Courier New', Courier, monospace; /* Fuente */
    font-size: 14px; /* Tamaño de fuente */
}

/* Estilos para los botones de redes sociales */
.footer .btn-lg-square {
    width: 40px; /* Ancho */
    height: 40px; /* Alto */
    border-radius: 50%; /* Borde redondeado */
    font-size: 18px; /* Tamaño de fuente */
}

/* Estilos para el formulario de correo */
.footer .input-group input {
    border-radius: 10px; /* Borde redondeado */
}

.footer .input-group button {
    border-radius: 20px; /* Borde redondeado */
    font-weight: bold; /* Peso de la fuente */
}

/* Estilos para el texto del footer */
.footer p {
    font-family: Arial, sans-serif; /* Fuente */
    font-size: 14px; /* Tamaño de fuente */
}

/* Estilos para el texto de derechos de autor */
.footer .text-center p {
    font-size: 12px; /* Tamaño de fuente */
}

/* Estilos para los enlaces en el texto de derechos de autor */
.footer .text-center a {  
    color: #ffffff; /* Color del texto */
    text-decoration: none; /* Sin subrayado */
}

.footer .text-center a:hover {
    text-decoration: underline; /* Subrayado al pasar el ratón */
}
/* finaliza footer */



</style>


<body>

<!-- inicio navbar -->
<nav class="navbar navbar-dark navbar-expand-lg bg-warning text-center" style="font-family: fantasy;">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarPrincipal" aria-controls="navbarPrincipal" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarPrincipal">
                <a class="navbar-brand mx-auto" href="#"><i class="bi bi-hospital"></i>  HOSPITAL ESPERANZA</a>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href=""><i class="bi bi-house-fill"></i> INICIO</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-gear-wide-connected"></i> MANTENIMIENTOS
                        </a>
                        <ul class="dropdown-menu bg-dark">
                            <li class="nav-item">
                                <a class="nav-link" href="/final_hospital_js/vistas/pacientes/index.php"><i class="bi bi-person-arms-up"></i> PACIENTES</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/final_hospital_js/vistas/especialidades/index.php"><i class="bi bi-heart-pulse-fill"></i></i> ESPECIALIDADES</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/final_hospital_js/vistas/clinicas/index.php"><i class="bi bi-prescription2"></i></i> CLINICAS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/final_hospital_js/vistas/medicos/index.php"><i class="bi bi-capsule"></i> MEDICOS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/final_hospital_js/vistas/citas/index.php"><i class="bi bi-clipboard2-pulse-fill"></i> CITAS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/final_hospital_js/vistas/detalles/index.php"><i class="bi bi-filetype-pdf"></i> IMPRIMIR CITAS</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<!-- finaliza navbar -->
  
    <!-- carrousel inicio -->
    <div class="container-fluid p-0 mb-5">
        <div id="blog-carousel" class="carousel slide overlay-bottom" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="../zulu fotos/fondopac.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <h2 class="text-primary font-weight-medium m-0">Estamos a tu Servicio</h2>
                        <h1 class="display-1 text-white m-0">Trabjando </h1>
                        <h2 class="text-white m-0">* Desde 1950 *</h2>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="../zulu fotos/hos1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <h2 class="text-primary font-weight-medium m-0">Creando Medicamentos</h2>
                        <h1 class="display-1 text-white m-0">Innovadores</h1>
                        <h2 class="text-white m-0">* DESDE 1950 *</h2>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="../zulu fotos/hos2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <h2 class="text-primary font-weight-medium m-0">Cuidando</h2>
                        <h1 class="display-1 text-white m-0">De tu Familia</h1>
                        <h2 class="text-white m-0">* siempre *</h2>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="../zulu fotos/hos3.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <h2 class="text-primary font-weight-medium m-0">Nos ponemos a tu disposicion</h2>
                        <h1 class="display-1 text-white m-0">Todo en</h1>
                        <h2 class="text-white m-0">* Medicina *</h2>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#blog-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#blog-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </div>
    <!-- carrusel finaliza -->


    <!-- inicia footer -->
    <div class="container-fluid footer text-white mt-5  px-0 position-relative overlay-top">
        <div class="row mx-0 pt-5 px-sm-3 px-lg-5 mt-4">
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Contacto</h4>
                <p><i class="fa fa-map-marker-alt mr-2"></i>32 calle 23-53 zona 5 , Ciudad de Guatemala</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+502 11223344</p>
                <p class="m-0"><i class="fa fa-envelope mr-2"></i>hospitalesperanza@example.com</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Siguenos en</h4>
                <p>Nuestras cuentas oficiales en redes sociales</p>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2 d-flex justify-content-center align-items-center"
                        href="#">
                        <i class="bi bi-twitter"></i>
                    </a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2 d-flex justify-content-center align-items-center"
                        href="#">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2 d-flex justify-content-center align-items-center"
                        href="#">
                        <i class="bi bi-linkedin"></i>
                    </a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square d-flex justify-content-center align-items-center"
                        href="#">
                        <i class="bi bi-instagram"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Horarios</h4>
                <div>
                    <h6 class="text-white text-uppercase">Lunes - Viernes</h6>
                    <p>8.00 AM - 8.00 PM</p>
                    <h6 class="text-white text-uppercase">Sabado - Domingo</h6>
                    <p>2.00 PM - 8.00 PM</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Dudas o Preguntas</h4>
                <p>Para cualquier duda puedes mandar un correo</p>
                <div class="w-100">
                    <div class="input-group">
                        <input type="text" class="form-control border-light" style="padding: 25px;" placeholder="Email">
                        <div class="input-group-append">
                            <button class="btn btn-primary font-weight-bold px-3">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid text-center text-white border-top mt-4 py-4 px-sm-3 px-md-5"
            style="border-color: rgba(256, 256, 256, .1) !important;">
            <p class="mb-2 text-white">Junio &copy; <a class="font-weight-bold" href="#">Jennifer</a>. Derechos
                Reservados.</a></p>
            <p class="m-0 text-white">EMIC <a class="font-weight-bold" href="https://htmlcodex.com">INGENIERIA SOWTFARE
                    Guatemala</a></p>
        </div>
    </div>
    <!-- finaliza footer -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha384-LCe4F/oo2BU9kyycqGhZ6+4Nfe4xHs1wrwpGQvbl1LZq0+er7wU8c5vKhRVqPr5f"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>

</html>