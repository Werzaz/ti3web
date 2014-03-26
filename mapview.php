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
 * 
 */

ini_set('display_errors', 'On');
include "ti3classes.php"; 
$deleted = false;

$page_title = 'TI3Web Map Viewer';
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (array_key_exists('id',$_POST)) 
    {
        $map_list = unserialize(file_get_contents('map_list'));
        $page_title = $map_list[$_POST['id']]['Name'] . ' - '. $page_title;
    }
} 
else if ($_SERVER['REQUEST_METHOD'] == 'GET') 
{
    if (array_key_exists('id',$_GET) && $_GET['mode'] !== 'new') 
    {
        $map_list = unserialize(file_get_contents('map_list'));
        $page_title = $map_list[$_GET['id']]['Name'] . ' - '. $page_title;
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<link type="text/css" rel="stylesheet" href="ti3style.css"/>
	<title><?php echo $page_title; ?></title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.23.1" />
</head>

<body>
	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
        if (file_exists('maps/map_' . htmlspecialchars($_POST['id']) 
                        . '_tmp'))
        {
            $map = unserialize(file_get_contents('maps/map_' .
                htmlspecialchars($_POST['id']) . '_tmp'));
        }
        else 
        {
            $map = unserialize(file_get_contents('maps/map_' . 
                htmlspecialchars($_POST['id'])));
        }

		$lock_case = $map->process_form($_POST);

        if ($lock_case == 2)
		{
			file_put_contents('maps/map_' . htmlspecialchars($_POST['id'])
                              . '_tmp', serialize($map));
		}
        else if ($lock_case == 5)
        {
            file_put_contents('maps/map_' . htmlspecialchars($_POST['id']),
                              serialize($map));
            unlink('maps/map_' . htmlspecialchars($_POST['id']) . '_tmp');
        }   
        else if ($lock_case == 13)
        {
            $map = unserialize(file_get_contents('maps/map_' .
                htmlspecialchars($_POST['id'])));
            unlink('maps/map_' . htmlspecialchars($_POST['id']) . '_tmp');
        }   

	}
	elseif ($_SERVER["REQUEST_METHOD"] == "GET")
	{
        if ($_GET['mode'] == 'new')
		{
			if ($_GET['name'] != '')
			{
				if (file_exists('map_list'))
				{
					$map_list = unserialize(file_get_contents('map_list'));
				}
				else
				{
					$map_list = array();
				}
				if (array_key_exists('setup', $_GET) && 
                    htmlspecialchars($_GET['setup']) == 'yes')
				{
					$map = new TI3Map(htmlspecialchars($_GET['name']), 
						count($map_list), $setup=htmlspecialchars(
                            $_GET['setup_id']), $owner=htmlspecialchars(
                                $_GET['owner']));
				}
				else
				{
					$map = new TI3Map(htmlspecialchars($_GET['name']), 
                        count($map_list), $owner=htmlspecialchars(
                            $_GET['owner']));
				}
				
				file_put_contents('maps/map_' . count($map_list), 
                                  serialize($map));
				file_put_contents('maps/map_' . count($map_list) . '_tmp', 
                                  serialize($map));
                if ($_GET['owner'] === '')
                {
                    $_GET['owner'] = 'Anonymous';
                }

				$map_list[] = array(
					'Name' => htmlspecialchars($_GET['name']),
					'Deleted' => false,
                    'Owner' => htmlspecialchars($_GET['owner'])
				);
				file_put_contents('map_list', serialize($map_list));
				$lock_case = $map->check_lock(false);
			}
		}
		elseif ($_GET['mode'] == 'load')
		{
			if (file_exists('maps/map_' . htmlspecialchars($_GET['id']) 
                            . '_tmp'))
            {
                $map = unserialize(file_get_contents('maps/map_' .
                    htmlspecialchars($_GET['id']) . '_tmp'));

            }
            else 
            {
                $map = unserialize(file_get_contents('maps/map_' . 
                    htmlspecialchars($_GET['id'])));
            }
			if (!array_key_exists('sid', $_GET))
			{
				$_GET['sid'] = false;
			}
			$lock_case = $map->check_lock(htmlspecialchars($_GET['sid']));
		}
		elseif ($_GET['mode'] == 'delete')
		{
			if (file_exists('map_list'))
			{
				$map_list = unserialize(file_get_contents('map_list'));
			}
			$map_list[htmlspecialchars($_GET['id'])]['Deleted'] = true;
			file_put_contents('map_list', serialize($map_list));
			echo '<div id="deleted_div">'
                 .'The map was removed from the list of maps. It is still '
				 . 'stored on the server. If you would like to restore the '
				 . 'map please contact ' . $ti3web_admin . '. '
                 . '<a href=' . $ti3web_url . 'index.php>'
                 . 'Return to map selection.</a>';
			$deleted = true;
		}
		if (!$deleted)
		{
			if (array_key_exists('tab', $_GET))
			{
				$map->change_tab(htmlspecialchars($_GET['tab']));
			}
			else
			{
				$map->change_tab(0);
			}
		}
	} 
	?>
	<div id="frame_div">
		<?php
        if (!$deleted)
        {	
            echo '              ';
			$map->lock_form($lock_case);
			if (!$deleted && $lock_case == 2)
			{
				echo '              ' . $map->form() . PHP_EOL;
			}
        }
		?>
	</div>
			<?php 
				if(!$deleted)
				{
					$map->show($size=50);
				}    
			?>
	<!-- <?php echo var_dump($map->prev); ?> -->
</body>

</html>
