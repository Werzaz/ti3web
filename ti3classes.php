<?php
/*
 * ti3classes.php
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
 */

if (!isset($ti3_path))
{
	$ti3_path = '';
}

/*$systems      = unserialize(file_get_contents($ti3_path . 'system_tiles'));
$system_types = unserialize(file_get_contents($ti3_path . 'system_types'));
$tokens       = unserialize(file_get_contents($ti3_path . 'tokens'));
$token_types  = unserialize(file_get_contents($ti3_path . 'token_types'));
$setup_help   = unserialize(file_get_contents($ti3_path . 'setup_help'));*/

include 'ti3constants.php';
include 'ti3config.php'; 

$default_prev = array(
	'x' => 0,
	'y' => 0,
	'rel_x' => 0,
	'rel_y' => 0,
	'type' => 'Regular',
	'tab' => 0,
);

function tile_position($gal_x, $gal_y, $min_x, $max_y, $size=50)
{
	$x = 3.24 * ($gal_x - $min_x) * $size;
	$y = (3.76 * ($max_y - $gal_y) + 
		  1.88 * abs(fmod($gal_x, 2))) * $size;
		
	return array('x' => $x, 'y' => $y);
}

function rel_position($rel_x, $rel_y, $size=50)
{
	$x = 3.24 * $size * (0.5 + $rel_x / 100);
	$y = 3.76 * $size * (0.5 - $rel_y / 100);
	
	return array('x' => $x, 'y' => $y);
}

class TI3Map
{
	public $name;
	public $prev = array(
		'x' => 0,
		'y' => 0,
		'rel_x' => 0,
		'rel_y' => 0,
		'type' => 'Regular',
		'tab' => 0,
        'label_checked' => false,
		/*'sid' => false;*/
	);
	private $system_list = array();
	public $file_id;
	private $owner = 'Anonymous';
	/*private $lock_sid = false;*/
	public $lock_sid = false;

	public function __construct($name, $id, $setup=false, $owner=false)
	{
		global $setup_help;
		
		$this->name = $name;
		$this->file_id = $id;
		
        if (!$owner || $owner === '') 
        {
            $this->owner = 'Anonymous';
        }
        else
        {
            $this->owner = $owner;
        }

		if ($setup !== false)
		{
			foreach ($setup_help[$setup]['Locations'] as $k => $loc_list)
			{
				foreach($loc_list as $loc)
				{
					$xy = explode(',', $loc);
					$this->add_system($k, $xy[0], $xy[1], $label=$loc);
				}
			}
		}
	}

	public function add_system($key, $gal_x, $gal_y, $label=false)
	{
		$loc = $gal_x . ',' . $gal_y;
		$this->system_list[$loc] = new TI3System($key, $gal_x, $gal_y, $label=$label);
	}

