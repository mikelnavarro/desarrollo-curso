<?php
namespace Mikelnavarro\App;

require_once __DIR__ . '/../vendor/autoload.php';
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Mailer
{
    // Atributos de Correo
    // private $mail;

    public function __construct() {
        // $this->mail = new PHPMailer(true);
    }
	public static function send(string $to, string $subject, string $body, string $alt = null)
	{
        $mail = new PHPMailer(true);

        try {
            // Configuración usando las constantes de config.php
            $mail->isSMTP();
            $mail->Host       = MAIL_HOST;
            $mail->SMTPAuth   = true;
            $mail->Username   = MAIL_USER;
            $mail->Password   = MAIL_PASS;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = MAIL_PORT;
			$mail->CharSet = 'UTF-8';
            $mail->setFrom(MAIL_FROM, MAIL_FROMNAME);
			$mail->addAddress($to);
			$mail->Subject = $subject;
			$mail->isHTML(true);
			$mail->Body = $body;
			$mail->AltBody = $alt ?? strip_tags($body);



			$mail->send();
			return true;
		} catch (Exception $e) {
			return $mail->ErrorInfo ?: $e->getMessage();
            error_log("Error de correo: " . $mail->ErrorInfo);
		}
	}
}