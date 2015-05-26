<?php

require_once("vendor/autoload.php");

// This example health check function will always succeed
// Typically you'd put your own test logic here to make sure
// this server was working as intended
function myHealthCheck1()
{
	return true;
}

// This example health check function will always succeed
// Typically you'd put your own test logic here to make sure
// this server was working as intended
function myHealthCheck2()
{
	return true;
}

// You can quickly itterate over all your health check functions
// by adding them to a key => value array
// 
// Array entries can either by the name of your health check function
// as shown for check01 and check02 or an annonymous internal
// function as shown for check03
$myHealthChecks = array(
		'check01' => 'myHealthCheck1',
		'check02' => 'myHealthCheck2',
		'check03' => function() {
			return true;
		}
	);

// Then simply pass the resulting array to \HOSTING\LBHealthCheck::process()
\HOSTING\LBHealthCheck::process($myHealthChecks);