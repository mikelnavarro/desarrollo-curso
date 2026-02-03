<?php

namespace Acme\IntranetRestaurante\Models;
class LineaCarrito {
    public $producto_id;
    public $nombre;
    public $precio;
    public $unidades;

    public function __construct($producto_id, $nombre, $precio, $unidades) {
        $this->producto_id = $producto_id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->unidades = $unidades;
    }
}
