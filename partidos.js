$(document).ready(function () {
    tablaPartido = $("#tablaPartido").DataTable({
        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"
        }],

        "language": {
            "lengthMenu": "Mostrar _MENU_ partidos",
            "zeroRecords": "No se encontraron partidos  ",
            "info": "Mostrando partidos del _START_ al _END_ de un total de _TOTAL_ partidos",
            "infoEmpty": "Mostrando partidos del 0 al 0 de un total de 0 partidos",
            "infoFiltered": "(filtrado de un total de _MAX_ partidos)",
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
        $("#formPartido").trigger("reset");
        $(".modal-header").css("background-color", "#1cc88a");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Nuevo Partido");
        $("#modalCRUD").modal("show");
        id = null;
        opcion = 1; //alta
    });

    var fila; //capturar la fila para editar o borrar el registro

    //botón EDITAR    
    $(document).on("click", ".btnEditar", function () {
        fila = $(this).closest("tr");
        id = parseInt(fila.find('td:eq(0)').text());
        equipos = fila.find('td:eq(1)').text();
        lugar = fila.find('td:eq(2)').text();
        hora = parseInt(fila.find('td:eq(3)').text());

        $("#equipos").val(equipos);
        $("#lugar").val(lugar);
        $("#fecha").val(fecha);
        $("#hora").val(hora);
        opcion = 2; //editar

        $(".modal-header").css("background-color", "#4e73df");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Equipos");
        $("#modalCRUD").modal("show");

    });

    //botón BORRAR
    $(document).on("click", ".btnBorrar", function () {
        fila = $(this);
        id = parseInt($(this).closest("tr").find('td:eq(0)').text());
        opcion = 3 //borrar
        var respuesta = confirm("¿Está seguro de eliminar el partido: " + id + "?");
        if (respuesta) {
            $.ajax({
                url: "bd/crudpartido.php",
                type: "POST",
                dataType: "json",
                data: { opcion: opcion, id: id },
                success: function () {
                    tablaPartido.row(fila.parents('tr')).remove().draw();
                }
            });
        }
    });

    $("#formPartido").submit(function(e) {
        e.preventDefault();
        equipos = $.trim($("#equipos").val());
        lugar = $.trim($("#lugar").val());
        hora = $.trim($("#hora").val());
        $.ajax({
            url: "bd/crudpartido.php",
            type: "POST",
            dataType: "json",
            data: { equipos: equipos, lugar: lugar, hora: hora, id: id, opcion: opcion },
            success: function (data) {
                console.log(data);
                id = data[0].id;
                equipos = data[0].equipos;
                lugar = data[0].lugar;
                fecha = data[0].fecha;
                hora = data[0].hora;
                if (opcion == 1) { tablaPartido.row.add([id, equipos, lugar, hora]).draw(); }
                else { tablaPartido.row(fila).data([id, equipos, lugar, hora]).draw(); }
            }
        });
        $("#modalCRUD").modal("hide");

    });

});