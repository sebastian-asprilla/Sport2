$(document).ready(function () {
    tablaPosiciones = $("#tablaPosiciones").DataTable({
        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"
        }],

        "language": { //lenguaje HTML 
            "lengthMenu": "Mostrar _MENU_Posiciones",
            "zeroRecords": "No se encontraron Posiciones  ",
            "info": "Mostrando Posiciones del _START_ al _END_ de un total de _TOTAL_ Posiciones",
            "infoEmpty": "Mostrando posiciones del 0 al 0 de un total de 0 posiciones",
            "infoFiltered": "(filtrado de un total de _MAX_ posiciones)",
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
        $("#formPosiciones").trigger("reset");
        $(".modal-header").css("background-color", "#1cc88a");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Nueva posicion");
        $("#modalCRUD").modal("show");
        id = null;
        opcion = 1; //alta
    });

    var fila; //capturar la fila para editar o borrar el registro

    //botón EDITAR    
    $(document).on("click", ".btnEditar", function () {
        fila = $(this).closest("tr");
        id_posiciones = parseInt(fila.find('td:eq(0)').text());
        equipo = fila.find('td:eq(1)').text();
        pj = parseInt(fila.find('td:eq(2)').text());
        p_ganados = parseInt(fila.find('td:eq(3)').text());
        p_empates = parseInt(fila.find('td:eq(4)').text());
        p_perdidos = parseInt(fila.find('td:eq(5)').text());
        gf = parseInt(fila.find('td:eq(6)').text());
        gc = parseInt(fila.find('td:eq(7)').text());
        gd = parseInt(fila.find('td:eq(8)').text());
        pts = parseInt(fila.find('td:eq(9)').text());

        $("#equipo").val(equipo);
        $("#pj").val(pj);
        $("#p_ganados").val(p_ganados);
        $("#p_empates").val(p_empates);
        $("#p_perdidos").val(p_perdidos);
        $("#gf").val(gf);
        $("#gc").val(gc);
        $("#gd").val(gd);
        $("#pts").val(pts);
        opcion = 2; //editar

        $(".modal-header").css("background-color", "#4e73df");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar posiciones");
        $("#modalCRUD").modal("show");

    });

    //botón BORRAR
    $(document).on("click", ".btnBorrar", function () {
        fila = $(this);
        id_posiciones = parseInt($(this).closest("tr").find('td:eq(0)').text());
        opcion = 3 //borrar
        var respuesta = confirm("¿Está seguro de eliminar esta posicion: " + id_posiciones + "?");
        if (respuesta) {
            $.ajax({
                url: "bd/crudposiciones.php",
                type: "POST",
                dataType: "json",
                data: { opcion: opcion, id_posiciones: id_posiciones },
                success: function () {
                    tablaPosiciones.row(fila.parents('tr')).remove().draw();

                }
            });
        }
    });

    $("#formPosiciones").submit(function(e) {
        e.preventDefault();
        equipo = $.trim($("#equipo").val());
        pj = $.trim($("#pj").val());
        p_ganados = $.trim($("#p_ganados").val());
        p_empates = $.trim($("#p_empates").val());
        p_perdidos = $.trim($("#p_perdidos").val());
        gf = $.trim($("#gf").val());
        gc = $.trim($("#gc").val());
        gd = $.trim($("#gd").val());
        pts = $.trim($("#pts").val());
        var datos={
            equipo:$.trim($("#equipo").val()),
            pj:$.trim($("#pj").val()),
            p_ganados:$.trim($("#p_ganados").val()),
            p_empates:$.trim($("#p_empates").val()),
            p_perdidos:$.trim($("#p_perdidos").val()),
            gf:$.trim($("#gf").val()),
            gc:$.trim($("#gc").val()),
            gd: $.trim($("#gd").val()),
            pts: $.trim($("#pts").val()),
            opcion: 1
        };
        console.log(datos);
        $.ajax({
            url: "bd/crudposiciones.php",
            type: "POST",
            dataType: "json",
            data: datos,
            success: function (data) {
                console.log(data);
                id_posiciones = data[0].id_posiciones;
                equipo = data[0].equipo;
                pj = data[0].pj;
                p_ganados = data[0].p_ganados;
                p_empates = data[0].p_empates;
                p_perdidos = data[0].p_perdidos;
                gf = data[0].gf;
                gc = data[0].gc;
                gd = data[0].gd;
                pts = data[0].pts;
                if (opcion == 1) { tablaPosiciones.row.add([id_posiciones, equipo, pj, p_ganados, p_empates, p_perdidos, gf, gc, gd, pts, opcion]).draw(); }
                else { tablaPosiciones.row(fila).data([id_posiciones, equipo, pj, p_ganados, p_empates, p_perdidos, gf, gc, gd, pts, opcion]).draw(); }
            }
        });
        $("#modalCRUD").modal("hide");

    });

});