<?php
/**
 *  LUCYCRAFT CORE - install.php
 *  http://www.lucycraft.be
 *
 *  Written by Boris Wintein & Glenn Latomme.
 *
 * @param $location locatoin of the plugin
 * @return string the result
 */
function InstallPlugin($location){
    $output = "";
    if (is_dir($location)){

    } else {
        $output = "The given location doesn't exicst";
    }
   return $output;
}
