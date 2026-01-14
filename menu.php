<<<<<<< HEAD
<!-- ========== Menú Lateral ========== -->
<div class="vertical-menu" style="background: url('../assets/images/fondo.png') no-repeat center center fixed; background-size: cover;">

    <div data-simplebar class="h-100" style="background-color: rgba(25, 30, 60, 0.95);">

        <!--- Sidemenu dinámico por perfil -->
        <?php
        if ($_SESSION['perfil'] == 1) { // ADMINISTRADOR
        ?>
            <div id="sidebar-menu">
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title text-uppercase text-white-50 fs-6">Menú Principal</li>

                    <li>
                        <a href="home.php" class="waves-effect fs-6 text-white">
                            <i class="ri-home-4-line"></i> <span>Inicio</span>
                        </a>
                    </li>
                    <li>
                        <a href="autores.php" class="waves-effect fs-6 text-white">
                            <i class="ri-user-2-line"></i> <span>Autores</span>
                        </a>
                    </li>

                    <li>
                        <a href="lectores.php" class="waves-effect fs-6 text-white">
                            <i class="ri-user-2-line"></i> <span>Lectores</span>
                        </a>
                    </li>

                    <li>
                        <a href="libros.php" class="waves-effect fs-6 text-white">
                            <i class="ri-book-2-line"></i> <span>Libros</span>
                        </a>
                    </li>

                    <li>
                        <a href="categorias.php" class="waves-effect fs-6 text-white">
                            <i class="ri-bookmark-line"></i> <span>Categorías</span>
                        </a>
                    </li>

                    <li>
                        <a href="prestamos.php" class="waves-effect fs-6 text-white">
                            <i class="ri-file-list-2-line"></i> <span>Préstamos</span>
                        </a>
                    </li>

                    <li>
                        <a href="facturas.php" class="waves-effect fs-6 text-white">
                            <i class="ri-bill-line"></i> <span>Facturas</span>
                        </a>
                    </li>

                    <li class="menu-title text-uppercase text-white-50 fs-6 mt-3">Reportes</li>

                    <!-- REPORTES GENERALES -->
                    <li>
                        <a href="javascript:void(0);" class="has-arrow waves-effect fs-6 text-white">
                            <i class="ri-file-list-3-line"></i> <span>Generales</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="fpdf/Rlectores.php" target="_blank" class="fs-6"><i class="ri-user-line"></i> Lectores</a></li>
                            <li><a href="fpdf/Rlibros.php" target="_blank" class="fs-6"><i class="ri-book-open-line"></i> Libros</a></li>
                            <li><a href="fpdf/RFacturas.php" target="_blank" class="fs-6"><i class="ri-bill-line"></i> Facturas</a></li>
                            <li><a href="fpdf/RPrestamos.php" target="_blank" class="fs-6"><i class="ri-file-paper-line"></i> Préstamos</a></li>
                        </ul>
                    </li>

                    <!-- REPORTES ESPECÍFICOS -->
                    <li>
                        <a href="javascript:void(0);" class="has-arrow waves-effect fs-6 text-white">
                            <i class="ri-filter-3-line"></i> <span>Específicos</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">

                         
                            <li>
                                <a href="ERlibros.php" class="fs-6">
                                    <i class="ri-bookmark-2-line"></i> Libros 
                                </a>
                            </li>

                
                            <li>
                                <a href="ERlectores.php" class="fs-6">
                                    <i class="ri-user-search-line"></i> Lectores 
                                </a>
                            </li>

                            <li>
                                <a href="ERprestamos.php" class="fs-6">
                                    <i class="ri-calendar-check-line"></i> Préstamos 
                                </a>
                            </li>

                            <li>
                                <a href="ERfactura.php" class="fs-6">
                                    <i class="ri-bill-line"></i> Facturas 
                                </a>
                            </li>
                           
                        </ul>
                    </li>

                    <li class="menu-title text-uppercase text-white-50 fs-6 mt-3">Usuarios</li>

                    <li>
                        <a href="javascript:void(0);" class="has-arrow waves-effect fs-6 text-white">
                            <i class="ri-account-circle-line"></i> <span>Mantenimiento</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="usuarios.php" class="fs-6"><i class="ri-user-settings-line"></i> Usuarios</a></li>
                            <li><a href="perfil.php" class="fs-6"><i class="ri-group-line"></i> Perfiles</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

        <?php
        } elseif ($_SESSION['perfil'] == 2) { // USUARIO BÁSICO
        ?>
            <div id="sidebar-menu">
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title text-uppercase text-white-50 fs-6">Menú Principal</li>

                    <li>
                        <a href="home.php" class="waves-effect fs-6 text-white">
                            <i class="ri-home-4-line"></i> <span>Inicio</span>
                        </a>
                    </li>

                    <li>
                        <a href="autores.php" class="waves-effect fs-6 text-white">
                            <i class="ri-user-2-line"></i> <span>Autores</span>
                        </a>
                    </li>

                    <li>
                        <a href="lectores.php" class="waves-effect fs-6 text-white">
                            <i class="ri-user-2-line"></i> <span>Lectores</span>
                        </a>
                    </li>

                    <li>
                        <a href="libros.php" class="waves-effect fs-6 text-white">
                            <i class="ri-book-2-line"></i> <span>Libros</span>
                        </a>
                    </li>

                    <li>
                        <a href="prestamos.php" class="waves-effect fs-6 text-white">
                            <i class="ri-file-list-2-line"></i> <span>Préstamos</span>
                        </a>
                    </li>

                    <li class="menu-title text-uppercase text-white-50 fs-6 mt-3">Reportes</li>

                    <!-- GENERALES PARA USUARIO -->
                    <li>
                        <a href="javascript:void(0);" class="has-arrow waves-effect fs-6 text-white">
                            <i class="ri-file-list-3-line"></i> <span>Generales</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="fpdf/Rlectores.php" target="_blank" class="fs-6"><i class="ri-user-line"></i> Lectores</a></li>
                            <li><a href="fpdf/Rlibros.php" target="_blank" class="fs-6"><i class="ri-book-open-line"></i> Libros</a></li>
                            <li><a href="fpdf/RPrestamos.php" target="_blank" class="fs-6"><i class="ri-file-paper-line"></i> Préstamos</a></li>
                        </ul>
                    </li>

                    <!-- ESPECIFICOS PARA USUARIO -->
                    <li>
                        <a href="javascript:void(0);" class="has-arrow waves-effect fs-6 text-white">
                            <i class="ri-filter-3-line"></i> <span>Específicos</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li>
                                <a href="ERlibros.php" class="fs-6">
                                    <i class="ri-bookmark-2-line"></i> Libros por Categoría
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        <?php
        }
        ?>
    </div>
