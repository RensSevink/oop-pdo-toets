<?php
require '../functions.php';
use OOP\classes\Database;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    $db = new Database();
    try {
    $db->query('INSERT INTO `rollercoaster` (`id`, `nameRollerCoaster`, `nameAmusementPark`, `country`, `topspeed`, `height`) VALUES (NULL, :nameRollerCoaster, :nameAmusementPark, :country, :topspeed, :height)');


    $db->bind(':nameRollerCoaster', trim($_POST['nameRollerCoaster']), PDO::PARAM_STR);
    $db->bind(':nameAmusementPark', trim($_POST['nameAmusementPark']), PDO::PARAM_STR);
    $db->bind(':country', trim($_POST['country']), PDO::PARAM_STR);
    $db->bind(':topspeed', trim($_POST['topspeed']), PDO::PARAM_INT);
    $db->bind(':height', trim($_POST['height']), PDO::PARAM_INT);
    $db->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>

<h3> Voeg een achtbaan toe </h3>
<form action="./create.php" method="post">
  <label for="rollerCoasterID">Achtbaan:</label><br>
  <input type="text" id="rollerCoasterID" name="nameRollerCoaster" value=""><br>

  <label for="amusementParkID">Pretpark:</label><br>
  <input type="text" id="amusementParkID" name="nameAmusementPark" value=""><br>

  <label for="countryID">Land:</label><br>
  <input type="text" id="countryID" name="country" value=""><br>

  <label for="topspeedID">Snelheid (km/u):</label><br>
  <input type="number" id="topspeedID" name="topspeed" value=""><br>

  <label for="heightID">Hoogte (m):</label><br>
  <input type="number" id="heightID" name="height" value=""><br>

  <input name="submit" type="submit" value="Submit">
</form> 
<a href="./index.php">Terug naar de top 5</a>