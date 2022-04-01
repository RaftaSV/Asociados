<?php
@session_start();
 if($_SESSION["idAdmin"]==""){
     //Si la sesion no esta iniciada se redirigue a Login
    header("Location: Login.php");
 }

?>
<!DOCTYPE html>
<html>
<link rel="shortcut icon" type="Logo/png" href="CSS/imagenes/Logo.png">
<!-- CDN jquery -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<!-- diseño css -->
<LINK REL=StyleSheet HREF="CSS/principal.css" TYPE="text/css"/>
<!-- CDN boostrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- codigo js -->
<script type="text/javascript" src="js/principal.js"></script>
<!--CDN font-awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
<!-- CDN sweet Alert-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<head>
    <meta charset="ISO-8859-1">
    <title>PRINCIPAL</title>
</head>

<body>
<a id="exit" class="btn btn-danger" href="../Controller/controllerDestruirSession.php"> <i
                                        class="fas fa-sign-out-alt"></i> </a> 
<!-- Vertically centered scrollable modal -->

 <!-- Modal -->
<div class="modal fade " class="modal-dialog modal-lg"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" id="ModalHistorial">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="socio">CAMBIOS REALIZADOS</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <table class="table" id="tablaHistorial">
        <thead class="thead-dark" id='tablaHistorial'>
        <tr>
            <th>NOMBRE DEL SOCIO</th>
            <th>DUI</th>
            <th>TELEFONO</th>
            <th>DIRECCION</th>
            <th>REALIZADO POR </th>
            <th>FECHA </th>
            <th>HORA </th>
        </tr>
        </thead>
    </table>
      </div>
  </div>
</div>
</div>
<div id="contenedor">
    <div id="textoEncabezado">
        <h1>LISTADO DE SOCIOS ACACYPAC</h1>
    </div>
    <div id="imagenEncabezado">
    <input type="text" id="buscarDUI" placeholder="Buscar por DUI" onkeyup="buscar()" >
    </div>
</div>
<button id="EDITAR" onclick="MOSTRARCRUD()" class="far fa-edit fa-2x"></button>
  <div>    
<div id="divTabla">
    <table class="table" id="tablaUsuario">
        <thead class="thead-dark" id='tablaUsuarios'>
        <tr>
            <th style="display: none;">IDUSUARIO</th>
            <th>PRIMER NOMBRE</th>
            <th>SEGUNDO NOMBRE</th>
            <th>PRIMER APELLIDO</th>
            <th>SEGUNDO APELLIDO</th>
            <th>DUI</th>
            <th>TELEFONO</th>
            <th>DIRECCION</th>
        </tr>
        </thead>
    </table>
</div>

<div class="crud" id="PANELCRUD" style="display: none;">
                   
                    <div  class="position-absolute">
                        <input type="hidden" id="id" value="0"> 
                        <label id="pNombreL" >PRIMER NOMBRE</label> <label id="sNombreL"> SEGUNGO NOMBRE</label>
                        <input type="text" id="pNombre"> <input type="text" id="sNombre"> <br>

                        <label id="pApellidoL">PRIMER APELLIDO</label><label id="sApellidoL">SEGUNGO APELLIDO</label>

                        <input type="text" id="pApellido"> <input type="text" id="sApellido"> <br>

                        <label id="duiL">DUI</label> <label id="telefonoL">TELEFONO</label> <br>

                        <input type="text" id="dui">  <input type="text" id="telefono"> <br>

                        <label id="direccionL">DIRECCION</label>

                        <br> <textarea  id="direccion"> </textarea ><br>
                        <br> 
                        <button id="historial" onclick="Historial()">Historial cambios</button>
                        <button class="Confirmar" onclick="Guardar()">Guardar</button> <br>
                        <button id="eliminar" onclick="Eliminar()">Eliminar</button>
                    </div>
            </div>
     </div>   
</body>


</html>