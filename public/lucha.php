<?php
namespace JuegoRol;
require dirname(__FILE__) . "/../vendor/autoload.php";
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

if (isset($_REQUEST['boton'])) {
            $u1 = new $_REQUEST['unidad1']($_REQUEST['nom1'],new $_REQUEST['armadura1'](), new $_REQUEST['arma1']());
            $u2 = new $_REQUEST['unidad2']($_REQUEST['nom2'],new $_REQUEST['armadura2'](), new $_REQUEST['arma2']());
            $u3 = new Soldado('Natxo');
            do {
                $u2->ataque($u1);
                $u1->ataque($u2);
            } while (1 == 1);
        }