	public function form()
	{
		global $systems;
		global $system_types;
		global $tokens;
		global $token_types;
		global $_SERVER;
		
		$php_self = htmlspecialchars($_SERVER["PHP_SELF"]);
		
		$output = array();
		if ($this->prev['tab'] == 0)
		{
			$output[] = '<div id="tab_active">Systems</div>';
			$output[] = '<div id="tab_inactive"> <a href=mapview.php?mode=load&id=' 
						. $this->file_id . '&sid=' .$this->lock_sid 
						. '&tab=1>Tokens</a></div> ';
			$output[] = '<div id="form_div">';
			$output[] = '<form method="post" action="' . $php_self . '" id="change_map">';
			
			$output[]  = '<input type="hidden" name="id" value="'
					  . $this->file_id . '">';
			$output[] = '<input type="hidden" name="sid" value="'
					  . $this->lock_sid . '">';
			$output[] = '<input type="hidden" name="tab" value="0">';
			
			$output[] = 'System location:<br>';
			$output[] = '<table cellpadding="0" cellspacing="0" border="0">';
			$output[] = '<tr>';
			$output[] = '<td rowspan="2"> X: <input type="text" name="x" value="' 
					  . $this->prev['x'] . '" style="width:40px;height:30px;'
					  . 'font-weight:bold;" /></td>';
			$output[] = '<td><input type="button" value=" &#9650; " '
					  . 'onclick="this.form.x.value++;" style="font-size:7px;'
					  . 'margin:0;padding:0;width:20px;height:18px;" ></td>';
			$output[] = '<td rowspan="2">   Y: <input type="text" name="y" value="' 
					  . $this->prev['y'] . '" style="width:40px;height:30px;'
					  . 'font-weight:bold;" /></td>';
			$output[] = '<td><input type="button" value=" &#9650; " '
					  . 'onclick="this.form.y.value++;" style="font-size:7px;'
					  . 'margin:0;padding:0;width:20px;height:18px;" ></td>';
			$output[] = '</tr>';
			$output[] = '<tr>';
			$output[] = '<td><input type=button value=" &#9660; " '
					  . 'onclick="this.form.x.value--;" style="font-size:7px;'
					  . 'margin:0;padding:0;width:20px;height:18px;" ></td>';
			$output[] = '<td><input type=button value=" &#9660; " '
					  . 'onclick="this.form.y.value--;" style="font-size:7px;'
					  . 'margin:0;padding:0;width:20px;height:18px;" ></td>';
			$output[] = '</tr>';
			$output[] = '</table>';
            if ($this->prev['label_checked'] === false)
            { 
                $output[] = '<input id="label" type="checkbox" name="label" value="yes">';
            }
            else
            {
                $output[] = '<input id="label" type="checkbox" name="label" value="yes" checked>';
            }
            $output[] = 'Add coordinate label<br>';

			$output[] = 'System type:<br>';
			
			$sorted_tiles = array();
			foreach ($system_types as $type => $dump)
			{
				$sorted_tiles[$type] = array();
			}
			foreach ($systems as $k => $system)
			{
				if (array_key_exists('type_' . $system['Type'], $this->prev)
					&& $this->prev['type_' . $system['Type']] == $k)
				{
					$sorted_tiles[$system['Type']][] = '<option value="' . $k . '" '
													   . 'selected>' 
													   . $system['Name'] . '</option>';
				} 
				else
				{
					$sorted_tiles[$system['Type']][] = '<option value="' . $k . '">' 
													. $system['Name'] . '</option>';
				}
			}
			foreach ($system_types as $type => $desc)
			{
				if ($type == $this->prev['type'])
				{
					$output[] = '<input type="radio" id="radio_' 
                              . str_replace(' ', '_', $type)
                              . '" name="type" value="' 
							  . $type . '" checked>' . $desc;
				}
				else
				{
					$output[] = '<input type="radio" id="radio_' 
                              . str_replace(' ', '_', $type)
                              . '" name="type" value="' 
							  . $type . '">' . $desc;               
				}
				$output[] = '<select name="type_' . str_replace(' ', '_', $type) 
                          . '" form="change_map" onclick="this.form.radio_' 
                          . str_replace(' ', '_', $type) . '.checked=true">';
				$output   = array_merge($output, $sorted_tiles[$type]);
				$output[] = '</select><br>';
			}

			$output[] = '<input type="submit" value="Add system" name="add"><br><br>';

			$output[] = 'Current systems:<br>';
            $output[] = '<span class="small_text">(Double-click to get '
                        . 'system coordinates.)</span>';
			$output[] = '<select name="systems[]" form="change_map" multiple>';
			foreach ($this->system_list as $loc => $system_obj)
			{
				$output[] = '<option value="' . $loc . '" ondblclick="this.form.x.value='
						   . $system_obj->gal_x . ';this.form.y.value=' . $system_obj->gal_y
						    . ';"> (' . $loc . ') '
						    /*. '(' . $system_obj->gal_x . ', ' . $system_obj->gal_y . ') '*/
						    . $system_obj->name . '</option>';
			}
			$output[] = '</select><br>';
			
			$output[] = '<input type="submit" value="Remove systems(s)" name="remove"><br>';
			$output[] = '<input type="submit" value="Swap systems" name="swap"><br>';            
			
			$output[] = '</form>';
			$output[] = '</div>';
		}
		elseif ($this->prev['tab'] == 1)
		{
			$output[] = ' <div id="tab_inactive"><a href=mapview.php?mode=load&id=' 
						. $this->file_id . '&sid=' .$this->lock_sid 
						. '&tab=0>Systems</a></div> ';
			$output[] = '<div id="tab_active">Tokens</div>';
			
			$output[] = '<div id="form_div">';
			$output[] = '<form method="post" action="' . $php_self . '" id="change_map">';
			
			$output[] = '<input type="hidden" name="id" value="'
					  . $this->file_id . '">';
			$output[] = '<input type="hidden" name="sid" value="'
					  . $this->lock_sid . '">';
			$output[] = '<input type="hidden" name="tab" value="1">';
			
			$output[] = 'Token system:<br>';
			$output[] = '<table cellpadding="0" cellspacing="0" border="0">';
			$output[] = '<tr>';
			$output[] = '<td rowspan="2"> X: <input type="text" name="x" value="' 
					  . $this->prev['x'] . '" style="width:40px;height:30px;'
					  . 'font-weight:bold;" /></td>';
			$output[] = '<td><input type="button" value=" &#9650; " '
					  . 'onclick="this.form.x.value++;" style="font-size:7px;'
					  . 'margin:0;padding:0;width:20px;height:18px;" ></td>';
			$output[] = '<td rowspan="2">   Y: <input type="text" name="y" value="' 
					  . $this->prev['y'] . '" style="width:40px;height:30px;'
					  . 'font-weight:bold;" /></td>';
			$output[] = '<td><input type="button" value=" &#9650; " '
					  . 'onclick="this.form.y.value++;" style="font-size:7px;'
					  . 'margin:0;padding:0;width:20px;height:18px;" ></td>';
			$output[] = '</tr>';
			$output[] = '<tr>';
			$output[] = '<td><input type=button value=" &#9660; " '
					  . 'onclick="this.form.x.value--;" style="font-size:7px;'
					  . 'margin:0;padding:0;width:20px;height:18px;" ></td>';
			$output[] = '<td><input type=button value=" &#9660; " '
					  . 'onclick="this.form.y.value--;" style="font-size:7px;'
					  . 'margin:0;padding:0;width:20px;height:18px;" ></td>';
			$output[] = '</tr>';
			$output[] = '</table>';
			
			$output[] = 'Relative location:<br>';
			$output[] = '<table cellpadding="0" cellspacing="0" border="0">';
			$output[] = '<tr>';
			$output[] = '<td rowspan="2"> X: <input type="text" name="rel_x" value="' 
					  . $this->prev['rel_x'] . '" style="width:40px;height:30px;'
					  . 'font-weight:bold;" /></td>';
			$output[] = '<td><input type="button" value=" &#9650; " '
					  . 'onclick="this.form.rel_x.value++;" style="font-size:7px;'
					  . 'margin:0;padding:0;width:20px;height:18px;" ></td>';
			$output[] = '<td rowspan="2">   Y: <input type="text" name="rel_y" value="' 
					  . $this->prev['rel_y'] . '" style="width:40px;height:30px;'
					  . 'font-weight:bold;" /></td>';
			$output[] = '<td><input type="button" value=" &#9650; " '
					  . 'onclick="this.form.rel_y.value++;" style="font-size:7px;'
					  . 'margin:0;padding:0;width:20px;height:18px;" ></td>';
			$output[] = '</tr>';
			$output[] = '<tr>';
			$output[] = '<td><input type=button value=" &#9660; " '
					  . 'onclick="this.form.rel_x.value--;" style="font-size:7px;'
					  . 'margin:0;padding:0;width:20px;height:18px;" ></td>';
			$output[] = '<td><input type=button value=" &#9660; " '
					  . 'onclick="this.form.rel_y.value--;" style="font-size:7px;'
					  . 'margin:0;padding:0;width:20px;height:18px;" ></td>';
			$output[] = '</tr>';
			$output[] = '</table>';
			
			$output[] = 'Token type:<br>';
			
			$sorted_tokens = array();
			foreach ($token_types as $type => $dump)
			{
				$sorted_tokens[$type] = array();
			}
			foreach ($tokens as $k => $token)
			{
				if (array_key_exists('type_' . $token['Type'], $this->prev)
					&& $this->prev['type_' . $token['Type']] == $k)
				{
					$sorted_tokens[$token['Type']][] = '<option value="' . $k . '" '
													   . 'selected>' 
													   . $token['Name'] . '</option>';
				} 
				else
				{
					$sorted_tokens[$token['Type']][] = '<option value="' . $k . '">' 
													. $token['Name'] . '</option>';
				}
			}
			foreach ($token_types as $type => $desc)
			{
				if ($type == $this->prev['type'])
				{
					$output[] = '<input type="radio" id="radio_' 
                              . str_replace(' ', '_', $type)
                              . '" name="type" value="' 
							  . $type . '" checked>' . $desc;
				}
				else
				{
					$output[] = '<input type="radio" id="radio_' 
                              . str_replace(' ', '_', $type)
                              . '" name="type" value="' 
							  . $type . '">' . $desc;               
				}
				$output[] = '<select name="type_' . str_replace(' ', '_', $type) 
						  . '" form="change_map" onclick="this.form.radio_' 
                          . str_replace(' ', '_', $type) . '.checked=true">';
				$output   = array_merge($output, $sorted_tokens[$type]);
				$output[] = '</select><br>';
			}
			
			$output[] = '<input type="submit" value="Add token" name="add"><br><br>';
	
			$output[] = 'Current tokens:<br>';
            $output[] = '<span class="small_text">(Double-click to get '
                        .'token coordinates.)</span>';
			$output[] = '<select name="tokens[]" form="change_map" multiple>';
			foreach ($this->system_list as $loc => $system_obj)
			{
				foreach ($system_obj->tokens as $k => $token_obj)
				{
					$output[] = '<option value="' . $loc . ':' . $k . '" ondblclick="this.form.x.value='
						    . $system_obj->gal_x . ';this.form.y.value=' . $system_obj->gal_y
						    . ';this.form.rel_x.value=' . $token_obj->rel_x . ';this.form.rel_y.value=' 
						    . $token_obj->rel_y . ';"> (' . $loc . ') '
							  /*. '(' . $system_obj->gal_x . ', ' . $system_obj->gal_y . ') '*/
							  . $token_obj->name . '</option>';
				}
			}
			$output[] = '</select><br>';
			
			$output[] = '<input type="submit" value="Remove token" name="remove"><br>';          
			$output[] = '<input type="submit" value="Move token" name="move"><br>';  
			
			$output[] = '</form>';
			$output[] = '</div>';
		}
		
		echo implode(PHP_EOL, $output) . PHP_EOL;
		
		/*return 0;*/
	}

