<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Quoteform
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
$canCreate  = $user->authorise('core.create', 'com_quoteform') && file_exists(JPATH_COMPONENT . DIRECTORY_SEPARATOR . 'forms' . DIRECTORY_SEPARATOR . 'quoteformform.xml');
$canEdit    = $user->authorise('core.edit', 'com_quoteform') && file_exists(JPATH_COMPONENT .  DIRECTORY_SEPARATOR . 'forms' . DIRECTORY_SEPARATOR . 'quoteformform.xml');
$canCheckin = $user->authorise('core.manage', 'com_quoteform');
$canChange  = $user->authorise('core.edit.state', 'com_quoteform');
$canDelete  = $user->authorise('core.delete', 'com_quoteform');

// Import CSS
$wa = $this->document->getWebAssetManager();
$wa->useStyle('com_quoteform.list');

//Import customize css and javascript
$doc = Factory::getDocument();
$doc->addStylesheet( Uri::root(true) . '/components/com_quoteform/css/style.css' );
$doc->addScript( Uri::root(true) . '/components/com_quoteform/js/custom.js' );

// $input = $this->input->getInputForRequestMethod();
// 		$data = [];
// 		$data['zip-code'] = $input->get('zip-code','','ZIP-CODE');

?>

<form  method="post" name="adminForm" id="adminForm">
	 <div>
		<div class="navbar-quoteform">
			<div class="progress">
				<div id="myBar" class="progress-bar" role="progressbar" aria-valuenow="7" aria-valuemin="0" aria-valuemax="100" style="width:7%"></div>
			</div>
			<div class="progress-step">
				<span> STEP <span id="demo"> 1</span> / 14 </span>
			</div>
		</div>
		
		<div class="row justify-content-center">
			<div class="card-width">
				<div class="card bg-light rounded-4 shadow-sm border-0  h-100 p-3">
					<div class="card-body" id="screen1">
						<h3 class="card-body-title">What type of property do you want quotes for?</h3>
						<div class="RadioGroup text-center">
							<label for="__BVID__45" class="radioCard">
								<input type="radio" id="__BVID__45" value="residential" name="step1">
								Home
							</label>
							<label for="__BVID__47" class="radioCard">
								<input type="radio" id="__BVID__47" value="commercial" name="step1">
								Business
							</label>
							<label for="__BVID__49" class="radioCard">
								<input type="radio" id="__BVID__49" value="nonprofit" name="step1">
								Nonprofit
							</label>
						</div>
						<div class="row justify-content-end card-bottom">
							<div class="col col-sm-12 col-md-6 ">
								<button class="btn btn-primary justify-content-center py-2 w-100 next-button" type="button" onclick="goto(1)"
									disabled="true">
									Next
									<svg data-v-3e94f746="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
										data-v-6039da64="" style="height: 24px; width: 24px;">
										<path fill-rule="evenodd" clip-rule="evenodd"
											d="M7.293 3.293a1 1 0 0 1 1.414 0l8 8a1 1 0 0 1 0 1.414l-8 8a1 1 0 0 1-1.414-1.414L14.586 12 7.293 4.707a1 1 0 0 1 0-1.414Z">
										</path>
									</svg>
								</button>
							</div>
						</div>
					</div>
					<div class="card-body" id="screen2">
						<h3 class="card-body-title">Do you own or rent this home?</h3>
						<div class="RadioGroup text-center">
							<label for="__BVID__2_1" class="radioCard">
								<input type="radio" id="__BVID__2_1" value="true" name="step2">
								I own
							</label>
							<label for="__BVID__2_2" class="radioCard">
								<input type="radio" id="__BVID__2_2" value="false" name="step2">
								I rent
							</label>
						
						</div>
						<div class="row justify-content-end card-bottom">
							<div class="col-2 col-sm-2 col-md-2">
								<button class="btn btn-outline-primary justify-content-center py-2" type="button" onclick="goback()"
									>
									<svg data-v-3e94f746="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" data-v-6039da64="" style="height: 24px; width: 24px;"><path fill-rule="evenodd" clip-rule="evenodd" d="M15.707 3.293a1 1 0 0 1 0 1.414L8.414 12l7.293 7.293a1 1 0 0 1-1.414 1.414l-8-8a1 1 0 0 1 0-1.414l8-8a1 1 0 0 1 1.414 0Z"></path></svg>
								</button>
							</div>
							<div class="col-10 col-sm-10 col-md-6 ">
								<button class="btn btn-primary justify-content-center py-2 w-100 next-button" type="button" onclick="goto(2)"
									disabled="true">
									Next
									<svg data-v-3e94f746="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
										data-v-6039da64="" style="height: 24px; width: 24px;">
										<path fill-rule="evenodd" clip-rule="evenodd"
											d="M7.293 3.293a1 1 0 0 1 1.414 0l8 8a1 1 0 0 1 0 1.414l-8 8a1 1 0 0 1-1.414-1.414L14.586 12 7.293 4.707a1 1 0 0 1 0-1.414Z">
										</path>
									</svg>
								</button>
							</div>
						</div>
					</div>
					<div class="card-body" id="screen3">
						<h3 class="card-body-title">Do you meet any of the following criteria?</h3>
						<div class="RadioGroup text-center">
							<label for="__BVID__3_1" class="radioCard">
								<input type="radio" id="__BVID__3_1" value="shopping_someone_else" name="step3">
								I'm shopping for someone else(family memeber, landlord)
							</label>
							<label for="__BVID__3_2" class="radioCard">
								<input type="radio" id="__BVID__3_2" value="shopping_hoa_or_multicondo" name="step3">
								I'm shopping for an HOA or a multi unit condo
							</label>
							<label for="__BVID__3_3" class="radioCard">
								<input type="radio" id="__BVID__3_3" value="rent_for_self" name="step3">
								None of these
							</label>

						</div>
						<div class="row justify-content-end card-bottom">
							<div class="col-2 col-sm-2 col-md-2">
								<button class="btn btn-outline-primary justify-content-center py-2" type="button" onclick="goback()"
									>
									<svg data-v-3e94f746="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" data-v-6039da64="" style="height: 24px; width: 24px;"><path fill-rule="evenodd" clip-rule="evenodd" d="M15.707 3.293a1 1 0 0 1 0 1.414L8.414 12l7.293 7.293a1 1 0 0 1-1.414 1.414l-8-8a1 1 0 0 1 0-1.414l8-8a1 1 0 0 1 1.414 0Z"></path></svg>
								</button>
							</div>
							<div class="col-10 col-sm-10 col-md-6 ">
								<button class="btn btn-primary justify-content-center py-2 w-100 next-button" type="button" onclick="goto(3)"
									disabled="true">
									Next
									<svg data-v-3e94f746="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
										data-v-6039da64="" style="height: 24px; width: 24px;">
										<path fill-rule="evenodd" clip-rule="evenodd"
											d="M7.293 3.293a1 1 0 0 1 1.414 0l8 8a1 1 0 0 1 0 1.414l-8 8a1 1 0 0 1-1.414-1.414L14.586 12 7.293 4.707a1 1 0 0 1 0-1.414Z">
										</path>
									</svg>
								</button>
							</div>
						</div>
					</div>
					<div class="card-body" id="screen4">
						<h3 class="card-body-title">How much is your average monthly electric bill?</h3>
						<p>It's ok if you don't know-we've set a default below based on average electricity costs in your area.</p>
						<div class="custom-range-container">
							<div class="value-badge" id="range-value">$150</div>
							<input type="range" min="50" max="1200" value="150" class="electric-bill"  id="range" >
							<div class="range-position">
								<p>$50</p>
								<p>$1200</p>
							</div>
						</div>
						<div class="row justify-content-end card-bottom">
							<div class="col-2 col-sm-2 col-md-2">
								<button class="btn btn-outline-primary justify-content-center py-2" type="button" onclick="goback()"
									>
									<svg data-v-3e94f746="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" data-v-6039da64="" style="height: 24px; width: 24px;"><path fill-rule="evenodd" clip-rule="evenodd" d="M15.707 3.293a1 1 0 0 1 0 1.414L8.414 12l7.293 7.293a1 1 0 0 1-1.414 1.414l-8-8a1 1 0 0 1 0-1.414l8-8a1 1 0 0 1 1.414 0Z"></path></svg>
								</button>
							</div>
							<div class="col-10 col-sm-10 col-md-6 ">
								<button class="btn btn-primary justify-content-center py-2 w-100 next-button" type="button" onclick="goto(4)"
									>
									Next
									<svg data-v-3e94f746="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
										data-v-6039da64="" style="height: 24px; width: 24px;">
										<path fill-rule="evenodd" clip-rule="evenodd"
											d="M7.293 3.293a1 1 0 0 1 1.414 0l8 8a1 1 0 0 1 0 1.414l-8 8a1 1 0 0 1-1.414-1.414L14.586 12 7.293 4.707a1 1 0 0 1 0-1.414Z">
										</path>
									</svg>
								</button>
							</div>
						</div>
					</div>
					<div class="card-body" id="screen5">
						<h3 class="card-body-title">Are you interested in solar batteries?</h3>
						<p>Homeowners often pair their solar panels with a battery so they can store energy on-site for later use.</p>
						<div class="RadioGroup text-center">
							<label for="__BVID__5_1" class="radioCard">
								<input type="radio" id="__BVID__5_1" value="interested" name="step5">
								Yes
							</label>
							<label for="__BVID__5_2" class="radioCard">
								<input type="radio" id="__BVID__5_2" value="not_interested" name="step5">
								No
							</label>

						</div>
						<div class="row justify-content-end card-bottom">
							<div class="col-2 col-sm-2 col-md-2">
								<button class="btn btn-outline-primary justify-content-center py-2" type="button" onclick="goback()">
									<svg data-v-3e94f746="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
										data-v-6039da64="" style="height: 24px; width: 24px;">
										<path fill-rule="evenodd" clip-rule="evenodd"
											d="M15.707 3.293a1 1 0 0 1 0 1.414L8.414 12l7.293 7.293a1 1 0 0 1-1.414 1.414l-8-8a1 1 0 0 1 0-1.414l8-8a1 1 0 0 1 1.414 0Z">
										</path>
									</svg>
								</button>
							</div>
							<div class="col-10 col-sm-10 col-md-6 ">
								<button class="btn btn-primary justify-content-center py-2 w-100 next-button" type="button" onclick="goto(5)"
									disabled="true">
									Next
									<svg data-v-3e94f746="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
										data-v-6039da64="" style="height: 24px; width: 24px;">
										<path fill-rule="evenodd" clip-rule="evenodd"
											d="M7.293 3.293a1 1 0 0 1 1.414 0l8 8a1 1 0 0 1 0 1.414l-8 8a1 1 0 0 1-1.414-1.414L14.586 12 7.293 4.707a1 1 0 0 1 0-1.414Z">
										</path>
									</svg>
								</button>
							</div>
						</div>
					</div>
					<div class="card-body" id="screen6">
						<h3 class="card-body-title">What's the main reason you want a battery?</h3>
						<div class="RadioGroup text-center">
							<label for="__BVID__6_1" class="radioCard">
								<input type="radio" id="__BVID__6_1" value="EBP" name="step6">
								<div>
									<img src="https://onboarding.energysage.com/img/back-up-power.9f380e8.svg" alt="">
								</div>
								<div>
									<p class="step6-title">Back up power</p>
									<span>Run appliances during a power outage</span>
								</div>
							</label>
							<label for="__BVID__6_2" class="radioCard">
								<input type="radio" id="__BVID__6_2" value="UR" name="step6">
								<div>
									<img src="https://onboarding.energysage.com/img/maximize-savings.c301e0b.svg" alt="">
								</div>
								<div>
									<p class="step6-title">Maximize savings</p>
									<span>Avoid paying for energy during peak hours</span>
								</div>
							</label>
							<label for="__BVID__6_3" class="radioCard">
								<input type="radio" id="__BVID__6_3" value="SS" name="step6">
								<div>
									<img src="https://onboarding.energysage.com/img/self-supply.0fb4540.svg" alt="">
								</div>
								<div>
									<p class="step6-title">Self supply</p>
									<span>Limit how much energy you pull from the grid</span>
								</div>
							</label>
						</div>
						<div class="row justify-content-end card-bottom">
							<div class="col-2 col-sm-2 col-md-2">
								<button class="btn btn-outline-primary justify-content-center py-2" type="button" onclick="goback()">
									<svg data-v-3e94f746="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
										data-v-6039da64="" style="height: 24px; width: 24px;">
										<path fill-rule="evenodd" clip-rule="evenodd"
											d="M15.707 3.293a1 1 0 0 1 0 1.414L8.414 12l7.293 7.293a1 1 0 0 1-1.414 1.414l-8-8a1 1 0 0 1 0-1.414l8-8a1 1 0 0 1 1.414 0Z">
										</path>
									</svg>
								</button>
							</div>
							<div class="col-10 col-sm-10 col-md-6 ">
								<button class="btn btn-primary justify-content-center py-2 w-100 next-button" type="button" onclick="goto(6)"
									disabled="true">
									Next
									<svg data-v-3e94f746="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
										data-v-6039da64="" style="height: 24px; width: 24px;">
										<path fill-rule="evenodd" clip-rule="evenodd"
											d="M7.293 3.293a1 1 0 0 1 1.414 0l8 8a1 1 0 0 1 0 1.414l-8 8a1 1 0 0 1-1.414-1.414L14.586 12 7.293 4.707a1 1 0 0 1 0-1.414Z">
										</path>
									</svg>
								</button>
							</div>
						</div>
					</div>
					<div class="card-body" id="screen7">
						<h3 class="card-body-title">If necessary, would you remove trees to go solar?</h3>
						<div class="RadioGroup text-center">
							<label for="__BVID__7_1" class="radioCard">
								<input type="radio" id="__BVID__7_1" value="yes" name="step7">
								Yes
							</label>
							<label for="__BVID__7_2" class="radioCard">
								<input type="radio" id="__BVID__7_2" value="no" name="step7">
								No
							</label>
						
						</div>
						<div class="row justify-content-end card-bottom">
							<div class="col-2 col-sm-2 col-md-2">
								<button class="btn btn-outline-primary justify-content-center py-2" type="button" onclick="goback()"
									>
									<svg data-v-3e94f746="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" data-v-6039da64="" style="height: 24px; width: 24px;"><path fill-rule="evenodd" clip-rule="evenodd" d="M15.707 3.293a1 1 0 0 1 0 1.414L8.414 12l7.293 7.293a1 1 0 0 1-1.414 1.414l-8-8a1 1 0 0 1 0-1.414l8-8a1 1 0 0 1 1.414 0Z"></path></svg>
								</button>
							</div>
							<div class="col-10 col-sm-10 col-md-6 ">
								<button class="btn btn-primary justify-content-center py-2 w-100 next-button" type="button" onclick="goto(7)"
									disabled="true">
									Next
									<svg data-v-3e94f746="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
										data-v-6039da64="" style="height: 24px; width: 24px;">
										<path fill-rule="evenodd" clip-rule="evenodd"
											d="M7.293 3.293a1 1 0 0 1 1.414 0l8 8a1 1 0 0 1 0 1.414l-8 8a1 1 0 0 1-1.414-1.414L14.586 12 7.293 4.707a1 1 0 0 1 0-1.414Z">
										</path>
									</svg>
								</button>
							</div>
						</div>
					</div>
					<div class="card-body" id="screen8">
						<h3 class="card-body-title">Is your roof more than 20 years old</h3>
						<div class="RadioGroup text-center">
							<label for="__BVID__8_1" class="radioCard">
								<input type="radio" id="__BVID__8_1" value="more_than_20" name="step8">
								Yes
							</label>
							<label for="__BVID__8_2" class="radioCard">
								<input type="radio" id="__BVID__8_2" value="less_than_20" name="step8">
								No
							</label>
							<label for="__BVID__8_3" class="radioCard">
								<input type="radio" id="__BVID__8_3" value="more_than_20_replacing" name="step8">
								Yes - but I plan to replace it to go solar
							</label>

						</div>
						<div class="row justify-content-end card-bottom">
							<div class="col-2 col-sm-2 col-md-2">
								<button class="btn btn-outline-primary justify-content-center py-2" type="button" onclick="goback()"
									>
									<svg data-v-3e94f746="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" data-v-6039da64="" style="height: 24px; width: 24px;"><path fill-rule="evenodd" clip-rule="evenodd" d="M15.707 3.293a1 1 0 0 1 0 1.414L8.414 12l7.293 7.293a1 1 0 0 1-1.414 1.414l-8-8a1 1 0 0 1 0-1.414l8-8a1 1 0 0 1 1.414 0Z"></path></svg>
								</button>
							</div>
							<div class="col-10 col-sm-10 col-md-6 ">
								<button class="btn btn-primary justify-content-center py-2 w-100 next-button" type="button" onclick="goto(8)"
									disabled="true">
									Next
									<svg data-v-3e94f746="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
										data-v-6039da64="" style="height: 24px; width: 24px;">
										<path fill-rule="evenodd" clip-rule="evenodd"
											d="M7.293 3.293a1 1 0 0 1 1.414 0l8 8a1 1 0 0 1 0 1.414l-8 8a1 1 0 0 1-1.414-1.414L14.586 12 7.293 4.707a1 1 0 0 1 0-1.414Z">
										</path>
									</svg>
								</button>
							</div>
						</div>
					</div>
					<div class="card-body" id="screen9">
						<h3 class="card-body-title">Let's find your roof</h3>
						<p>Your address allows our installer network to tailor their quotes to the specific needs of your property.</p>
						<div class="row mt-5">
							<div class="col-12 col-sm-12  form-group">
								<label for="address">Address:</label>
								<input type="text" class="form-control step12-name mt-2" id="address" placeholder="Enter a location" >
							</div>
						</div>	
						<div class="row justify-content-end card-bottom">
							<div class="col-2 col-sm-2 col-md-2">
								<button class="btn btn-outline-primary justify-content-center py-2" type="button" onclick="goback()"
									>
									<svg data-v-3e94f746="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" data-v-6039da64="" style="height: 24px; width: 24px;"><path fill-rule="evenodd" clip-rule="evenodd" d="M15.707 3.293a1 1 0 0 1 0 1.414L8.414 12l7.293 7.293a1 1 0 0 1-1.414 1.414l-8-8a1 1 0 0 1 0-1.414l8-8a1 1 0 0 1 1.414 0Z"></path></svg>
								</button>
							</div>
							<div class="col-10 col-sm-10 col-md-6 ">
								<button class="btn btn-primary justify-content-center py-2 w-100 next-button" type="button" onclick="goto(9)"
									disabled="true">
									Next
									<svg data-v-3e94f746="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
										data-v-6039da64="" style="height: 24px; width: 24px;">
										<path fill-rule="evenodd" clip-rule="evenodd"
											d="M7.293 3.293a1 1 0 0 1 1.414 0l8 8a1 1 0 0 1 0 1.414l-8 8a1 1 0 0 1-1.414-1.414L14.586 12 7.293 4.707a1 1 0 0 1 0-1.414Z">
										</path>
									</svg>
								</button>
							</div>
						</div>
					</div>
					<div class="card-body" id="screen10">
						<h3 class="card-body-title">Confirm your property</h3>
						<p>If the pin is not on your property, click your roof to place it.</p>
						<p><span class="step10-address">Address:</span>123 William Street, staten island, Ny, USA</p>
						<img src="<?php echo JURI::base().'components/com_quoteform/image/myroof.png' ?>" alt="">
						<div class="row justify-content-end card-bottom">
							<div class="col-2 col-sm-2 col-md-2">
								<button class="btn btn-outline-primary justify-content-center py-2" type="button" onclick="goback()"
									>
									<svg data-v-3e94f746="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" data-v-6039da64="" style="height: 24px; width: 24px;"><path fill-rule="evenodd" clip-rule="evenodd" d="M15.707 3.293a1 1 0 0 1 0 1.414L8.414 12l7.293 7.293a1 1 0 0 1-1.414 1.414l-8-8a1 1 0 0 1 0-1.414l8-8a1 1 0 0 1 1.414 0Z"></path></svg>
								</button>
							</div>
							<div class="col-10 col-sm-10 col-md-6 ">
								<button class="btn btn-primary justify-content-center py-2 w-100 next-button" type="button" onclick="goto(10)"
									>
									Next
									<svg data-v-3e94f746="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
										data-v-6039da64="" style="height: 24px; width: 24px;">
										<path fill-rule="evenodd" clip-rule="evenodd"
											d="M7.293 3.293a1 1 0 0 1 1.414 0l8 8a1 1 0 0 1 0 1.414l-8 8a1 1 0 0 1-1.414-1.414L14.586 12 7.293 4.707a1 1 0 0 1 0-1.414Z">
										</path>
									</svg>
								</button>
							</div>
						</div>
					</div>
					<div class="card-body" id="screen11">

					</div>
					<div class="card-body" id="screen12">
						<h3 class="card-body-title">Almost done! What's your name?</h3>
						<div class="row ">
							<div class="col-12 col-sm-12 col-md-6 form-group mt-5">
								<label for="first_name">First Name:</label>
								<input type="text" class="form-control step12-name mt-2"  id="first_name">
							</div>
							<div class="col-12 col-sm-12 col-md-6 form-group mt-5">
								<label for="last_name">Last Name:</label>
								<input type="text"  class="form-control step12-name mt-2"  id="last_name">
							</div>
						</div>		
						<div class="row justify-content-end card-bottom">
							<div class="col-2 col-sm-2 col-md-2">
								<button class="btn btn-outline-primary justify-content-center py-2" type="button" onclick="goback()"
									>
									<svg data-v-3e94f746="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" data-v-6039da64="" style="height: 24px; width: 24px;"><path fill-rule="evenodd" clip-rule="evenodd" d="M15.707 3.293a1 1 0 0 1 0 1.414L8.414 12l7.293 7.293a1 1 0 0 1-1.414 1.414l-8-8a1 1 0 0 1 0-1.414l8-8a1 1 0 0 1 1.414 0Z"></path></svg>
								</button>
							</div>
							<div class="col-10 col-sm-10 col-md-6 ">
								<button class="btn btn-primary justify-content-center py-2 w-100 next-button" type="button" onclick="goto(12)"
								disabled="true">
									Next
									<svg data-v-3e94f746="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
										data-v-6039da64="" style="height: 24px; width: 24px;">
										<path fill-rule="evenodd" clip-rule="evenodd"
											d="M7.293 3.293a1 1 0 0 1 1.414 0l8 8a1 1 0 0 1 0 1.414l-8 8a1 1 0 0 1-1.414-1.414L14.586 12 7.293 4.707a1 1 0 0 1 0-1.414Z">
										</path>
									</svg>
								</button>
							</div>
						</div>
					</div>
					<div class="card-body" id="screen13">
						<h3 class="card-body-title">And what's your email address?</h3>
						<div class="row mt-5">
							<div class="col-12 col-sm-12  form-group">
								<label for="my_email">Email:</label>
								<input type="email" class="form-control step12-name mt-2" id="my_email">
							</div>
						</div>		
						<div class="row justify-content-end card-bottom">
							<div class="col-2 col-sm-2 col-md-2">
								<button class="btn btn-outline-primary justify-content-center py-2" type="button" onclick="goback()"
									>
									<svg data-v-3e94f746="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" data-v-6039da64="" style="height: 24px; width: 24px;"><path fill-rule="evenodd" clip-rule="evenodd" d="M15.707 3.293a1 1 0 0 1 0 1.414L8.414 12l7.293 7.293a1 1 0 0 1-1.414 1.414l-8-8a1 1 0 0 1 0-1.414l8-8a1 1 0 0 1 1.414 0Z"></path></svg>
								</button>
							</div>
							<div class="col-10 col-sm-10 col-md-6 ">
								<button class="btn btn-primary justify-content-center py-2 w-100 next-button" type="button" onclick="goto(12)"
								disabled="true">
									Submit
									<svg data-v-3e94f746="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
										data-v-6039da64="" style="height: 24px; width: 24px;">
										<path fill-rule="evenodd" clip-rule="evenodd"
											d="M7.293 3.293a1 1 0 0 1 1.414 0l8 8a1 1 0 0 1 0 1.414l-8 8a1 1 0 0 1-1.414-1.414L14.586 12 7.293 4.707a1 1 0 0 1 0-1.414Z">
										</path>
									</svg>
								</button>
							</div>
							<div class="col-12 col-sm-12 col-md-8">
								<span class="step12-privacy">By selecting “Submit” you are agreeing to EnergySage’s Terms of Use and Privacy Policy. </span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	 </div>
</form>


<?php 
	$wa->addInlineScript("
	jQuery(document).ready(function () {
		// jQuery('#t4-main-body .t4-section-inner').removeClass('container');
	});
	
", [], [], ["jquery"]);

?>
