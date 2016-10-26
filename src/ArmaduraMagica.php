<?php
namespace JuegoRol;

class ArmaduraMagica implements Armadura {

    public function absorve_danyo($danyo) {
        if (rand(0, 1))
            return $danyo;
        else echo 'Esquivo ataque';
        
    }

}
