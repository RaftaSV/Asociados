$(document).ready(function() {
    document.getElementById('buscarDUI').focus();
})


function CargarDatos() {

    $(document).ready(function() {

        let dui = document.getElementById('buscarDUI').value;
        let accion = 'Datos';
        $.post('../Controller/controllerListaUsuarios.php', {
            //Enviar informacion
            dui,
            accion
        }, function(response) {
            //Recibir informacion

            let datos = JSON.parse(response);
            let tabla = document.getElementById('tablaUsuarios');

            $('#tablaUsuarios td').remove();

            for (let item of datos) {


                tabla.innerHTML += `
					
        <tr>
           <td  style="display: none;"> ${item.idUsuario} </td>
           <td> ${item.primerNombre}</td>
           <td> ${item.segundoNombre}</td>
           <td> ${item.primerApellido}</td>
           <td> ${item.segundoApellido}</td>
           <td> ${item.DUI}</td>
           <td> ${item.telefono}</td>
           <td> ${item.direccion}</td>
           <td>
           <button onclick="Historial(${item.idUsuario})" class="btn btn-info"> <i class="fa-solid fa-clock-rotate-left"></i> </button>
           </td>
           </tr>
       `
            }


        });
    });

}

function MOSTRARCRUD() {
    var CRUD = document.getElementById("PANELCRUD"),
        tabladiv = document.getElementById('divTabla');
    document.getElementById('id').value = "";
    document.getElementById('pNombre').value = "";
    document.getElementById('sNombre').value = "";
    document.getElementById('pApellido').value = "";
    document.getElementById('sApellido').value = "";
    document.getElementById('dui').value = "";
    document.getElementById('telefono').value = "";
    document.getElementById('direccion').value = "";

    if (CRUD.style.display === "none") {
        CRUD.style.display = "inline-block";
        tabladiv.style.width = "67%";



    } else {
        CRUD.style.display = "none";
        tabladiv.style.width = "95%";



    }

}

function limpiar() {
    document.getElementById('id').value = "";
    document.getElementById('pNombre').value = "";
    document.getElementById('sNombre').value = "";
    document.getElementById('pApellido').value = "";
    document.getElementById('sApellido').value = "";
    document.getElementById('dui').value = "";
    document.getElementById('telefono').value = "";
    document.getElementById('direccion').value = "";
}

$(document).on("click", "#tablaUsuario tr", function() {

    let idUsuario, pNombre, sNombre, pApellido, sApellido, DUI, telefono, direccion;

    try {
        idUsuario = $(this).find('td:first-child').html().replace(" ", "");
    } catch (error) {
        idUsuario = 0;
    }


    if (idUsuario > 0) {

        pNombre = $(this).find('td:nth-child(2)').html().replace(" ", "");
        sNombre = $(this).find('td:nth-child(3)').html().replace(" ", "");
        pApellido = $(this).find('td:nth-child(4)').html().replace(" ", "");
        sApellido = $(this).find('td:nth-child(5)').html().replace(" ", "");
        DUI = $(this).find('td:nth-child(6)').html().replace(" ", "");
        telefono = $(this).find('td:nth-child(7)').html().replace(" ", "");
        direccion = $(this).find('td:nth-child(8)').html().replace(" ", "");

        document.getElementById('id').value = idUsuario;
        document.getElementById('pNombre').value = pNombre;
        document.getElementById('sNombre').value = sNombre;
        document.getElementById('pApellido').value = pApellido;
        document.getElementById('sApellido').value = sApellido;
        document.getElementById('dui').value = DUI;
        document.getElementById('telefono').value = telefono;
        document.getElementById('direccion').value = direccion;

    }
})

