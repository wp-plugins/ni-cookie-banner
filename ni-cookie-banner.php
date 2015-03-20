<?php

/*
Plugin Name: NI Cookie Banner
Plugin URI: http://www.networkintellect.com
Description: Highly Customisable Cookie Banner Plugin Created By Peter Featherstone @ Network Intellect
Version: 1.0
Author: Peter Featherstone
Text Domain: ni-cookie-banner
Author URI: http://www.networkintellect.com
License: GPL2
Tags: cookie, cookie banner, ni, ni cookie banner, cookies

Copyright 2015  Peter Featherstone <peter.featherstone@networkintellect.com>

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

@author   Peter Featherstone <peter.featherstone@networkintellect.com>

|--------------------------------------------------------------------------
| A note on Namespaces (or lack of)
|--------------------------------------------------------------------------
 
Unfortunately, due to ~70% non-support for NameSpaces all Classes are pre-fixed
with the RM_ tag to avoid conflict, will be updated to use Namespaces when and 
if it becomes a requirement for WordPress.

It's a bit ugly but it's the best way for compatibility with other plug-ins and 
all WordPress users.
 
|--------------------------------------------------------------------------
| Bootstrap The Application
|--------------------------------------------------------------------------
|
| This bootstraps the NI Cookie Banner and gets it ready for use, then it
| will load up the NI Cookie Banner application so that we can run it.
|
*/

require_once 'app/bootstrap.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can simply call the run method,
| which will setup everything we need to display the NI Cookie Banner 
| straight out the box with no extra customisation needed.
|
*/

$app->run();