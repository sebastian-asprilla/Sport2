$(document).ready(function () {
    tablaGoleadores = $("#tablaGoleadores").DataTable({
        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"
        }],

        "language": {
            "lengthMenu": "Mostrar _MENU_ goleadores",
            "zeroRecords": "No se encontraron goleadores  ",
            "info": "Mostrando goleadores del _START_ al _END_ de un total de _TOTAL_ goleadores",
            "infoEmpty": "Mostrando goleadores del 0 al 0 de un total de 0 goleadores",
            "infoFiltered": "(filtrado de un total de _MAX_ goleadores)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing": "Procesando...",
        }
    });

    $("#btnNuevo").click(function () {
        $("#formGoleadores").trigger("reset");
        $(".modal-header").css("background-color", "#1cc88a");
        $(".modal-header").css("color", "white");
<<<<<<< HEAD
        $(".modal-title").text("Nuevo goleador");
=======
        $(".modal-title").text("Nuevo Partido");
>>>>>>> 5f606f1ff6e0523d33164979a7df64e8a464a145
        $("#modalCRUD").modal("show");
        id = null;
        opcion = 1; //alta
    });

    var fila; //capturar la fila para editar o borrar el registro

    //botón EDITAR    
    $(document).on("click", ".btnEditar", function () {
        fila = $(this).closest("tr");
        id = parseInt(fila.find('td:eq(0)').text());
        nombre = fila.find('td:eq(1)').text();
        goles = parseInt(fila.find('td:eq(3)').text());

        $("#nombre").val(nombre);
        $("#goles").val(goles);
        opcion = 2; //editar

        $(".modal-header").css("background-color", "#4e73df");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Goleadores");
        $("#modalCRUD").modal("show");
<<<<<<< HEAD
=======

>>>>>>> 5f606f1ff6e0523d33164979a7df64e8a464a145
    });

    //botón BORRAR
    $(document).on("click", ".btnBorrar", function () {
        fila = $(this);
        id = parseInt($(this).closest("tr").find('td:eq(0)').text());
        opcion = 3 //borrar
        var respuesta = confirm("¿Está seguro de eliminar al goleador: " + id + "?");
        if (respuesta) {
            $.ajax({
                url: "bd/crudgoleadores.php",
                type: "POST",
                dataType: "json",
                data: { opcion: opcion, id: id },
                success: function () {
                    tablaGoleadores.row(fila.parents('tr')).remove().draw();
                }
            });
        }
    });

    $("#formGoleadores").submit(function (e) {
        e.preventDefault();
        nombre = $.trim($("#nombre").val());
        goles = $.trim($("#goles").val());
        $.ajax({
            url: "bd/crudgoleadores.php",
            type: "POST",
            dataType: "json",
            data: { nombre: nombre, goles: goles, id: id, opcion: opcion },
            success: function (data) {
                console.log(data);
                id = data[0].id;
                nombre = data[0].nombre;
                goles = data[0].goles;
                if (opcion == 1) { tablaGoleadores.row.add([id, nombre, goles]).draw(); }
                else { tablaGoleadores.row(fila).data([id, nombre, goles]).draw(); }
            }
        });
        $("#modalCRUD").modal("hide");

    });

});