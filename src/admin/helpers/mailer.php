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
 * HelloWorld Mailer helper.
 *
 * @return  void
 *
 * @since   1.6
 */
class HelloWorldHelperMailer
{
    public static function sendMail()
    {
        \JLog::add("Going to send an email", \JLog::DEBUG, EXTENSION_IDENTIFIER);
        // Not implemented yet!
        \JLog::add("Sorry, mailer is not implemented yet", \JLog::ERROR, EXTENSION_IDENTIFIER);
    }
}
