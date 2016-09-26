<?php

/**
 * @version         backend/autoloader.php 2016-07-16 12:25:00 UTC zanardi
 * @package         Central Authentication for Joomla
 * @description     Autoloader helper
 * @copyright       Copyright (C) 2016 GiBiLogic srl
 * @license         GNU/GPL v3 or later
 */

// Autoloader definition
spl_autoload_register('classLoader');
function classLoader($class)
{
	if (stripos($class, EXTENSION_IDENTIFIER) !== 0)
	{
		return false;
	}

	$class  = preg_replace('/^' . EXTENSION_IDENTIFIER . '/i', '', $class);
	$folder = false;
	if (stripos($class, 'Controller') === 0)
	{
		$folder = "controllers";
		$class  = str_ireplace('Controller', '', $class);
	}
	if (stripos($class, 'Model') === 0)
	{
		$folder = "models";
		$class  = str_ireplace('Model', '', $class);
	}
	if (stripos($class, 'Helper') === 0)
	{
		$folder = "helpers";
		$class  = str_ireplace('Helper', '', $class);
	}
	if (stripos($class, 'ViewBase') === 0)
	{
		$folder = "views";
		$class  = str_ireplace('View', '', $class);
	}
	if (!$folder)
	{
		return false;
	}

	$file = '/components/' . EXTENSION_ELEMENT . '/' . strtolower($folder) . '/' . strtolower($class) . '.php';
	if (file_exists(JPATH_ROOT . $file))
	{
		include JPATH_ROOT . $file;
	}
	else
	{
		if (file_exists(JPATH_ADMINISTRATOR . $file))
		{
			include JPATH_ADMINISTRATOR . $file;
		}
		else
		{
			return false;
		}
	}
}

