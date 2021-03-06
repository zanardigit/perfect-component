<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// This makes all the rest of the code much more reusable
define('EXTENSION_ELEMENT', 'com_helloworld');
define('EXTENSION_IDENTIFIER', 'helloworld');

// Start logger
JLog::addLogger(array("text_file" => EXTENSION_IDENTIFIER . ".log.php"), JLog::ALL, EXTENSION_IDENTIFIER);

// From now on, you don't usually have to require class files
require_once __DIR__ . '/autoloader.php';

// Set some global property
$document = \JFactory::getDocument();
$document->addStyleDeclaration('.icon-helloworld {background-image: url(../media/' . EXTENSION_ELEMENT . '/images/tux-16x16.png);}');

// Access check: is this user allowed to access the backend of this component?
if (!\JFactory::getUser()->authorise('core.manage', EXTENSION_ELEMENT))
{
    throw new \Exception(\JText::_('JERROR_ALERTNOAUTHOR'), 404);
}

// Send a test email
HelloWorldHelperMailer::sendMail();

// Get an instance of the controller prefixed by HelloWorld
$controller = \JControllerLegacy::getInstance('HelloWorld');

// Perform the Request task
$input = \JFactory::getApplication()->input;
$controller->execute($input->getCmd('task'));

// Redirect if set by the controller
$controller->redirect();
