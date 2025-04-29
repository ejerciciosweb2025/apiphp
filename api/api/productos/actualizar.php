<?php
    //Encabezados (HEADERS)
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/bbdd1.php';
    include_once '../../models/Producto.php';

    //Instancionamos la base de datos y conexión
    $baseDatos = new Basemysql();
    $db = $baseDatos->connect();

    //Instanciamos el objeto producto
    $producto = new Producto($db);

    $data = json_decode(file_get_contents("php://input"));

    //Setear el id de categoría
    $producto->id = $data->id;
    $producto->titulo = $data->titulo;
    $producto->texto = $data->texto;
    $producto->categoria_id = $data->categoria_id;

    //Actualizar producto
    if($producto->actualizar()){
        echo json_encode(
            array('message' => 'Producto actualizado')
        );
    }else{
        echo json_encode(
            array('message' => 'Producto no actualizado')
        );
    }