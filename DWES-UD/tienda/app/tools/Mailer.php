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
	public static function send(string $to, array $itemsCarrito, array $resumen, array $envio, string $alt = null)
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
            // Direccion de correo electronico
			$mail->addAddress($to);

            // Asunto del Correo
            $mail->Subject = "Confirmación de Pedido Tienda";

            // Construcción del cuerpo del mensaje
            $html = "<h1>¡Gracias por tu compra, {$to['usuario_nombre']}!</h1>";
            $html .= "<p>Tu pedido ha sido recibido.</p>";
            $html .= "<table border='1' cellpadding='10' style='border-collapse: collapse;'>
                        <tr><th>Producto</th><th>Cant.</th><th>Precio</th></tr>";

            foreach ($itemsCarrito as $producto) {
                $html .= "<tr><td>{$producto['nombre']}</td><td>{$producto['Cantidad']}</td><td>{$producto['Precio']}</td></tr>";
            }
            $html .= "</table>";
            $html .= "<p><b>Método de Pago: - {$envio["metodo_pago"]}</b></p>";
            $html .= "<p><strong>Total a pagar:</strong>${$resumen['total']}</p>"
            $html .= "<p><b>{$envio["direccion"]}</b></p>";
			$mail->isHTML(true);
			$mail->Body = $html;
			$mail->AltBody = $alt ?? strip_tags($html);

			$mail->send();
			return true;
		} catch (Exception $e) {
			return $mail->ErrorInfo ?: $e->getMessage();
            error_log("Error de correo: " . $mail->ErrorInfo);
		}
	}
}