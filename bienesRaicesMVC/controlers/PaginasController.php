<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController{
    public static function index(Router $router){

        $propiedades = Propiedad::get(3);
        $inicio = true;

        $router->render('paginas/index',[
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }
    public static function nosotros(Router $router){
        $router->render('paginas/nosotros',[]);
    }
    public static function propiedades(Router $router){

        $propiedades = Propiedad::all();
        $router->render('paginas/propiedades',[
            'propiedades' => $propiedades
        ]);
    }

    public static function propiedad(Router $router){
        

        $id = validarORedireccionar('/propiedades');

        $propiedad = Propiedad::find($id);

        $router->render('paginas/propiedad',[
            'propiedad' => $propiedad
        ]);
    }

    public static function blog(Router $router){


        $router->render('paginas/blog',[]);
    }

    public static function entrada(Router $router){
        
        $router->render('paginas/entrada',[]);
    }

    public static function contacto(Router $router){


        if($_SERVER['REQUEST_METHOD'] === 'POST'){


            $mensaje = null;
            $respuestas = $_POST['contacto'];


            //crear un nuevo objeto

            #$mail = new PHPMailer();
            
            //configurar SIMP

        /*  $mail->isSMTP();
            $mail->Host = "smtp.mailtrap.io";
            $mail->SMTP = true;
            $mail->Username = '8e020d17edfb5c';
            $mail->Password = 'c7cf2e9104db8b';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;   */


            //Configurar el contenido del email

        /*  $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
            $mail->Subject = 'Tienes un nuevo Mensaje';
            */
            
            //Habilitar html
        /*  $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            */

            //definir contenido

            /* $contenido = '<html>';  
               $contenido .= '<p>Tienes un nuevo mensaje</p>';
               $contenido .= '<p>Nombre: ' . $respuestas['nombre']  . ' </p>' ;
               $contenido .= '<p>Email: ' . $respuestas['email']  . ' </p>' ;

 ------------- enviar de forma opcional algunos campos de email o telefono
               
               if($respuestas['contacto'] === 'telefono'){

                $contenido .= '<p>Eligio ser contactado por telefono:</p>';
                $contenido .= '<p>Telefono: ' . $respuestas['telefono']  . ' </p>' ;
                $contenido .= '<p>Fecha Contacto: ' . $respuestas['fecha']  . ' </p>' ;
                $contenido .= '<p>Hora: ' . $respuestas['hora']  . ' </p>' ;
            
               }else{
                   $contenido .= '<p>Eligio ser contactado por email:</p>';
                   $contenido .= '<p>Email: ' . $respuestas['email'] . ' </p>';
               }
               $contenido .= '<p>Mensaje: ' . $respuestas['mensaje']  . ' </p>' ;
               $contenido .= '<p>Vende o Compra: ' . $respuestas['tipo']  . ' </p>' ;
               $contenido .= '<p>Precio o Presupuesto: ' . $respuestas['precio']  . ' </p>' ;
               $contenido .= '<p>Prefiere ser contactado por: ' . $respuestas['contacto']  . ' </p>' ;
               $contenido .= '</html>';
            */
            # $mail->Body = $contenido;
            # $mail->AltBody = "Esto es un texto sin html";

            //enivar el email

        /*  if($mail->send()){
                $mensaje = "Mensaje Enviado Correctamente";
            }else{
                $mensaje = "El mensaje no se puedo enviar";
            }
            */

        }

        $router->render('paginas/contacto',[
            'mensaje' => $mensaje
        ]);
    }
}