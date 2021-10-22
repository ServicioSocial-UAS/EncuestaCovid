<?php
include "./Alert/alert.php";
include "abrir_conexion.php";

$Mensaje_Alerta = "";

if (isset($_POST["btnAgregar"])) {


  $Numero_Cuenta = $_POST["Id_NumCuenta"];
  $Nombre = $_POST["Nombre"];
  $Ape1 = $_POST["Ape_Pat"];
  $Sexo = $_POST["Sexo"];
  $Edad = $_POST["Edad"];
  $Tipo = $_POST["Tipo"];
  $Unidad_Academica = $_POST["Unidad_Academica"];
  $Carrera = $_POST["Carrera"];
  $Grupo = $_POST["Grupo"];
  $Correo = $_POST["Correo"];
  $Tel1 = $_POST["Tel1"];
  $Tel2 = $_POST["Tel2"];
  $Colonia = $_POST["Colonia"];
  $Calle = $_POST["Calle"];
  $Numero = $_POST["Numero"];
  $Especificaciones = $_POST["textarea-especificaciones"];



  $Mensaje_Alerta = "a";

  $sql = "SELECT * FROM tb_datopersonal WHERE Id_NumCuenta='$Numero_Cuenta'";

  $resultA = mysqli_query($conexion, $sql);

  $filasA = mysqli_num_rows($resultA);

  if (($filasA == 0)) {



    if (isset($_POST["Ape_Mat"])) {
      $Ap2 = $_POST["Ape_Mat"];
    } else {
      $Ap2 = ' ';
    }



    $sql = "INSERT INTO tb_datopersonal (Id_NumCuenta, Nombre, Ape_Pat, Ape_Mat, Sexo, Edad, Tipo, Unidad_Academica, Carrera, Grupo) 
                VALUES ('$Numero_Cuenta', '$Nombre', '$Ape1', '$Ap2', '$Sexo', '$Edad', '$Tipo', '$Unidad_Academica', '$Carrera', '$Grupo')";
    if ($conexion->query($sql) == TRUE) {
      $flag = $flag + 1;
    }
    if ($flag == 1) {

      $Id_Contacto = NULL;
      $sql = "INSERT INTO tb_contacto (Id_Contacto, Id_NumCuenta, Correo, Tel1, Tel2, Colonia, Calle, Numero, Especificaciones) 
                  VALUES ('$Id_Contacto','$Numero_Cuenta', '$Correo', '$Tel1', '$Tel2', '$Colonia', '$Calle', '$Numero', '$Especificaciones')";
      if ($conexion->query($sql) == TRUE) {
        $flag = $flag + 1;
      }


      if ($flag == 2) {

        $Id_Enfermedades = NULL;
        $Enfermedades_Base = $_POST["textarea-diseasebase"];
        $Tiempo_Enfermedades = $_POST["textarea-diseasetime"];


        $sql = "INSERT INTO tb_enfermedades (Id_Enfermedades, Id_NumCuenta, Enfermedades_Base, Tiempo_Enfermedades) 
                    VALUES ('$Id_Enfermedades','$Numero_Cuenta', '$Enfermedades_Base', '$Tiempo_Enfermedades')";
        if ($conexion->query($sql) == TRUE) {

          $flag = $flag + 1;
        }
      }

      if ($flag == 3) {

        $Num_Sintomas = 0;
        $Id_Sintomas = NULL;

        if (isset($_POST["Sintoma1"])) {
          $cb_fiebre = $_POST["Sintoma1"];
          $Num_Sintomas = $Num_Sintomas + 1;
        } else {
          $cb_fiebre = "0";
        }

        if (isset($_POST["Sintoma2"])) {
          $cb_Cansancio = $_POST["Sintoma2"];
          $Num_Sintomas = $Num_Sintomas + 1;
        } else {
          $cb_Cansancio = "0";
        }

        if (isset($_POST["Sintoma3"])) {
          $cb_Tos = $_POST["Sintoma3"];
          $Num_Sintomas = $Num_Sintomas + 1;
        } else {
          $cb_Tos = "0";
        }

        if (isset($_POST["Sintoma4"])) {
          $cb_Cadera = $_POST["Sintoma4"];
          $Num_Sintomas = $Num_Sintomas + 1;
        } else {
          $cb_Cadera = "0";
        }

        if (isset($_POST["Sintoma5"])) {
          $cb_Malestar = $_POST["Sintoma5"];
          $Num_Sintomas = $Num_Sintomas + 1;
        } else {
          $cb_Malestar = "0";
        }

        if (isset($_POST["Sintoma6"])) {
          $cb_Dolor = $_POST["Sintoma6"];
          $Num_Sintomas = $Num_Sintomas + 1;
        } else {
          $cb_Dolor = "0";
        }

        if (isset($_POST["Sintoma7"])) {
          $cb_Congestion = $_POST["Sintoma7"];
          $Num_Sintomas = $Num_Sintomas + 1;
        } else {
          $cb_Congestion = "0";
        }

        if (isset($_POST["Sintoma8"])) {
          $cb_Perdida = $_POST["Sintoma8"];
          $Num_Sintomas = $Num_Sintomas + 1;
        } else {
          $cb_Perdida = "0";
        }

        if (isset($_POST["Sintoma9"])) {
          $cb_nauceas_vomito = $_POST["Sintoma9"];
          $Num_Sintomas = $Num_Sintomas + 1;
        } else {
          $cb_nauceas_vomito = "0";
        }

        if (isset($_POST["Sintoma10"])) {
          $cb_Diarrea = $_POST["Sintoma10"];
          $Num_Sintomas = $Num_Sintomas + 1;
        } else {
          $cb_Diarrea = "0";
        }

        if (isset($_POST["Sintoma11"])) {
          $cb_Falta = $_POST["Sintoma11"];
          $Num_Sintomas = $Num_Sintomas + 1;
        } else {
          $cb_Falta = "0";
        }

        $Tiempo = $_POST["date"];

        $sql = "INSERT INTO tb_sintomas (Id_Sintomas, Id_NumCuenta, Fiebre, Cansancio, Tos_Seca, Dolor_Cadera, Malestar_Cuerpo,
                        Dolor_Garganta, Congestion_Nasal, Perdida_Olfato_Sabor, Nauceas_Vomito, Diarrea, Falta_Aire, Tiempo, Num_Sintomas) 
                        VALUES ('$Id_Sintomas','$Numero_Cuenta', '$cb_fiebre', '$cb_Cansancio', '$cb_Tos', '$cb_Cadera', '$cb_Malestar',
                        '$cb_Dolor', '$cb_Congestion', '$cb_Perdida', '$cb_nauceas_vomito', '$cb_Diarrea', '$cb_Falta', '$Tiempo', '$Num_Sintomas')";

        if ($conexion->query($sql) == TRUE) {

          mysqli_close($conexion);
        } else {

          alert("No se hizo4");
        }
      }
    }
  } else {
    echo '<script type="module">
      import { Toast } from "./src/components/Toast.js";
      Toast({ text: "El No. Cuenta ya existe" });
    </script>';
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Encuesta COVID-19 UAS</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./src/styles/index.css" />
  <link rel="stylesheet" href="./src/styles/header.css" />
  <link rel="stylesheet" href="./src/styles/sideBarMenu.css" />

  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />

  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>

<body>
  <header class="header">
    <div class="header-container">
      <div class="home-container">
        <img class="header-img" src="./src/assets/images/UAS-logo.png" alt="logo uas" />
        <p class="university-title">UNIVERSIDAD AUTONOMA DE SINALOA</p>
      </div>
      <div>
        <h1 class="page-title">Encuesta de COVID-19</h1>
      </div>
    </div>

    <nav class="navbar navbar-dark bg-dark">
      <div class="container-fluid" style="display: flex; justify-content: flex-end; align-items: center">
        <button id="navbar-toggle" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>
  </header>

  <div id="sidebar-menu" class="sidebar-menu sidebar-menu-close">
    <div class="sidebar-menu-content">
      <span id="sidebar-menu-close-button" class="bi-arrow-left-short sidebar-menu-close-icon"></span>

      <div class="menu-navigation">
        <a class="menu-nav-link" href="./index.html">
          <div class="menu-nav-item">Inicio</div>
        </a>
      </div>
    </div>
  </div>

  <div class="main-container">
    <form id="form" action="index" class="frm_index" method="POST">
      <div class="form-container">
        <div class="fieldset-container">
          <h2 class="subtitle" id="subtitle1">Datos personales</h2>
          <div class="date-container">
            <div class="form-floating mb-4">
              <input id="Id_NumCuenta" type="text" class="form-control" placeholder=" " name="Id_NumCuenta" />
              <label for="floatingInput">Número de cuenta</label>
            </div>

            <div class="form-floating">
              <input id="Nombre" type="text" class="form-control" placeholder=" " name="Nombre" />
              <label for="floatingInput">Nombre(s)</label>
            </div>

            <div class="form-floating">
              <input id="Ape_Pat" type="text" class="form-control" placeholder=" " name="Ape_Pat" />
              <label for="floatingInput">Apellido paterno</label>
            </div>

            <div class="form-floating">
              <input id="Ape_Mat" type="text" class="form-control" placeholder=" " name="Ape_Mat" />
              <label for="floatingInput">Apellido materno</label>
            </div>

            <div class="form-floating">
              <select class="form-select" id="Sexo" name="Sexo" aria-label="Floating label select example">
                <option>Hombre</option>
                <option>Mujer</option>
                <option>Indefinido</option>
              </select>
              <label for="floatingSelect">Sexo</label>
            </div>

            <div class="form-floating mb-4">
              <input id="Edad" type="number" class="form-control" placeholder=" " name="Edad" />
              <label for="floatingInput">Edad</label>
            </div>

            <div class="form-floating">
              <select class="form-select" id="Tipo" name="Tipo" aria-label="Floating label select example">
                <option>Estudiante</option>
                <option>Personal</option>
              </select>
              <label for="floatingSelect">Tipo</label>
            </div>

            <div class="form-floating">
              <select class="form-select" id="Unidad_Academica" name="Unidad_Academica" aria-label="Floating label select example">
                <option>Escuela Preparatoria Valle del Carrizo</option>
                <option>Escuela Preparatoria Choix</option>
                <option>
                  Escuela Preparatoria Choix. Extensión San Javier
                </option>
                <option>Escuela Preparatoria El Fuerte</option>
                <option>
                  Escuela Preparatoria El Fuerte. Exensión Constancia
                </option>
                <option>
                  Escuela Preparatoria El Fuerte. Extensión 3 Garantías
                </option>
                <option>Escuela Preparatoria San Blas</option>
                <option>
                  Escuela preparatoria San Blas. Extensión Constancia.
                </option>
                <option>
                  Escuela preparatoria San Blas. Extensión Higuera de Los
                  Natochis
                </option>
                <option>
                  Escuela Preparatoria Ciudad Universitaria Los Mochis
                </option>
                <option>Escuela Preparatoria Los Mochis</option>
                <option>
                  Escuela Preparatoria Los Mochis. Extensión Ahome
                </option>
                <option>Escuela Preparatoria Juan José Ríos</option>
                <option>Escuela preparatoria Ruiz Cortines</option>
                <option>
                  Escuela Preparatoria Ruiz Cortines. Extensión Cerro
                  Cabezón
                </option>
                <option>
                  Escuela Preparatoria Ruiz Cortines. Extensión Bachoco
                </option>
                <option>
                  Escuela Preparatoria Ruiz Cortines. Extensión Batamote
                </option>
                <option>Centro de Estudios de Idiomas Los Mochis</option>
                <option>
                  Facultad de Agricultura del Valle del Fuerte
                </option>
                <option>
                  Facultad de Agricultura del Valle del Carrizo
                </option>
                <option>
                  Facultad de Educación Física y Deporte. Extensión Los
                  Mochis
                </option>
                <option>Facultad de Enfermería Los Mochis</option>
                <option>
                  Facultad de Ciencias de la Educación. Extensión Los
                  Mochis.
                </option>
                <option>Facultad de Derecho y Ciencia Política</option>
                <option>
                  Unidad de Ciencias de la Comunicación Los Mochis
                </option>
                <option>
                  Unidad Académica de Criminalista, Ciencia Forense.
                  Extensión Los Mochis
                </option>
                <option>Facultad de Ingeniería Los Mochis</option>
                <option>Facultad de Medicina. Extensión Los Mochis</option>
                <option>Facultad de Trabajo Social Los Mochis</option>
                <option>Facultad de Trabajo Social Los Mochis</option>
                <option>Unidad Académica de Negocios</option>
                <option>Servicio Social Universitario</option>
                <option>
                  Área administrativa (incluye Torre Académica)
                </option>
              </select>
              <label for="floatingSelect">Unidad academica</label>
            </div>

            <div class="form-floating">
              <input id="Carrera" type="text" class="form-control" placeholder=" " name="Carrera" />
              <label for="floatingInput">Carrera</label>
            </div>

            <div class="form-floating">
              <input id="Grupo" type="text" class="form-control" placeholder=" " name="Grupo" />
              <label for="floatingInput">Grupo</label>
            </div>
          </div>
        </div>

        <div class="fieldset-container">
          <h2 class="subtitle">Contacto</h2>

          <div class="contact-container">
            <div class="form-floating">
              <input id="Correo" type="email" class="form-control" placeholder=" " name="Correo" />
              <label for="floatingInput">Correo</label>
            </div>

            <div class="form-floating">
              <input id="Tel1" type="tel" class="form-control" placeholder=" " name="Tel1" />
              <label for="floatingInput">Teléfono celular</label>
            </div>

            <div class="form-floating">
              <input id="Tel2" type="tel" class="form-control" placeholder=" " name="Tel2" />
              <label for="floatingInput">Teléfono Casa</label>
            </div>

            <div class="mb-3"></div>

            <div class="form-floating">
              <input id="Colonia" type="text" class="form-control" placeholder=" " name="Colonia" />
              <label for="floatingInput">Colonia</label>
            </div>

            <div class="form-floating">
              <input id="Calle" type="text" class="form-control" placeholder=" " name="Calle" />
              <label for="floatingInput">Calle</label>
            </div>

            <div class="form-floating">
              <input id="Numero" type="text" class="form-control" placeholder=" " name="Numero" />
              <label for="floatingInput">Número</label>
            </div>
          </div>

          <div class="mb-3 mt-5">
            <label for="exampleFormControlTextarea1" class="form-label">Especificaciones</label>
            <textarea class="form-control" id="textarea-especificaciones" name="textarea-especificaciones" rows="7" maxlength="477"></textarea>
          </div>
        </div>

        <div class="fieldset-container">
          <h2 class="subtitle">Enfermedades</h2>

          <div class="disease-container">
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Enfermedades base</label>
              <textarea class="form-control" id="textarea-diseasebase" name="textarea-diseasebase" rows="7" maxlength="477"></textarea>
            </div>

            <br />

            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Tiempo de las enfermedades</label>
              <textarea class="form-control" id="textarea-diseasetime" name="textarea-diseasetime" rows="7" maxlength="477"></textarea>
            </div>
          </div>
        </div>

        <div class="fieldset-container">
          <h2 class="subtitle">Síntomas</h2>

          <div class="symptom-container">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" name="Sintoma1">
              <label class="form-check-label" for="flexCheckDefault">
                Fiebre
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" name="Sintoma2">
              <label class="form-check-label" for="flexCheckDefault">
                Cansancio
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" name="Sintoma3">
              <label class="form-check-label" for="flexCheckDefault">
                Tos seca
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" name="Sintoma4">
              <label class="form-check-label" for="flexCheckDefault">
                Dolor de cadera
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" name="Sintoma5">
              <label class="form-check-label" for="flexCheckDefault">
                Malestar en el cuerpo
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" name="Sintoma6">
              <label class="form-check-label" for="flexCheckDefault">
                Dolor de garganta
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" name="Sintoma7">
              <label class="form-check-label" for="flexCheckDefault">
                Congestión nasal
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" name="Sintoma8">
              <label class="form-check-label" for="flexCheckDefault">
                Perdida del olfato o sabor
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" name="Sintoma9">
              <label class="form-check-label" for="flexCheckDefault">
                Nauceas o vómito
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" name="Sintoma10">
              <label class="form-check-label" for="flexCheckDefault">
                Diarrea
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" name="Sintoma11">
              <label class="form-check-label" for="flexCheckDefault">
                Falta de aire
              </label>
            </div>

            <div class="mt-3">
              <label class="form-check-label mb-2" for="flexCheckDefault">
                Tiempo
              </label>
              <input id="date" class="form-control" type="date" name="date">
            </div>
          </div>
        </div>
      </div>
      <div class="button-container">
        <button class="form-button" name="btnAgregar" id="btn-send">Enviar</button>
      </div>
    </form>
  </div>

  <script src="./src/scripts/index.js" type="module"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  <script src="./src/scripts/sideBarMenu.js"></script>
</body>

</html>