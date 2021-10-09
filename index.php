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
            alert("Se hizo1");
        } else {
            alert("No se hizo1");
        }


        $Id_Contacto = NULL;
        $sql = "INSERT INTO tb_contacto (Id_Contacto, Id_NumCuenta, Correo, Tel1, Tel2, Colonia, Calle, Numero, Especificaciones) 
                VALUES ('$Id_Contacto','$Numero_Cuenta', '$Correo', '$Tel1', '$Tel2', '$Colonia', '$Calle', '$Numero', '$Especificaciones')";
        if ($conexion->query($sql) == TRUE) {
            alert("Se hizo2");
        } else {
            alert("No se hizo2");
        }


        $Id_Enfermedades = NULL;
        $Enfermedades_Base = $_POST["textarea-diseasebase"];
        $Tiempo_Enfermedades = $_POST["textarea-diseasetime"];


        $sql = "INSERT INTO tb_enfermedades (Id_Enfermedades, Id_NumCuenta, Enfermedades_Base, Tiempo_Enfermedades) 
                VALUES ('$Id_Enfermedades','$Numero_Cuenta', '$Enfermedades_Base', '$Tiempo_Enfermedades')";
        if ($conexion->query($sql) == TRUE) {
            alert("Se hizo3");
        } else {
            alert("No se hizo3");
        }


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
            alert("Se hizo4");
            mysqli_close($conexion);
        } else {
            alert("No se hizo4");
        }
    } else {
        alert("El usuario ya existe");
    }
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
    <link rel="stylesheet" href="./src/styles/headermenu.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
</head>

