<?php
include "abrir_conexion.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuesta COVID-19 UAS - Empleados</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="./src/styles/header.css" />
    <link rel="stylesheet" href="./src/styles/sideBarMenu.css" />
    <link rel="stylesheet" href="./src/styles/table.css" />

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



    <?php
    $Contador;



    include "abrir_conexion.php";

    if (isset($_GET['pagina'])) {
        $pagina = $_GET['pagina'];
    } else {
        $pagina = 1;
    }

    $por_pagina = 2;

    $empieza = ($pagina - 1) * $por_pagina;

    $query = "SELECT tb_datopersonal.Id_NumCuenta, tb_datopersonal.Nombre, tb_datopersonal.Ape_Pat, tb_datopersonal.Carrera, tb_datopersonal.Grupo,
                tb_sintomas.Num_Sintomas 
                from tb_datopersonal  inner join tb_sintomas 
                on tb_datopersonal.Id_NumCuenta = tb_sintomas.Id_NumCuenta where tb_datopersonal.Tipo = 'Personal' LIMIT $empieza, $por_pagina;";

    $resultado = mysqli_query($conexion, $query);


    ?>
    <main class="main-container">
        <table class="table-container">
            <thead class="table-head">
                <tr>
                    <th>NO. DE CUENTA</th>
                    <th>NOMBRE</th>
                    <th>Unidad_Academica</th>
                    <th>S??NTOMAS</th>
                    <th>DATOS</th>
                </tr>
            </thead>

            <tbody class="table-body">
                <?php
                while ($fila = mysqli_fetch_assoc($resultado)) {

                ?>
                    <tr>

                        <td><?php echo $fila['Id_NumCuenta']; ?></td>
                        <td><?php echo $fila['Nombre'];
                            echo " ";
                            echo $fila['Ape_Pat']; ?></td>
                        <td><?php echo $fila['Carrera']; ?></td>
                        <td><?php echo $fila['Grupo']; ?></td>
                        <td><?php echo $fila['Num_Sintomas']; ?></td>

                        <?php
                        $Id_NumCuenta = $fila['Id_NumCuenta'];
                        $VerMas = "Ver m??s";
                        ?>

                        <td class="td-link"><?php echo "<a href='vermas.php?NoCuenta=$Id_NumCuenta'>$VerMas</a>"; ?></td>
                    </tr>
                <?php
                };
                ?>
            </tbody>
        </table>

        <!-- <div id="paginacion">
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

            echo "<center><a href='staff.php?pagina=1'>" . 'Primera' . "</a>";

            for ($i = 1; $i <= $total_paginas; $i++) {
                echo "<a href='staff.php?pagina=" . $i . "'>" . $i . "</a>";
            }

            echo "<a href='staff.php?pagina=$total_paginas'>" . '??ltima' . "</a><center>";


            ?>
        </div> -->
    </main>

    <script src="./src/scripts/sideBarMenu.js"></script>
</body>

</html>