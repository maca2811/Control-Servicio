<!--
=========================================================
Material Kit - v2.0.7
=========================================================

Product Page: https://www.creative-tim.com/product/material-kit
Copyright 2020 Creative Tim (https://www.creative-tim.com/)

Coded by Creative Tim

=========================================================

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="es">

  <head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/icon.png">
    <link rel="icon" type="image/png" href="../assets/img/icon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
      Control de Servicios
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <!-- CSS Files -->
    <link href="../assets/css/material-kit.css?v=2.0.7" rel="stylesheet" />
    <!-- CSS PROPIO -->
    <link rel="stylesheet" href="../assets/css/control-service.css">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    
  </head>

<body class="login-page sidebar-collapse">
  
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="" class="navbar-brand">Control de Servicios al Cliente</a>
          </li>
        </ul>
      </div>
      <div class="container">
        @if(session()->get('usuario'))
          <div class=" w3-right float-right">
            <p class="css-user-format"> Hola {{session()->get('usuario')}}  
              <a class="w3-right"   href="/login">Cerrar Sesión</a>
            </p> 
          </div>
         @endif
      </div>
      <div class="collapse navbar-collapse">
      </div>
    </div>
  </nav>
  <div class="page-header header-filter" style="background-image: url('../assets/img/city2.jpg');">
    <div class="container">
      <!--Contenido-->
      @yield('contenido')
      <!--Fin Contenido--> 
    </div>
    <footer class="footer">
      <div class="container">
        <div class="copyright float-right">
          &copy;
          <script>
            document.write(new Date().getFullYear())
          </script> Derechos Reservados
        </div>
      </div>
    </footer>
  </div>
</body>
</html>