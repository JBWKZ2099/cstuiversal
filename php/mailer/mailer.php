<?php
	include("../header.lib.php");
	header('Content-Type: text/html; charset=utf-8');

	//SMTP needs accurate times, and the PHP time zone MUST be set
	//This should be done in your php.ini, but this is how to do it if you don't have access to that
	date_default_timezone_set("America/Mexico_City");
	setlocale(LC_ALL, "es_ES.UTF-8");
	ini_set("display_errors",$_SESSION["d_errors"]);

	$_SESSION["_errors"] = "<ul>";
	$_errors = 0;

	// $_POST["name"] = "Ivan Ramírez";
	// $_POST["email"] = "ivan_amigue@hotmail.com";
	// $_POST["subject"] = "Viajes redondos";
	// $_POST["msg"] = "Mensaje de prueba.";

	if( !isset($_POST["name"]) && empty($_POST["name"]) ) {
		$_errors++;
		$_SESSION["_errors"] .= "<li>El campo <b>Nombre</b> es requerido.</li>";
	}
	if( !isset($_POST["email"]) && empty($_POST["email"]) ) {
		$_errors++;
		$_SESSION["_errors"] .= "<li>El campo <b>Correo</b> es requerido.</li>";
	}
	if( !isset($_POST["msg"]) && empty($_POST["msg"]) ) {
		$_errors++;
		$_SESSION["_errors"] .= "<li>El campo <b>Mensaje</b> es requerido.</li>";
	}

	if( $_SESSION["recaptcha"]=="v3" ) {
		if( !isset($_POST["action"]) && empty($_POST["action"]) && $_POST["action"]!="get_in_touch" ) {
			$_errors++;
			$_SESSION["_errors"] .= "<li>Ocurrió un error, por favor intentalo de nuevo.</li>";
		}
	} else {
		// if( isset($_POST["g-recaptcha-response"]) && !empty($_POST["g-recaptcha-response"]) ) {} else {
		if( !isset($_POST["g-recaptcha-response"]) && empty($_POST["g-recaptcha-response"]) ) {} else {
			$_errors++;
			$_SESSION["_errors"] .= "<li> Por favor da click en el reCaptcha. </li>";
		}
	}

	// $_errors = 0;
	// dd( $_errors );

	if( $_errors==0 ) {
		// Global variables
			$company = $env->APP_NAME;
			$webmaster = $env->MAIL_USER;
			$wm_name = "Contacto Web - $company";
			$wm_password = $env->MAIL_PASSWORD;
			$production = $env->APP_ENV;
			$debug = 2;
		// Global variables

		// Mail method
		$phpmailer = false;

		//web site secret key
		$secret = $env->GRECAPTCHA_SECRET;
		//get verify response data
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$params = array( "secret"=>$secret, "response"=>$_POST["g-recaptcha-response"] );
		curl_setopt( $ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify" );
		curl_setopt( $ch, CURLOPT_POST, true );
		curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query($params) );
		$result = curl_exec( $ch );

		if( $_SESSION["recaptcha"]=="v3" )
			$response_data = json_decode( $result )->success;
		else
			$response_data = json_decode( $result );

		// $response_data = true;
		// dd( $_POST );
		// dd( $response_data );

		/*success*/
		if( $response_data ) {
			if( $production ) {
				$mail_data_arr = array(
					"webmaster" => true,
					"main" => "ricardo.mateos.r@gmail.com",
				);

			} else {
				$mail_data_arr = array(
					"webmaster" => true,
					"main" => "ivan_amigue@hotmail.com",
				);
			}

			$mysqli = Connection::conectar_db();
			Connection::selecciona_db($mysqli);
			$data = array(
				'NULL',
				"'".$name = $_POST["name"]."'",
				"'".$usr_mail = $_POST["email"]."'",
				"'".$mensaje = $_POST["msg"]."'",
				"'".Times::setTimeStamp()."'",
				'NULL',
				'NULL',
			);
			DB::registro_nuevo("contact", $data, $columna=null);

			$supplier_data = json_decode(json_encode(array(
				"webmaster" => false,
				"name" => $_POST["name"],
				"usr_mail" => $_POST["email"],
				"msg" => $_POST["msg"],
			)), FALSE);


			$mail_data = json_decode(json_encode($mail_data_arr), FALSE);

			if( $phpmailer ) {
				require 'PHPMailerAutoload.php';
				sendMailCustom($supplier_data, $supplier_data);
				sendMailCustom($mail_data, $supplier_data);
			} else {
				sendMailDefault($supplier_data, $supplier_data);
				sendMailDefault($mail_data, $supplier_data);
			}

			$errors = 0;
			unset($_SESSION["_errors"]);
			$_SESSION["_success"] = true;
			$_SESSION["thanks_message"] = "¡Muchas gracias por su interés! En breve nos comunicaremos con usted.";
		} else { /*error*/
			if( $_SESSION["recaptcha"]=="v3" )
				$_SESSION["_errors"] .= "<li> Ocurrió un error al verificar el reCaptcha, por favor intentalo de nuevo. </li>";
			else
				$_SESSION["_errors"] .= "<li> Ocurrió un error, por favor intentalo de nuevo. </li>";
			$_SESSION["_errors"] .= "</ul>";
			header("Location: ../../");
		}
	} else {
		$_SESSION["_errors"] .= "</ul>";
	}

	if( $_errors==0 )
		header("Location: ../../gracias");
	else
		header("Location: ../../");


	// PHPMailer
	function sendMailCustom($_mail, $_supplier_data) {
		global $webmaster;
		global $wm_name;
		global $wm_password;
		global $company;
		global $debug;

		//Create a new PHPMailer instance
		$mail = new PHPMailer;

		//Set Charset
		$mail->CharSet = "UTF-8";

		//Tell PHPMailer to use SMTP
		$mail->isSMTP();

		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug = $debug;

		//Ask for HTML-friendly debug output
		$mail->Debugoutput = 'html';

		//Set the hostname of the mail server
		$mail->Host = 'a2plcpnl0774.prod.iad2.secureserver.net';
		// use
		// $mail->Host = gethostbyname('smtp.gmail.com');
		// if your network does not support SMTP over IPv6

		//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
		$mail->Port = 25;

		//Set the encryption system to use - ssl (deprecated) or tls
		$mail->SMTPSecure = 'tls';

		//Whether to use SMTP authentication
		$mail->SMTPAuth = false;

		//Username to use for SMTP authentication - use full email address for gmail
		// $mail->Username = $webmaster;

		//Password to use for SMTP authentication
		// $mail->Password = $wm_password;

		//Set who the message is to be sent from
		$mail->setFrom($webmaster, $wm_name);

		//Set who the message is to be sent to
		if( $_mail->webmaster ) {
			$mail->addAddress($_mail->main, $wm_name);
		} else {
			$mail->addAddress($_mail->usr_mail, $_mail->name);
		}

		if( $_mail->webmaster ) {
			// Unset the webmaster mail who will receive the mail
			unset( $_mail->main );

			// Unset webmaster to read the array correctly
			unset( $_mail->webmaster );

			//Set CC
			foreach( $_mail as $val ) {
				if( isset($val) && !empty($val) ) {
					$mail->AddCC($val[0],utf8_decode($val[1])); /* Con Copia */
					// $mail->AddBCC($val);  /* Con Copia Oculta */
				}
			}


			$subject = "Recientemente se pusieron en contacto";
			$initial = utf8_encode( file_get_contents("html_files/admin.php") );
			$initial1 = str_replace("%company%", $company, $initial);
			$initial2 = str_replace("%name%", $_supplier_data->name, $initial1);
			$initial3 = str_replace("%email%", $_supplier_data->usr_mail, $initial2);
			$body_file = str_replace("%msg%", $_supplier_data->msg, $initial3);
			$alt_body = "Se pusieron en contacto contigo.";
		} else {
			// Unset webmaster to read the array correctly
			unset( $_mail->webmaster );
			$subject = "Contacto Web - ".$company;
			$initial = utf8_encode( file_get_contents("html_files/supplier.php") );
			$body_file = str_replace("%company%", $company, $initial);
			$alt_body = "¡Muchas gracias por su interés! En breve nos comunicaremos con usted.";
		}

		//Set the subject line
		$mail->Subject = $subject;

		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		// $mail->msgHTML( $body_file, dirname(__FILE__) );
		$mail->msgHTML( $body_file );

		//Replace the plain text body with one created manually
		$mail->AltBody = $alt_body;

		// Debug $mail var
		// $root = realpath($_SERVER["DOCUMENT_ROOT"])."/";
		// require $root."php/vendor/autoload.php";
		// dd($mail->send());

		// Send mail
		$mail->send();

		//send the message, check for errors
		/*if (!$mail->send()) {
		    echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
		    echo "Message sent!";
		}*/
	}

	// mail() native function
	function sendMailDefault($_mail, $supplier_data) {
		global $webmaster;
		global $company;

		$headers = "MIME-Version: 1.0"."\r\n".
							 "Content-type: text/html; charset=utf-8"."\r\n";

		//Set who the message is to be sent to
		if( $_mail->webmaster ) {
			$to = $_mail->main;
			$subject = "Recientemente se pusieron en contacto";
			$headers .= "From: noreply@cstuniversal.mx\r\n";
			$initial = utf8_encode( file_get_contents("html_files/admin.php") );
			$initial1 = str_replace("%company%", $company, $initial);
			$initial2 = str_replace("%name%", $_supplier_data->name, $initial1);
			$initial3 = str_replace("%email%", $_supplier_data->email, $initial2);
			$body_file = str_replace("%msg%", $_supplier_data->msg, $initial3);
		} else {
			$to = $_mail->usr_mail;
			$subject = "Recientemente se pusieron en contacto";
			$headers .= "From: Contacto Web - ".$company."<noreply@cstuniversal.mx>\r\n";
			$initial = utf8_encode( file_get_contents("html_files/supplier.php") );
			$body_file = str_replace("%company%", $company, $initial);
		}

		$headers .= "X-Mailer: PHP/".phpversion();

		$mail_response = mail($to, $subject, $body_file, $headers);
	}
?>
