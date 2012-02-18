<?php
/**
 *  LUCYCRAFT CORE - general.php
 *  http://www.lucycraft.be
 *
 *  Written by Boris Wintein & Glenn Latomme.
 *
 */

    function lucy_mc_plugins () {

        if (is_dir(LUCY_MC_FOLDER)) {


        } else {
            lucy_error("I can't find where you installed Minecraft!");
        }
    }


    function lucy_error($lucysays) {

        echo 'Auwtch. Something just went wrong.<br />';
        echo 'Lucy says: ' . $lucysays;
        die ('LUCY STOPPED');
    }