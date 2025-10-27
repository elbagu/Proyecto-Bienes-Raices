<?php
namespace Model;

class ActiveRecord{
    

    //base de datos

    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla = '';

    //Errores
    protected static $errores = [];



    public static function setDB($database){
        self::$db = $database;
    }

    public function __construct($args = [])
    {

        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio  = $args['precio'] ?? '';
        $this->imagen  = $args['imagen'] ?? null;
        $this->descripcion  = $args['descripcion'] ?? '';
        $this->habitaciones  = $args['habitaciones'] ?? '';
        $this->wc  = $args['wc'] ?? '';
        $this->estacionamiento  = $args['estacionamiento'] ?? '';
        $this->creado  = date('Y/m/d');
        $this->vendedorId  = $args['vendedorId'] ?? '';
    }

    public function guardar(){
        if(!is_null($this->id)){
//actualizar 
            $this->actualizar();
        }else{
//crear un nuevo registro
           $this->crear();
        }

    }
    public function crear(){

        //sanitizar datos

        $atributos = $this->sanitizarDatos();

        //insertar en la base de datos con POO
        $query = " INSERT INTO ". static::$tabla ." ( ";
        $query .= join(', ',array_keys($atributos));
        $query .= " ) VALUES (' "; 
        $query .= join("', '",array_values($atributos));
        $query .= " ') ";

       $resultado = self::$db->query($query);

       if($resultado){
        //redireccionar al usuario
        header('Location: http://localhost:8080/bienesraices/admin?resultado=1');
        }
    }

    public function actualizar(){
        $atributos = $this->sanitizarDatos();

        $valores = [];
        foreach($atributos as $key => $value){
            $valores[] = "{$key}='{$value}'";
        }

        $query = "UPDATE " . static::$tabla . " SET ";
        $query .= join(', ',$valores);
        $query .= "WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= "LIMIT 1";
         
        $resultado = self::$db->query($query);

        if($resultado){
            //redireccionar al usuario
    
            header('Location: http://localhost:8080/bienesraices/admin?resultado=2');
        }
    }


    public function eliminar(){
        //elimina la propiedad
        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
    
        $resultado = self::$db->query($query);

        if($resultado){
            $this->borrarImagen();
            header('Location: http://localhost:8080/bienesraices/admin?resultado=3');
        }
    
    }

   

    //identificar y unir datos de la BD
    public function atributos(){
        $atributos = [];


        foreach(static::$columnasDB as $columna){
            if($columna === 'id')continue;//ignora el id
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

   public function sanitizarDatos(){
       $atributos = $this->atributos();
       $sanitizado = [];

       foreach($atributos as $key => $value){
           $sanitizado[$key] = self::$db->escape_string($value);
       }

       return $sanitizado;
   }

   //Validacion

   public static function getErrores(){
       return static::$errores;
   }

   //subida de archivos

   public function setImagen($imagen){
       
    //elimina la imagen previa
       if(!is_null($this->id)){
           $this->borrarImagen();
        }

       if($imagen){
           $this->imagen = $imagen;
       }
   }

   public function borrarImagen(){
    $existeArchivo = file_exists(CARPETAS_IMAGEN . $this->imagen);
        
    if($existeArchivo){
        unlink(CARPETAS_IMAGEN . $this->imagen);
    }
}

   public function validar(){
    static::$errores = [];


    return static::$errores;
   }

   //listar todas las propiedades

   public static function all(){
       $query = "SELECT * FROM " . static::$tabla;


       $resultado = self::consultarSQL($query);

       return $resultado;
   }

   public static function get($cantidad){
    $query = "SELECT * FROM " . static::$tabla . " LIMIT " .$cantidad;


    $resultado = self::consultarSQL($query);

    return $resultado;
   }

   //encontrar todos los registros por id

   public static function find($id){
    $query = "SELECT * FROM " . static::$tabla . " WHERE id = ${id}";

    $resultado = self::consultarSQL($query);

    return array_shift($resultado);
   }

   public static function consultarSQL($query){
       //consultar bd

       $resultado = self::$db->query($query);

       //iterar los resultados

       $array = [];
       while($registro = $resultado->fetch_assoc()){
           $array[] = static::crearObjeto($registro);
       }

       //liberar memoria

       $resultado->free();

       //retornar resultados

       return $array;
   }

   protected static function crearObjeto($registro){
       $objeto = new static;

       foreach($registro as $key => $value ){
           if( property_exists($objeto, $key)){
               $objeto->$key = $value;
           }
       }

       return $objeto;
   }

   //sincornizar el objeto con los cambios realizados

   public function sincronizar($args = []){
       foreach($args as $key => $value){
           if(property_exists($this, $key) && !is_null($value) ){
               $this->$key = $value;
           }
       }
   }


}