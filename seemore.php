<?php

include "abrir_conexion.php";
include "Alert/alert.php";



$NumCuenta = $_GET["NoCuenta"];

//TABLA tb_datopesonal
$sql = "SELECT * FROM tb_datopersonal Where Id_NumCuenta='$NumCuenta'";

$result = mysqli_query($conexion, $sql);

$filas = mysqli_num_rows($result);

// Se asignan los datos a variables que mostraran los valores en el HTML
$row = $result->fetch_assoc();
$NumCuenta = $row["Id_NumCuenta"];
$Nombre = $row["Nombre"];
$Ape_Pat = $row["Ape_Pat"];
$Ape_Mat = $row["Ape_Mat"];
$Sexo = $row["Sexo"];
$Edad = $row["Edad"];
$Tipo = $row["Tipo"];
$Uni_Academica = $row["Unidad_Academica"];
$Carrera = $row["Carrera"];
$Grupo = $row["Grupo"];


//TABLA tb_contacto
$sql = "SELECT * FROM tb_contacto Where Id_NumCuenta='$NumCuenta'";

$result = mysqli_query($conexion, $sql);

$filas = mysqli_num_rows($result);

$row = $result->fetch_assoc();
$Correo = $row["Correo"];
$Tel1 = $row["Tel1"];
$Tel2 = $row["Tel2"];
$Colonia = $row["Colonia"];
$Calle = $row["Calle"];
$Numero = $row["Numero"];
$Especificaciones = $row["Especificaciones"];


//TABLA tb_enfermedades
$sql = "SELECT * FROM tb_enfermedades Where Id_NumCuenta='$NumCuenta'";

$result = mysqli_query($conexion, $sql);

$filas = mysqli_num_rows($result);

$row = $result->fetch_assoc();
$Base = $row["Enfermedades_Base"];
$Tiempo = $row["Tiempo_Enfermedades"];

//TABLA tb_sintomas
$sql = "SELECT * FROM tb_sintomas Where Id_NumCuenta='$NumCuenta'";

$result = mysqli_query($conexion, $sql);

$filas = mysqli_num_rows($result);

$row = $result->fetch_assoc();
$Fiebre = $row["Fiebre"];
$Cansancio = $row["Cansancio"];
$Tos_Seca = $row["Tos_Seca"];
$Dolor_Cadera = $row["Dolor_Cadera"];
$Malestar_Cuerpo = $row["Malestar_Cuerpo"];
$Dolor_Garganta = $row["Dolor_Garganta"];
$Congestion_Nasal = $row["Congestion_Nasal"];
$Perdida_Olfato_Sabor = $row["Perdida_Olfato_Sabor"];
$Nauceas_Vomito = $row["Nauceas_Vomito"];
$Diarrea = $row["Diarrea"];
$Falta_Aire = $row["Falta_Aire"];
$TiempoSin = $row["Tiempo"];

if ($Fiebre == "1") {
    $Bandera1 = "Checked";
} else {
    $Bandera1 = "";
}

if ($Cansancio == "1") {
    $Bandera2 = "Checked";
} else {
    $Bandera2 = "";
}

if ($Tos_Seca == "1") {
    $Bandera3 = "Checked";
} else {
    $Bandera3 = "";
}

if ($Dolor_Cadera == "1") {
    $Bandera4 = "Checked";
} else {
    $Bandera4 = "";
}

if ($Malestar_Cuerpo == "1") {
    $Bandera5 = "Checked";
} else {
    $Bandera5 = "";
}

if ($Dolor_Garganta == "1") {
    $Bandera6 = "Checked";
} else {
    $Bandera6 = "";
}

if ($Congestion_Nasal == "1") {
    $Bandera7 = "Checked";
} else {
    $Bandera7 = "";
}

if ($Perdida_Olfato_Sabor == "1") {
    $Bandera8 = "Checked";
} else {
    $Bandera8 = "";
}

if ($Nauceas_Vomito == "1") {
    $Bandera9 = "Checked";
} else {
    $Bandera9 = "";
}

