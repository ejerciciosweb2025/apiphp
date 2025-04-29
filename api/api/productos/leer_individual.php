<?php
    //Encabezados (HEADERS)
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/bbdd1.php';
    include_once '../../models/Producto.php';

    //Instancionamos la base de datos y conexión
    $baseDatos = new Basemysql();
    $db = $baseDatos->connect();

    //Instanciamos el objeto categoría
    $producto = new Producto($db);

    //Get id
    $producto->id = isset($_GET['id']) ? $_GET['id'] : die();

    //Get categoría
    $producto->leer_individual();

    //Creamos el array
    $producto_arr = array(
        'id' => $producto->id,
        'titulo' => $producto->titulo,
        'texto' => $producto->texto,
        'categoria_id' => $producto->categoria_id,
        'categoria_nombre' => $producto->categoria_nombre
    );

    //Crear json
    print_r(json_encode($producto_arr));