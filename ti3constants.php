<?php
/*
 * ti3constants.php
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

$systems = array(
	array(
		'Name'    => 'Abyz/Fria',
		'File'    => 'Tile-Abyz-Fria.gif',
		'Type'    => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'Abyz',
				'Res'  => 3,
				'Inf'  => 0
			),
			array(
				'Name' => 'Fria',
				'Res'  => 2,
				'Inf'  => 0,
				'Tech' => 'b'
			)
		)
	),
	array(
		'Name' => 'Arinam/Meer',
		'File' => 'Tile-Arinam-Meer.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'Arinam',
				'Res'  => 1,
				'Inf'  => 2,
				'Tech' => 'b'
			),
			array(
				'Name' => 'Meer',
				'Res'  => 0,
				'Inf'  => 4
			)
		)
	),
	array(
		'Name' => 'Arnor/Lor',
		'File' => 'Tile-Arnor-Lor.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'Arnor',
				'Res'  => 2,
				'Inf'  => 1
			),
			array(
				'Name' => 'Lor',
				'Res'  => 1,
				'Inf'  => 2,
				'Tech' => 'r'
			)
		)
	),
	array(
		'Name' => 'Ashtroth/Abaddon/Loki',
		'File' => 'Tile-Ashtroth-Loki-Abaddon.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'Ashtroth',
				'Res'  => 2,
				'Inf'  => 0
			),
			 array(
				'Name' => 'Abaddon',
				'Res'  => 1,
				'Inf'  => 0,
				'Tech' => 'r'
			),
			array(
				'Name' => 'Loki',
				'Res'  => 1,
				'Inf'  => 2
			)
		)
	),
	array(
		'Name' => 'Asteroid Field',
		'File' => 'Tile-Asteroid_Field.gif',
		'Type' => 'Special'
	),
	array(
		'Name' => 'Bereg/Lirta IV',
		'File' => 'Tile-Bereg-Lirta_IV.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'Bereg',
				'Res'  => 3,
				'Inf'  => 1,
				'Tech' => 'r'
			),
			array(
				'Name' => "Lirta IV",
				'Res'  => 2,
				'Inf'  => 3,
				'Tech' => 'g'
			)
		)
	),
	array(
		'Name' => 'Capha',
		'File' => 'Tile-Capha.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'Capha',
				'Res'  => 3,
				'Inf'  => 0
			)
		)
	),
	array(
		'Name' => 'Centauri/Gral',
		'File' => 'Tile-Centauri-Gral.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'Centauri',
				'Res'  => 1,
				'Inf'  => 3
			),
			array(
				'Name' => 'Gral',
				'Res'  => 1,
				'Inf'  => 1,
				'Tech' => 'b'
			)
		)
	),
	array(
		'Name' => 'Coorneeq/Resculon',
		'File' => 'Tile-Coorneeq-Resculon.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'Corneeq',
				'Res'  => 1,
				'Inf'  => 2,
				'Tech' => 'r'
			),
			array(
				'Name' => 'Resculon',
				'Res'  => 2,
				'Inf'  => 0
			)
		)
	),
	array(
		'Name' => 'Cormund (Gravity Rift)',
		'File' => 'Tile-Cormund.gif',
		'Type' => 'Special',
		'Planets' => array(
			array(
				'Name' => 'Cormund',
				'Res'  => 2,
				'Inf'  => 0
			)
		)
	),
	array(
		'Name' => 'Dal Bootha/Xxehan',
		'File' => 'Tile-Dal_Bootha-Xxehan.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'Dal Bootha',
				'Res'  => 0,
				'Inf'  => 2,
				'Tech' => 'r'
			),
			array(
				'Name' => 'Xxehan',
				'Res'  => 1,
				'Inf'  => 1,
				'Tech' => 'g'
			)
		)
	),
	array(
		'Name' => 'El\'nath',
		'File' => 'Tile-Elnath.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'El\'nath',
				'Res'  => 2,
				'Inf'  => 0,
				'Tech' => 'b'
			)
		)
	),
	array(
		'Name' => 'Empty',
		'File' => 'Tile-Empty.gif',
		'Type' => 'Empty'
	),
	array(
		'Name' => 'Everra (Nebula)',
		'File' => 'Tile-Everra.gif',
		'Type' => 'Special',
		'Planets' => array(
			array(
				'Name' => 'Everra',
				'Res'  => 3,
				'Inf'  => 1
			)
		)
	),
	array(
		'Name' => 'Faunus',
		'File' => 'Tile-Faunus.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'Faunus',
				'Res'  => 1,
				'Inf'  => 3,
				'Tech' => 'gg'
			)
		)
	),
	array(
		'Name' => 'Garbozia',
		'File' => 'Tile-Garbozia.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'Garbozia',
				'Res'  => 2,
				'Inf'  => 1,
				'Tech' => 'g'
			)
		)
	),
	array(
		'Name' => 'Gravity Rift',
		'File' => 'Tile-Gravity_Rift.gif',
		'Type' => 'Special'
	),
	array(
		'Name' => 'Hercalor/Tiamat',
		'File' => 'Tile-Hercalor-Tiamat.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'Hercalor',
				'Res'  => 1,
				'Inf'  => 0,
				'Tech' => 'y'
			),
			array(
				'Name' => 'Tiamat',
				'Res'  => 1,
				'Inf'  => 2,
				'Tech' => 'y'
			)
		)
	),
	array(
		'Name' => 'Hope\'s End',
		'File' => 'Tile-Hopes_End.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name'    => 'Hope\'s End',
				'Res'     => 3,
				'Inf'     => 0,
				'Refresh' => 'Gain 2 Shock Troops'
			)
		)
	),
	array(
		'Name' => 'Arborec HS',
		'File' => 'Tile-HS-Arborec.gif',
		'Type' => 'Home Systems',
		'Planets' => array(
			array(
				'Name' => 'Nestphar',
				'Res'  => 3,
				'Inf'  => 2,
				'Tech' => 'g'
			)
		)
	),
	array(
		'Name' => 'HS Back',
		'File' => 'Tile-HS-Back.gif',
		'Type' => 'Other'
	),
	array(
		'Name' => 'Creuss Gate',
		'File' => 'Tile-HS-Creuss_Gate.gif',
		'Type' => 'Home Systems',
		'Wormholes' => array('D')
	),
	array(
		'Name' => 'Creuss HS',
		'File' => 'Tile-HS-Creuss.gif',
		'Type' => 'Home Systems',
		'Planets' => array(
			array(
				'Name' => 'Creuss',
				'Res'  => 4,
				'Inf'  => 2
			)
		),
		'Wormholes' => array('D')
	),
	array(
		'Name' => 'Hacan HS',
		'File' => 'Tile-HS-Hacan.gif',
		'Type' => 'Home Systems',
		'Planets' => array(
			array(
				'Name' => 'Arretze',
				'Res'  => 2,
				'Inf'  => 0
			),
			array(
				'Name' => 'Hercant',
				'Res'  => 1,
				'Inf'  => 1
			),
			array(
				'Name' => 'Kamden',
				'Res'  => 0,
				'Inf'  => 1
			)
		)
	),
	array(
		'Name' => 'Jol-Nar HS',
		'File' => 'Tile-HS-Jolnar.gif',
		'Type' => 'Home Systems',
		'Planets' => array(
			array(
				'Name' => 'Nar',
				'Res'  => 2,
				'Inf'  => 3
			),
			array(
				'Name' => 'Jol',
				'Res'  => 1,
				'Inf'  => 2
			)
		)
	),
	array(
		'Name' => 'L1z1x HS',
		'File' => 'Tile-HS-L1z1x.gif',
		'Type' => 'Home Systems',
		'Planets' => array(
			array(
				'Name' => '[0.0.0]',
				'Res'  => 5,
				'Inf'  => 0
			)
		)
	),
	array(
		'Name' => 'Lazax HS',
		'File' => 'Tile-HS-Lazax.gif',
		'Type' => 'Home Systems',
		'Planets' => array(
			array(
				'Name' => 'Mecatol Rex',
				'Res'  => 3,
				'Inf'  => 6
			)
		)
	),
	array(
		'Name' => 'Letnev HS',
		'File' => 'Tile-HS-Letnev.gif',
		'Type' => 'Home Systems',
		'Planets' => array(
			array(
				'Name' => 'Arc Prime',
				'Res'  => 4,
				'Inf'  => 0
			),
			array(
				'Name' => 'Wren Terra',
				'Res'  => 2,
				'Inf'  => 1
			)
		)
	),
	array(
		'Name' => 'Mentak HS',
		'File' => 'Tile-HS-Mentak.gif',
		'Type' => 'Home Systems',
		'Planets' => array(
			array(
				'Name' => 'Moll Primus',
				'Res'  => 4,
				'Inf'  => 1
			)
		)
	),
	array(
		'Name' => 'Muaat HS',
		'File' => 'Tile-HS-Muaat.gif',
		'Type' => 'Home Systems',
		'Planets' => array(
			array(
				'Name' => 'Muaat',
				'Res'  => 4,
				'Inf'  => 1
			)
		)
	),
	array(
		'Name' => 'Naalu HS',
		'File' => 'Tile-HS-Naalu.gif',
		'Type' => 'Home Systems',
		'Planets' => array(
			array(
				'Name' => 'Maluuk',
				'Res'  => 0,
				'Inf'  => 2
			),
			array(
				'Name' => 'Druaa',
				'Res'  => 3,
				'Inf'  => 1
			)
		)
	),
	array(
		'Name' => 'Nekro HS',
		'File' => 'Tile-HS-Nekro.gif',
		'Type' => 'Home Systems',
		'Planets' => array(
			array(
				'Name' => 'Mordai II',
				'Res'  => 4,
				'Inf'  => 0
			)
		)
	),
	array(
		'Name' => 'N\'orr HS',
		'File' => 'Tile-HS-Norr.gif',
		'Type' => 'Home Systems',
		'Planets' => array(
			array(
				'Name' => 'Tren\'lak',
				'Res'  => 1,
				'Inf'  => 0
			),
			array(
				'Name' => 'Quinarra',
				'Res'  => 3,
				'Inf'  => 1
			)
		)
	),
	array(
		'Name' => 'Saar HS',
		'File' => 'Tile-HS-Saar.gif',
		'Type' => 'Home Systems',
		'Planets' => array(
			array(
				'Name' => 'Lisis II',
				'Res'  => 1,
				'Inf'  => 0
			),
			array(
				'Name' => 'Ragh',
				'Res'  => 2,
				'Inf'  => 1
			)
		)
	),
	array(
		'Name' => 'Sol HS',
		'File' => 'Tile-HS-Sol.gif',
		'Type' => 'Home Systems',
		'Planets' => array(
			array(
				'Name' => 'Jord',
				'Res'  => 4,
				'Inf'  => 2
			)
		)
	),
	array(
		'Name' => 'Winnu HS',
		'File' => 'Tile-HS-Winnu.gif',
		'Type' => 'Home Systems',
		'Planets' => array(
			array(
				'Name' => 'Winnu',
				'Res'  => 3,
				'Inf'  => 4,
				'Tech' => 'y'
			)
		)
	),
	array(
		'Name' => 'Xxcha HS',
		'File' => 'Tile-HS-Xxcha.gif',
		'Type' => 'Home Systems',
		'Planets' => array(
			array(
				'Name' => 'Archon Ren',
				'Res'  => 2,
				'Inf'  => 3
			),
			array(
				'Name' => 'Archon Tau',
				'Res'  => 1,
				'Inf'  => 1 
			)
		)
	),
	array(
		'Name' => 'Yin HS',
		'File' => 'Tile-HS-Yin.gif',
		'Type' => 'Home Systems',
		'Planets' => array(
			array(
				'Name' => 'Darien',
				'Res'  => 2,
				'Inf'  => 4
			)
		)
	),
	array(
		'Name' => 'Yssaril HS',
		'File' => 'Tile-HS-Yssaril.gif',
		'Type' => 'Home Systems',
		'Planets' => array(
			array(
				'Name' => 'Retillon',
				'Res'  => 2,
				'Inf'  => 3
			),
			array(
				'Name' => 'Shalloq',
				'Res'  => 1,
				'Inf'  => 2
			)
		)
	),
	array(
		'Name' => 'Industrex',
		'File' => 'Tile-Industrex.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'Industrex',
				'Res'  => 2,
				'Inf'  => 0,
				'Tech' => 'rr'
			)
		)
	),
	array(
		'Name' => 'Ion Storm',
		'File' => 'Tile-Ion_Storm.gif',
		'Type' => 'Special'
	),
	array(
		'Name' => 'Lazar/Sakulag',
		'File' => 'Tile-Lazar-Sakulag.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'Lazar',
				'Res'  => 1,
				'Inf'  => 0
			),
			array(
				'Name' => 'Sakulag',
				'Res'  => 2,
				'Inf'  => 1
			)
		)
	),
	array(
		'Name' => 'Lesab',
		'File' => 'Tile-Lesab.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'Lesab',
				'Res'  => 2,
				'Inf'  => 1,
				'Tech' => 'g'
			)
		)
	),
	array(
		'Name' => 'Lisis/Velnor',
		'File' => 'Tile-Lisis-Velnor.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'Lisis',
				'Res'  => 2,
				'Inf'  => 2
			),
			array(
				'Name' => 'Velnor',
				'Res'  => 2,
				'Inf'  => 0,
				'Tech' => 'r'
			)
		)
	),
	array(
		'Name' => 'Lodor',
		'File' => 'Tile-Lodor.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'Lodor',
				'Res'  => 3,
				'Inf'  => 1,
				'Tech' => 'g'
			)
		),
		'Wormholes' => array('A')
	),
	array(
		'Name' => 'Mecatol Rex',
		'File' => 'Tile-Mecatol_Rex.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'Mecatol Rex',
				'Res'  => 1,
				'Inf'  => 6
			)
		)
	),
	array(
		'Name' => 'Mehar Xull',
		'File' => 'Tile-Mehar_Xull.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'Mehar Xull',
				'Res'  => 1,
				'Inf'  => 3,
				'Tech' => 'b'
			)
		)
	),
	array(
		'Name' => 'Mellon/Zohbat',
		'File' => 'Tile-Mellon-Zohbat.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'Mellon',
				'Res'  => 0,
				'Inf'  => 2
			),
			array(
				'Name' => 'Zohbat',
				'Res'  => 3,
				'Inf'  => 1,
				'Tech' => 'b'
			)
		)
	),
	array(
		'Name' => 'Mirage',
		'File' => 'Tile-Mirage.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'Mirage',
				'Res'  => 1,
				'Inf'  => 2,
				'Refresh' => 'Gain 2 Fighters'
			)
		)
	),
	array(
		'Name' => 'Muaat Supernova',
		'File' => 'Tile-Muaat-Supernova.gif',
		'Type' => 'Other'
	),
	array(
		'Name' => 'Nebula',
		'File' => 'Tile-Nebula.gif',
		'Type' => 'Special'
	),
	array(
		'Name' => 'New Albion/Starpoint',
		'File' => 'Tile-New_Albion-Starpoint.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'New Albion',
				'Res'  => 1,
				'Inf'  => 1,
				'Tech' => 'g'
			),
			array(
				'Name' => 'Starpoint',
				'Res'  => 3,
				'Inf'  => 1
			)
		)
	),
	array(
		'Name' => 'Wormhole Nexus',
		'File' => 'Tile-Nexus.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'Mallice',
				'Res'  => 0,
				'Inf'  => 3
			)
		),
		'Wormholes' => array('A', 'B')
	),
	array(
		'Name' => 'Perimeter',
		'File' => 'Tile-Perimeter.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'Perimeter',
				'Res'  => 2,
				'Inf'  => 2
			)
		)
	),
	array(
		'Name' => 'Primor',
		'File' => 'Tile-Primor.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'Primor',
				'Res'  => 2,
				'Inf'  => 1,
				'Refresh' => 'Gain 2 Ground Forces'
			)
		)
	),
	array(
		'Name' => 'Quann',
		'File' => 'Tile-Quann.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'Quann',
				'Res'  => 2,
				'Inf'  => 1,
				'Tech' => 'g'
			)
		),
		'Wormholes' => array('B')
	),
	array(
		'Name' => 'Qucen\'n/Rarron',
		'File' => 'Tile-Qucenn-Rarron.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'Qucen\'n',
				'Res'  => 1,
				'Inf'  => 2
			),
			array(
				'Name' => 'Rarron',
				'Res'  => 0,
				'Inf'  => 3,
				'Tech' => 'g'
			)
		)
	),
	array(
		'Name' => 'Rigel',
		'File' => 'Tile-Rigel.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'Rigel I',
				'Res'  => 0,
				'Inf'  => 1,
				'Tech' => 'g'
			),
			array(
				'Name' => 'Rigel II',
				'Res'  => 1,
				'Inf'  => 2
			),
			array(
				'Name' => 'Rigel III',
				'Res'  => 1,
				'Inf'  => 1,
				'Tech' => 'b'
			)
		)
	),
	array(
		'Name' => 'Saudor',
		'File' => 'Tile-Saudor.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'Saudor',
				'Res'  => 2,
				'Inf'  => 2
			)
		)
	),
	array(
		'Name' => 'Sem-Lore',
		'File' => 'Tile-Sem-Lore.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'Sem-Lore',
				'Res'  => 3,
				'Inf'  => 2,
				'Tech' => 'y'
			)
		)
	),
	array(
		'Name' => 'Dark Blue',
		'File' => 'Tile-Setup-DarkBlue.gif',
		'Type' => 'Setup'
	),
	array(
		'Name' => 'Dark Green',
		'File' => 'Tile-Setup-DarkGreen.gif',
		'Type' => 'Setup'
	),
	array(
		'Name' => 'Dark Grey',
		'File' => 'Tile-Setup-DarkGrey.gif',
		'Type' => 'Setup'
	),
	array(
		'Name' => 'Dark Red',
		'File' => 'Tile-Setup-DarkRed.gif',
		'Type' => 'Setup'
	),
	array(
		'Name' => 'Green',
		'File' => 'Tile-Setup-DarkGreen.gif',
		'Type' => 'Setup'
	),
	array(
		'Name' => 'Light Blue',
		'File' => 'Tile-Setup-LightBlue.gif',
		'Type' => 'Setup'
	),
	array(
		'Name' => 'Medium Blue',
		'File' => 'Tile-Setup-MediumBlue.gif',
		'Type' => 'Setup'
	),
	array(
		'Name' => 'Orange',
		'File' => 'Tile-Setup-Orange.gif',
		'Type' => 'Setup'
	),
	array(
		'Name' => 'Red',
		'File' => 'Tile-Setup-Red.gif',
		'Type' => 'Setup'
	),
	array(
		'Name' => 'Yellow',
		'File' => 'Tile-Setup-Yellow.gif',
		'Type' => 'Setup'
	),
	array(
		'Name' => 'Sumerian/Arcturus',
		'File' => 'Tile-Sumerian-Arcturus.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'Sumerian',
				'Res'  => 2,
				'Inf'  => 2,
				'Refresh' => 'Gain 2 Trade Goods' 
			),
			array(
				'Name' => 'Arcturus',
				'Res'  => 1,
				'Inf'  => 1
			)
		)
	),
	array(
		'Name' => 'Supernova',
		'File' => 'Tile-Supernova.gif',
		'Type' => 'Special'
	),
	array(
		'Name' => 'System Back',
		'File' => 'Tile-System-Back.gif',
		'Type' => 'Other'
	),
	array(
		'Name' => 'Tar\'mann',
		'File' => 'Tile-Tarmann.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'Tar\'mann',
				'Res'  => 1,
				'Inf'  => 1
			)
		)
	),
	array(
		'Name' => 'Tempesta',
		'File' => 'Tile-Tempesta.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'Tempesta',
				'Res'  => 1,
				'Inf'  => 1,
				'Tech' => 'bb'
			)
		)
	),
	array(
		'Name' => 'Tequ\'ran/Torkan',
		'File' => 'Tile-Tequran-Torkan.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'Tequ\'ran',
				'Res'  => 2,
				'Inf'  => 0,
				'Tech' => 'r'
			),
			array(
				'Name' => 'Torkan',
				'Res'  => 0,
				'Inf'  => 3,
				'Tech' => 'b'
			)
		)
	),
	array(
		'Name' => 'Thibah',
		'File' => 'Tile-Thibah.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'Thibah',
				'Res'  => 1,
				'Inf'  => 1
			)
		)
	),
	array(
		'Name' => 'Tsion/Bellatrix',
		'File' => 'Tile-Tsion-Bellatrix.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'Tsion',
				'Res'  => 2,
				'Inf'  => 2,
				'Refresh' => 'Gain 2 Trade Goods'
			),
			array(
				'Name' => 'Bellatrix',
				'Res'  => 0,
				'Inf'  => 1,
				'Tech' => 'r'
			)
		)
	),
	array(
		'Name' => 'Vefut II',
		'File' => 'Tile-Vefut_II.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'Vefut II',
				'Res'  => 2,
				'Inf'  => 0,
				'Tech' => 'r'
			)
		)
	),
	array(
		'Name' => 'Vega',
		'File' => 'Tile-Vega.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'Vega Minor',
				'Res'  => 1,
				'Inf'  => 2,
				'Tech' => 'b'
			),
			array(
				'Name' => 'Vega Major',
				'Res'  => 2,
				'Inf'  => 1
			)
		)
	),
	array(
		'Name' => 'Wellon',
		'File' => 'Tile-Wellon.gif',
		'Type' => 'Regular',
		'Planets' => array(
			array(
				'Name' => 'Wellon',
				'Res'  => 1,
				'Inf'  => 2
			)
		)
	),
	array(
		'Name' => 'Empty (WH A)',
		'File' => 'Tile-Wormhole_A.gif',
		'Type' => 'Empty',
		'Wormholes' => array('A')
	),
	array(
		'Name' => 'Empty (WH B)',
		'File' => 'Tile-Wormhole_B.gif',
		'Type' => 'Empty',
		'Wormholes' => array('B')
	),
	array(
		'Name' => 'Empty (WH C)',
		'File' => 'Tile-Wormhole_C.gif',
		'Type' => 'Empty',
		'Wormholes' => array('C')
	),
	array(
		'Name' => 'Empty (WH Alpha)',
		'File' => 'Tile-Wormhole_Alpha.gif',
		'Type' => 'Empty',
		'Wormholes' => array('Alpha')  
	),
	array(
		'Name' => 'Empty (WH Beta)',
		'File' => 'Tile-Wormhole_Beta.gif',
		'Type' => 'Empty',
		'Wormholes' => array('Beta')  
	),
	array(
		'Name' => 'Empty (WH Gamma)',
		'File' => 'Tile-Wormhole_Gamma.gif',
		'Type' => 'Empty',
		'Wormholes' => array('Gamma')  
	),
	array(
		'Name' => 'Empty (WH Delta)',
		'File' => 'Tile-Wormhole_Delta.gif',
		'Type' => 'Empty',
		'Wormholes' => array('Delta')  
	),
		array(
		'Name' => 'Empty (WH Theta)',
		'File' => 'Tile-Wormhole_Theta.gif',
		'Type' => 'Empty',
		'Wormholes' => array('Theta')  
	),
	array(
		'Name' => 'Empty (WH Lambda)',
		'File' => 'Tile-Wormhole_Lambda.gif',
		'Type' => 'Empty',
		'Wormholes' => array('Lambda')  
	),
	array(
		'Name' => 'Empty (WH Sigma)',
		'File' => 'Tile-Wormhole_Sigma.gif',
		'Type' => 'Empty',
		'Wormholes' => array('Sigma')  
	),
	array(
		'Name' => 'Empty (WH Omega)',
		'File' => 'Tile-Wormhole_Alpha.gif',
		'Type' => 'Empty',
		'Wormholes' => array('Omega')  
	)
);

$system_types = array(
	'Regular'      => 'Regular',
	'Special'      => 'Special',
	'Empty'        => 'Empty',
	'Home Systems' => 'Home Systems',
	'Setup'        => 'Setup Tiles',
	'Other'        => 'Other'
);

$wormholes = array('A', 'B', 'C', 'Alpha', 'Beta', 'Gamma', 'Delta', 'Theta',
	'Lambda', 'Sigma', 'Omega');

$tokens = array();
foreach ($wormholes as $wormhole) 
{
	$tmp = array(
		'Name' => 'Wormhole ' . $wormhole,
		'File' => 'Token-Wormhole_' . $wormhole . '.gif',
		'Type' => 'Wormhole',
		'Wormholes' => array($wormhole)  
	);
	if ($wormhole == 'Lambda') 
    {
		$tmp['File'] = 'Token-Wormhole_L.gif';
	}
	$tokens[] = $tmp;
};

$token_types = array(
	'Wormhole' => 'Wormhole'
);

$setup_tiles = array();
foreach ($systems as $k => $system) 
{
	if ($system['Type'] == 'Setup') 
	{
		$setup_tiles[$system['Name']] = $k;
	}
}

$setup_help = array(
	array(
		'Name' => '6 Players',
		'Locations' => array(
			$setup_tiles['Red'] => array(
				'0,0'
			),
			$setup_tiles['Light Blue'] => array(
				'0,1', '1,1', '1,0', '0,-1', '-1,0', '-1,1'
			),
			$setup_tiles['Medium Blue'] => array(
				'0,2', '1,2', '2,1', '2,0', '2,-1', '1,-1',
				'0,-2', '-1,-1', '-2,-1', '-2,0', '-2,1', '-1,2'
			),
			$setup_tiles['Dark Blue'] => array(
				'1,3', '2,2', '3,1', '3,0', '2,-2', '1,-2',
				'-1,-2', '-2,-2', '-3,0', '-3,1', '-2,2', '-1,3'
			),
			$setup_tiles['Yellow'] => array(
				'0,3', '3,2', '3,-1', '0,-3', '-3,-1', '-3,2'
			)
		)
	),
	array(
		'Name'      => '8 Players',
		'Locations' => array(
			$setup_tiles['Red'] => array(
				'0,0'
			),
			$setup_tiles['Light Blue'] => array(
				'0,1', '1,1', '1,0', '0,-1', '-1,0', '-1,1'
			),
			$setup_tiles['Medium Blue'] => array(
				'0,2', '1,2', '2,1', '2,0', '2,-1', '1,-1',
				'0,-2', '-1,-1', '-2,-1', '-2,0', '-2,1', '-1,2'
			),
			$setup_tiles['Dark Blue'] => array(
				'1,3', '2,2', '3,1', '3,0', '2,-2', '1,-2',
				'-1,-2', '-2,-2', '-3,0', '-3,1', '-2,2', '-1,3',
				'0,3', '3,2', '3,-1', '0,-3', '-3,-1', '-3,2',
				'1,4', '2,3', '4,2', '4,1', '4,-1', '4,-2', '2,-3', '1,-3',
				'-1,-3', '-2,-3', '-4,-2', '-4,-1', '-4,1', '-4,2', '-2,3', '-1,4'
			),
			$setup_tiles['Yellow'] => array(
				'0,4', '3,3', '3,-2', '0,-4', '-3,-2', '-3,3', '4,0', '-4,0'
			)
		)
	)
);

/*file_put_contents('system_tiles', serialize($systems));
file_put_contents('system_types', serialize($system_types));
file_put_contents('tokens',       serialize($tokens));
file_put_contents('token_types',  serialize($token_types));
file_put_contents('setup_help',   serialize($setup_help));*/
