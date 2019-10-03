<?php
namespace JuegoRol;

class Soldado extends Unidad {

    protected $danyo = 20;

    public function __construct($nombre, Armadura $armadura = null, Arma $arma = null) {
        if ($arma == null)
            $this->arma = new EspadaCorta();
        else
            $this->arma = $arma;
        parent::__construct($nombre, $armadura);
    }

    public function ataque(Unidad $oponente) {
        echo "<p>$this->nombre parte en dos a " . $oponente->getNombre() . "</p>";
        $oponente->tomaAtaque($this->arma->produce_danyo($this->danyo));
    }
//    public function mueve($direction) {
//        echo "<p>$this->nombre retrocede hacia $direction</p>";
//    }

}
