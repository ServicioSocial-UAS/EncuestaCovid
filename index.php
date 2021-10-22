
<?php
include "./Alert/alert.php";
include "abrir_conexion.php";

$Mensaje_Alerta = "";

if (isset($_POST["btnAgregar"])) {


        $Numero_Cuenta = $_POST["Id_NumCuenta"];
        $Nom = trim($_POST["Nombre"]);
        $Ape_Pa = trim($_POST["Ape_Pat"]);
        $Sexo = $_POST["Sexo"];
        $Edad = $_POST["Edad"];
        $Tipo = $_POST["Tipo"];
        $Unidad_Academica = $_POST["Unidad_Academica"];
        $Carrera = trim($_POST["Carrera"]);
        $Grupo = trim($_POST["Grupo"]);
        $Correo = trim($_POST["Correo"]);
        $Tel1 = $_POST["Tel1"];
        $Tel2 = $_POST["Tel2"];
        $Colonia = trim($_POST["Colonia"]);
        $Calle = trim($_POST["Calle"]);
        $Numero = $_POST["Numero"];
        $Especificaciones = trim($_POST["textarea-especificaciones"]);

        $Nombre = ucwords($Nom);
        $Ape1 = ucwords($Ape_Pa);
        
            $sql = "SELECT * FROM tb_datopersonal WHERE Id_NumCuenta='$Numero_Cuenta'";

            $resultA = mysqli_query($conexion, $sql);

            $filasA = mysqli_num_rows($resultA);

            if (($filasA == 0)) {

                if (isset($_POST["Ape_Mat"])) {
                    $Ape_Ma = trim($_POST["Ape_Mat"]);
                    $Ape2 = ucwords($Ape_Ma);
                } else {
                    $Ap2 = ' ';
                }

                

                $sql = "INSERT INTO tb_datopersonal (Id_NumCuenta, Nombre, Ape_Pat, Ape_Mat, Sexo, Edad, Tipo, Unidad_Academica, Carrera, Grupo) 
                VALUES ('$Numero_Cuenta', '$Nombre', '$Ape1', '$Ape2', '$Sexo', '$Edad', '$Tipo', '$Unidad_Academica', '$Carrera', '$Grupo')";
                if ($conexion->query($sql) == TRUE) {
                    
                } else {
                    alert("No se hizo1");
                }
            
                
                $Id_Contacto = NULL;
                $sql = "INSERT INTO tb_contacto (Id_Contacto, Id_NumCuenta, Correo, Tel1, Tel2, Colonia, Calle, Numero, Especificaciones) 
                VALUES ('$Id_Contacto','$Numero_Cuenta', '$Correo', '$Tel1', '$Tel2', '$Colonia', '$Calle', '$Numero', '$Especificaciones')";
                if ($conexion->query($sql) == TRUE) {
                   

                } else {
                    alert("No se hizo2");
                }

            
                $Id_Enfermedades = NULL;
                $Enfermedades_Base = $_POST["textarea-diseasebase"];
                $Tiempo_Enfermedades = $_POST["textarea-diseasetime"];
                

                $sql = "INSERT INTO tb_enfermedades (Id_Enfermedades, Id_NumCuenta, Enfermedades_Base, Tiempo_Enfermedades) 
                VALUES ('$Id_Enfermedades','$Numero_Cuenta', '$Enfermedades_Base', '$Tiempo_Enfermedades')";
                if ($conexion->query($sql) == TRUE) {
                  
                } else {
                    alert("No se hizo3");
                }
            

                $Num_Sintomas = 0;
                $Id_Sintomas = NULL;

                if(isset($_POST["Sintoma1"])){
                    $cb_fiebre = $_POST["Sintoma1"];
                    $Num_Sintomas = $Num_Sintomas + 1 ;
                }else{
                    $cb_fiebre = "0";
                }

                if(isset($_POST["Sintoma2"])){
                    $cb_Cansancio = $_POST["Sintoma2"];
                    $Num_Sintomas = $Num_Sintomas + 1 ;
                }else{
                    $cb_Cansancio = "0";
                }
                
                if(isset($_POST["Sintoma3"])){
                    $cb_Tos = $_POST["Sintoma3"];
                    $Num_Sintomas = $Num_Sintomas + 1 ;
                }else{
                    $cb_Tos = "0";
                }

                if(isset($_POST["Sintoma4"])){
                    $cb_Cadera = $_POST["Sintoma4"];
                    $Num_Sintomas = $Num_Sintomas + 1 ;
                }else{
                    $cb_Cadera = "0";
                }

                if(isset($_POST["Sintoma5"])){
                    $cb_Malestar = $_POST["Sintoma5"];
                    $Num_Sintomas = $Num_Sintomas + 1 ;
                }else{
                    $cb_Malestar = "0";
                }

                if(isset($_POST["Sintoma6"])){
                    $cb_Dolor = $_POST["Sintoma6"];
                    $Num_Sintomas = $Num_Sintomas + 1 ;
                }else{
                    $cb_Dolor = "0";
                }

                if(isset($_POST["Sintoma7"])){
                    $cb_Congestion = $_POST["Sintoma7"];
                    $Num_Sintomas = $Num_Sintomas + 1 ;
                }else{
                    $cb_Congestion = "0";
                }

                if(isset($_POST["Sintoma8"])){
                    $cb_Perdida = $_POST["Sintoma8"];
                    $Num_Sintomas = $Num_Sintomas + 1 ;
                }else{
                    $cb_Perdida = "0";
                }

                if(isset($_POST["Sintoma9"])){
                    $cb_nauceas_vomito = $_POST["Sintoma9"];
                    $Num_Sintomas = $Num_Sintomas + 1 ;
                }else{
                    $cb_nauceas_vomito = "0";
                }

                if(isset($_POST["Sintoma10"])){
                    $cb_Diarrea = $_POST["Sintoma10"];
                    $Num_Sintomas = $Num_Sintomas + 1 ;
                }else{
                    $cb_Diarrea = "0";
                }

                if(isset($_POST["Sintoma11"])){   
                    $cb_Falta = $_POST["Sintoma11"];
                    $Num_Sintomas = $Num_Sintomas + 1 ;
                }else{
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

            }else{
                alert("El usuario ya existe");
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
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./src/styles/index.css" />
    <link rel="stylesheet" href="./src/styles/header.css" />
    <link rel="stylesheet" href="./src/styles/headermenu.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
  </head>
  <body>
    <header>
      <div class="header-container">
        <div class="home-container">
          <img src="./src/assets/images/logo_uas.png" alt="logo uas" />
          <p class="university-title">UNIVERSIDAD AUTONOMA DE SINALOA</p>
        </div>
        <div><h1 class="page-title">Encuesta de COVID-19</h1></div>
      </div>
      <div class="nav-menu-container">
        <ul class="menu">
          <li><a href="login.php" class="nav-item-link">Iniciar sesión</a></li>
          <li><a href="login.php" class="nav-item-link">Cerrar sesión</a></li>
        </ul>
      </div>
    </header>

    <form id="form" action="index.php" class="frm_index" method="POST">
      <div class="main-container">
        <div style="width: 100%">
          <div class="form-container">
            <div class="fieldset-container">
              <h2 class="subtitle" id="subtitle1">Datos personales</h2>
              <div class="date-container">
                <div class="label-style"><label>Número de cuenta: </label></div>
                <div class="input-container">
                  <input
                    type="text"
                    class="input-style"
                    name="Id_NumCuenta"
                    id="Id_NumCuenta"
                  />
                </div>

                <div class="label-style"><label>Nombre: </label></div>
                <div class="input-container">
                  <input
                    type="text"
                    class="input-style"
                    name="Nombre"
                    id="Nombre"
                    value=""
                  />
                </div>

                <div class="label-style"><label>Apellido paterno: </label></div>
                <div class="input-container">
                  <input
                    type="text"
                    class="input-style"
                    name="Ape_Pat"
                    id="Ape_Pat"
                    value=""
                  />
                </div>

                <div class="label-style"><label>Apellido materno: </label></div>
                <div class="input-container">
                  <input
                    type="text"
                    class="input-style"
                    name="Ape_Mat"
                    id="Ape_Mat"
                    value=""
                  />
                </div>

                <div class="label-style"><label>Sexo:</label></div>
                <div class="input-container">
                  <select
                    class="input-style"
                    class="label-style"
                    class="input-date"
                    name="Sexo"
                    id="Sexo"
                    value=""
                  >
                    <option class="input-style">Hombre</option>
                    <option class="input-style">Mujer</option>
                    <option class="input-style">Indefinido</option>
                  </select>
                </div>

                <div class="label-style"><label>Edad: </label></div>
                <div class="input-container">
                  <input
                    type="number"
                    class="input-style"
                    min="1"
                    max="100"
                    name="Edad"
                    id="Edad"
                    value=""
                  />
                </div>

                <div class="label-style"><label>Tipo:</label></div>
                <div class="input-container">
                  <select
                    class="input-style"
                    class="label-style"
                    class="input-date"
                    name="Tipo"
                    id="Tipo"
                    value=""
                  >
                    <option class="input-style">Estudiante</option>
                    <option class="input-style">Personal</option>
                  </select>
                </div>

                <div class="label-style"><label>Unidad académica:</label></div>
                <div class="input-container">
                  <select
                    class="input-date"
                    name="Unidad_Academica"
                    id="Unidad_Academica"
                    value=""
                    style="max-width: 240px"
                  >
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
                </div>

                <div class="label-style"><label>Carrera: </label></div>
                <div class="input-container">
                  <input
                    type="text"
                    class="input-style"
                    name="Carrera"
                    id="Carrera"
                    value=""
                  />
                </div>

                <div class="label-style"><label>Grupo: </label></div>
                <div class="input-container">
                  <input
                    type="text"
                    class="input-style"
                    name="Grupo"
                    id="Grupo"
                    value=""
                  />
                </div>
              </div>
            </div>

            <div class="fieldset-container">
              <h2 class="subtitle">Contacto</h2>

              <div class="contact-container">
                <div class="label-style"><label>Correo: </label></div>
                <div class="input-container">
                  <input
                    type="text"
                    class="input-style"
                    name="Correo"
                    id="Correo"
                  />
                </div>

                <div class="label-style"><label>Teléfono celular: </label></div>
                <div class="input-container">
                  <input
                    type="text"
                    class="input-style"
                    name="Tel1"
                    id="Tel1"
                  />
                </div>

                <div class="label-style"><label>Teléfono Casa:</label></div>
                <div class="input-container">
                  <input
                    type="text"
                    class="input-style"
                    name="Tel2"
                    id="Tel2"
                  />
                </div>

                <hr class="divider" />

                <div class="label-style"><label>Colonia: </label></div>
                <div class="input-container">
                  <input
                    type="text"
                    class="input-style"
                    name="Colonia"
                    id="Colonia"
                  />
                </div>

                <div class="label-style"><label>Calle: </label></div>
                <div class="input-container">
                  <input
                    type="text"
                    class="input-style"
                    name="Calle"
                    id="Calle"
                  />
                </div>

                <div class="label-style"><label>Número: </label></div>
                <div class="input-container">
                  <input
                    type="text"
                    class="input-style"
                    name="Numero"
                    id="Numero"
                    style="margin-bottom: -24px"
                  />
                </div>
              </div>

              <div class="direccion">
                <h3 id="h3-diseasetime">Especificaciones</h3>
                <textarea
                  class="textarea-style"
                  rows="7"
                  maxlength="477"
                  name="textarea-especificaciones"
                  id="textarea-especificaciones"
                ></textarea>
              </div>
            </div>

            <div class="fieldset-container">
              <h2 class="subtitle">Enfermedades</h2>

              <div class="disease-container">
                <div class="Enfermedades">
                  <h3>Enfermedades base</h3>
                  <textarea
                    class="textarea-style"
                    rows="7"
                    name="textarea-diseasebase"
                    id="textarea-diseasebase"
                    maxlength="477"
                  ></textarea>
                </div>

                <br />

                <div class="Enfermedades">
                  <h3>Tiempo de las enfermedades</h3>
                  <textarea
                    class="textarea-style"
                    rows="7"
                    name="textarea-diseasetime"
                    id="textarea-diseasetime"
                    maxlength="477"
                  ></textarea>
                </div>
              </div>
            </div>

            <div class="fieldset-container">
              <h2 class="subtitle">Síntomas</h2>

              <div class="symptom-container">
                <div class="combobox-div">
                  <input type="checkbox" name="Sintoma1" value="1" />
                  <label class="cb-Style">Fiebre</label>
                </div>

                <div class="combobox-div">
                  <input type="checkbox" name="Sintoma2" value="1" />
                  <label class="cb-Style">Cansancio</label>
                </div>

                <div class="combobox-div">
                  <input type="checkbox" name="Sintoma3" value="1" />
                  <label class="cb-Style">Tos seca</label>
                </div>

                <div class="combobox-div">
                  <input type="checkbox" name="Sintoma4" value="1" />
                  <label class="cb-Style">Dolor de cadera</label>
                </div>

                <div class="combobox-div">
                  <input type="checkbox" name="Sintoma5" value="1" />
                  <label class="cb-Style">Malestar en el cuerpo</label>
                </div>

                <div class="combobox-div">
                  <input type="checkbox" name="Sintoma6" value="1" />
                  <label class="cb-Style">Dolor de garganta</label>
                </div>

                <div class="combobox-div">
                  <input type="checkbox" name="Sintoma7" value="1" />
                  <label class="cb-Style">Congestión nasal</label>
                </div>

                <div class="combobox-div">
                  <input type="checkbox" name="Sintoma8" value="1" />
                  <label class="cb-Style">Perdida del olfato o sabor</label>
                </div>

                <div class="combobox-div">
                  <input type="checkbox" name="Sintoma9" value="1" />
                  <label class="cb-Style">Nauceas o Vomito</label>
                </div>

                <div class="combobox-div">
                  <input type="checkbox" name="Sintoma10" value="1" />
                  <label class="cb-Style">Diarrea</label>
                </div>

                <div class="combobox-div">
                  <input type="checkbox" name="Sintoma11" value="1" />
                  <label class="cb-Style">Falta de aire </label>
                </div>

                <div class="combobox-div">
                  <label class="cb-Style">Tiempo</label
                  ><input type="date" name="date" id="date" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="button-container">
          <button name="btnAgregar" id="btn-send">Enviar</button>
        </div>
      </div>
    </form>

    <script src="./src/scripts/index.js"></script>
  </body>
</html>
