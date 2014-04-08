<?php
ini_set('display_errors', 'On');

include '../ti3classes.php';
$map_list = unserialize(file_get_contents('../map_list'));
foreach ($map_list as $k => $map_para)
{
    $map = unserialize(file_get_contents('../maps/map_' . $k));
    $map->unlock_map();
    file_put_contents('../maps/map_' . $k, serialize($map));
}

?>