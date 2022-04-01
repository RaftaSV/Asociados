<?php
@session_start();
$idAdmin="";
if(isset($_SESSION["idAdmin"])){
$idAdmin = $_SESSION["idAdmin"];
}

    if($idAdmin>0){
        //Si la sesion no esta iniciada se redirigue a Login
       header("Location: Principal.php");
    }


 
?>
<!DOCTYPE html>
<html>
<link rel="shortcut icon" type="Logo/png" href="CSS/imagenes/Logo.png">
<LINK REL=StyleSheet HREF="CSS/estilo.css" TYPE="text/css" />

<head>
    <meta charset="ISO-8859-1">
    <title>HOME</title>
</head>

<body>

<div id='container'>
    <form action="/Asociados1/Controller/controllerLogin.php" method="post">

        <div id="img"></div>
        <div class="inset">

            <label>USUARIO</label>
            <input type="text" name="user" id="email">
            <br>
            <br>
            <label>CONTRASEÑA</label>
            <input type="password" name="pass" id="password">

        </div>
      
            <input class=" " type="submit" name="go" id="go" value="ACCEDER">

    </form>
    </div>
</body>

</html>