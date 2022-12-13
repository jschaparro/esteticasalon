<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email{

    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token){

        $this->email= $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion(){
        //Crear el objeto de email
     	$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->Host = 'mail.esteticasalon.eu';
		$mail->SMTPAuth = true;
		$mail->Username = 'info@esteticasalon.eu';
		$mail->Password = 'Ge5u34~z4';
		$mail->SMTPSecure = 'tls';
		$mail->Port = '587';
		$mail->addAddress($this->email);
		
		
        //$mail = new PHPMailer();
        //$mail->isSMTP();
        //$mail->Host = 'smtp.mailtrap.io';
        //$mail->SMTPAuth = true;
        //$mail->Port = 465;
        //$mail->Username = 'e24aae643f00da';
        //$mail->Password = '00cf3405c0a9ed';

      

        $mail->setFrom('esteticasalon@esteticasalon.com');
        $mail->addAddress('esteticasalon@esteticasalon.com','Estetica salon');
        $mail->Subject = 'Confirma tu cuenta';

        //set HTML
        $mail->isHTML(TRUE);       
        $mail->CharSet='UTF-8';     //definir el uso de html

        $contenido = '<hmtl>';
        $contenido .= "<p><strong>Hola " . $this->email . "</strong> Has creado tu cuenta en
        AppSalon, solo debes confirmarla precionando en el siguiente enlace</p>";        
        $contenido .="<p>Presiona aquí: <a href='https://esteticasalon.eu/confirmar-cuenta?token=" 
        .$this->token."'>Confirmar Cuenta</a></p>";
        $contenido .= "<p>Si no solocitaste esta cuenta, ignora el mensaje</p>";
        $contenido .= '</hmtl>';

        $mail->Body= $contenido;

        //enviar el email
        $mail->send();

    }

    public function enviarInstrucciones(){
        //Crear el objeto de email

		$mail = new PHPMailer();
  		$mail->isSMTP();
		$mail->Host = 'mail.esteticasalon.eu';
		$mail->SMTPAuth = true;
		$mail->Username = 'info@esteticasalon.eu';
		$mail->Password = 'Ge5u34~z4';
		$mail->SMTPSecure = 'tls';
		$mail->Port = '587';
		$mail->addAddress($this->email);
        
        
		//$mail = new PHPMailer();
        //$mail->isSMTP();
        //$mail->Host = 'smtp.mailtrap.io';
        //$mail->SMTPAuth = true;
        //$mail->Port = 465;
        //$mail->Username = 'e24aae643f00da';
        //$mail->Password = '00cf3405c0a9ed';
        
        
        
        

        $mail->setFrom('appreservas@appreservas.com');
        $mail->addAddress('appreservas@appreservas.com','App Reservas');
        $mail->Subject = 'Confirma tu cuenta';

        //set HTML
        $mail->isHTML(TRUE);       
        $mail->CharSet='UTF-8';     //definir el uso de html

        $contenido = '<hmtl>';
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong>Has solicitado reestablecer tu password, sigue el siguiente enlace para hacerlo.</p>";        
        $contenido .="<p>Presiona aquí: <a href='https://esteticasalon.eu/recuperar?token=" 
        .$this->token."'>Reestablecer Password</a></p>";
        $contenido .= "<p>Si no solocitaste esta cuenta, ignora el mensaje</p>";
        $contenido .= '</hmtl>';

        $mail->Body= $contenido;

        //enviar el email
        $mail->send();

    }

}