<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Calculator
 * @author     naruto U <naruto991223@gmail.com>
 * @copyright  2023 naruto U
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access
defined('_JEXEC') or die;

use \Joomla\CMS\HTML\HTMLHelper;
use \Joomla\CMS\Factory;
use \Joomla\CMS\Uri\Uri;
use \Joomla\CMS\Router\Route;
use \Joomla\CMS\Language\Text;
use \Joomla\CMS\Layout\LayoutHelper;
use \Joomla\CMS\Session\Session;
use \Joomla\CMS\User\UserFactoryInterface;

HTMLHelper::_('bootstrap.tooltip');
HTMLHelper::_('behavior.multiselect');
HTMLHelper::_('formbehavior.chosen', 'select');

$user       = Factory::getApplication()->getIdentity();
$userId     = $user->get('id');
$listOrder  = $this->state->get('list.ordering');
$listDirn   = $this->state->get('list.direction');
$canCreate  = $user->authorise('core.create', 'com_calculator') && file_exists(JPATH_COMPONENT . DIRECTORY_SEPARATOR . 'forms' . DIRECTORY_SEPARATOR . 'calculatorform.xml');
$canEdit    = $user->authorise('core.edit', 'com_calculator') && file_exists(JPATH_COMPONENT .  DIRECTORY_SEPARATOR . 'forms' . DIRECTORY_SEPARATOR . 'calculatorform.xml');
$canCheckin = $user->authorise('core.manage', 'com_calculator');
$canChange  = $user->authorise('core.edit.state', 'com_calculator');
$canDelete  = $user->authorise('core.delete', 'com_calculator');

// Import CSS
$wa = $this->document->getWebAssetManager();
$wa->useStyle('com_calculator.list');


//Import customize css and javascript
$doc = Factory::getDocument();
$doc->addStylesheet( Uri::root(true) . '/components/com_calculator/css/style.css' );
$doc->addScript( Uri::root(true) . '/components/com_calculator/js/custom.js' );

?>

