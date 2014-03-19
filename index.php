<?php
/*
 * index.php
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

ini_set('display_errors', 'On');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>TI3Web Map Viewer</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="generator" content="Geany 1.23.1" />
</head>

<body>
    <form action="mapview.php" method="get" id="map">
        <input type="radio" name="mode" value="new" checked> New map: 
        <input type="text" name="name"><br>
        <?php
            $setup_help = unserialize(file_get_contents('setup_help'));
            echo '<input type="checkbox" name="setup" value="yes"> ';
            echo 'Setup patterns: <select name="setup_id" form="map">' 
                 . PHP_EOL;
            foreach ($setup_help as $k => $dump)
            {
                echo '<option value="' . $k . '">';
                echo $setup_help[$k]['Name'];
                echo '</option>' . PHP_EOL;
            }
            echo '</select><br>' . PHP_EOL;
            if (file_exists('map_list'))
            {
                echo 'Saved maps: <select name="id" form="map">' . PHP_EOL;
                $map_list = unserialize(file_get_contents('map_list'));
                for ($k = 0; $k < count($map_list); $k++)
                {
                    /*echo '            ';*/
                    if (!$map_list[$k]['Deleted'])
                    {
                        echo '<option value="' . $k . '">';
                        echo $map_list[$k]['Name'];
                        echo '</option>' . PHP_EOL;
                    }
                }
                echo '</select><br>' . PHP_EOL;
                echo '<input type="radio" name="mode" value="load"> ';
                echo 'Load map' . PHP_EOL;
                echo '<input type="radio" name="mode" value="delete"> ';
                echo 'Delete map' . PHP_EOL;
            }
        ?><br>
        <input type="submit" value="Submit">
        <!-- <input type="hidden" name="tab" value="0"> -->
    </form> 
</body>

</html>
