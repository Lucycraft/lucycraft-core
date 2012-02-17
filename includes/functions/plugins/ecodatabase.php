<?php
/**
 *  LUCYCRAFT CORE - ecodatabase.php
 *  http://www.lucycraft.be
 *
 *  Written by Boris Wintein & Glenn Latomme.
 */

/* -------------------
 * Configuration
 * -------------------
 */

$server = "Server IP";
$username = "Username";
$password = "Password";
$database = "Database name";

 /* -------------------
  * Don't change things below this line
  *--------------------
  */
    $link = lucy_db_connect($server, $username, $password, $database);

    /* TODO  check if connected
     * TODO  check if tabels exicst
     * TODO  check if values are set
    */

    // Close
    lucy_db_close($link);
/**
 * Outputs the money of a player
 *
 * @param $player - name of the player
 */
function getInfo($player){

}
/**
 * Outputs an # top of money
 *
 * @param $amount - how many items you want to show
 */
function GetTop($amount){

}
?>
