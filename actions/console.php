<?php
/**
 *	Elgg-console plugin
 *	@package elgg-console
 *	@author Emmanuel Salomon @ManUtopiK
 *	@license GNU Affero General Public License, version 3 or late
 *	@link https://github.com/ManUtopiK/elgg-console
 *
 *	Elgg-console action file
 **/

$code = get_input('code', '');

$user = elgg_get_logged_in_user_entity();
$container = elgg_get_page_owner_entity();

$code = str_replace("&lt;", "<", $code);
$code = str_replace("&gt;", ">", $code);
eval("$code;");