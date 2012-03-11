<!DOCTYPE html>
/**
 * LUCYCRAFT-CORE
 *
 * Written by Boris Wintein & Glenn Latomme.
 * For Lucycraft - An Adventure/Survival RPG Server.
 *
 * This is a core website system for setting up websites for Minecraft-servers.
 *
 * For full functionality we suggest using bukkit (www.bukkit.org) and it's plugins instead of the vanilla
 * Minecraft server. This system currently supports only a few core plugins, but extensions and modules will
 * be available for extra functionality.
 *
 * Without bukkit, or any other modded Minecraft server this system loses a lot of functionality and basically
 * just turns in a CMS/Blog with useless modules. It will not break but gracefully tell you that you should
 * really use plugins. It's just more awesome.
 */
<html lang="en"> 
	<head>
		<title>Lucycraft</title>
		<meta charset="utf-8" />
	</head>
		<body>
		<h1><a href="#">hostfrogs</a></h1>
		<!-- Header -->
		<?php
			include_once ('lucy_top.php');
		?>
		<!-- Content -->
		<h2>Random page title</h2>
		<h3>Random Subtitle</h3>
		<p>
			Meh <a href="#">read more ...</a>
		</p>

		<h3>Random Subtitle 2</h3>
		<p>
			What are you looking at? <a href="#">read more ...</a>
		</p>

		<h3>Random Subtitle 3</h3>
		<p>
			me? ow nice <a href="#">read more ...</a>
		</p>

		<!-- Footer -->
		<?php
			include_once('lucy_bottom.php');
		?>
	</body>
</html>