<body>
    <header>
        <div class="header-container">
            <div class="home-container">
                <img src="./src/assets/images/logo_uas.png" alt="logo uas" />
                <p class="university-title">UNIVERSIDAD AUTONOMA DE SINALOA</p>
            </div>
            <div>
                <h1 class="page-title">Encuesta de COVID-19</h1>
            </div>
        </div>
        <div class="nav-menu-container">
            <ul class="menu">
                <li><a href="login.php" class="nav-item-link">Iniciar sesión</a></li>
                <li><a href="login.php" class="nav-item-link">Cerrar sesión</a></li>
            </ul>
        </div>

    </header>

    <form id="form" action="index.php" class="frm_index">

        <div class="main-container">
            <div style="width: 100%;">
                <div class="form-container">

                    <div class="fieldset-container">
                        <h2 class="subtitle" id="subtitle1">Datos personales</h2>
                        <div class="date-container">


                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">No. cuenta</span>
                                <input type="text" class="form-control" placeholder="" aria-label="Username" name="Id_NumCuenta" id="Id_NumCuenta" aria-describedby="basic-addon1">
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Nombre</span>
                                <input type="text" class="form-control" placeholder="" aria-label="Username" name="Nombre" id="Nombre" aria-describedby="basic-addon1">
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Apellido paterno</span>
                                <input type="text" class="form-control" placeholder="" aria-label="Username" name="Ape_Pat" id="Ape_Pat" aria-describedby="basic-addon1">
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Apellido materno</span>
                                <input type="text" class="form-control" placeholder="" aria-label="Username" name="Ape_Mat" id="Ape_Mat" aria-describedby="basic-addon1">
                            </div>

                            <div><select class="form-select" aria-label="Default select example" name="Sexo" id="Sexo">
                                    <option selected>Hombre</option>
                                    <option>Mujer</option>
                                    <option>Indefinido</option>
                                </select></div>

                            <div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Edad</span>
                                    <input type="number" class="form-control" placeholder="" class="input-style" min="1" max="100" aria-label="Username" name="Edad" id="Edad" aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <div><select class="form-select" aria-label="Default select example" name="Tipo" id="Tipo">
                                    <option selected>Estudiante</option>
                                    <option>Personal</option>
                                </select></div>

                            <div><select class="form-select" aria-label="Default select example" name="Unidad_Academica" id="Unidad_Academica">
                                    <option selected>Escuela Preparatoria Valle del Carrizo</option>
                                    <option>Escuela Preparatoria Choix</option>
                                    <option>Escuela Preparatoria Choix. Extensión San Javier</option>
                                    <option>Escuela Preparatoria El Fuerte</option>
                                    <option>Escuela Preparatoria El Fuerte. Exensión Constancia</option>
                                    <option>Escuela Preparatoria El Fuerte. Extensión 3 Garantías</option>
                                    <option>Escuela Preparatoria San Blas</option>
                                    <option>Escuela Preparatoria San Blas. Extensión Constancia.</option>
                                    <option>Escuela Preparatoria San Blas. Extensión Higuera de Los Natochis</option>
                                    <option>Escuela Preparatoria Ciudad Universitaria Los Mochis</option>
                                    <option>Escuela Preparatoria Los Mochis</option>
                                    <option>Escuela Preparatoria Los Mochis. Extensión Ahome</option>
                                    <option>Escuela Preparatoria Juan José Ríos</option>
                                    <option>Escuela Preparatoria Ruiz Cortines</option>
                                    <option>Escuela Preparatoria Ruiz Cortines. Extensión Cerro Cabezón</option>
                                    <option>Escuela Preparatoria Ruiz Cortines. Extensión Bachoco</option>
                                    <option>Escuela Preparatoria Ruiz Cortines. Extensión Batamote</option>
                                    <option>Centro de Estudios de Idiomas Los Mochis</option>
                                    <option>Facultad de Agricultura del Valle del Fuerte</option>
                                    <option>Facultad de Agricultura del Valle del Carrizo</option>
                                    <option>Facultad de Educación Física y Deporte. Extensión Los Mochis</option>
                                    <option>Facultad de Enfermería Los Mochis</option>
                                    <option>Facultad de Ciencias de la Educación. Extensión Los Mochis.</option>
                                    <option>Facultad de Derecho y Ciencia Política</option>
                                    <option>Unidad de Ciencias de la Comunicación Los Mochis</option>
                                    <option>Unidad Académica de Criminalista, Ciencia Forense. Extensión Los Mochis</option>
                                    <option>Facultad de Ingeniería Los Mochis</option>
                                    <option>Facultad de Medicina. Extensión Los Mochis</option>
                                    <option>Facultad de Trabajo Social Los Mochis</option>
                                    <option>Facultad de Trabajo Social Los Mochis</option>
                                    <option>Unidad Académica de Negocios - Personal</option>
                                    <option>Servicio Social Universitario - Personal</option>
                                    <option>Área administrativa (incluye Torre Académica) - Personal</option>
                                </select></div>

                            <div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Carrera</span>
                                    <input type="text" class="form-control" placeholder="" class="input-style" aria-label="Username" name="Carrera" id="Carrera" aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Grupo</span>
                                    <input type="text" class="form-control" placeholder="" class="input-style" min="1" max="100" aria-label="Username" name="Grupo" id="Grupo" aria-describedby="basic-addon1">
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="fieldset-container">

                        <h2 class="subtitle">Contacto</h2>
                        <div class="contact-container">

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Correo</span>
                                <input type="text" class="form-control" placeholder="" aria-label="Username" name="Correo" id="Correo" aria-describedby="basic-addon1">
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Teléfono celular</span>
                                <input type="text" class="form-control" placeholder="" aria-label="Username" name="Tel1" id="Tel1" aria-describedby="basic-addon1">
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Teléfono casa</span>
                                <input type="text" class="form-control" placeholder="" aria-label="Username" name="Tel2" id="Tel2" aria-describedby="basic-addon1">
                            </div>
                            
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Colonia</span>
                                <input type="text" class="form-control" placeholder="" aria-label="Username" name="Colonia" id="Colonia" aria-describedby="basic-addon1">
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Calle</span>
                                <input type="text" class="form-control" placeholder="" aria-label="Username" name="Calle" id="Calle" aria-describedby="basic-addon1">
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Número</span>
                                <input type="text" class="form-control" placeholder="" aria-label="Username" name="Numero" id="Numero" aria-describedby="basic-addon1">
                            </div>

                        </div>

                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Especificaciones" id="floatingTextarea2" style="max-height: 140px; min-height: 140px" name="textarea-especificaciones" id="textarea-especificaciones"></textarea>
                            <label for="floatingTextarea2">Especificaciones</label>
                        </div>


                    </div>

                    <div class="fieldset-container">

                        
                    <h2 class="subtitle" class="disease-container">Enfermedades</h2>
                        <div class="disease-container">
                            
                            <div class="form-floating" class="Enfermedades">
                                <textarea class="form-control" class="textarea-style" placeholder="Especificaciones" id="floatingTextarea2" style="max-height: 140px; min-height: 140px" name="textarea-diseasebase" id="textarea-diseasebase"></textarea>
                                <label for="floatingTextarea2">Enfermedades base</label>
                            </div>

                            <br>

                            <div class="form-floating" class="Enfermedades">
                                <textarea class="form-control" class="textarea-style" placeholder="Especificaciones" id="floatingTextarea2" style="max-height: 140px; min-height: 140px" name="textarea-diseasetime" id="textarea-diseasetime"></textarea>
                                <label for="floatingTextarea2">Enfermedades base</label>
                            </div>

                        </div>
                    </div>

                    <div class="fieldset-container">

                        <h2 class="subtitle">Síntomas</h2>

                        <div class="symptom-container">
                            <div class="combobox-div"><input type="checkbox" name="Sintoma1" value="1">
                                <label class="cb-Style">Fiebre</label>
                            </div>

                            <div class="combobox-div"><input type="checkbox" name="Sintoma2" value="1">
                                <label class="cb-Style">Cansancio</label>
                            </div>

                            <div class="combobox-div"><input type="checkbox" name="Sintoma3" value="1">
                                <label class="cb-Style">Tos seca</label>
                            </div>

                            <div class="combobox-div"><input type="checkbox" name="Sintoma4" value="1">
                                <label class="cb-Style">Dolor de cadera</label>
                            </div>

                            <div class="combobox-div"><input type="checkbox" name="Sintoma5" value="1">
                                <label class="cb-Style">Malestar en el cuerpo</label>
                            </div>

                            <div class="combobox-div"><input type="checkbox" name="Sintoma6" value="1">
                                <label class="cb-Style">Dolor de garganta</label>
                            </div>

                            <div class="combobox-div"><input type="checkbox" name="Sintoma7" value="1">
                                <label class="cb-Style">Congestión nasal</label>
                            </div>

                            <div class="combobox-div"><input type="checkbox" name="Sintoma8" value="1">
                                <label class="cb-Style">Perdida del olfato o sabor</label>
                            </div>

                            <div class="combobox-div"><input type="checkbox" name="Sintoma9" value="1">
                                <label class="cb-Style">Nauceas o Vomito</label>
                            </div>

                            <div class="combobox-div"><input type="checkbox" name="Sintoma10" value="1">
                                <label class="cb-Style">Diarrea</label>
                            </div>

                            <div class="combobox-div"><input type="checkbox" name="Sintoma11" value="1">
                                <label class="cb-Style">Falta de aire </label>
                            </div>

                            <div class="combobox-div"><label class="cb-Style">Tiempo</label><input type="date" name="date" id="date"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="button-container"><button name="btnAgregar" id="btn-send">Enviar</button></div>
        </div>
    </form>
    <script src="./src/scripts/index.js"></script>
</body>

</html>