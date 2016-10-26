<?php
namespace JuegoRol;

class ArmaduradePlata implements Armadura {

    public function absorve_danyo($danyo) {
        return $danyo / 3;
    }

}
