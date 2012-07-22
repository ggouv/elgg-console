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

global $fb; $fb->info($vars['entity']->metaKey);

if (!isset($vars['entity']->metaKey)) {
	$vars['entity']->metaKey = 1;
}

if (!isset($vars['entity']->shiftKey)) {
	$vars['entity']->shiftKey = 1;
}

if (!isset($vars['entity']->altKey)) {
	$vars['entity']->altKey = 0;
}

if (!isset($vars['entity']->key)) {
	$vars['entity']->key = '67';
}

$checkboxes_body = "<div>" . elgg_echo('installation:allow_user_default_access:description') . "<br />";
$checkboxes_body .= elgg_view("input/checkboxes", array(
	'options' => array(elgg_echo('installation:allow_user_default_access:label') => elgg_echo('installation:allow_user_default_access:label')),
	'name' => 'allow_user_default_access',
	'value' => (elgg_get_config('allow_user_default_access') ? elgg_echo('installation:allow_user_default_access:label') : ""),
)) . "</div>";

$metaKey_string = elgg_echo('elgg_console:settings:metaKey');
$metaKey_view = elgg_view('input/checkbox', array(
	'name' => 'params[metaKey]',
	'default' => 'checked',//$vars['entity']->metaKey,
));

$shiftKey_string = elgg_echo('elgg_console:settings:shiftKey');
$shiftKey_view = elgg_view('input/checkbox', array(
	'name' => 'params[shiftKey]',
	'default' => $vars['entity']->shiftKey,
));

$altKey_string = elgg_echo('elgg_console:settings:altKey');
$altKey_view = elgg_view('input/checkbox', array(
	'name' => 'params[altKey]',
	'default' => $vars['entity']->altKey,
));

$key_string = elgg_echo('elgg_console:settings:key');
$key_view = elgg_view('input/text', array(
	'name' => 'params[key]',
	'value' => $vars['entity']->key,
	'class' => 'elgg-input-thin',
));
$help_key_string = "<br /><span style='font-size:0.85em;color:#999;'>" . elgg_echo('elgg_console:settings:help_key_string') . "</span>";

// display html

echo <<<__HTML
<br />
<div><label>$metaKey_string</label><br />$metaKey_view</div>
<div><label>$shiftKey_string</label><br />$shiftKey_view</div>
<div><label>$altKey_string</label><br />$altKey_view</div>
<div><label>$key_string</label><br />$key_view $help_key_string</div>
__HTML;
