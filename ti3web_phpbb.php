<?php
/*
 * ti3web_phpbb.php
 * 
 * Copyright 2014 Ulrich Feindt <sunchaser@ti3pbf.com>
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301, USA.
 * 
 * 
 */

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
		$ti3_path = '../ti3web/';
		$num = htmlspecialchars($_GET['id']);
		
		
		include($ti3_path . 'ti3classes.php');
		$map = unserialize(file_get_contents($ti3_path . 'map_' . $num));
		$out = $map->show($size=50);
		
		return $out;
}

?>

