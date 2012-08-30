<?php
	$accounts = array(
		"twitter_kakaopor" => array(
			"type"            => "twitter",
			"readonly"        => true,
			"consumer_key"    => "35p4PUFvsd58jqYQaGdRQ",
			"consumer_secret" => "WIWNXyh5suWsih9WtYAXenQmQRAzJlZqm7CeJYya00",
			"user_token"      => "21763866-0sZy6A4xgBpyZhhhPnLNUPoTTokIqN40eEtR5OPfJ",
			"user_secret"     => "8PRQmopP4KyutmqrJfIuPCsjnKOdl0HEjrwozDbqI",
		),
		
		"textdump" => array(
			"type"     => "textdump",
			"readonly" => false,
		),
		
		"wordpress_local" => array(
			"type"     => "wordpress_local",
			"readonly" => false,
		),
	);
	
	$routes = array(
		"first" => array(
			"from" => array(
				"account" => "twitter_kakaopor",
				"filter" => "",
			),
			
			"to" => array(
				array(
					"account" => "textdump",
					"settings" => array(),
				),
			),
		),
	);
?>