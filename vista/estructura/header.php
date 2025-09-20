<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PWD - Grupo 6</title>
    <link rel="stylesheet" href="/PWD/vista/css/header-footer.css">
    <link rel="stylesheet" href="/PWD/home/fonts/css/all.min.css">

    <script src="/PWD/home/js/main.js" defer></script>
    <script src="/PWD/home/js/lightmode.js" defer></script>
    <script src="/PWD/vista/js/index.js" defer></script>
</head>
<body>
    <header>
        <!--===================================== NavBar =====================================-->
        <nav>
            <!-- ========================== Móviles ========================= -->
            <ul class="sidebar sidebar-hidden">
              <div id="container"></div>
            </ul>
            
            <!-- ======================== Escritorio ======================== -->
            <ul>
                <li><a href="/PWD/home/html/index.html"><h1>PWD - Grupo 6</h1></a></li>
                <div class="hideOnMobile">
                  <button class="theme-switch">
                    <i class="fa-solid fa-moon"></i>
                    <i class="fa-solid fa-sun"></i>
                  </button>
                </div>
                <li id="menuBtn"><i class="fa-solid fa-bars"></i></li>
            </ul>
        </nav>
        <div id="overlay" class="overlay hidden"></div>     <!-- sombreado negro del sidebar -->
        <!--==================================================================================-->
    </header>
</body>
</html>