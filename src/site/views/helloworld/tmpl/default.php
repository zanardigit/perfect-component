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
?>
<h1>
    <?= $this->item->greeting ?>
    <?php if ($this->item->category and $this->item->params->get('show_category')): ?>
        (<?= $this->item->category ?>)
    <?php endif ?>
</h1>
