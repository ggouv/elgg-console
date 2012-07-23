<?php
/**
 *	Elgg-console plugin
 *	@package elgg-console
 *	@author Emmanuel Salomon @ManUtopiK
 *	@license GNU Affero General Public License, version 3 or late
 *	@link https://github.com/ManUtopiK/elgg-console
 *
 *	Elgg-console admin settings
 *
 */

// set default value

if (!isset($vars['entity']->metaKey)) {
	$vars['entity']->metaKey = 'yes';
}

if (!isset($vars['entity']->shiftKey)) {
	$vars['entity']->shiftKey = 'yes';
}

if (!isset($vars['entity']->altKey)) {
	$vars['entity']->altKey = 'no';
}

if (!isset($vars['entity']->char)) {
	$vars['entity']->char = 'C';
}

$metaKey_string = elgg_echo('elgg_console:settings:metaKey');
$metaKey_view = elgg_view('input/dropdown', array(
	'options_values' => array('no' => elgg_echo("option:no"), 'yes' => elgg_echo("option:yes")),
	'name' => 'params[metaKey]',
	'value' => $vars['entity']->metaKey,
));

$shiftKey_string = elgg_echo('elgg_console:settings:shiftKey');
$shiftKey_view = elgg_view('input/dropdown', array(
	'options_values' => array('no' => elgg_echo("option:no"), 'yes' => elgg_echo("option:yes")),
	'name' => 'params[shiftKey]',
	'value' => $vars['entity']->shiftKey,
));

$altKey_string = elgg_echo('elgg_console:settings:altKey');
$altKey_view = elgg_view('input/dropdown', array(
	'options_values' => array('no' => elgg_echo("option:no"), 'yes' => elgg_echo("option:yes")),
	'name' => 'params[altKey]',
	'value' => $vars['entity']->altKey,
));

$key_string = elgg_echo('elgg_console:settings:key');
$key_view = elgg_view('input/text', array(
	'name' => 'params[char]',
	'value' => $vars['entity']->char,
	'class' => 'elgg-input-thin',
));

// display html

echo <<<__HTML
<br />
<div><label>$metaKey_string</label><br />$metaKey_view</div>
<div><label>$shiftKey_string</label><br />$shiftKey_view</div>
<div><label>$altKey_string</label><br />$altKey_view</div>
<div><label>$key_string</label><br />$key_view</div>
__HTML;
