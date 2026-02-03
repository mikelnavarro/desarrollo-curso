<?php
namespace Acme\IntranetRestaurante\Models;



class Carrito {
    public static function obtener() {
        if (!isset($_SESSION["carrito"])) {
            $_SESSION["carrito"] = [];
        }
        return $_SESSION["carrito"];
    }

    public static function agregar(LineaCarrito $linea) {
        $_SESSION["carrito"][] = $linea;
    }
}
