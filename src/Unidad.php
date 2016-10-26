<?php
namespace JuegoRol;

abstract class Unidad {

    protected $puntosVida = 40;
    protected $nombre;
    protected $armadura;
    protected $arma;

    public function __construct($nombre, Armadura $armadura = null) {
        $this->nombre = $nombre;
        if ($armadura == null)
            $this->armadura = new ArmaduraBasica();
        else
            $this->armadura = $armadura;
    }

    public function mueve($direction) {
        echo "<p>$this->nombre avanza hacia $direction</p>";
    }

    abstract public function ataque(Unidad $oponente);

    public function muere() {
        echo "<p>$this->nombre muere </p>";
        exit();
    }

    function getNombre() {
        return $this->nombre;
    }

    function tomaAtaque($danyo) {
        if ($this->armadura) {
            $danyo = $this->armadura->absorve_danyo($danyo);
        }
        $this->puntosVida -= $danyo;
        echo "<p>$this->nombre tiene ahora $this->puntosVida</p>";
        if ($this->puntosVida <= 0)
            $this->muere();
    }

    function setArmadura($armadura) {
        $this->armadura = $armadura;
    }

}