	public function show($size=50)
	{
		$output = array('<div id="map_div">');
		/*$output = array();*/
		
		$max_y = false;
		$min_x = false;
		foreach ($this->system_list as $loc => $system_obj)
		{
			if (($max_y === false) || ($system_obj->gal_y > $max_y))
			{
				$max_y = $system_obj->gal_y;
			}
			if (($min_x === false) || ($system_obj->gal_x < $min_x))
			{
				$min_x = $system_obj->gal_x;
			}
		}
		foreach ($this->system_list as $loc => $system_obj)
		{
			$output[] = $system_obj->show($min_x, $max_y, $size=$size);
		}
		
		$output[] = '</div>';
		
		echo implode(PHP_EOL, $output) . PHP_EOL;
		
		/*return 0;*/
	}

	public function process_form($post)
	{
		$lock_case = $this->check_lock($post['sid']);
		switch ($lock_case)
		{
			case 0:
				return 0;
			break;
			
			case 1:
				if (array_key_exists('edit', $post))
				{
					$this->lock_map();
				}
			break;
			
			case 2:
				if (array_key_exists('done', $post))
				{
					$this->unlock_map();
					return 5; 
				}
                else if (array_key_exists('discard', $post)) 
                {
					$this->unlock_map();
					return 13; 
                }
				
				/* 
				 * If map was already locked and you keep editing,
				 * the lock should be renewed to update the timeout.   
				 */
				$this->lock_map();
			break;
			
			case 5:
				$this->unlock_map();
				return 13;
			break;
			
			default:
			
			break;
		}
		
		foreach ($this->prev as $prev_key => $prev_value)
		{
			if (array_key_exists($prev_key, $post))
			{
				$this->prev[$prev_key] = htmlspecialchars($post[$prev_key]);
			}
		}
		
		foreach ($post as $post_key => $post_value)
		{
			if(substr($post_key, 0, 5) === 'type_')
			{
				$this->prev[$post_key] = $post_value;
			}
		}
		
		if (array_key_exists('id', $post))
		{
			$this->file_id = htmlspecialchars($post['id']);
		}

        if (array_key_exists('label', $post))
        {
            $this->prev['label_checked'] = true;
        }
        else
        {
            $this->prev['label_checked'] = false;
        }

		if ($this->prev['tab'] == 0)
		{
			if (array_key_exists('add', $post))
			{
                if (array_key_exists('label', $post))
                {
                    $label = htmlspecialchars($post['x']) . ','
                           . htmlspecialchars($post['y']);
                }
                else
                {
                    $label = false;
                }
				if (array_key_exists('type', $post))
				{
					$key = $post['type_' . str_replace(' ', '_', 
						htmlspecialchars($post['type']))];
					$this->add_system($key, htmlspecialchars($post['x']),
                                      htmlspecialchars($post['y']), $label=$label);
				}
			} 
			elseif (array_key_exists('remove', $post))
			{
				if (array_key_exists('systems', $post))
				{
					foreach ($post['systems'] as $loc)
					{
						unset($this->system_list[$loc]);
					}
				}
				else
				{
					echo 'Please select at least one system.<br>' . PHP_EOL;
				}
			}
			elseif
			(array_key_exists('swap', $post))
			{
				if (array_key_exists('systems', $post) && count($post['systems']) == 2)
				{
					$old_systems = array();
					$old_x = array();
					$old_y = array();
					foreach ($post['systems'] as $loc)
					{
						$old_systems[] = $this->system_list[$loc];
						$old_x[] = $this->system_list[$loc]->gal_x;
						$old_y[] = $this->system_list[$loc]->gal_y;
					}
					$this->system_list[$post['systems'][0]] = $old_systems[1];
					$this->system_list[$post['systems'][0]]->gal_x = $old_x[0];
					$this->system_list[$post['systems'][0]]->gal_y = $old_y[0];
					$this->system_list[$post['systems'][1]] = $old_systems[0];
					$this->system_list[$post['systems'][1]]->gal_x = $old_x[1];
					$this->system_list[$post['systems'][1]]->gal_y = $old_y[1];
				}
				else
				{
					echo 'Please select two systems.<br>' . PHP_EOL;
				}
			}
			elseif (array_key_exists('edit', $post))
			{
				$this->lock_map();
			}
			/*elseif (array_key_exists('done', $post) &&
                    array_key_exists('discard', $post))
			{
				$this->unlock_map();
            }*/
		}
		elseif ($this->prev['tab'] == 1)
		{
			if (array_key_exists('add', $post))
			{
				if (array_key_exists('type', $post))
				{
					$key = htmlspecialchars($post['type_' 
						 . str_replace(' ', '_', 
						 htmlspecialchars($post['type']))]);
					$loc = htmlspecialchars($post['x']) 
						 . ',' . htmlspecialchars($post['y']);
					if (array_key_exists($loc, $this->system_list))
					{
						$this->system_list[$loc]->add_token($key, 
							htmlspecialchars($post['rel_x']),
							htmlspecialchars($post['rel_y']));
					}
					else
					{
						echo 'Error: There is no system at ' . $loc . '.<br>' 
							 . PHP_EOL;
					}
				}
			}
			elseif (array_key_exists('remove', $post))
			{
				if (array_key_exists('tokens', $post))
				{
					foreach ($post['tokens'] as $token)
					{
						$loc_id = explode(':', htmlspecialchars($token));
						$this->system_list[$loc_id[0]]->
							remove_token(htmlspecialchars($loc_id[1]));
					}
					if (count($post['tokens']) == 0)
					{
						echo 'Please select at least one token.<br>' . PHP_EOL;
					}
				}
			}
			elseif (array_key_exists('move', $post))
			{
				if (array_key_exists('tokens', $post))
				{
					if (count($post['tokens']) == 1)
					{
						$loc_id = explode(':', htmlspecialchars($post['tokens'][0]));
						$new_loc = htmlspecialchars($post['x'])
								 . ',' . htmlspecialchars($post['y']);
						if (array_key_exists($new_loc, $this->system_list))
						{
							if ($loc_id[0] == $new_loc)
							{
								$this->system_list[$loc_id[0]]->tokens[$loc_id[1]]->
									move_token(htmlspecialchars($post['rel_x']),
										htmlspecialchars($post['rel_y']));
							}
							else
							{
								$this->system_list[$new_loc]->add_token(-1, 
									htmlspecialchars($post['rel_x']),
									htmlspecialchars($post['rel_y']),
									$from_string=serialize($this->
										system_list[$loc_id[0]]->
											tokens[$loc_id[1]]));
								$this->system_list[$loc_id[0]]->remove_token(
									$loc_id[1]);
							}
						}
						else
						{
							echo 'Error: There is no system at ' . $new_loc
							. '.<br>' . PHP_EOL;
						}
					}
					else
					{
						echo 'Please select a single token.<br>' . PHP_EOL;
					}
				}
			}
		}
	
	return 2;
	}
	
