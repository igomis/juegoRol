<?php
namespace JuegoRol;

class Arquero extends Unidad {

    protected $danyo = 20;

    public function __construct($nombre, Armadura $armadura = null, Arma $arma = null) {
        if ($arma == null)
            $this->arma = new Arco();
        else
            $this->arma = $arma;
        parent::__construct($nombre, $armadura);
    }

    public function ataque(Unidad $oponente) {
        echo "<p>$this->nombre dispara una flecha a" . $oponente->getNombre() . "</p>";
        $oponente->tomaAtaque($this->arma->produce_danyo($this->danyo));
    }

}

