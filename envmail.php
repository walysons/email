<?php
date_default_timezone_set('America/Sao_Paulo');
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
function env_email($email,$nome,){
	 
	$mail = new PHPMailer(true);

	try {
		//Server settings
		$mail->SMTPDebug = 0;                                       // Enable verbose debug output
		$mail->isSMTP();                                            // Set mailer to use SMTP
		$mail->Host       = 'host.sdserver18.com ';  // Specify main and backup SMTP servers
		$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		$mail->Username   = 'accounts@economize.top';                     // SMTP username
		$mail->Password   = 'M7QrPaongDxu';                               // SMTP password
		$mail->SMTPSecure = "ssl";                                  // Enable TLS encryption, `ssl` also accepted
		$mail->Port       = 465;                                    // TCP port to connect to
		$mail->setLanguage('pt-br', '/optional/path/to/language/directory/');
		$mail->CharSet = 'UTF-8';
		//Recipients
		$mail->setFrom('accounts@economize.top', 'pizzaria'); //Alterar so aonde ta escrito pizzaria
		$mail->addAddress($email, $nome);     

		// Content
    $mail->isHTML(true);
   //pode alterar tudo aqui
    $mail->Subject = 'Cadastro Realizado com sucesso';
    $mail->Body = 'CORPO DO email';
		$mail->AltBody = 'pizzaria';
	//---------------------------------
		$mail->send();
		
	} catch (Exception $e) {
		//echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
 }
?>
