<?php
/**
 *  LUCYCRAFT CORE - install.php
 *  http://www.lucycraft.be
 *
 *  Written by Boris Wintein & Glenn Latomme.
 *
 * Description:
 * Installs a plugin.
 *
 * @param $location - location of the plugin
 * @return string the result
 */
function InstallPlugin($location){
    $output = "";
    if (is_dir($location)){

    } else {
        $output = "The given location doesn't exist";
    }
   return $output;
}