<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';
	require 'phpmailer/src/SMTP.php';

	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('en', 'phpmailer/language/');
	$mail->IsHTML(true);

	$mail->isSMTP();                                            //Send using SMTP
	$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
	$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
	$mail->Username   = 'dayana.push@gmail.com';                     //SMTP username
	$mail->Password   = 'sdox uzcp phaz fwed';                               //SMTP password
	$mail->SMTPSecure = 'TLS';            //Enable implicit TLS encryption
	$mail->Port       = 587;                 


	//Від кого лист
	$senderEmail = isset($_POST['email']) ? $_POST['email'] : 'no-reply@example.com';
	$senderName  = isset($_POST['name']) ? $_POST['name'] : 'Anonymous';

	// Устанавливаем заголовки
	$mail->setFrom($senderEmail, $senderName);
	$mail->addReplyTo($senderEmail, $senderName);
	//Кому відправити
	$mail->addAddress('dayana.push@gmail.com'); // Вказати потрібний E-mail
	//Тема листа
	$mail->Subject = 'Message from my Website';

	//Тіло листа
	$body = '<h1>Letter for website</h1>';

	if(trim(!empty($_POST['email']))){
		$body.='<p>email: <strong>'.$_POST['email'].'</strong></p>';
	}
	if(trim(!empty($_POST['name']))){
		$body.= '<p>name: <strong>'.$_POST['name'].'</strong></p>';
	}
	if(trim(!empty($_POST['text']))){
		$body.='<p>text: <strong>'.$_POST['text'].'</strong></p>';
	}


	$mail->Body = $body;

	//Відправляємо
	if (!$mail->send()) {
		$message = 'Error';
	} else {
		$message = 'Data sent';
	}

	$response = ['message' => $message];

	header('Content-type: application/json');
	echo json_encode($response);
?>