<?php
ini_set('display_errors','on');
    abstract class Unidad {
        protected $puntosVida = 40;
        protected $nombre ;
        public function __construct($nombre){
            $this->nombre = $nombre;
        }
        public function mueve($direction){
            echo "<p>$this->nombre avanza hacia $direction</p>";
        }
        abstract public function ataque(Unidad $oponente);
        
        public function muere(){
            echo "<p>$this->nombre muere </p>";
            exit();
        }
        
        function getNombre() {
            return $this->nombre;
        }

        function tomaAtaque($danyo){
            $this->puntosVida -= $danyo;
            echo "<p>$this->nombre tiene ahora $this->puntosVida</p>";
            if ($this->puntosVida <= 0) $this->muere ();
        }
    }
    class Soldado extends Unidad{
        protected $danyo = 20;
        protected $armadura;
        
        function __construct($name,Armadura $armadura = null) {
            $this->armadura = $armadura;
            parent::__construct($name);
        }

        public function ataque(Unidad $oponente) {
            echo "<p>$this->nombre parte en dos a ".$oponente->getNombre()."</p>";
            $oponente->tomaAtaque($this->danyo);
        }
        public function tomaAtaque($danyo) {
            if ($this->armadura){
                $danyo = $this->armadura->absorve_danyo($danyo);
            }
            parent::tomaAtaque($danyo);
        }
        function setArmadura($armadura) {
            $this->armadura = $armadura;
        }
    }
    class Arquero extends Unidad{
        protected $danyo = 20;
        public function ataque(Unidad $oponente) {
            echo "<p>$this->nombre dispara una flecha a".$oponente->getNombre()."</p>";
            $oponente->tomaAtaque($this->danyo);
         }
         public function tomaAtaque($danyo) {
             if (rand(0,1)) parent::tomaAtaque($danyo);
             else echo "<p>$this->nombre esquiva ataque</p>";
         }

    }
    interface Armadura{
        public function absorve_danyo($danyo);
    }
    class ArmaduradeBronze implements Armadura{
        public function absorve_danyo($danyo){
            return $danyo / 2;
        }
    }
    class ArmaduradePlata implements Armadura{
        public function absorve_danyo($danyo){
            return $danyo / 3;
        }
    }
    $u2 = new Arquero('Sam');
    $u1 = new Soldado('Rambo',new ArmaduradeBronze());
    
    do {
    $u2->ataque($u1);
    $u1->ataque($u2);
    } while (1==1);
   