</div>
=======
<!-- ========== Menú Lateral ========== -->
<div class="vertical-menu" style="background: url('../assets/images/fondo.png') no-repeat center center fixed; background-size: cover;">

    <div data-simplebar class="h-100" style="background-color: rgba(25, 30, 60, 0.95);">

        <!--- Sidemenu dinámico por perfil -->
        <?php
        if ($_SESSION['perfil'] == 1) { // ADMINISTRADOR
        ?>
            <div id="sidebar-menu">
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title text-uppercase text-white-50 fs-6">Menú Principal</li>

                    <li>
                        <a href="home.php" class="waves-effect fs-6 text-white">
                            <i class="ri-home-4-line"></i> <span>Inicio</span>
                        </a>
                    </li>
                    <li>
                        <a href="autores.php" class="waves-effect fs-6 text-white">
                            <i class="ri-user-2-line"></i> <span>Autores</span>
                        </a>
                    </li>

                    <li>
                        <a href="lectores.php" class="waves-effect fs-6 text-white">
                            <i class="ri-user-2-line"></i> <span>Lectores</span>
                        </a>
                    </li>

                    <li>
                        <a href="libros.php" class="waves-effect fs-6 text-white">
                            <i class="ri-book-2-line"></i> <span>Libros</span>
                        </a>
                    </li>

                    <li>
                        <a href="categorias.php" class="waves-effect fs-6 text-white">
                            <i class="ri-bookmark-line"></i> <span>Categorías</span>
                        </a>
                    </li>

                    <li>
                        <a href="prestamos.php" class="waves-effect fs-6 text-white">
                            <i class="ri-file-list-2-line"></i> <span>Préstamos</span>
                        </a>
                    </li>

                    <li>
                        <a href="facturas.php" class="waves-effect fs-6 text-white">
                            <i class="ri-bill-line"></i> <span>Facturas</span>
                        </a>
                    </li>

                    <li class="menu-title text-uppercase text-white-50 fs-6 mt-3">Reportes</li>

                    <!-- REPORTES GENERALES -->
                    <li>
                        <a href="javascript:void(0);" class="has-arrow waves-effect fs-6 text-white">
                            <i class="ri-file-list-3-line"></i> <span>Generales</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="fpdf/Rlectores.php" target="_blank" class="fs-6"><i class="ri-user-line"></i> Lectores</a></li>
                            <li><a href="fpdf/Rlibros.php" target="_blank" class="fs-6"><i class="ri-book-open-line"></i> Libros</a></li>
                            <li><a href="fpdf/RFacturas.php" target="_blank" class="fs-6"><i class="ri-bill-line"></i> Facturas</a></li>
                            <li><a href="fpdf/RPrestamos.php" target="_blank" class="fs-6"><i class="ri-file-paper-line"></i> Préstamos</a></li>
                        </ul>
                    </li>

                    <!-- REPORTES ESPECÍFICOS -->
                    <li>
                        <a href="javascript:void(0);" class="has-arrow waves-effect fs-6 text-white">
                            <i class="ri-filter-3-line"></i> <span>Específicos</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">

                         
                            <li>
                                <a href="ERlibros.php" class="fs-6">
                                    <i class="ri-bookmark-2-line"></i> Libros 
                                </a>
                            </li>

                
                            <li>
                                <a href="ERlectores.php" class="fs-6">
                                    <i class="ri-user-search-line"></i> Lectores 
                                </a>
                            </li>

                            <li>
                                <a href="ERprestamos.php" class="fs-6">
                                    <i class="ri-calendar-check-line"></i> Préstamos 
                                </a>
                            </li>

                            <li>
                                <a href="ERfactura.php" class="fs-6">
                                    <i class="ri-bill-line"></i> Facturas 
                                </a>
                            </li>
                           
                        </ul>
                    </li>

                    <li class="menu-title text-uppercase text-white-50 fs-6 mt-3">Usuarios</li>

                    <li>
                        <a href="javascript:void(0);" class="has-arrow waves-effect fs-6 text-white">
                            <i class="ri-account-circle-line"></i> <span>Mantenimiento</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="usuarios.php" class="fs-6"><i class="ri-user-settings-line"></i> Usuarios</a></li>
                            <li><a href="perfil.php" class="fs-6"><i class="ri-group-line"></i> Perfiles</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

        <?php
        } elseif ($_SESSION['perfil'] == 2) { // USUARIO BÁSICO
        ?>
            <div id="sidebar-menu">
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title text-uppercase text-white-50 fs-6">Menú Principal</li>

                    <li>
                        <a href="home.php" class="waves-effect fs-6 text-white">
                            <i class="ri-home-4-line"></i> <span>Inicio</span>
                        </a>
                    </li>

                    <li>
                        <a href="autores.php" class="waves-effect fs-6 text-white">
                            <i class="ri-user-2-line"></i> <span>Autores</span>
                        </a>
                    </li>

                    <li>
                        <a href="lectores.php" class="waves-effect fs-6 text-white">
                            <i class="ri-user-2-line"></i> <span>Lectores</span>
                        </a>
                    </li>

                    <li>
                        <a href="libros.php" class="waves-effect fs-6 text-white">
                            <i class="ri-book-2-line"></i> <span>Libros</span>
                        </a>
                    </li>

                    <li>
                        <a href="prestamos.php" class="waves-effect fs-6 text-white">
                            <i class="ri-file-list-2-line"></i> <span>Préstamos</span>
                        </a>
                    </li>

                    <li class="menu-title text-uppercase text-white-50 fs-6 mt-3">Reportes</li>

                    <!-- GENERALES PARA USUARIO -->
                    <li>
                        <a href="javascript:void(0);" class="has-arrow waves-effect fs-6 text-white">
                            <i class="ri-file-list-3-line"></i> <span>Generales</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="fpdf/Rlectores.php" target="_blank" class="fs-6"><i class="ri-user-line"></i> Lectores</a></li>
                            <li><a href="fpdf/Rlibros.php" target="_blank" class="fs-6"><i class="ri-book-open-line"></i> Libros</a></li>
                            <li><a href="fpdf/RPrestamos.php" target="_blank" class="fs-6"><i class="ri-file-paper-line"></i> Préstamos</a></li>
                        </ul>
                    </li>

                    <!-- ESPECIFICOS PARA USUARIO -->
                    <li>
                        <a href="javascript:void(0);" class="has-arrow waves-effect fs-6 text-white">
                            <i class="ri-filter-3-line"></i> <span>Específicos</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li>
                                <a href="ERlibros.php" class="fs-6">
                                    <i class="ri-bookmark-2-line"></i> Libros por Categoría
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        <?php
        }
        ?>
    </div>
</div>
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
<!-- ========== Fin del Menú Lateral ========== -->