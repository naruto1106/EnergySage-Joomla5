<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 *
 * @copyright   (C) 2010 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Language\Text;

if (!$list) {
    return;
}

?>
<div class="article-sidebar-collapse-item">
    <button data-toggle="collapse" data-target="#table-contents" class="collapse-btn">
        <div>
            Table of contents
        </div>    
        <div>
        <img src="images/energy/Article/dropdown-icon.png" width="24" height="24" loading="lazy" data-path="local-images:/energy/Article/dropdown-icon.png">
        </div>
    </button>
    <ul id="table-contents" class="mod-articlescategory category-module mod-list collapse">
        <?php if ($grouped) : ?>
            <?php foreach ($list as $groupName => $items) : ?>
            <li>
                <div class="mod-articles-category-group"><?php echo Text::_($groupName); ?></div>
                <ul>
                    <?php require ModuleHelper::getLayoutPath('mod_articles_category', $params->get('layout', 'default') . '_items'); ?>
                </ul>
            </li>
            <?php endforeach; ?>
        <?php else : ?>
            <?php $items = $list; ?>
            <?php require ModuleHelper::getLayoutPath('mod_articles_category', $params->get('layout', 'default') . '_items'); ?>
        <?php endif; ?>
    </ul>
</div>

