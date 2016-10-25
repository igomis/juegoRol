<?php
ini_set('display_errors', 'on');

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

}

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

interface Armadura {

    public function absorve_danyo($danyo);
}

class ArmaduradeBronze implements Armadura {

    public function absorve_danyo($danyo) {
        return $danyo / 2;
    }

}

class ArmaduradePlata implements Armadura {

    public function absorve_danyo($danyo) {
        return $danyo / 3;
    }

}

class ArmaduraBasica implements Armadura {

    public function absorve_danyo($danyo) {
        return $danyo;
    }

}

class ArmaduraMagica implements Armadura {

    public function absorve_danyo($danyo) {
        if (rand(0, 1))
            return $danyo;
        else echo 'Esquivo ataque';
        
    }

}

interface Arma {
    public function produce_danyo($danyo);
}

class EspadaLarga implements Arma {
    public function produce_danyo($danyo) {
        return $danyo * 2;
    }
}

class EspadaCorta implements Arma {

    public function produce_danyo($danyo) {
        return $danyo;
    }

}

class ArcoLargo implements Arma {

    public function produce_danyo($danyo) {
        return $danyo * 1.5;
    }

}

class Ballesta implements Arma {

    public function produce_danyo($danyo) {
        return $danyo * 2;
    }

}

class Arco implements Arma {

    public function produce_danyo($danyo) {
        return $danyo;
    }

}
?>
<html><head></head>
    <body>
        <?php
        if (isset($_REQUEST['boton'])) {
            $u1 = new $_REQUEST['unidad1']($_REQUEST['nom1'], new $_REQUEST['armadura1'](), new $_REQUEST['arma1']());
            $u2 = new $_REQUEST['unidad2']($_REQUEST['nom2'], new $_REQUEST['armadura2'](), new $_REQUEST['arma2']());
            do {
                $u2->ataque($u1);
                $u1->ataque($u2);
            } while (1 == 1);
        }
        ?>
        <?php
        $classes = get_declared_classes();
        ?>
        <form action="index.php">
            <input type="text" name='nom1'>
            <select name="unidad1">
                <?php
                foreach ($classes as $clase) {
                    if (get_parent_class($clase) == 'Unidad')
                        echo '<option value="' . $clase . '">' . $clase . '</option>';
                }
                ?>
            </select>
            <select name="armadura1">
                <?php
                 foreach ($classes as $clase) {
                    if (is_subclass_of($clase, 'Armadura'))
                        echo '<option value="' . $clase . '">' . $clase . '</option>';
                }
                ?>
            </select>
            <select name="arma1">
                <?php
               foreach ($classes as $clase) {
                    if (is_subclass_of($clase, 'Arma'))
                        echo '<option value="' . $clase . '">' . $clase . '</option>';
                }
                ?>
            </select>
            <br/>
            <input type="text" name='nom2'>
            <select name="unidad2">
                <?php
                foreach ($classes as $clase) {
                    if (get_parent_class($clase) == 'Unidad')
                        echo '<option value="' . $clase . '">' . $clase . '</option>';
                }
                ?>
            </select>
            <select name="armadura2">
                <?php
                foreach ($classes as $clase) {
                    if (is_subclass_of($clase, 'Armadura'))
                        echo '<option value="' . $clase . '">' . $clase . '</option>';
                }
                ?>
            </select>
            <select name="arma2">
                <?php
                 foreach ($classes as $clase) {
                    if (is_subclass_of($clase, 'Arma'))
                        echo '<option value="' . $clase . '">' . $clase . '</option>';
                }
                ?>
            </select>
            <input type="submit" name='boton' value="Selecciona"/>
        </form>
    </body>
</html>


