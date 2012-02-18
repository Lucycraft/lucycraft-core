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

/* @TODO  check if connected
 * @TODO  check if tabels exicst
 * @TODO  check if values are set
*/

/**
 * Discription:
 * Outputs the money of a player
 *
 * @param $player - Name of the player
 * @return int - Amount of money
 */
function getInfo($player){
    $query = "SELECT currency FROM money WHERE player = $player";
    $resource = lucy_db_query($query);
    if(lucy_db_num_rows($resource) == 1){
        return $resource;
    } else {
        // return error? return 0?
        return 0;
    }
}
/**
 * Discription:
 * Outputs an # top of money
 *
 * @param $amount - how many items you want to show
 * @return int|resource - The top.
 */

// return string with values, then can you here return ""
// return Players or player + money?
// If no listed ranks, output error? output nothing?
function GetTop($amount){
    $query = "SELECT currency FROM money LIMIT 0, $amount";
    $resource = lucy_db_query($query);
    if(lucy_db_num_rows($resource) > 0){
        return $resource;
    } else {
         return 0;
    }
}

// Close
lucy_db_close($link);
?>
