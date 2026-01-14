<<<<<<< HEAD
let ruta = '../controladores/ERlibroControlador.php';

$(document).ready(function(){
    ConsultarCategorias();
    ConsultarAutores();
});


function limpiar(){
    $("#cat").val("");
    $("#aut").val("");
    $("#datos").html("");

    if ($.fn.DataTable.isDataTable("#dtERLibro")) {
        $("#dtERLibro").DataTable().clear().destroy();
    }
}



function ConsultarCategorias(){
    $.ajax({
        data:{accion:"CATEGORIAS"},
        url:ruta,
        type:"post",
        dataType:"json",
        success:function(data){
            let html="";
            $.each(data,function(i,c){
                html+=`
                <tr>
                    <td>${c.idcategoria}</td>
                    <td>${c.nombre}</td>
                    <td class='text-center'>
                        <button class='btn btn-warning'
                            onclick='Categoria_id(${c.idcategoria})'
                            data-bs-dismiss="modal">
                            <i class='fa fa-plus-circle'></i>
                        </button>
                    </td>
                </tr>`;
            });
            $("#datosCat").html(html);
            grid("#dtCategorias");
        }
    });
}

function Categoria_id(id){
    $.ajax({
        data:{id:id,accion:"CAT_ID"},
        url:ruta,
        type:"post",
        dataType:"json",
        success:function(c){
            $("#cat").val(c.nombre);
            $("#aut").val(""); 
            ConsultarLibrosCategoria(c.idcategoria);
        }
    });
}



function ConsultarAutores(){
    $.ajax({
        data:{accion:"AUTORES"},
        url:ruta,
        type:"post",
        dataType:"json",
        success:function(data){
            let html="";
            $.each(data,function(i,a){
                html+=`
                <tr>
                    <td>${a.id}</td>
                    <td>${a.autor}</td>
                    <td class='text-center'>
                        <button class='btn btn-warning'
                            onclick='Autor_id("${a.autor}")'
                            data-bs-dismiss="modal">
                            <i class='fa fa-plus-circle'></i>
                        </button>
                    </td>
                </tr>`;
            });
            $("#datosAutores").html(html);
            grid("#dtAutores");
        }
    });
}

function Autor_id(nombreAutor){
    $("#aut").val(nombreAutor);
    $("#cat").val(""); 
    ConsultarLibrosAutor(nombreAutor);
}



function ConsultarLibrosCategoria(idcat){

    if ($.fn.DataTable.isDataTable("#dtERLibro")) {
        $("#dtERLibro").DataTable().clear().destroy();
    }

    $.ajax({
        data:{id:idcat,accion:"LIBROS_CAT"},
        url:ruta,
        type:"post",
        dataType:"json",
        success:function(data){
            pintarTabla(data);
        }
    });
}

function ConsultarLibrosAutor(nombreAutor){

    if ($.fn.DataTable.isDataTable("#dtERLibro")) {
        $("#dtERLibro").DataTable().clear().destroy();
    }

    $.ajax({
        data:{autor:nombreAutor,accion:"LIBROS_AUT"},
        url:ruta,
        type:"post",
        dataType:"json",
        success:function(data){
            pintarTabla(data);
        }
    });
}



function pintarTabla(data){
    let html="";

    $.each(data,function(i,x){

        let img = x.portada
            ? `<img src="../uploads/libros/${x.portada}" class="img-tabla">`
            : `<img src="../uploads/noimage.png" class="img-tabla">`;

        html+=`
        <tr>
            <td>${x.id_libro}</td>
            <td class="text-center">${img}</td>
            <td>${x.titulo}</td>
            <td>${x.autor}</td>
            <td>${x.anio}</td>
            <td>${x.stock_total}</td>
            <td>${x.stock_disponible}</td>
        </tr>`;
    });

    $("#datos").html(html);
    grid("#dtERLibro");
}


