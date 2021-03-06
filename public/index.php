<?php
require './../conexioBD.inc.php';
require dirname(__FILE__) . "/../vendor/autoload.php";
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
?>
<html><head></head>
    <body>
        <form action="lucha.php" method="POST">
            <input type="text" name='nom1'>
            <select name="unidad1">
                <?php
                try {
                    $classes = $conn->query("SELECT * FROM Unidades");
                    foreach ($classes as $clase) {
                        echo '<option value="JuegoRol\\'. trim($clase['nom']) .'">' . $clase['nom'] . '</option>';
                    }
                } catch (PDOException $ex) {
                    echo "Fallo en la base de datos: " . $e->getMessage();
                }
                ?>
            </select>
            <select name="armadura1">
                <?php
                try {
                    $classes = $conn->query("SELECT * FROM Armaduras");
                    foreach ($classes as $clase) {
                        echo '<option value="JuegoRol\\'. $clase['nom'] .'">' . $clase['nom'] . '</option>';
                    }
                } catch (PDOException $ex) {
                    echo "Fallo en la base de datos: " . $e->getMessage();
                }
                ?>
            </select>
            <select name="arma1">
                <?php
                try {
                    $classes = $conn->query("SELECT * FROM Armas");
                    foreach ($classes as $clase) {
                        echo '<option value="JuegoRol\\'. $clase['nom'] .'">' . $clase['nom'] . '</option>';
                    }
                } catch (PDOException $ex) {
                    echo "Fallo en la base de datos: " . $e->getMessage();
                }
                ?>
            </select>
            <br/>
            <input type="text" name='nom2'>
            <select name="unidad2">
                <?php
                try {
                    $classes = $conn->query("SELECT * FROM Unidades");
                    foreach ($classes as $clase) {
                        echo '<option value="JuegoRol\\'.trim($clase['nom']).'">' . $clase['nom'] . '</option>';
                    }
                } catch (PDOException $ex) {
                    echo "Fallo en la base de datos: " . $e->getMessage();
                }
                ?>
            </select>
            <select name="armadura2">
                <?php
                try {
                    $classes = $conn->query("SELECT * FROM Armaduras");
                    foreach ($classes as $clase) {
                        echo '<option value="JuegoRol\\'. $clase['nom'] .'">' . $clase['nom'] . '</option>';
                    }
                } catch (PDOException $ex) {
                    echo "Fallo en la base de datos: " . $e->getMessage();
                }
                ?>
            </select>
            <select name="arma2">
                <?php
                try {
                    $classes = $conn->query("SELECT * FROM Armas");
                    foreach ($classes as $clase) {
                        echo '<option value="JuegoRol\\'. $clase['nom'] .'">' . $clase['nom'] . '</option>';
                    }
                } catch (PDOException $ex) {
                    echo "Fallo en la base de datos: " . $e->getMessage();
                }
                ?>
            </select>
            <input type="submit" name='boton' value="Selecciona"/>
        </form>
    </body>
</html>


