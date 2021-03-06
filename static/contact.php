<?php
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: Content-Type");
	require_once('./mail/class.phpmailer.php');
		
	if(!isset($_POST['name'])) die("Forbidden.");

	$subject = 'Nuevo mensage de '.$_POST['name'];
	$messageText =	'Nombre: '.$_POST['name'].'<br>'.
            'Telefono: '.$_POST['phone'].'<br>'.
            'Correo: <a href="mailto:'.$_POST['email'].'">'.$_POST['email'].'</a><br>'.
            'Producto: '.$_POST['product'].'<br>'.
            'Servicio Específico: '.$_POST['service'].'<br>'.
            'Mensaje: '.$_POST['message'].'<br>';
    
    sendMail($messageText, $subject);
    
    echo "success";

    function sendMail($body, $title){
        
		error_log("\n\n\n\n>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> SENDING MAIL >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>");
		error_log("title:".$title);
		error_log("body:".$body);
		
		$mail = new PHPMailer();
		$mail->CharSet="UTF-8";
	    
		$mail->AddReplyTo("jordanmartinez1003@gmail.com","jordanmartinez1003@gmail.com");
		$mail->SetFrom('info@servimasterpuebla.com', "info@servimasterpuebla.com");
		$mail->AddBCC("irvingedc@gmail.com" , "Irving Diaz");
		$mail->AddAddress('jordanmartinez1003@gmail.com', "jordanmartinez1003@gmail.com");
		$mail->Subject    = $title;
		$mail->AltBody    = "To view the message properly, please use an HTML compatible email viewer.";
		$mail->MsgHTML($body);                                           
		$mail->Send();
    }
    
?>