function r_libros(){

    let cat = $("#cat").val().trim();
    let aut = $("#aut").val().trim();

    if(cat === "" && aut === ""){
        Swal.fire("Seleccione categoría o autor","", "warning");
        return;
    }

    let url = "fpdf/ERlibros.php?";

    if(cat !== ""){
        url += "tipo=categoria&categoria=" + encodeURIComponent(cat);
    } 
    else {
        url += "tipo=autor&autor=" + encodeURIComponent(aut);
    }

    window.open(url, "_blank");
=======
let ruta = '../controladores/ERlibroControlador.php';

$(document).ready(function(){
    ConsultarCategorias();
    ConsultarAutores();
});


function limpiar(){
    $("#cat").val("");
    $("#aut").val("");
    $("#datos").html("");

    if ($.fn.DataTable.isDataTable("#dtERLibro")) {
        $("#dtERLibro").DataTable().clear().destroy();
    }
}



function ConsultarCategorias(){
    $.ajax({
        data:{accion:"CATEGORIAS"},
        url:ruta,
        type:"post",
        dataType:"json",
        success:function(data){
            let html="";
            $.each(data,function(i,c){
                html+=`
                <tr>
                    <td>${c.idcategoria}</td>
                    <td>${c.nombre}</td>
                    <td class='text-center'>
                        <button class='btn btn-warning'
                            onclick='Categoria_id(${c.idcategoria})'
                            data-bs-dismiss="modal">
                            <i class='fa fa-plus-circle'></i>
                        </button>
                    </td>
                </tr>`;
            });
            $("#datosCat").html(html);
            grid("#dtCategorias");
        }
    });
}

function Categoria_id(id){
    $.ajax({
        data:{id:id,accion:"CAT_ID"},
        url:ruta,
        type:"post",
        dataType:"json",
        success:function(c){
            $("#cat").val(c.nombre);
            $("#aut").val(""); 
            ConsultarLibrosCategoria(c.idcategoria);
        }
    });
}



function ConsultarAutores(){
    $.ajax({
        data:{accion:"AUTORES"},
        url:ruta,
        type:"post",
        dataType:"json",
        success:function(data){
            let html="";
            $.each(data,function(i,a){
                html+=`
                <tr>
                    <td>${a.id}</td>
                    <td>${a.autor}</td>
                    <td class='text-center'>
                        <button class='btn btn-warning'
                            onclick='Autor_id("${a.autor}")'
                            data-bs-dismiss="modal">
                            <i class='fa fa-plus-circle'></i>
                        </button>
                    </td>
                </tr>`;
            });
            $("#datosAutores").html(html);
            grid("#dtAutores");
        }
    });
}

function Autor_id(nombreAutor){
    $("#aut").val(nombreAutor);
    $("#cat").val(""); 
    ConsultarLibrosAutor(nombreAutor);
}



function ConsultarLibrosCategoria(idcat){

    if ($.fn.DataTable.isDataTable("#dtERLibro")) {
        $("#dtERLibro").DataTable().clear().destroy();
    }

    $.ajax({
        data:{id:idcat,accion:"LIBROS_CAT"},
        url:ruta,
        type:"post",
        dataType:"json",
        success:function(data){
            pintarTabla(data);
        }
    });
}

function ConsultarLibrosAutor(nombreAutor){

    if ($.fn.DataTable.isDataTable("#dtERLibro")) {
        $("#dtERLibro").DataTable().clear().destroy();
    }

    $.ajax({
        data:{autor:nombreAutor,accion:"LIBROS_AUT"},
        url:ruta,
        type:"post",
        dataType:"json",
        success:function(data){
            pintarTabla(data);
        }
    });
}



function pintarTabla(data){
    let html="";

    $.each(data,function(i,x){

        let img = x.portada
            ? `<img src="../uploads/libros/${x.portada}" class="img-tabla">`
            : `<img src="../uploads/noimage.png" class="img-tabla">`;

        html+=`
        <tr>
            <td>${x.id_libro}</td>
            <td class="text-center">${img}</td>
            <td>${x.titulo}</td>
            <td>${x.autor}</td>
            <td>${x.anio}</td>
            <td>${x.stock_total}</td>
            <td>${x.stock_disponible}</td>
        </tr>`;
    });

    $("#datos").html(html);
    grid("#dtERLibro");
}


function r_libros(){

    let cat = $("#cat").val().trim();
    let aut = $("#aut").val().trim();

    if(cat === "" && aut === ""){
        Swal.fire("Seleccione categoría o autor","", "warning");
        return;
    }

    let url = "fpdf/ERlibros.php?";

    if(cat !== ""){
        url += "tipo=categoria&categoria=" + encodeURIComponent(cat);
    } 
    else {
        url += "tipo=autor&autor=" + encodeURIComponent(aut);
    }

    window.open(url, "_blank");
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
}