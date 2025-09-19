<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PWD - Grupo 6</title>
    <link rel="stylesheet" href="../../../../vista/css/header-footer.css">
    <link rel="stylesheet" href="../../../../home/fonts/css/all.min.css">

    <script src="../../../../home/js/main.js" defer></script>
    <script src="../../home/js/lightmode.js" defer></script>
    <script src="../../../../vista/js/index.js" defer></script>
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
                <li><a href="../../../../home/html/index.html"><h1>PWD - Grupo 6</h1></a></li>
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