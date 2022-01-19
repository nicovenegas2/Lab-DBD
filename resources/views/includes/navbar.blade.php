 <?php
    try {
        $nickname = $_COOKIE["usuario"];
        $money = "Money: ".$_COOKIE["money"];
        $atribute = "";
        $show = "";
        $notshow = "d-none";
        print  "";
        try {
            $role = $_COOKIE["rol"];
            if ($role == "admin") {
                $showrole = "";
            } else {
                $showrole = "d-none";
            } 
        } catch (Exception $e) {
            $showrole = "d-none";
        }
    } catch (Exception $e){
        $money = "";
        $atribute ="disabled";
        $show = "d-none";
        $notshow = "";
        $nickname = "Lab-DBD";
        $showrole = "d-none";
    }
    ?>
 <header class="mb-5">
     <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #C2E1F7;">
         <div class="container-fluid">
             <a class="navbar-brand " href="/">{{$nickname}}</a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                 data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                 aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                     <li class="nav-item">
                         <a class="nav-link active" aria-current="page" href="/">Home</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link {{$atribute}}" href="/library">Biblioteca</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link {{$atribute}}" href="/shop">Tienda</a>
                     </li>
                 </ul>
                 <a href="/money">
                     <button type="button" class="btn btn-success {{$show}}">{{$money}}</button>
                 </a>
                 <a href="/CRUD/migrationlist">
                     <button type="button" class="btn btn-primary {{$showrole}}">CRUD</button>
                 </a>
             </div>

             <!-- Opciones (loged) -->
             <div class="dropdown me-3 {{$show}}">
                 <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                     data-bs-toggle="dropdown" aria-expanded="false">
                     Opciones
                 </button>
                 <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                     <li><a class='dropdown-item' href='/changeaccountinfo'>Actualizar información</a></li>
                     <li><a class="dropdown-item" href="/roles/changeroles">Cambiar de Rol</a></li>
                     <li class="divider"></li>
                     <li><a class="dropdown-item" href="/logout">Cerrar Sesion</a></li>
                 </ul>
             </div>
             <!-- login -->
             <a href="/login">
                 <button class="btn btn-primary {{$notshow}}" type="submit">Iniciar Sesion</button>
             </a>

         </div>
         </div>
     </nav>
 </header>