<<<<<<< HEAD
<?php
require_once '../modelos/ERlibroModelo.php';

if($_POST){

    $er = new ERLibros();

    switch($_POST['accion']){

      
        case "CATEGORIAS":
            echo json_encode($er->listarCategorias());
            break;

        case "CAT_ID":
            echo json_encode($er->categoriaById($_POST['id']));
            break;

        case "LIBROS_CAT":
            echo json_encode($er->librosPorCategoria($_POST['id']));
            break;


       
        case "AUTORES":
            echo json_encode($er->listarAutores());
            break;

        case "LIBROS_AUT":
            echo json_encode($er->librosPorAutor($_POST['autor']));
            break;


    
        default:
            echo json_encode(["error"=>"Acción no válida"]);
            break;
    }
}
=======
<?php
require_once '../modelos/ERlibroModelo.php';

if($_POST){

    $er = new ERLibros();

    switch($_POST['accion']){

      
        case "CATEGORIAS":
            echo json_encode($er->listarCategorias());
            break;

        case "CAT_ID":
            echo json_encode($er->categoriaById($_POST['id']));
            break;

        case "LIBROS_CAT":
            echo json_encode($er->librosPorCategoria($_POST['id']));
            break;


       
        case "AUTORES":
            echo json_encode($er->listarAutores());
            break;

        case "LIBROS_AUT":
            echo json_encode($er->librosPorAutor($_POST['autor']));
            break;


    
        default:
            echo json_encode(["error"=>"Acción no válida"]);
            break;
    }
}
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>