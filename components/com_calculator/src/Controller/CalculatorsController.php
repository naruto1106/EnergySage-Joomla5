<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Calculator
 * @author     naruto U <naruto991223@gmail.com>
 * @copyright  2023 naruto U
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Calculator\Component\Calculator\Site\Controller;

\defined('_JEXEC') or die;

use Joomla\CMS\Application\SiteApplication;
use Joomla\CMS\Factory;
use Joomla\CMS\Language\Multilanguage;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\Controller\FormController;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Joomla\Utilities\ArrayHelper;

/**
 * Calculators class.
 *
 * @since  1.0.0
 */
class CalculatorsController extends FormController
{
	/**
	 * Proxy for getModel.
	 *
	 * @param   string  $name    The model name. Optional.
	 * @param   string  $prefix  The class prefix. Optional
	 * @param   array   $config  Configuration array for model. Optional
	 *
	 * @return  object	The model
	 *
	 * @since   1.0.0
	 */
	public function getModel($name = 'Calculators', $prefix = 'Site', $config = array())
	{
		return parent::getModel($name, $prefix, array('ignore_request' => true));
	}

	public function result()
	{
		$input = $this->input->getInputForRequestMethod();
		$data = [];
		$data['full-address'] = $input->get('full-address','','FULL-ADDRESS');
		$data['property_type'] = $input->get('property_type','','PROPERTY_TYPE');
		$data['monthly-bill'] = $input->get('monthly-bill','','MONTHLY-BILL');
		$data['return'] = 'index.php?option=com_calculator&view=calculator';
		
        // Set the return URL 
		$this->app->setUserState('solar.calculator.result', $data['return']);

	
		$this->app->redirect(Route::_($this->app->getUserState('solar.calculator.result'), false));


	}


}
