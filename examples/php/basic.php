<?php

/**
 * Copyright (c) 2015 Hosting.com, Inc.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

require_once("vendor/autoload.php");

// This example health check function will always succeed
//
// Typically you'd put your own test logic here to make sure
// this server was working as intended
//
// You want these functions to return TRUE if all is well
// or return FALSE if something went wrong and the server
// should be removed from the LB group
function myHealthCheck1()
{
	return true;
}

// Another always successful example
function myHealthCheck2()
{
	return true;
}

// You can quickly itterate over all your health check functions
// by adding them to a key => value array
// 
// Array entries can either be the name of your health check function
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
