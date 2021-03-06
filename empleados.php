<?php
include "abrir_conexion.php";



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
    <link rel="stylesheet" href="./src/styles/header.css">
    <link rel="stylesheet" href="./src/styles/empleados.css">
    <link rel="stylesheet" href="./src/styles/vermas.css">
    
</head>
<body>
<form id="form" action="empleados.php" class="frm_index" method="POST">
    <header>
        <div class="header-container">
            <div class="home-container">
                <img src="./src/assets/images/logo_uas.png" alt="logo uas" />
                <p class="title-university">UNIVERSIDAD AUTONOMA DE SINALOA</p>
            </div>
            <h1>Encuesta de COVID-19</h1>
        </div>
        
        <div class="login-logout-container">
            <ul class="menu">
                <li class="alumno-empleado"><a href="empleados.php" class="login-logout" >Estudiantes</a></li>
                <li class="alumno-empleado"><a href="alumnos.php" class="login-logout" >Personal</a></li>
                <li><a class="login-logout" name="logout" onclick="logout()">Cerrar sesión</a></li>
            </ul>
        </div>
    </header>
</form>
    
    
           
            <?php
            $Contador;

                

                include "abrir_conexion.php";
                
                if (isset($_GET['pagina'])){
                    $pagina = $_GET['pagina'];
                }else{
                    $pagina=1;
                }

                $por_pagina = 2;
                
                $empieza = ($pagina-1) * $por_pagina;

                $query = "SELECT tb_datopersonal.Id_NumCuenta, tb_datopersonal.Nombre, tb_datopersonal.Ape_Pat, tb_datopersonal.Carrera, tb_datopersonal.Grupo,
                tb_sintomas.Num_Sintomas 
                from tb_datopersonal  inner join tb_sintomas 
                on tb_datopersonal.Id_NumCuenta = tb_sintomas.Id_NumCuenta where tb_datopersonal.Tipo = 'Personal' LIMIT $empieza, $por_pagina;";

                $resultado = mysqli_query($conexion, $query);
                
                
            ?>
                <div id="reporte">
                <br> <br>
                <div class="main-container">
                <table class="table-container">
                    <thead>
                        <tr>
                            <th>NO. DE CUENTA</th>
                            <th>NOMBRE</th>
                            <th>Unidad_Academica</th>
                            <th>SÍNTOMAS</th>
                            <th>DATOS</th>
                        </tr>
                    </thead>
                
            <?php
                while($fila = mysqli_fetch_assoc($resultado)){
                    
            ?>
                <tbody>
                    <tr>

                        <td><?php echo $fila['Id_NumCuenta']; ?></td>
                        <td><?php echo $fila['Nombre'];echo " "; echo $fila['Ape_Pat']; ?></td>
                        <td><?php echo $fila['Carrera']; ?></td>
                        <td><?php echo $fila['Grupo']; ?></td>
                        <td><?php echo $fila['Num_Sintomas']; ?></td>
                        
                        <?php
                            $Id_NumCuenta=$fila['Id_NumCuenta'];
                            $VerMas="Ver más";
                        ?>

                        <td class="vermas"><?php echo "<a href='vermas.php?NoCuenta=$Id_NumCuenta'>$VerMas</a>"; ?></td>
                    </tr>
                </tbody>
            <?php
                 };
            ?>
                </table>
                </div>

                <div id="paginacion">
                <br>
                <br>
                <br>
                <br>
            <?php
            
                    $query = "SELECT tb_datopersonal.Id_NumCuenta, tb_datopersonal.Nombre, tb_datopersonal.Unidad_Academica,
                    tb_sintomas.Num_Sintomas 
                    from tb_datopersonal  inner join tb_sintomas 
                    on tb_datopersonal.Id_NumCuenta = tb_sintomas.Id_NumCuenta where tb_datopersonal.Tipo = 'Personal'";

                    $resultado = mysqli_query($conexion, $query);

                    $total_registrados = mysqli_num_rows($resultado);

                    $total_paginas = ceil($total_registrados / $por_pagina);
                    
                    echo "<center><a href='empleados.php?pagina=1'>".'Primera'."</a>";

                    for($i=1; $i<=$total_paginas; $i++){
                        echo "<a href='empleados.php?pagina=".$i."'>".$i."</a>";
                     }
                        
                    echo "<a href='empleados.php?pagina=$total_paginas'>".'Última'."</a><center>";


            ?>
                </div>
            </div>
            

        </table>    
    </div>
    <script src="./src/scripts/TokenSession.js"></script>
    
</body>
</html>