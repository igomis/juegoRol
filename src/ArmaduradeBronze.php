<?php
namespace JuegoRol;

class ArmaduradeBronze implements Armadura {

    public function absorve_danyo($danyo) {
        return $danyo / 2;
    }

}

