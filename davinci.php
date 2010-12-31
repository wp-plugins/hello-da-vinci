<?php
/*
	Plugin Name: Hello Da Vinci
	Plugin URI: http://www.setupdraw.com/wordpress/plugins/davinci
	Description: A quick modification of the ubiquitious Hello Dolly plugin, to present quotes from Leonardo Da Vinci.
	Version: 1.1
	Author: Rob Dunne - SetupDraw
	Author URI: http://www.setupdraw.com/
	License: GPL2

	Copyright 2010  Hello Da Vinci by Rob Dunne rob@setupdraw.com

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function get_quote() {
	$quote = "Iron rusts from disuse, stagnant water loses its purity, and in cold weather becomes frozen; <br>even so does inaction sap the vigors of the mind.
	The color of the object illuminated partakes of the color of that which illuminates it.
	He who possesses most must be most afraid of loss.
	A good painter has two main objects to paint, man and the intention of his soul.<br> The former is easy, the latter hard as he has to represent it by the attitude and movement of the limbs.
	Where the spirit does not work with the hand there is no art.
	One can have no smaller or greater mastery than mastery of oneself.
	Poor is the pupil who does not surpass his master.";

	// Here we split it into lines
	$quote = explode("\n", $quote);

	// And then randomly choose a line
	return wptexturize( $quote[ mt_rand(0, count($quote) - 1) ] );
}

// This just echoes the chosen line, we'll position it later
function hello_davinci() {
	$chosen = get_quote();
	echo "<p id='dolly'>".$chosen."</p>";
}

// Now we set that function up to execute when the admin_footer action is called
add_action('admin_footer', 'hello_davinci');

// We need some CSS to position the paragraph
function davinci_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = ( is_rtl() ) ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#dolly {
		position: absolute;
		top: 4.5em;
		margin: 0;
		padding: 0;
		$x: 215px;
		font-size: 11px;
	}
	</style>
	";
}

add_action('admin_head', 'davinci_css');

?>