if ($Diarrea == "1") {
    $Bandera10 = "Checked";
} else {
    $Bandera10 = "";
}

if ($Falta_Aire == "1") {
    $Bandera11 = "Checked";
} else {
    $Bandera11 = "";
}





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./src/styles/index.css">
    <link rel="stylesheet" href="./src/styles/header.css">
    <link rel="stylesheet" href="./src/styles/seemore.css">
    <link rel="stylesheet" href="./src/styles/sideBarMenu.css" />

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
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

    <main class="main-container">
        <div class="form-container">
            <div class="fieldset-container" disabled="disabled">
                <h2 class="subtitle" id="subtitle1">Datos personales</h2>
                <div class="date-container">

                    <div class="label-style"><label>Número de cuenta: </label>
                        <input type="text" class="input-style" disabled value="<?php echo (isset($NumCuenta)) ? $NumCuenta : ''; ?>">
                    </div>

                    <div class="label-style"><label>Nombre: </label>
                        <input type="text" class="input-style" disabled value="<?php echo (isset($Nombre)) ? $Nombre : ''; ?>">
                    </div>

                    <div class="label-style"><label>Apellido paterno: </label>
                        <input type="text" class="input-style" disabled value="<?php echo (isset($Ape_Pat)) ? $Ape_Pat : ''; ?>">
                    </div>

                    <div class="label-style"><label>Apellido materno: </label>
                        <input type="text" class="input-style" disabled value="<?php echo (isset($Ape_Mat)) ? $Ape_Mat : ''; ?>">
                    </div>

                    <div class="label-style"><label>Sexo: </label>
                        <input type="text" class="input-style" disabled value="<?php echo (isset($Sexo)) ? $Sexo : ''; ?>">
                    </div>

                    <div class="label-style"><label>Edad: </label>
                        <input type="text" class="input-style" disabled value="<?php echo (isset($Edad)) ? $Edad : ''; ?>">
                    </div>

                    <div class="label-style"><label>Tipo: </label>
                        <input type="text" class="input-style" disabled value="<?php echo (isset($Tipo)) ? $Tipo : ''; ?>">
                    </div>

                    <div class="label-style"><label>Un. académica:</label>
                        <input type="text" class="input-style" disabled value="<?php echo (isset($Uni_Academica)) ? $Uni_Academica : ''; ?>">
                    </div>

                    <div class="label-style"><label>Carrera: </label>
                        <input type="text" class="input-style" disabled value="<?php echo (isset($Carrera)) ? $Carrera : ''; ?>">
                    </div>

                    <div class="label-style"><label>Grupo: </label>
                        <input type="text" class="input-style" disabled value="<?php echo (isset($Grupo)) ? $Grupo : ''; ?>">
                    </div>

                </div>

            </div>

            <div class="fieldset-container">

                <h2 class="subtitle">Contacto</h2>

                <div class="contact-container">

                    <div class="label-style"><label>Correo: </label>
                        <input type="text" class="input-style" disabled value="<?php echo (isset($Correo)) ? $Correo : ''; ?>">
                    </div>

                    <div class="label-style"><label>Teléfono celular: </label>
                        <input type="text" class="input-style" disabled value="<?php echo (isset($Tel1)) ? $Tel1 : ''; ?>">
                    </div>

                    <div class="label-style"><label>Teléfono Casa:</label>
                        <input type="text" class="input-style" disabled value="<?php echo (isset($Tel2)) ? $Tel2 : ''; ?>">
                    </div>

                    <hr class="divider">

                    <div class="label-style"><label>Colonia: </label>
                        <input type="text" class="input-style" disabled value="<?php echo (isset($Colonia)) ? $Colonia : ''; ?>">
                    </div>

                    <div class="label-style"><label>Calle: </label>
                        <input type="text" class="input-style" disabled value="<?php echo (isset($Calle)) ? $Calle : ''; ?>">
                    </div>

                    <div class="label-style"><label>Número: </label>
                        <input type="text" class="input-style" disabled value="<?php echo (isset($Numero)) ? $Numero : ''; ?>">
                    </div>

                </div>

                <div class="direccion">
                    <h3 id="h3-diseasetime">Especificaciones</h3>
                    <textarea class="textarea-style" rows="6" cols="50" id="textarea-especificaciones" disabled maxlength="477"><?php echo (isset($Especificaciones)) ? $Especificaciones : ''; ?></textarea>
                </div>

            </div>

            <div class="fieldset-container">

                <h2 class="subtitle">Enfermedades</h2>

                <div class="disease-container">
                    <div class="Enfermedades">
                        <h3>Enfermedades base</h3>
                        <textarea class="textarea-style" rows="7" cols="50" id="textarea-diseasebase" disabled maxlength="477"><?php echo (isset($Base)) ? $Base : ''; ?></textarea>
                    </div>

                    <br>

                    <div class="Enfermedades">
                        <h3>Tiempo de las enfermedades</h3>
                        <textarea class="textarea-style" rows="7" cols="50" id="textarea-diseasetime" disabled maxlength="477"><?php echo (isset($Tiempo)) ? $Tiempo : ''; ?></textarea>
                    </div>
                </div>
            </div>

            <div class="fieldset-container">

                <h2 class="subtitle">Síntomas</h2>

                <div class="symptom-container">
                    <div class="combobox-div"><input type="checkbox" id="cb_fiebre" disabled <?php echo $Bandera1 ?>>
                        <label class="cb-Style">Fiebre</label>
                    </div>

                    <div class="combobox-div"><input type="checkbox" id="cb_Cansancio" disabled <?php echo $Bandera2 ?>>
                        <label class="cb-Style">Cansancio</label>
                    </div>

                    <div class="combobox-div"><input type="checkbox" id="cb_Tos" disabled <?php echo $Bandera3 ?>>
                        <label class="cb-Style">Tos seca</label>
                    </div>

                    <div class="combobox-div"><input type="checkbox" id="cb_Cadera" disabled <?php echo $Bandera4 ?>>
                        <label class="cb-Style">Dolor de cadera</label>
                    </div>

                    <div class="combobox-div"><input type="checkbox" id="cb_Malestar" disabled <?php echo $Bandera5 ?>>
                        <label class="cb-Style">Malestar en el cuerpo</label>
                    </div>

                    <div class="combobox-div"><input type="checkbox" id="cb_Dolor" disabled <?php echo $Bandera6 ?>>
                        <label class="cb-Style">Dolor de garganta</label>
                    </div>

                    <div class="combobox-div"><input type="checkbox" id="cb_Congestion" disabled <?php echo $Bandera7 ?>>
                        <label class="cb-Style">Congestión nasal</label>
                    </div>

                    <div class="combobox-div"><input type="checkbox" id="cb_Perdida" disabled <?php echo $Bandera8 ?>>
                        <label class="cb-Style">Perdida del olfato o sabor</label>
                    </div>

                    <div class="combobox-div"><input type="checkbox" id="cb_nauceas_vomito" disabled <?php echo $Bandera9 ?>>
                        <label class="cb-Style">Nauceas o Vomito</label>
                    </div>

                    <div class="combobox-div"><input type="checkbox" id="cb_Diarrea" disabled <?php echo $Bandera10 ?>>
                        <label class="cb-Style">Diarrea</label>
                    </div>

                    <div class="combobox-div"><input type="checkbox" id="cb_Falta" disabled <?php echo $Bandera11 ?>>
                        <label class="cb-Style">Falta de aire </label>
                    </div>

                    <div class="combobox-div"><label class="cb-Style">Tiempo</label><input type="date" id="date" disabled value="<?php echo (isset($TiempoSin)) ? $TiempoSin : ''; ?>"></div>
                </div>
            </div>
        </div>
    </main>

    <script src="./src/scripts/TokenSession.js"></script>
    <script src="./src/scripts/sideBarMenu.js"></script>
</body>

</html>