	public function change_tab($tab)
	{
		$this->prev['tab'] = $tab;
		if ($tab == 0)
		{
			$this->prev['type'] = 'Regular';
		}
		elseif ($tab == 1)
		{
			$this->prev['type'] = 'Wormhole';
		}
		
		return 0;
	}
	
	public function lock_map()
	{
		$this->lock_sid = uniqid() . dechex(rand(0, 1048575));
		
		return 0;
	}
	
	public function unlock_map()
	{
		global $default_prev;
		
		$this->lock_sid = false;
		$this->prev = $default_prev;
		
		return 0;
	}
	
	public function check_lock($sid, $quiet=false)
	{
		/*
		 * Returns a code for the state of the map.
		 * +1 if the map is not locked
		 * +2 if you are currently editing
		 * +4 if the map has just been unlocked
		 * +8 if the map should not be saved
		 * 
		 * The cases that can occur are:
		 * 0:  map is locked and you are not editing
		 * 1:  map is not locked and you are not editing
		 * 2:  map is locked and you are editing
		 * 5:  map has just been unlocked and you are not editing
		 * 13: map has just been unlocked, you are not editing
		 *     and it should not be saved
		 */
		global $lock_timeout;
		
		if (!$this->lock_sid)
		{            
			return 1;
		}
		else
		{
			$lock_time = hexdec(substr($this->lock_sid,0,8));
			if (time() < $lock_time + $lock_timeout)
			{
				if ($this->lock_sid === $sid)
				{                    
					return 2;
				}
				else
				{                        
					return 0;
				}
			}
			else
			{
				$this->unlock_map();
				return 5;
			}
		}
	}
	
