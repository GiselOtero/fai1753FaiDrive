<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FiDrive</title>
    <!--  -->
    <link rel="stylesheet" href="../css/4.5.2/bootstrap.min.css">
    <!-- validacion -->
    <link rel="stylesheet" href="../css/4.5.2/bootstrapValidator.min.css">
    <!-- iconos -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <!-- mi estilos -->
        <link rel="stylesheet" href="../css/estilos.css">
        <style>
            /* hover */
            .boton:hover {
                box-shadow: 0 4px 10px #007bff;
                transition: all 0.2s ease;
            }
            .sidebar .nav-link:hover:hover {
                text-shadow: 1px 1px 6px #fff;
                transition: all 0.2s ease;
            }
        </style>
        <!-- editor -->
        
        <script src="../js/editor/ckeditor.js"></script>
       
        <!-- funciones -->
        <script src="../js/funciones/funciones.js"></script>        
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow">
        <a class="navbar-brand p-2" href="../inicio/index.php">FiDrive</a>
        <button class="navbar-toggler d-md-none collapsed" type="button" data-toggle="collapse"
            data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <div class="container-fluid" style="width: auto;">
        <div class="row">
            <?php include_once ("menu.php"); ?>
            <div class="col-md-9 ml-sm-auto d-md-block col-lg-10 px-md-4 h-100">
                
         <?php  
            include_once ("../../configuracion.php");
        ?>