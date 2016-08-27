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

/**
 * HelloWorld component helper.
 *
 * @param   string  $submenu  The name of the active view.
 *
 * @return  void
 *
 * @since   1.6
 */
abstract class HelloWorldHelper
{
	/**
	 * Configure the Linkbar. This is used by com_categories so we cannot use our constant
	 */
	public static function addSubmenu($submenu) 
	{
	    \JHtmlSidebar::addEntry(
			\JText::_('COM_HELLOWORLD_SUBMENU_MESSAGES'),
			'index.php?option=com_helloworld',
			$submenu == 'messages'
		);

        \JHtmlSidebar::addEntry(
			\JText::_('COM_HELLOWORLD_SUBMENU_CATEGORIES'),
			'index.php?option=com_categories&view=categories&extension=com_helloworld',
			$submenu == 'categories'
		);

		// set some global property
		$document = \JFactory::getDocument();
		$document->addStyleDeclaration('.icon-48-helloworld ' .
		                               '{background-image: url(../media/com_helloworld/images/tux-48x48.png);}');
		if ($submenu == 'categories') 
		{
			$document->setTitle(\JText::_('COM_HELLOWORLD_ADMINISTRATION_CATEGORIES'));
		}
	}

	/**
	 * Get the actions
	 */
	public static function getActions($messageId = 0)
	{	
		$result	= new \JObject;

		if (empty($messageId)) {
			$assetName = EXTENSION_ELEMENT;
		}
		else {
			$assetName = EXTENSION_ELEMENT  . '.message.' . (int) $messageId;
		}

		$actions = \JAccess::getActionsFromFile(
			JPATH_ADMINISTRATOR . '/components/' . EXTENSION_ELEMENT . '/access.xml',
			"/access/section[@name='component']/"
        );

		foreach ($actions as $action) {
			$result->set($action->name, \JFactory::getUser()->authorise($action->name, $assetName));
		}

		return $result;
	}
}