	public function lock_form($case)
	{
		global $lock_timeout;
		global $ti3web_url;
		
		$lock_time = hexdec(substr($this->lock_sid,0,8));
		date_default_timezone_set('UTC');
		$locked_until = date('h:i:s A e', $lock_time + $lock_timeout);
		
		$php_self = htmlspecialchars($_SERVER["PHP_SELF"]);
		
		echo '<div id="lock_div">Forum BBCode: [mview]' . $this->file_id . '[/mview]<br>';
		echo 'Direct Link: <a href="' . $ti3web_url . 'mapview.php?'
			 . 'id=' . $this->file_id . '&mode=load">' . $ti3web_url
			 . 'mapview.php?id=' . $this->file_id . '&mode=load</a><br><br>' . PHP_EOL;
		
		switch ($case)
		{
			case 0:
				echo 'Somebody else is editing this map. It is locked until '
					 . $locked_until
					 . '. Please wait. If you accidentily closed the map viewer '
					 . 'and are now locked out, try restoring the closed tab by '
					 . 'following these <a href="http://www.howtogeek.com/125010/restore'
					 . '-recently-closed-tabs-in-chrome-firefox-opera-internet-explorer'
					 . '-9-and-safari/" target="_blank">instructions for your browser</a>.</div>'
					 . PHP_EOL;
			break;
			
			case 1:
			case 5:
            case 13:
				echo 'Nobody is editing this map. '
					 . 'Click the button to begin editing. ' . PHP_EOL
					 . '<form method="post" action="' . $php_self . '" id="lock">' . PHP_EOL
					 . '<input type="hidden" value="' . $this->file_id . '" name="id">' . PHP_EOL
					 . '<input type="hidden" value="0" name="sid">' . PHP_EOL
					 /*. '<input type="hidden" value="0" name="tab">' . PHP_EOL*/
					 . '<input type="submit" value="Edit" name="edit"></form></div>' 
					 . PHP_EOL;
			break;
			
			case 2:
				echo 'You are editing this map. It is locked until '
					 . $locked_until
					 . '. Please do not close this window because this will '
					 . 'leave the lock in place. Please click a button when you are done. ' . PHP_EOL
					 . '<form method="post" action="' . $php_self . '" id="lock">' . PHP_EOL
					 . '<input type="hidden" value="' . $this->file_id . '" name="id">' . PHP_EOL
					 . '<input type="hidden" value="' . $this->lock_sid . '" name="sid">' . PHP_EOL
					 /*. '<input type="hidden" value="0" name="tab">' . PHP_EOL*/
					 . '<input type="submit" value="Save" name="done">' . PHP_EOL
                     . '<input type="submit" value="Discard changes" name="discard"></form></div>'
					 . PHP_EOL;
			break;
		}
		
		return 0;
	}
}

