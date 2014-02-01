<?php
/*
Plugin Name: Howdy Against Humanity
Plugin URI: #
Description: Fun, sometimes irreverent, greetings for your WordPress Dashboard.  'Howdy' no more!
Version: 1.0
Author: Mitch Canter
Author URI: http://www.studionashvegas.com
Author Email: mitch@studionashvegas.com
License: GPL 3.0
License URI: http://www.gnu.org/licenses/gpl.html
*/

add_action( 'admin_bar_menu', 'hnm_spoof_text', 11 );

function hnm_spoof_text( $wp_admin_bar ) {
	$user_id = get_current_user_id();
	$current_user = wp_get_current_user();
	$profile_url = get_edit_profile_url( $user_id );

	$hnm_spoof = array(
		"Who let the dogs out, ",
		"You da man now, ",
		"TO THE MOON, ",
		"Hey Everybody! Look! It's ",
		"If you're happy and you know it, say ",
		"Before I kill you, Mr. Bond, I must show you ",
		"It's a pity all the kids are getting involved with ",
		"I drink to forget ",
		"BILLY MAYS HERE FOR ",
		"Harry Potter and the Chamber of ",
		"Next on ESPN2, the World Series of ",
		"My anti-drug is ",
		"I got 99 problems but | ain't one.",
		"Maybe she's born with it. Maybe it's ",
		"TSA guidelines now prohibit | on airplanes.",
		"|. That's how I want to die.",
		"|. High five, bro!",
		"In a world ravaged by | our only solace is WordPress.",
		"Coming to Broadway, |: The Musical",
		"Step 1: WordPress. Step 2: |. Step 3: Profit!",
		"|: good to the last drop!",
		"|: kid-tested, mother approved.",
		"Ain't no party like a | party because that party never stops."
	);
	$hnm_greeting = $hnm_spoof[array_rand($hnm_spoof)];	
	$hnm_greeting_plode = explode("|", $hnm_greeting);

	if ( 0 != $user_id ) {
		/* Add the "My Account" menu */
		$avatar = get_avatar( $user_id, 28 );
		$howdy = sprintf( __('%1$s'), $current_user->display_name );
		$class = empty( $avatar ) ? '' : 'with-avatar';

		$wp_admin_bar->add_menu( array(
		'id' => 'my-account',
		'parent' => 'top-secondary',
		'title' => $hnm_greeting_plode[0] . $howdy . $hnm_greeting_plode[1]. $avatar,
		'href' => $profile_url,
		'meta' => array(
		'class' => $class,
		),
		) );

	}
}