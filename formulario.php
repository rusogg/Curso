<?php
    $servidor="localhost";
    $usuario="root";
    $clave="";
    $baseDeDatos="formulario";

    $enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);
    if(!$enlace){
        echo"error en la conexion con el servidor";
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./sass/custom.css">
</head>
<body>
    <header></header>
    <section class="jumbotron">
        <div class="container">
            <h1 class="display-1 text-center text-black-50">Formulario de arrepentimiento</h1>
        </div>
    </section>
    <section class="formulario">
        <div class="container">
            <div class="row">
                <div class="col md-8 col-md-offset-2">
                    
            <div class="card h100 bg-primary text-white fondo-card shadow-sm p-3 mb-5 ">
                
                <div class="card-header">Rellene el formulario, los campos * son necesarios</div>
                <div class="card-body">
                    <div class="mb3">
                    <form method="post">
                        <label for="nombre" class="form-label">Nombres*</label>
                        <input type="text" placeholder="Ingrese sus nombres" class="form-control" name="nombre" id="nombre">
                        <label for="apellido" class="form-label">Apellidos*</label>
                        <input type="text" placeholder="Ingrese sus apellidos" class="form-control" name="apellido" id="apellido">
                        <label for="mail" class="form-label">Correo electronico*</label>
                        <input type="email" placeholder="Ingrese correo electronico" class="form-control" name="mail" id="mail">
                        <label for="msg" class="form-label">Detalle de la devolucion</label>
                        <textarea class="form-control" name="msg" id="msg" rows="8"></textarea>
                        <div class="form-group mb-10">
                        <button class="btn btn-success" type="enviar" name="enviar">Enviar</button>
                        </form>
                        <?php

if (empty($_POST['nombre']) && isset($_POST['enviar']) ) {
    PRINT <<<HERE
    <div class="alert alert-danger" role="alert">
    Falta colocar nombres
    </div>
    HERE;
}

if (empty($_POST['apellido']) && isset($_POST['enviar']) ) {
    PRINT <<<HERE
    <div class="alert alert-danger" role="alert">
    Falta colocar apellidos
    </div>
    HERE;
}

if (empty($_POST['mail']) && isset($_POST['enviar']) ) {
    PRINT <<<HERE
    <div class="alert alert-danger" role="alert">
    Falta colocar el email
    </div>
    HERE;
}


if(isset($_POST['enviar']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['mail']) ){
    $nombre = ( $_POST['nombre'] );
    $apellido= ( $_POST['apellido'] );
    $mail = ( $_POST['mail'] );
    $msg = ( $_POST['msg'] );

    $insertarDatos = "INSERT INTO devoluciones(nombre, apellido, mail, msg) VALUES ('$nombre','$apellido','$mail','$msg')"; 
        $ejecutarInsertar = mysqli_query($enlace, $insertarDatos);

        PRINT <<<HERE
        <div class="alert alert-success" role="alert">
        Cancelacion enviada correctamente
        </div>
        HERE;

        
        
                        

        if(!$ejecutarInsertar){
            echo"error en la linea de sql";
        }   
}





?>         


    </div>
                    </div>
                </div>
            </div>
                </div> 
             </div>
        </div>
    </section>
    
</body>
</html>