class TI3System
{
	public $name;
	private $imgfile;
	public $gal_x;
	public $gal_y;
	public $planets = array();
	public $tokens = array();
	public $units = array();
	public $wormholes = array();
	private $label = false;
	
	public function __construct($key, $gal_x, $gal_y, $label=false)
	{
		global $systems;
		
		$this->gal_x = $gal_x;
		$this->gal_y = $gal_y;
		$this->name = $systems[$key]['Name'];
		$this->imgfile = $systems[$key]['File'];
        $this->label = $label;
		
		if (array_key_exists('Planets', $systems[$key]))
		{ 
			foreach ($systems[$key]['Planets'] as $planet)
			{
				$this->planets[] = new TI3Planet($planet);
			}
		}
		if (array_key_exists('Wormholes', $systems[$key]))
		{ 
			$this->wormholes = $systems[$key]['Wormholes'];
		}
	}

    public function set_label($label)
    {
        $this->label = $label;
    }
	
	public function add_token($key, $rel_x, $rel_y, $from_string=false)
	{
		if (!$from_string)
		{
			$tmp = new TI3Token($key, $rel_x, $rel_y);
		}
		else
		{
			$tmp = unserialize($from_string);
			$tmp->move_token($rel_x, $rel_y);
		}
		
		foreach ($tmp->wormholes as $wormhole)
		{
			if (in_array($wormhole, $this->wormholes))
			{
				echo 'Error: Wormhole of this type already in the system.';
				return 1;
			}
		}
		$this->tokens[] = $tmp;
		foreach ($tmp->wormholes as $wormhole)
		{
			$this->wormholes[] = $wormhole;
		}
		
		return 0;
	}
	
