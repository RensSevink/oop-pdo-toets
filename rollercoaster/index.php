<?php

    require '../functions.php';
    use OOP\classes\Database;

    $db = new Database();

    $db->query("SELECT `id`, `nameRollerCoaster`, `nameAmusementPark`, `country`, `topspeed`, `height` FROM `rollercoaster` ORDER BY `topspeed` desc");

    $db->resultSet();

    $tbody = '';
    foreach ($db->resultSet() as $value) {
        $tbody .= "<tr>
                    <td>{$value->id}</td>
                    <td>{$value->nameRollerCoaster}</td>
                    <td>{$value->nameAmusementPark}</td>
                    <td>{$value->country}</td>
                    <td>{$value->topspeed}</td>
                    <td>{$value->height}</td>
                    </tr>";
    }

?>
<a href="./create.php">Voeg een achtbaan toe</a>
<h3>De 5 snelste achtbanen van Europa</h3>
  
  <table>
      <thead>
            <th>id</th>
            <th>Achtbaan</th>
            <th>Pretpark</th>
            <th>Land</th>
            <th>Snelheid (km/u)</th>
            <th>Hoogte (m)</th>
        </thead>
        <tbody>
            <?= $tbody ?>
        </tbody>
    </table>