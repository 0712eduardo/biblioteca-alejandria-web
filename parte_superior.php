<<<<<<< HEAD
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>SISBIBLIO | Biblioteca Alejandría</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Sistema de Gestión de Biblioteca Alejandría" name="description" />
    <meta content="Biblioteca Alejandría" name="author" />

    <!-- Ícono del sitio -->
    <link rel="shortcut icon" href="../assets/images/logo.png">

    <!-- Librerías CSS -->
    <link href="../assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap y estilos principales -->
    <link href="../assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="../assets/css/estilo.css" rel="stylesheet" type="text/css" />

    <!-- Fondo de pantalla -->
<style>
    body.auth-body-bg {
        background-size: cover;
    }

    .main-content {
    padding-bottom: 0 !important;
    background-color: #1A1C25 !important;
}

    .page-content {
        background-color: #1A1C25 !important;
    }

    .container-fluid {
        background-color: #1A1C25 !important;
    }

   
    .page-title-box {
        background-color: #1A1C25 !important;
    }

    .page-title-box h2 {
        color: #f5f5f5 !important;
    }

   
    .card-body {
        overflow-x: auto;
    }

    table.dataTable {
        width: 100% !important;
    }
</style>
</head>

<body class="auth-body-bg" data-sidebar="dark">
    <!-- ========== Inicio de Página ========== -->
    <div id="layout-wrapper">

        <!-- ========== Encabezado Superior ========== -->
        <header id="page-topbar" class="border-bottom">
            <div class="navbar-header barra d-flex justify-content-between align-items-center px-3">
                
                <!-- LOGO -->
                <div class="navbar-brand-box text-center">
                    <a href="home.php" class="logo logo-light d-flex align-items-center">
                        <img src="../assets/images/logo.png" alt="Logo Biblioteca Alejandría" height="50" class="me-2">
                        <h3 class="text-white fw-bold m-0">SISBIBLIO</h3>
                    </a>
                </div>

                <!-- Botón Menú Lateral -->
                <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                    <i class="ri-menu-2-line align-middle text-white"></i>
                </button>

                <!-- Información de Usuario -->
                <div class="d-flex align-items-center">
                    <div class="me-4 text-end">
                        <small class="d-block text-white-50 fw-bold">USUARIO:</small>
                        <span class="text-uppercase text-white-50 fw-bolder">
                            <?php echo $_SESSION['usuario']; ?>
                        </span><br>
                        <span class="text-uppercase text-white-50">
                            <?php echo $_SESSION['nom_perfil']; ?>
                        </span>
                    </div>

                    <!-- Pantalla completa -->
                    <div class="dropdown d-none d-lg-inline-block me-2">
                        <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                            <i class="ri-fullscreen-line text-white"></i>
                        </button>
                    </div>

                    <!-- Botón salir -->
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect" onclick="salir();">
                            <i class="mdi mdi-power mdi-36px text-danger"></i>
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <!-- ========== Menú lateral ========== -->
        <?php require_once 'menu.php'; ?>

        <!-- ========== Contenido Principal ========== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid pb-0">
                    <!-- Título de página -->
                    <div class="row" style="background-color: #1A1C25">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between py-3">
                                <h2 class="mb-0 text-white-50 fw-bold">
                                    Sistema de Gestión de Biblioteca Alejandría - SISBIBLIO
                                </h2>
                            </div>
                        </div>
                    </div>
=======
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>SISBIBLIO | Biblioteca Alejandría</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Sistema de Gestión de Biblioteca Alejandría" name="description" />
    <meta content="Biblioteca Alejandría" name="author" />

    <!-- Ícono del sitio -->
    <link rel="shortcut icon" href="../assets/images/logo.png">

    <!-- Librerías CSS -->
    <link href="../assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap y estilos principales -->
    <link href="../assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="../assets/css/estilo.css" rel="stylesheet" type="text/css" />

    <!-- Fondo de pantalla -->
<style>
    body.auth-body-bg {
        background-size: cover;
    }

    .main-content {
    padding-bottom: 0 !important;
    background-color: #1A1C25 !important;
}

    .page-content {
        background-color: #1A1C25 !important;
    }

    .container-fluid {
        background-color: #1A1C25 !important;
    }

   
    .page-title-box {
        background-color: #1A1C25 !important;
    }

    .page-title-box h2 {
        color: #f5f5f5 !important;
    }

   
    .card-body {
        overflow-x: auto;
    }

    table.dataTable {
        width: 100% !important;
    }
</style>
</head>

<body class="auth-body-bg" data-sidebar="dark">
    <!-- ========== Inicio de Página ========== -->
    <div id="layout-wrapper">

        <!-- ========== Encabezado Superior ========== -->
        <header id="page-topbar" class="border-bottom">
            <div class="navbar-header barra d-flex justify-content-between align-items-center px-3">
                
                <!-- LOGO -->
                <div class="navbar-brand-box text-center">
                    <a href="home.php" class="logo logo-light d-flex align-items-center">
                        <img src="../assets/images/logo.png" alt="Logo Biblioteca Alejandría" height="50" class="me-2">
                        <h3 class="text-white fw-bold m-0">SISBIBLIO</h3>
                    </a>
                </div>

                <!-- Botón Menú Lateral -->
                <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                    <i class="ri-menu-2-line align-middle text-white"></i>
                </button>

                <!-- Información de Usuario -->
                <div class="d-flex align-items-center">
                    <div class="me-4 text-end">
                        <small class="d-block text-white-50 fw-bold">USUARIO:</small>
                        <span class="text-uppercase text-white-50 fw-bolder">
                            <?php echo $_SESSION['usuario']; ?>
                        </span><br>
                        <span class="text-uppercase text-white-50">
                            <?php echo $_SESSION['nom_perfil']; ?>
                        </span>
                    </div>

                    <!-- Pantalla completa -->
                    <div class="dropdown d-none d-lg-inline-block me-2">
                        <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                            <i class="ri-fullscreen-line text-white"></i>
                        </button>
                    </div>

                    <!-- Botón salir -->
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect" onclick="salir();">
                            <i class="mdi mdi-power mdi-36px text-danger"></i>
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <!-- ========== Menú lateral ========== -->
        <?php require_once 'menu.php'; ?>

        <!-- ========== Contenido Principal ========== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid pb-0">
                    <!-- Título de página -->
                    <div class="row" style="background-color: #1A1C25">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between py-3">
                                <h2 class="mb-0 text-white-50 fw-bold">
                                    Sistema de Gestión de Biblioteca Alejandría - SISBIBLIO
                                </h2>
                            </div>
                        </div>
                    </div>
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
                    