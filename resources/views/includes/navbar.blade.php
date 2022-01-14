 <?php
    try {
        $_COOKIE["usuario"];
        $atribute = "";
        $showit = "";
        print  "<header class='mb-5'>
                    <nav class='navbar navbar-expand-lg navbar-light' style='background-color: #C2E1F7;'>
                        <div class='container-fluid'>
                            <a class='navbar-brand' href='/'>Lab-DBD</a>
                            <button class='navbar-toggler' type='button' data-bs-toggle='collapse'
                                data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false'
                                aria-label='Toggle navigation'>
                                <span class='navbar-toggler-icon'></span>
                            </button>
                            <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                                <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                                    <li class='nav-item'>
                                        <a class='nav-link active' aria-current='page' href='/countries'>Home</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link {$atribute}' href='#'>Biblioteca</a>
                                    </li>
                                    <li class='nav-item dropdown '>
                                        <a class='nav-link dropdown-toggle {$atribute}' href='#' id='navbarDropdown' role='button'
                                            data-bs-toggle='dropdown' aria-expanded='false'>
                                            Dropdown
                                        </a>
                                        <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                                            <li><a class='dropdown-item' href='#'>Action</a></li>
                                            <li><a class='dropdown-item' href='#'>Another action</a></li>
                                            <li>
                                                <hr class='dropdown-divider'>
                                            </li>
                                            <li><a class='dropdown-item' href='#'>Something else here</a></li>
                                        </ul>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link {$atribute}' href='#'>Lista Deseados</a>
                                    </li>
                                </ul>
                                <div class='position-relative me-4'>
                                <p class='position-absolute top-50 start-50 translate-middle' style='width:5rem;'>Money: {$user->wallet}</p>
                                </div>
                                <a href='/#'>
                                    <button class='btn btn-md btn-outline-primary mx-3' role='button'>

                                        <i class='fa fa-comments fa-lg' aria-hidden='true'></i>

                                    </button>
                                </a>
                                </div>
                                <div class='dropdown me-3'>
                                    <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>
                                        Opciones
                                    </button>
                                    <ul class='dropdown-menu' aria-labelledby='dropdownMenuButton1'>
                                        <li><a class='dropdown-item' href='#'>Action</a></li>
                                        <li><a class='dropdown-item' href='#'>Another action</a></li>
                                        <li class='divider'></li>
                                        <li><a class='dropdown-item' href='/logout'>Cerrar Sesion</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </header>";
    } catch (Exception $e){
        $atribute ="disabled";
        $showit = "none";
                print  "<header class='mb-5'>
                    <nav class='navbar navbar-expand-lg navbar-light' style='background-color: #C2E1F7;'>
                        <div class='container-fluid'>
                            <a class='navbar-brand' href='/'>Lab-DBD</a>
                            <button class='navbar-toggler' type='button' data-bs-toggle='collapse'
                                data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false'
                                aria-label='Toggle navigation'>
                                <span class='navbar-toggler-icon'></span>
                            </button>
                            <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                                <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                                    <li class='nav-item'>
                                        <a class='nav-link active' aria-current='page' href='/countries'>Home</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link {$atribute}' href='#'>Biblioteca</a>
                                    </li>
                                    <li class='nav-item dropdown '>
                                        <a class='nav-link dropdown-toggle {$atribute}' href='#' id='navbarDropdown' role='button'
                                            data-bs-toggle='dropdown' aria-expanded='false'>
                                            Dropdown
                                        </a>
                                        <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                                            <li><a class='dropdown-item' href='#'>Action</a></li>
                                            <li><a class='dropdown-item' href='#'>Another action</a></li>
                                            <li>
                                                <hr class='dropdown-divider'>
                                            </li>
                                            <li><a class='dropdown-item' href='#'>Something else here</a></li>
                                        </ul>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link {$atribute}' href='#'>Lista Deseados</a>
                                    </li>
                                </ul>
                                <a href='/#'>
                                    <button class='btn btn-md btn-outline-primary mx-3' role='button'>
                                        <i class='fa fa-comments fa-lg' aria-hidden='true'></i>
                                    </button>
                                </a>
                                <a href='/login'>
                                    <button class='btn btn-primary' type='submit'>Iniciar Sesion</button>
                                </a>'
                            </div>
                        </div>
                    </nav>
                </header>";
    }
    ?>