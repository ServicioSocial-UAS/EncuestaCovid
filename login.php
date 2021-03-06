<?php
  include "./abrir_conexion.php";
  include "./Alert/alert.php";

  echo '<script> if (sessionStorage.getItem("AuthToken")){
    location.href = "./empleados.php"
}
     </script>';
  
  if (isset($_POST["btnLogin"])){

    $user = $_POST["user"];
    $password = $_POST["password"];

    $sql = "SELECT Usuario FROM tb_Usuario WHERE Usuario='$user'";

    $resultA = mysqli_query($conexion, $sql);

    $filasA = mysqli_num_rows($resultA);

    if (($filasA == 0)) {
      alert("El usuario no existe");
    }else{
      $sql = "SELECT Contraseña FROM tb_Usuario WHERE Usuario='$user'";

      $resultA = mysqli_query($conexion, $sql);

      $fila = mysqli_fetch_assoc($resultA);

      $Contraseña = $fila["Contraseña"];

      if (($Contraseña == $password )){
          echo '<script>
            sessionStorage.setItem("AuthToken", "IsAuthenticated");
          </script>';
          echo '<script>
          location.href = "./empleados.php"
          </script>';
      }else{
        
          alert("La Contraseña es incorrecta");
      }

    }
  }



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Encuesta COVID-19 UAS - Inicio de sesión</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./src/styles/sideBarMenu.css" />
    <link rel="stylesheet" href="./src/styles/login.css" />
    <link rel="stylesheet" href="./src/styles/header.css" />

    <!-- CSS only -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF"
      crossorigin="anonymous"
    />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
    />
  </head>

  <body>
    <header class="header">
      <div class="header-container">
        <div class="home-container">
          <img
            class="header-img"
            src="./src/assets/images/UAS-logo.png"
            alt="logo uas"
          />
          <p class="university-title">UNIVERSIDAD AUTONOMA DE SINALOA</p>
        </div>
        <div><h1 class="page-title">Encuesta de COVID-19</h1></div>
      </div>

      <nav class="navbar navbar-dark bg-dark">
        <div
          class="container-fluid"
          style="display: flex; justify-content: flex-end; align-items: center"
        >
          <button
            id="navbar-toggle"
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarToggleExternalContent"
            aria-controls="navbarToggleExternalContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </nav>
    </header>

    <div id="sidebar-menu" class="sidebar-menu sidebar-menu-close">
      <div class="sidebar-menu-content">
        <span
          id="sidebar-menu-close-button"
          class="bi-arrow-left-short sidebar-menu-close-icon"
        ></span>

        <div class="menu-navigation">
          <a class="menu-nav-link" href="./index.html"
            ><div class="menu-nav-item">Inicio</div></a
          >
        </div>
      </div>
    </div>

    <main class="main-container">
      <img
        src="./src/assets/images/uas-background-overlay.jpg"
        alt="UAS Backgroud Overlay"
        class="background-login-image"
      />

      <div class="background-login-overlay"></div>

      <section class="login-container">
        <form class="form-login-container" action="login.php" method="POST">
          <span
            class="bi-people-fill"
            style="font-size: 4rem; color: #374a57"
          ></span>

          <div class="form-floating">
            <input
              type="text"
              class="form-control"
              id="floatingInput"
              placeholder=" "
              name="user"
            />
            <label for="floatingInput">Username</label>
          </div>
          <div class="form-floating">
            <input
              type="password"
              class="form-control"
              id="floatingInput"
              placeholder=" "
              name="password"
            />
            <label for="floatingInput">Password</label>
          </div>

          <div class="button-entrar-container">
            <button class="button-entrar" name="btnLogin">Iniciar</button>
          </div>
        </form>
      </section>
    </main>

    <script src="./src/scripts/sideBarMenu.js"></script>
  </body>
</html>
