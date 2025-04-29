<?php
    //Encabezados (HEADERS)
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/bbdd1.php';
    include_once '../../models/Producto.php';

    //Instancionamos la base de datos y conexión
    $baseDatos = new Basemysql();
    $db = $baseDatos->connect();

    //Instanciamos el objeto categoría
    $producto = new Producto($db);

    $data = json_decode(file_get_contents("php://input"));

    //Setear el id de categoría
    $producto->id = $data->id;    

    //Crear categorías
    if($producto->borrar()){
        echo json_encode(
            array('message' => 'Producto borrada')
        );
    }else{
        echo json_encode(
            array('message' => 'Producto no borrrado')
        );
    }