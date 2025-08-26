<?php

/**
 * Plugin Name: Trackinit
 * Version: 1.0
 * Author: RKVCS
 */

function trackinit_enqueue()
{
	$url = null;
	$key = null;

	if(defined('TRACKINIT_URL')){
		$url = TRACKINIT_URL;
	}else{
		$url = plugins_url('assets/trackinit.js', __FILE__);
	}

	if(defined('TRACKINIT_KEY')){
		$key = TRACKINIT_KEY;
		$url = $url . '?key='.$key;
	}

	// Register the script
	wp_register_script(
		'trackinit-global',
		$url,
		[],
		'1.0',
		true
	);

	// Enqueue the script
	wp_enqueue_script('trackinit-global');
}
add_action('wp_enqueue_scripts', 'trackinit_enqueue');
