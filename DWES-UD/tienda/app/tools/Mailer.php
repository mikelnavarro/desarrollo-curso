<?php
namespace Mikelnavarro\App;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Mailer
{
    // Atributos de Correo
    private $mail;

    public function __construct() {
        $this->mail = new PHPMailer(true);

        // Configuración usando las constantes de config.php
        $this->mail->isSMTP();
        $this->mail->Host       = MAIL_HOST;
        $this->mail->SMTPAuth   = true;
        $this->mail->Username   = MAIL_USER;
        $this->mail->Password   = MAIL_PASS;
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port       = MAIL_PORT;
        $this->mail->CharSet = 'UTF-8';
        $this->mail->setFrom(MAIL_FROM, MAIL_FROMNAME);

    }
	public static function send(string $to, $idPedido, array $itemsCarrito, array $resumen, array $envio, string $alt = null)
	{
        try {
            // Direccion de correo electronico
			$mail->addAddress($to);
            // Asunto del Correo
            $mail->Subject = "Confirmación de Pedido Tienda";

            // Construcción del cuerpo del mensaje
            $html = "<h3>¡Gracias por tu compra, {$to}!</h3>";
            $html .= "<p>Tu pedido <strong>$idPedido</strong> ha sido procesado</p>";
            $html .= "<table>";

            $html .= "<p><b>Método de Pago: - {$envio["metodo"]}</b></p>";
            $html .= "<p><strong>Cantidad de artículos: {$resumen['cantidad_articulos']}</strong></b>";
            $html .= "<p><strong>Total a pagar:</strong>{$resumen['total']}</p>";
            $html .= "<p><b>Dirección de Envío: {$envio["direccion"]}</b></p>";
            // es html
			$mail->isHTML(true);

            // cuerpo del mensaje
			$mail->Body = $html;
            // el cuerpo alternativo
			$mail->AltBody = $alt ?? strip_tags($html);

			$mail->send();
			return true;
		} catch (Exception $e) {
			return $mail->ErrorInfo ?: $e->getMessage();
            error_log("Error de correo: " . $mail->ErrorInfo);
		}
	}
}