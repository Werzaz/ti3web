<?php
/*
 * mapview.php
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
 * Note: This page is for administrative purposes. As there is no
 * authentication yet, please restriction access to the admin folder.
 * 
 */

ini_set('display_errors', 'On');
//error_reporting(E_ALL ^ E_NOTICE);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<link type="text/css" rel="stylesheet" href="../ti3style.css"/>
	<title>TI3Web Map Admin</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        echo var_dump($_POST);
    }
    ?>
    <form action="ti3web_admin.php" method="post" id="admin"><table>
    <tr><th>#</th><th>Name</th><th>Owner</th><th>Deleted</th></tr>
    <?php
    $map_list = unserialize(file_get_contents('../map_list'));
    foreach ($map_list as $k => $map)
    {
        echo '<tr>';
        echo '<td>' . $k . '</td>';
        echo '<td><input type="text" name="name_' . $k . '" '
             . 'value="' . $map['Name'] . '"></td>';
        if (array_key_exists('Owner', $map))
        {
            echo '<td><input type="text" name="owner_' . $k . '" '
                 . 'value="' . $map['Owner'] . '"></td>';
        }
        else
        {
            echo '<td><input type="text" name="owner_' . $k . '" '
                 . 'value="Anonymous"></td>';
        }
        echo '<td><input type="checkbox" name="deleted_' . $k . '" '
             . 'value="true"';
        if ($map['Deleted'])
        {
            echo ' checked';
        }
        echo '></td>';
        echo '</tr>';
    }
    ?>
    </table></form>
</body>

</html>