<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETAS_IMAGEN', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');


function incluirTemplate(String $nombre, bool $inicio = false){
    include TEMPLATES_URL."/${nombre}.php";
}

function estadoAutenticado() {

    session_start();

if(!$_SESSION['login']){
   header('Location: /');
}
}

function debugear($var){
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    exit;
}

//escapa / sanitiza el html

function s($html) : string{

    $s = htmlspecialchars($html);
    return $s;
}

function validarTipoContenido($tipo){
    $tipos = ['vendedor', 'propiedad'];

    return in_array($tipo, $tipos);
}

function mostrarNotificacion($codigo){
    $mensaje = '';

    switch($codigo){
        case 1:
            $mensaje = 'Creado Correctamente';
            break;
        case 2:
            $mensaje = 'Actualizado Correctamente';
            break;
        case 3:
            $mensaje = 'Eliminado Correctamente';
            break;   
            
        default: 
            $mensaje = false;
            break;    
    }   

    return $mensaje;
}

function validarORedireccionar(string $url)
{
$id = $_GET['id'];
$id = filter_var($id,FILTER_VALIDATE_INT);

if(!$id){
    header("Location: ${url}");
}

return $id;
}