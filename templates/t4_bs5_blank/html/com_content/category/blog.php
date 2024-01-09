<?php

/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\FileLayout;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\User\User;

use Joomla\Registry\Registry;

$app = Factory::getApplication();

$this->category->text = $this->category->description;
$app->triggerEvent('onContentPrepare', [$this->category->extension . '.categories', &$this->category, &$this->params, 0]);
$this->category->description = $this->category->text;

$results = $app->triggerEvent('onContentAfterTitle', [$this->category->extension . '.categories', &$this->category, &$this->params, 0]);
$afterDisplayTitle = trim(implode("\n", $results));

$results = $app->triggerEvent('onContentBeforeDisplay', [$this->category->extension . '.categories', &$this->category, &$this->params, 0]);
$beforeDisplayContent = trim(implode("\n", $results));

$results = $app->triggerEvent('onContentAfterDisplay', [$this->category->extension . '.categories', &$this->category, &$this->params, 0]);
$afterDisplayContent = trim(implode("\n", $results));

$htag    = $this->params->get('show_page_heading') ? 'h2' : 'h1';

$modifiedTimestamp = $this->category->modified_time;

// Format the timestamp to the desired format
$modifiedDateFormatted = date('M d, Y', strtotime($modifiedTimestamp));

$user = User::getInstance($this->category->created_user_id);
$createdUserName = $user->name;
$modifiedUserName = JFactory::getUser($this->category->modified_user_id)->name;

// // Get the modules assigned to the specified position named article sidebar left top module content
// $modulePosition = 'article-sidebar-left-top';
// $articleTop = JModuleHelper::getModules($modulePosition);
// //Get the modules named Article sidebar left bottom content
// $modulePosition1 = 'article-sidebar-left-bottom';
// $articleBottom = JModuleHelper::getModules($modulePosition1);


?>
<div class="com-content-category-blog blog">
    <?php if ($this->params->get('show_page_heading')) : ?>
        <div class="article-page-heading">
            <h2 class="text-center" ><?php echo $this->escape($this->params->get('page_heading')); ?></h2>
            <!-- <p>Written by: <?php echo $createdUserName ?></p>
            <p>Edited by: <?php echo $createdUserName ?></p>
            <p>Updated: <?php echo $modifiedDateFormatted ?></p> -->
        </div>
     <?php endif; ?>
    <div class="sidebar-contain">
        <div class="article-sidebar-right">
            <?php if ($this->params->get('show_description_image') && $this->category->getParams()->get('image')) : ?>
                <div class="article-category-image">
                    <img src="<?php echo $this->category->getParams()->get('image') ?>" alt="<?php echo empty($this->category->getParams()->get('image_alt')) && empty($this->category->getParams()->get('image_alt_empty')) ? false : $this->category->getParams()->get('image_alt') ;?>" />
                </div>
            <?php endif; ?>
            <?php if ($this->params->get('show_description') && $this->category->description) : ?>
                <div class="article-category-description mt-4">
                    <?php echo $this->category->description; ?>
                </div>
            <?php endif; ?>
            <?php if (!empty($this->lead_items)) : ?>
                <div class="com-content-category-blog__items blog-items items-leading <?php echo $this->params->get('blog_class_leading'); ?>">
                    <?php foreach ($this->lead_items as &$item) : ?>
                        <div class="com-content-category-blog__item blog-item">
                            <?php
                            $this->item = &$item;
                            echo $this->loadTemplate('item');
                            ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <?php if (!empty($this->intro_items)) : ?>
                <?php $blogClass = $this->params->get('blog_class', ''); ?>
                <?php if ((int) $this->params->get('num_columns') > 1) : ?>
                    <?php $blogClass .= (int) $this->params->get('multi_column_order', 0) === 0 ? ' masonry-' : ' columns-'; ?>
                    <?php $blogClass .= (int) $this->params->get('num_columns'); ?>
                <?php endif; ?>
                <div class="com-content-category-blog__items blog-items <?php echo $blogClass; ?>">
                    <?php foreach ($this->intro_items as $key => &$item) : ?>
                        <div class="com-content-category-blog__item blog-item">
                                <?php
                                $this->item = & $item;
                                echo $this->loadTemplate('item');
                                ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        </div>
    </div>


    <?php if ($this->params->get('show_cat_tags', 1) && !empty($this->category->tags->itemTags)) : ?>
        <?php $this->category->tagLayout = new FileLayout('joomla.content.tags'); ?>
        <?php echo $this->category->tagLayout->render($this->category->tags->itemTags); ?>
    <?php endif; ?>


    <?php if (empty($this->lead_items) && empty($this->link_items) && empty($this->intro_items)) : ?>
        <?php if ($this->params->get('show_no_articles', 1)) : ?>
            <div class="alert alert-info">
                <span class="icon-info-circle" aria-hidden="true"></span><span class="visually-hidden"><?php echo Text::_('INFO'); ?></span>
                    <?php echo Text::_('COM_CONTENT_NO_ARTICLES'); ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
 

    

    

    <!-- <?php if (!empty($this->link_items)) : ?>
        <div class="items-more">
            <?php echo $this->loadTemplate('links'); ?>
        </div>
    <?php endif; ?> -->

    <?php if ($this->maxLevel != 0 && !empty($this->children[$this->category->id])) : ?>
        <div class="com-content-category-blog__children cat-children">
            <?php if ($this->params->get('show_category_heading_title_text', 1) == 1) : ?>
                <h3> <?php echo Text::_('JGLOBAL_SUBCATEGORIES'); ?> </h3>
            <?php endif; ?>
            <?php echo $this->loadTemplate('children'); ?> </div>
    <?php endif; ?>
    <?php if (($this->params->def('show_pagination', 1) == 1 || ($this->params->get('show_pagination') == 2)) && ($this->pagination->pagesTotal > 1)) : ?>
        <div class="com-content-category-blog__navigation w-100">
            <?php if ($this->params->def('show_pagination_results', 1)) : ?>
                <p class="com-content-category-blog__counter counter float-md-end pt-3 pe-2">
                    <?php echo $this->pagination->getPagesCounter(); ?>
                </p>
            <?php endif; ?>
            <div class="com-content-category-blog__pagination">
                <?php echo $this->pagination->getPagesLinks(); ?>
            </div>
        </div>
    <?php endif; ?>
</div>