function Guardar() {
    let idUsuario, pNombre, sNombre, pApellido, sApellido, DUI, telefono, direccion;
    idUsuario = document.getElementById('id').value;
    pNombre = document.getElementById('pNombre').value;
    sNombre = document.getElementById('sNombre').value;
    pApellido = document.getElementById('pApellido').value;
    sApellido = document.getElementById('sApellido').value;
    DUI = document.getElementById('dui').value;
    telefono = document.getElementById('telefono').value;
    direccion = document.getElementById('direccion').value;


    if (pNombre == "") {
        swal("Debe de llenar el primer nombre", " ", "warning", {
                buttons: {
                    OK: {
                        text: "OK"
                    },
                },
            })
            .then((value) => {
                switch (value) {

                    case "OK":
                        document.getElementById('pNombre').focus();
                        break;
                }
            });


    } else if (pApellido == "") {
        swal("Debe rellenar el primer apellido", " ", "warning", {
                buttons: {
                    OK: {
                        text: "OK"
                    },
                },
            })
            .then((value) => {
                switch (value) {

                    case "OK":
                        document.getElementById('pApellido').focus();
                        break;
                }
            });



    } else if (DUI == "") {
        swal("Debe rellenar el DUI", " ", "warning", {
                buttons: {
                    OK: {
                        text: "OK"
                    },
                },
            })
            .then((value) => {
                switch (value) {

                    case "OK":
                        document.getElementById('dui').focus();

                        break;
                }
            });

    } else if (telefono == "") {
        swal("Debe rellenar el numero de telefono", " ", "warning", {
                buttons: {
                    OK: {
                        text: "OK"
                    },
                },
            })
            .then((value) => {
                switch (value) {

                    case "OK":
                        document.getElementById('telefono').focus();

                        break;
                }
            });
    } else if (direccion == "") {
        swal("Debe rellenar la direccion", " ", "warning", {
                buttons: {
                    OK: {
                        text: "OK"
                    },
                },
            })
            .then((value) => {
                switch (value) {

                    case "OK":
                        document.getElementById('direccion').focus();

                        break;
                }
            });
    } else {

        if (idUsuario < 1) {

            swal("Alerta", "Desea guardar a el socio " + pNombre + "?", "info", {
                    buttons: {
                        Cancelar: {

                            text: "Cancelar"
                        },
                        Guardar: {

                            text: "Guardar"
                        },
                    }
                })
                .then((value) => {
                        switch (value) {



                            case "Guardar":

                                $(document).ready(function() {
                                    $.post('../Controller/controllerInsertUsuarios.php', {
                                        //Enviar informacion
                                        pNombre,
                                        sNombre,
                                        pApellido,
                                        sApellido,
                                        DUI,
                                        telefono,
                                        direccion

                                    }, function(response) {
                                        //Recibir informacion
                                    });
                                });


                                setTimeout(() => {
                                    CargarDatos()
                                }, 250);
                                limpiar();



                                break;

                            case "Cancelar":
                                break;

                        } //CierreSwitch
                    } //CierreValue
                ) //CierreThen

        } else {
            swal("Alerta", "Desea actualizar a el socio " + pNombre + "?", "info", {
                    buttons: {
                        Cancelar: {

                            text: "Cancelar"
                        },
                        Guardar: {

                            text: "Guardar"
                        },
                    }
                })
                .then((value) => {
                        switch (value) {



                            case "Guardar":

                                $(document).ready(function() {
                                    $.post('../Controller/controllerInsertUsuarios.php', {
                                        //Enviar informacion
                                        idUsuario,
                                        pNombre,
                                        sNombre,
                                        pApellido,
                                        sApellido,
                                        DUI,
                                        telefono,
                                        direccion

                                    }, function(response) {
                                        //Recibir informacion
                                    });
                                });


                                setTimeout(() => {
                                    CargarDatos()
                                }, 250);
                                limpiar();



                                break;

                            case "Cancelar":
                                break;

                        } //CierreSwitch
                    } //CierreValue
                )

        }
    }


}


function Eliminar() {
    let idUsuario = document.getElementById('id').value;
    let pNombre = document.getElementById('pNombre').value;
    if (idUsuario > 0) {
        swal("Alerta", "Desea eliminar a el socio " + pNombre + "?", "info", {
                buttons: {
                    Cancelar: {

                        text: "Cancelar"
                    },
                    Eliminar: {

                        text: "Eliminar"
                    },
                }
            })
            .then((value) => {
                    switch (value) {



                        case "Eliminar":

                            $(document).ready(function() {
                                $.post('../Controller/controllerEliminarUsuario.php', {
                                    //Enviar informacion

                                    idUsuario

                                }, function(response) {
                                    //Recibir informacion
                                });
                            });


                            setTimeout(() => {
                                CargarDatos()
                            }, 250);

                            limpiar();

                            break;

                        case "Cancelar":
                            break;

                    } //CierreSwitch
                } //CierreValue
            ) //CierreThen
    }
}

function Historial(idUsuario) {

    pNombre = document.getElementById('pNombre').value;

    if (idUsuario > 0) {
        $('#ModalHistorial').modal('show');

        $(document).ready(function() {

            $.post('../Controller/controllerRecord.php', {
                //Enviar informacion
                idUsuario
            }, function(response) {
                //Recibir informacion
                let datos = JSON.parse(response);
                console.log(datos);
                let tabla = document.getElementById('tablaHistorial');

                $('#tablaHistorial td').remove();
                for (let item of datos) {
                    let fullName = item.primerNombre + " " + item.segundoNombre + " " + item.primerApellido + " " + item.segundoApellido;

                    tabla.innerHTML += `
					
        <tr>
           <td  style="display: none;"> ${item.idUsuario} </td> 
           <td> ${fullName}</td>
           <td> ${item.DUI}</td>
           <td> ${item.telefono}</td>
           <td> ${item.direccion}</td>
           <td> ${item.nombreAdmin}</td>
           <td> ${item.fecha}</td>
           <td> ${item.hora}</td>
           </tr>
       `
                }

            });
        });
        $(document).ready(function() {
            $.post('../Controller/controllerDatosUnUsuario.php', {
                //Enviar informacion
                idUsuario

            }, function(response) {
                //Recibir informacion
                let datos = JSON.parse(response);
                let info = document.getElementById('socio');
                for (let item of datos) {
                    let informacion = "REGISTRO DE CAMBIOS REALIZADOS AL SOCIO " + item.primerNombre + " " + item.segundoNombre +
                        " " + item.primerApellido + " " + item.segundoApellido + " con el numero de DUI " + item.DUI +
                        ", numero de telefono " + item.telefono + ", que recide en " + item.direccion;
                    informacion = informacion.toString().toUpperCase();
                    info.innerHTML = informacion;

                }
            });
        });
    }

    limpiar();
}



function buscar() {
    CargarDatos();
}


window.onload = CargarDatos();