	public function remove_token($key)
	{
		foreach ($this->tokens[$key]->wormholes as $wormhole)
		{
			$k = array_search($wormhole, $this->wormholes);
			if ($k !== false)
			{
				unset($this->wormholes[$k]);
			}
		}
		unset($this->tokens[$key]);
		
		return 0;
	}   
	
	public function show($min_x, $max_y, $size=50, $hide_pos=false)
	{
		global $ti3_path;
		
		$output = array();
		$z = 0;
		
		$pos = tile_position($this->gal_x, $this->gal_y, $min_x, $max_y, $size);
		if ($hide_pos)
		{
			$tmp = array($this->name, '');
		} else {
			$tmp = array('(' . $this->gal_x . ',' . $this->gal_y . ') ' 
				. $this->name, '');            
		}
		foreach ($this->planets as $planet)
		{
			$tmp2 = $planet->name . ': ' . $planet->res . '/'
				  . $planet->inf;
			if (!is_null($planet->tech))
			{
				$tmp2 .= '/' . $planet->tech;
			}
			if (!is_null($planet->refresh))
			{
				$tmp2 .= ' (Refresh: ' . $planet->refresh . ')';
			}
			$tmp[] = $tmp2;              
		}
		if (count($this->wormholes) > 0)
		{
			$tmp[] = '';
			if (count($this->wormholes) == 1)
			{
				$tmp[] = 'Wormhole ' . $this->wormholes[0];
			}
			else
			{
				$tmp[] = 'Wormholes ' . implode(', ', $this->wormholes);
			}
		}
		/*$output[] = '<img style="position:absolute; top:' . $pos['y'] 
				  . 'px; left:' . $pos['x'] . 'px; z-index:' . $z 
				  . '" src="' . $ti3_path . 'images/'. $size . '/' 
				  . $this->imgfile . '" title="' 
				  . implode('&#10', $tmp) . '">';*/
		$output[] = '<div class="system_div" style="top:' . $pos['y'] 
				  . 'px; left:' . $pos['x'] . 'px; z-index:' . $z 
				  . '; background-image:url(' . $ti3_path . 'images/'. $size . '/' 
				  . $this->imgfile . '); height:' . 3.76*$size 
                  . 'px; width:' . 4.32*$size . 'px; line-height:' . 3.76*$size 
                  . 'px;" title="' 
				  . implode('&#10', $tmp) . '">';
        if ($this->label !== false)
        {
            $output[] = '<span class="system_label" style="z-index:' . $z 
                        . '; font-size:' . 0.05*$size . 'em">' . $this->label . '</span>';
            $z++;
        }
        $output[] = '</div>';

		$z++;
		
		foreach ($this->tokens as $token)
		{
			$output[] = $token->show($pos, $size=$size, $z=$z);
			$z++;
		}
		
		return implode(PHP_EOL, $output);
	}
}

