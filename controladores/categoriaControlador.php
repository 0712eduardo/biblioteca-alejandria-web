<<<<<<< HEAD
<?php
require_once '../modelos/categoriaModelo.php';
$categoria = new Categoria();

$accion = $_POST['accion'] ?? '';

switch ($accion) {

   
    case 'listar':
        $data = $categoria->listar();
        $tabla = '';

        foreach ($data as $row) {
            $estadoTexto = ($row['condicion'] == 'A') ? 'ACTIVO' : 'INACTIVO';
            $badge = ($row['condicion'] == 'A') ? 'badge-activo' : 'badge-desactivo';

            $tabla .= "
                <tr>
                    <td>{$row['idcategoria']}</td>
                    <td>{$row['nombre']}</td>
                    <td>{$row['descripcion']}</td>

                    <td>
                        <span class='badge $badge'>$estadoTexto</span>
                    </td>

                    <td>
                        <button class='btn btn-accion-edit editar'
                            data-id='{$row['idcategoria']}'
                            data-nombre='{$row['nombre']}'
                            data-descripcion='{$row['descripcion']}'>
                            <i class='mdi mdi-pencil'></i>
                        </button>

                        <button class='btn btn-accion-delete eliminar'
                            data-id='{$row['idcategoria']}'>
                            <i class='mdi mdi-delete'></i>
                        </button>
                    </td>
                </tr>";
        }

        echo $tabla;
        break;

    case 'insertar':
        $categoria->insertar($_POST['nombre'], $_POST['descripcion']);

        echo json_encode([
            "status" => "OK",
            "mensaje" => "Categoría registrada correctamente"
        ]);
        break;


    case 'editar':
        $categoria->editar($_POST['id'], $_POST['nombre'], $_POST['descripcion']);

        echo json_encode([
            "status" => "OK",
            "mensaje" => "Categoría actualizada correctamente"
        ]);
        break;

   
    case 'eliminar':
        $categoria->eliminar($_POST['id']);

        echo json_encode([
            "status" => "OK",
            "mensaje" => "Categoría desactivada correctamente"
        ]);
        break;
}
=======
<?php
require_once '../modelos/categoriaModelo.php';
$categoria = new Categoria();

$accion = $_POST['accion'] ?? '';

switch ($accion) {

   
    case 'listar':
        $data = $categoria->listar();
        $tabla = '';

        foreach ($data as $row) {
            $estadoTexto = ($row['condicion'] == 'A') ? 'ACTIVO' : 'INACTIVO';
            $badge = ($row['condicion'] == 'A') ? 'badge-activo' : 'badge-desactivo';

            $tabla .= "
                <tr>
                    <td>{$row['idcategoria']}</td>
                    <td>{$row['nombre']}</td>
                    <td>{$row['descripcion']}</td>

                    <td>
                        <span class='badge $badge'>$estadoTexto</span>
                    </td>

                    <td>
                        <button class='btn btn-accion-edit editar'
                            data-id='{$row['idcategoria']}'
                            data-nombre='{$row['nombre']}'
                            data-descripcion='{$row['descripcion']}'>
                            <i class='mdi mdi-pencil'></i>
                        </button>

                        <button class='btn btn-accion-delete eliminar'
                            data-id='{$row['idcategoria']}'>
                            <i class='mdi mdi-delete'></i>
                        </button>
                    </td>
                </tr>";
        }

        echo $tabla;
        break;

    case 'insertar':
        $categoria->insertar($_POST['nombre'], $_POST['descripcion']);

        echo json_encode([
            "status" => "OK",
            "mensaje" => "Categoría registrada correctamente"
        ]);
        break;


    case 'editar':
        $categoria->editar($_POST['id'], $_POST['nombre'], $_POST['descripcion']);

        echo json_encode([
            "status" => "OK",
            "mensaje" => "Categoría actualizada correctamente"
        ]);
        break;

   
    case 'eliminar':
        $categoria->eliminar($_POST['id']);

        echo json_encode([
            "status" => "OK",
            "mensaje" => "Categoría desactivada correctamente"
        ]);
        break;
}
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>