<?php
namespace JuegoRol;

class EspadaLarga implements Arma {
    public function produce_danyo($danyo) {
        return $danyo * 2;
    }
}