class TI3Planet {
	public $name;
	public $res;
	public $inf;
	public $tech;
	public $refresh;
	public $rel_x;
	public $rel_y;
	public $exhausted = true;
	public $units = array();
	public $tokens = array();
	public $control = false;

	public function __construct ($planet)
	{
		$this->name = $planet['Name'];
		$this->res  = $planet['Res'];
		$this->inf  = $planet['Inf'];
		$this->rel_x  = 0; /*$planet['rel_x'];*/
		$this->rel_y  = 0; /*$planet['rel_y'];*/
		if (array_key_exists('Tech', $planet))
		{
			$this->tech = $planet['Tech'];
		}
		if (array_key_exists('Refresh', $planet))
		{
			$this->refresh = $planet['Refresh'];
		}
		
		return 0;
	}
	
	public function toggle_exhaust()
	{
		$this->exhausted = !$this->exhausted;

		return 0;
	}
	
	public function show($pos, $size=50)
	{
		
		return 0;
	}
}

class TI3Token
{
	public $name;
	public $imgfile;
	public $rel_x;
	public $rel_y;
	public $wormholes = array();
	
	public function __construct($key, $rel_x, $rel_y)
	{
		global $tokens;
		
		$this->rel_x = $rel_x;
		$this->rel_y = $rel_y;
		$this->name = $tokens[$key]['Name'];
		$this->imgfile = $tokens[$key]['File'];
		if (array_key_exists('Wormholes', $tokens[$key]))
		{ 
			$this->wormholes = $tokens[$key]['Wormholes'];
		}
		
		return 0;
	}
	
	public function move_token($rel_x, $rel_y)
	{
		$this->rel_x = $rel_x;
		$this->rel_y = $rel_y;
		
		return 0;
	}
	
	public function show($pos, $size=50, $z=0)
	{
		global $ti3_path;
		
		$rel_pos = rel_position($this->rel_x, $this->rel_y, $size=$size);
		$output = '<img style="position:absolute; top:' . ($pos['y'] + $rel_pos['y'])
				. 'px; left:' . ($pos['x'] + $rel_pos['x']) . 'px; z-index:' . $z
				. '" src="' . $ti3_path . 'images/'. $size . '/' . $this->imgfile
				. '" title="' . $this->name . '">';
		
		return $output;
	}
}

class TI3Unit
{
	public $name;
	public $rel_x;
	public $rel_y;
	public $type;
	public $sustain;
	public $countable;
	
	public function show($size=50)
	{
		
		return 0;
	}
}

{
  
}
