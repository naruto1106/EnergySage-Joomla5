<?php

/**
 * @version    CVS: 1.0.0
 * @package    Com_Quoteform
 * @author     naruto U <naruto991223@gmail.com>
 * @copyright  2023 naruto U
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Quoteform\Component\Quoteform\Site\Service;

// No direct access
defined('_JEXEC') or die;

use Joomla\CMS\Component\Router\RouterViewConfiguration;
use Joomla\CMS\Component\Router\RouterView;
use Joomla\CMS\Component\Router\Rules\StandardRules;
use Joomla\CMS\Component\Router\Rules\NomenuRules;
use Joomla\CMS\Component\Router\Rules\MenuRules;
use Joomla\CMS\Factory;
use Joomla\CMS\Categories\Categories;
use Joomla\CMS\Application\SiteApplication;
use Joomla\CMS\Categories\CategoryFactoryInterface;
use Joomla\CMS\Categories\CategoryInterface;
use Joomla\Database\DatabaseInterface;
use Joomla\CMS\Menu\AbstractMenu;

/**
 * Class QuoteformRouter
 *
 */
class Router extends RouterView
{
	private $noIDs;
	/**
	 * The category factory
	 *
	 * @var    CategoryFactoryInterface
	 *
	 * @since  1.0.0
	 */
	private $categoryFactory;

	/**
	 * The category cache
	 *
	 * @var    array
	 *
	 * @since  1.0.0
	 */
	private $categoryCache = [];

	public function __construct(SiteApplication $app, AbstractMenu $menu, CategoryFactoryInterface $categoryFactory, DatabaseInterface $db)
	{
		$params = Factory::getApplication()->getParams('com_quoteform');
		$this->noIDs = (bool) $params->get('sef_ids');
		$this->categoryFactory = $categoryFactory;
		
		
			$quoteforms = new RouterViewConfiguration('quoteforms');
			$this->registerView($quoteforms);
			$ccQuoteform = new RouterViewConfiguration('quoteform');
			$ccQuoteform->setKey('id')->setParent($quoteforms);
			$this->registerView($ccQuoteform);
			$quoteformform = new RouterViewConfiguration('quoteformform');
			$quoteformform->setKey('id');
			$this->registerView($quoteformform);

		parent::__construct($app, $menu);

		$this->attachRule(new MenuRules($this));
		$this->attachRule(new StandardRules($this));
		$this->attachRule(new NomenuRules($this));
	}


	
		/**
		 * Method to get the segment(s) for an quoteform
		 *
		 * @param   string  $id     ID of the quoteform to retrieve the segments for
		 * @param   array   $query  The request that is built right now
		 *
		 * @return  array|string  The segments of this item
		 */
		public function getQuoteformSegment($id, $query)
		{
			return array((int) $id => $id);
		}
			/**
			 * Method to get the segment(s) for an quoteformform
			 *
			 * @param   string  $id     ID of the quoteformform to retrieve the segments for
			 * @param   array   $query  The request that is built right now
			 *
			 * @return  array|string  The segments of this item
			 */
			public function getQuoteformformSegment($id, $query)
			{
				return $this->getQuoteformSegment($id, $query);
			}

	
		/**
		 * Method to get the segment(s) for an quoteform
		 *
		 * @param   string  $segment  Segment of the quoteform to retrieve the ID for
		 * @param   array   $query    The request that is parsed right now
		 *
		 * @return  mixed   The id of this item or false
		 */
		public function getQuoteformId($segment, $query)
		{
			return (int) $segment;
		}
			/**
			 * Method to get the segment(s) for an quoteformform
			 *
			 * @param   string  $segment  Segment of the quoteformform to retrieve the ID for
			 * @param   array   $query    The request that is parsed right now
			 *
			 * @return  mixed   The id of this item or false
			 */
			public function getQuoteformformId($segment, $query)
			{
				return $this->getQuoteformId($segment, $query);
			}

	/**
	 * Method to get categories from cache
	 *
	 * @param   array  $options   The options for retrieving categories
	 *
	 * @return  CategoryInterface  The object containing categories
	 *
	 * @since   1.0.0
	 */
	private function getCategories(array $options = []): CategoryInterface
	{
		$key = serialize($options);

		if (!isset($this->categoryCache[$key]))
		{
			$this->categoryCache[$key] = $this->categoryFactory->createCategory($options);
		}

		return $this->categoryCache[$key];
	}
}
