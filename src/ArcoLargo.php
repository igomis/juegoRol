<?php
namespace JuegoRol;

class ArcoLargo implements Arma {

    public function produce_danyo($danyo) {
        return $danyo * 1.5;
    }

}
