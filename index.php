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
include 'include/ti3constants.php';
include 'ti3config.php'; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <link type="text/css" rel="stylesheet" href="ti3style.css"/>
    <title>TI3Web Map Viewer</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="generator" content="Geany 1.23.1" />
</head>

<body>
    <div id="index_div" class="index">
    <h2 style="text-align:center;">TI3Web Map Viewer</h2>
    <form action="mapview.php" method="get" id="map">
    Username:
    <input type="text" name="owner"><br>
        <input id="mode_new" type="radio" name="mode" value="new" checked> 
        New map: <input type="text" name="name" onkeydown="this.form.mode_new.checked = true;"><br>
        <?php
            echo '<input id="setup_help" type="checkbox" name="setup" value="yes"> ';
            echo 'Setup patterns: <select name="setup_id" form="map" onclick="this.form.setup_help.checked = true;">' 
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
                echo 'Saved maps: <select name="id" form="map" '
                     . 'onclick="this.form.mode_load.checked = true;">' 
                     . PHP_EOL;
                $map_list = unserialize(file_get_contents('map_list'));
                foreach ($map_list as $k => $map)
                {
                    if ($_SERVER['REQUEST_METHOD'] == 'POST')
                    {
                        if ($_POST['user'] == 'All' && !$map['Deleted'])
                        {
                            echo '<option value="' . $k . '">';
                            echo $map['Name'];
                            echo '</option>' . PHP_EOL;
                        }
                        else if ($_POST['user'] == $map['Owner'] 
                                 && !$map['Deleted'])
                        {
                            echo '<option value="' . $k . '">';
                            echo $map['Name'];
                            echo '</option>' . PHP_EOL;
                        }
                    }
                    else
                    {
                        if (!$map['Deleted'])
                        {
                            echo '<option value="' . $k . '">';
                            echo $map['Name'];
                            echo '</option>' . PHP_EOL;
                        }
                    }
                }
                echo '</select><br>' . PHP_EOL;
                echo '<input id="mode_load" type="radio" name="mode" '
                     . 'value="load"> ';
                echo 'Load map' . PHP_EOL;
                echo '<input id="mode_delete" type="radio" name="mode" '
                     . 'value="delete"> ';
                echo 'Delete map' . PHP_EOL;
            }
        ?><br>
        <input type="submit" value="Submit">
    </form>
    <br>
    <form action="index.php" method="post" id="filter">
        <?php
            $user_list = array();
            foreach ($map_list as $k => $map)
            {
                if (!in_array($map['Owner'], $user_list))
                {
                    $user_list[] = $map['Owner'];
                }
            }
            natcasesort($user_list);
            
            echo 'Filter maps by user: ' . PHP_EOL;
            echo '<select name="user" form="filter" onchange="this.form.submit();">'
                 . PHP_EOL;
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                if ($_POST['user'] == 'All')
                {
                    echo '<option value="All" selected>All</option>' . PHP_EOL;
                }
                else
                {
                    echo '<option value="All">All</option>' . PHP_EOL;
                }
                foreach ($user_list as $user)
                {
                    if ($_POST['user'] == $user)
                    {
                        echo '<option value="' . $user . '" selected>' .$user 
                             . '</option>' . PHP_EOL; 
                    }
                    else
                    {
                        echo '<option value="' . $user . '">' .$user . '</option>'
                             . PHP_EOL;   
                    }
                }
            }
            else
            {
                echo '<option value="All" selected>All</option>' . PHP_EOL;
                foreach ($user_list as $user)
                {
                    echo '<option value="' . $user . '">' .$user . '</option>'
                         . PHP_EOL; 
                }
            }
            echo '</select>';
        ?>
    </form></div>
    <div id="footer_div" class="index">
        <?php echo $footer_text;?>
    </div>
</body>

</html>
