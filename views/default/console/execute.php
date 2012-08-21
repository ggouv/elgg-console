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

$page_owner = (int)get_input('page_owner');

elgg_set_page_owner_guid($page_owner);

$code = $_REQUEST['code'];

//eval("$code;");
echo $code;