<form action="<?php echo Route::_('index.php?option=com_calculator&task=calculators.result') ?>" method="post"
	  name="adminForm" id="adminForm">
	<div class="container-calculator" id="hero-contain">
		<div class="calc-banner text-center">
			<h1>Calculate your solar panel savings</h1>
			<h3>EnergySage helps you find your solar options</h3>
		</div>
		<div class="calc-body">
			<div class="row calc-body-section1">
				<div class="col-12 col-sm-12 col-md-8 ">
					<h2>Solar Calculator</h2>
					<p>Use this solar panel calculator to quickly estimate your solar potential and savings by address. Estimates are based on your roof, electricity bill, and actual offers in your area.</p>
					<p>Reminder: we will not sell, trade, or rent your personal information to others without your permission.</p>
				</div>
			</div>
			<div class="calc-body-enter-address">
				<h3>Your Property Address</h3>
				<div>
					<input type="text" name="full-address" id="full-address" class="form-control calc-address" required>
					<img src="https://www.energysage.com/static/img/solar-calculator/powered.03632ec49e21.png" class="mt-4 sunroof" alt="Powered by Google Project Sunroof">
					<img src="<?php echo JURI::base().'components/com_calculator/image/sunroof.png';  ?>" class="sunroof-map" alt="sunroof">
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-sm-12 col-md-12 col-lg-4">
					<h3>Your Property Type</h3>
					<div class="property-type">
						<label >
							<input type="radio" name="property_type" value="residential" id="residential" checked>
							Residential
							<span class="tooltip123">
									<svg class="m-svg-icon m-svg-icon__question question-icon text-gray-600" width="16" viewBox="0 0 14 16" version="1.1" height="18" aria-hidden="true"><path fill-rule="evenodd" d="M6 10h2v2H6v-2zm4-3.5C10 8.64 8 9 8 9H6c0-.55.45-1 1-1h.5c.28 0 .5-.22.5-.5v-1c0-.28-.22-.5-.5-.5h-1c-.28 0-.5.22-.5.5V7H4c0-1.5 1.5-3 3-3s3 1 3 2.5zM7 2.3c3.14 0 5.7 2.56 5.7 5.7s-2.56 5.7-5.7 5.7A5.71 5.71 0 0 1 1.3 8c0-3.14 2.56-5.7 5.7-5.7zM7 1C3.14 1 0 4.14 0 8s3.14 7 7 7 7-3.14 7-7-3.14-7-7-7z"></path></svg>
								<span class="tooltiptext">
									Includes single family homes or up to 4 unit condo buildings.
								</span>
							</span>
						</label>
					</div>
					<div class="property-type">
						<label>
							<input type="radio" name="property_type" value="commercial">
							Commercial
							<span class="tooltip123">
									<svg class="m-svg-icon m-svg-icon__question question-icon text-gray-600" width="16" viewBox="0 0 14 16" version="1.1" height="18" aria-hidden="true"><path fill-rule="evenodd" d="M6 10h2v2H6v-2zm4-3.5C10 8.64 8 9 8 9H6c0-.55.45-1 1-1h.5c.28 0 .5-.22.5-.5v-1c0-.28-.22-.5-.5-.5h-1c-.28 0-.5.22-.5.5V7H4c0-1.5 1.5-3 3-3s3 1 3 2.5zM7 2.3c3.14 0 5.7 2.56 5.7 5.7s-2.56 5.7-5.7 5.7A5.71 5.71 0 0 1 1.3 8c0-3.14 2.56-5.7 5.7-5.7zM7 1C3.14 1 0 4.14 0 8s3.14 7 7 7 7-3.14 7-7-3.14-7-7-7z"></path></svg>
								<span class="tooltiptext">
									Includes apartment/condo buildings, industrial buildings, retail, etc.
								</span>
							</span>
						</label>
					</div>
					<div class="property-type ">
						<label>
							<input type="radio" name="property_type" value="non-profit" >
							Non-Profit
							<span class="tooltip123">
									<svg class="m-svg-icon m-svg-icon__question question-icon text-gray-600" width="16" viewBox="0 0 14 16" version="1.1" height="18" aria-hidden="true"><path fill-rule="evenodd" d="M6 10h2v2H6v-2zm4-3.5C10 8.64 8 9 8 9H6c0-.55.45-1 1-1h.5c.28 0 .5-.22.5-.5v-1c0-.28-.22-.5-.5-.5h-1c-.28 0-.5.22-.5.5V7H4c0-1.5 1.5-3 3-3s3 1 3 2.5zM7 2.3c3.14 0 5.7 2.56 5.7 5.7s-2.56 5.7-5.7 5.7A5.71 5.71 0 0 1 1.3 8c0-3.14 2.56-5.7 5.7-5.7zM7 1C3.14 1 0 4.14 0 8s3.14 7 7 7 7-3.14 7-7-3.14-7-7-7z"></path></svg>
								<span class="tooltiptext">
									Includes educational and religious institutions.
								</span>
							</span>
						</label>
					</div>
				</div>
				<div class="col-12 col-sm-12 col-md-12 col-lg-8">
					<h3>Your Average Monthly Eelectricity Bill</h3>
					<div class="calc-input-group">
						<div class="calc-input-prefix">
							<span>$</span>
						</div>
						<div class="calc-input-body">
							<input type="number" class="monthly-input" name="monthly-bill" id="monthly-bill" required>
						</div>
					</div>
					<p class="mt-2">(Your best estimate is fine)</p>
					<button class="btn btn-primary my-3 calc-btn" type="button" onclick="submitForm()">Calculate</button>

				</div>
			</div>
		</div>
	</div>
	<div class="container-calculator" id="loading-screen">
		<h2 class="text-center">Calculating your customized solar savings. Checking your...</h2>
		<div class="d-md-flex flex-row-reverse mt-5">
			<div class="d-flex flex-column flex-fill ml-0 ml-md-2">
				<ol class="market-estimate-metrics">
					<li class="mb-4 d-flex align-items-center h-15 ">
						<span id="loading-image-1" class="loading-image "><img src="https://www.energysage.com/static/img/icons/roof.ffa556e76782.png" alt="roof icon"></span><span class="loading-label ml-2" id="loading-text-1">Roof size and orientation</span>
					</li>
					<li class="mb-4 d-flex align-items-center h-15">
						<span id="loading-image-2" class="loading-image"><img src="https://www.energysage.com/static/img/icons/shading.63c48b95899e.png" alt="shading icon"></span><span class="loading-label ml-2" id="loading-text-2">Shading on roof</span>
					</li>
					<li class="mb-4 d-flex align-items-center h-15">
						<span id="loading-image-3" class="loading-image"><img src="https://www.energysage.com/static/img/icons/electric.1e62d4c716a7.png" alt="electric icon"></span><span class="loading-label ml-2" id="loading-text-3">Electricity rates</span>
					</li>
					<li class="mb-4 d-flex align-items-center h-15">
						<span id="loading-image-4" class="loading-image"><img src="https://www.energysage.com/static/img/icons/rebates.7b1bd7203df1.png" alt="rebates icon"></span><span class="loading-label ml-2" id="loading-text-4">Rebates and incentives</span>
					</li>
					<li class="mb-4 d-flex align-items-center h-15">
						<span id="loading-image-5" class="loading-image"><img src="https://www.energysage.com/static/img/icons/marketprice.3f35ca694817.png" alt="market price icon"></span><span class="loading-label ml-2" id="loading-text-5">Current market price data</span>
					</li>
				</ol>
            </div>
            <div class="d-flex flex-column flex-fill align-items-center">
				<div id="id_market-estimate-gif" class="d-none d-md-block market-estimate-gif mb-5">
					<img src="https://www.energysage.com/static/img/icons/ES_leaf.9e602146e3e5.png">
				</div>
				<ol class="market-estimate-list p-3 mb-3 ">
					<li>
						<h3>Step 1</h3>
						<p>Estimate your savings with our solar calculator</p>
					</li>
					<li>
						<h3 class="mt-4">Step 2</h3>
						<p class="m-0">Get quotes online from our <span class="nowrap">pre-screened</span> installers</p>
					</li>
				</ol>
            </div>
        </div>
	</div>
	<?php echo HTMLHelper::_('form.token'); ?>

</form>

<?php
	if($canDelete) {
		$wa->addInlineScript("
			jQuery(document).ready(function () {
				jQuery('.delete-button').click(deleteItem);
			});

			function deleteItem() {

				if (!confirm(\"" . Text::_('COM_CALCULATOR_DELETE_MESSAGE') . "\")) {
					return false;
				}
			}
		", [], [], ["jquery"]);
	}
?>