<?php
/**
 *  LUCYCRAFT CORE - rewrite.php
 *  http://www.lucycraft.be
 *
 *  Written by Boris Wintein & Glenn Latomme.
 */

    include_once('includes/core/parser.php');

 // This is the rewrite engine used for lucycraft. Basically it interprets the URL and then spits out what you
 // were looking for.

    $url = $_SERVER['REQUEST_URI'];

    switch(parseUrl($url)) {

        default:

        break;

        case '404':

        exit();
        break;

    }

?>