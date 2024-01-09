<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Quoteform
 * @author     naruto U <naruto991223@gmail.com>
 * @copyright  2023 naruto U
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Quoteform\Component\Quoteform\Site\Dispatcher;

defined('JPATH_PLATFORM') or die;

use Joomla\CMS\Dispatcher\ComponentDispatcher;
use Joomla\CMS\Language\Text;

/**
 * ComponentDispatcher class for Com_Quoteform
 *
 * @since  1.0.0
 */
class Dispatcher extends ComponentDispatcher
{
	/**
	 * Dispatch a controller task. Redirecting the user if appropriate.
	 *
	 * @return  void
	 *
	 * @since   1.0.0
	 */
	public function dispatch()
	{
		parent::dispatch();
	}
}
