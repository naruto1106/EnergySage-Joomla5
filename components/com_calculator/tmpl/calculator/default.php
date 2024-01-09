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
use \Joomla\CMS\Session\Session;
use Joomla\Utilities\ArrayHelper;

$canEdit = Factory::getApplication()->getIdentity()->authorise('core.edit', 'com_calculator');

if (!$canEdit && Factory::getApplication()->getIdentity()->authorise('core.edit.own', 'com_calculator'))
{
	$canEdit = Factory::getApplication()->getIdentity()->id == $this->item->created_by;
}


$doc = Factory::getDocument();
$doc->addStylesheet( Uri::root(true) . '/components/com_calculator/css/style.css' );
$doc->addScript( Uri::root(true) . '/components/com_calculator/js/custom.js' );
?>

<div>
    <div class="section-hero">
        <div class="block-map"></div>
        <div class="block-mask"></div>
        <div class="container-hero">
            <div class="row row-height">
                <div class="col-sm-12 col-lg-7 d-flex flex-column justify-content-end pt-5 pb-3 row-height-left">
                    <h1>Congratulations!</h1>
                    <h2>Solar can save you up to $17,000</h2>
                    <p>Payback in about 9 years. $0-down financing options available.</p>
                </div>
                <div class="col-sm-12 col-lg-5 estimate-space">
                    <div class="row estimate-panel mb-1">
                        <div class="col-2 col-sm-2 col-md-2 col-lg-2">
                            <img src="https://www.energysage.com/static/img/icons/house-white-yes.ee7f0ac65b19.png" alt="">
                        </div>
                        <div class="col-10 col-sm-10 col-md-10 col-lg-10">
                            <h4>Your roof is great for solar!</h4>
                            <p>1400 Lubbock Street, Houston, TX</p>
                        </div>
                    </div>
                    <div class="row estimate-panel mb-1">
                        <div class="col-2 col-sm-2 col-md-2 col-lg-2">
                            <img src="https://www.energysage.com/static/img/icons/electric-white.0d216f0f73fb.png" alt="">
                        </div>
                        <div class="col-10 col-sm-10 col-md-10 col-lg-10">
                            <h4>Meet 100% or more</h4>
                            <p>of your annual electricity needs</p>
                        </div>
                    </div>
                    <div class="row estimate-panel mb-1">
                        <div class="col-2 col-sm-2 col-md-2 col-lg-2">
                            <img src="https://www.energysage.com/static/img/icons/money-white.91c89742e54f.png" alt="">
                        </div>
                        <div class="col-10 col-sm-10 col-md-10 col-lg-10">
                            <h4>Save 30% or more</h4>
                            <p>with Federal Incentives</p>
                        </div>
                    </div>
                    <div class="row estimate-panel">
                        <div class="col-2 col-sm-2 col-md-2 col-lg-2">
                            <img src="https://www.energysage.com/static/img/icons/house-money-white.56a21fa77882.png" alt="">
                        </div>
                        <div class="col-10 col-sm-10 col-md-10 col-lg-10">
                            <h4>Increased property value</h4>
                            <p>Home values rise 3% or more</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-step2-affix">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-sm-12 col-md-6">
                    <span class="text-uppercase step2-no-phone">Step2:</span>
                    Get competing solar quotes online, no phone calls
                </div>
                <div class="col-sm-12 col-md-4">
                    <button class="btn btn-primary no-phone-calls">Next</button>
                </div>
            </div>
        </div>
    </div>
    <div class="section-savings-with-solar">
        <div class="container">
            <div class="row mx-0">
                <div class="col-sm-2">
                    <img class="savings-icon " src="https://www.energysage.com/static/img/icons/savings-with-solar.b29e14fa5bb8.png" alt="Savings with Solar">
                </div>
                <div class="col-sm-10 text-align-justify">
                    <h5 class="saving-h5">Your Estimated Savings with Solar</h5>
                    <p>
                        This ballpark estimate is based on the information you provided. Your actual savings will
                        depend on how you pay for your system, how much electricity your solar panel system
                        generates, your energy consumption, and more.
                    </p>
                    <p >Estimates are based on Real-Time EnergySage Marketplace Data in TX.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="estimate-container">
        <div class="row">
            <div class="col-lg-4 col-sm-12 estimate-contain">
                <h6 class="estimate-purchase-title1">Pay Cash</h6>
                <div class="estimate-description pb-2">
                    <p>Own the system; maximize savings</p>
                    <p>Pay for a turnkey system; Government incentives cover 30% - 65% of the cost.</p>
                </div>
                <div class="estimate-flex">
                    <div>
                        <div class="estimate-body highlight1">
                            <div class="row p-3 align-items-center">
                                <div class="col-5 highlight-left">$17,000</div>
                                <div class="col-7 ">20 Year net Savings</div>
                            </div>
                        </div>
                        <div >
                            <div class="row p-3 align-items-center">
                                <div class="col-5 highlight-left">$11,000</div>
                                <div class="col-7 ">Net Cost</div>
                            </div>
                        </div>
                        <div >
                            <div class="row p-3 align-items-center">
                                <div class="col-5 highlight-left">8.5Years</div>
                                <div class="col-7 ">Payback</div>
                            </div>
                        </div>
                        <div >
                            <div class="row p-3 align-items-center">
                                <div class="col-5 highlight-left4">3% or more</div>
                                <div class="col-7 ">Increase in Property Value</div>
                            </div>
                        </div>
                    </div>
                    <div >
                        <div class="purchart">
                            <svg width="245" height="186"><g transform="translate(80,20)"><g class="y axis" id="y_axis"><g class="tick" transform="translate(0,135.3533941605065)" style="opacity: 1;"><line x2="-6" y2="0"></line><text x="-9" y="0" dy=".32em" style="text-anchor: end; fill: rgb(126, 126, 126);">$-15k</text></g><g class="tick" transform="translate(0,114.01326744454947)" style="opacity: 1;"><line x2="-6" y2="0"></line><text x="-9" y="0" dy=".32em" style="text-anchor: end; fill: rgb(126, 126, 126);">$-10k</text></g><g class="tick" transform="translate(0,92.67314072859244)" style="opacity: 1;"><line x2="-6" y2="0"></line><text x="-9" y="0" dy=".32em" style="text-anchor: end; fill: rgb(126, 126, 126);">$-5k</text></g><g class="tick" transform="translate(0,71.33301401263542)" style="opacity: 1;"><line x2="-6" y2="0"></line><text x="-9" y="0" dy=".32em" style="text-anchor: end; fill: rgb(126, 126, 126);">$0k</text></g><g class="tick" transform="translate(0,49.99288729667839)" style="opacity: 1;"><line x2="-6" y2="0"></line><text x="-9" y="0" dy=".32em" style="text-anchor: end; fill: rgb(126, 126, 126);">$5k</text></g><g class="tick" transform="translate(0,28.652760580721363)" style="opacity: 1;"><line x2="-6" y2="0"></line><text x="-9" y="0" dy=".32em" style="text-anchor: end; fill: rgb(126, 126, 126);">$10k</text></g><g class="tick" transform="translate(0,7.3126338647643365)" style="opacity: 1;"><line x2="-6" y2="0"></line><text x="-9" y="0" dy=".32em" style="text-anchor: end; fill: rgb(126, 126, 126);">$15k</text></g></g><path d="M0,136L7.25,111.4785822476477L14.5,106.40657862194242L21.750000000000004,101.25395549860656L29,96.01943143072526L36.25,90.70170460278501L43.50000000000001,85.29945250691465L50.75000000000001,79.81133161398043L58,74.235977039453L65.25,68.57200220396348L72.5,62.81799848846386L79.75,56.97253488390636L87.00000000000001,51.034157635354404L94.25,45.00138988043675L101.50000000000001,38.87273128205466L108.75,32.64665765525129L116,26.321620588149855L123.25000000000001,19.896047056866877L130.5,13.368339034304157L137.75,6.736873092722789L145,0L145,71.33301401263542L137.75,71.33301401263542L130.5,71.33301401263542L123.25000000000001,71.33301401263542L116,71.33301401263542L108.75,71.33301401263542L101.50000000000001,71.33301401263542L94.25,71.33301401263542L87.00000000000001,71.33301401263542L79.75,71.33301401263542L72.5,71.33301401263542L65.25,71.33301401263542L58,71.33301401263542L50.75000000000001,71.33301401263542L43.50000000000001,71.33301401263542L36.25,71.33301401263542L29,71.33301401263542L21.750000000000004,71.33301401263542L14.5,71.33301401263542L7.25,71.33301401263542L0,71.33301401263542Z" style="stroke: rgb(130, 42, 133); fill: rgb(130, 42, 133);"></path><text x="145" y="151" text-anchor="end" style="fill: rgb(126, 126, 126);">20yrs</text></g></svg>
                        </div>
                        <div class="text-center">
                            <span>Your Estimated Savings</span>
                        </div>
                    </div>
                </div>
                
                
            </div>
            <div class="col-lg-4 col-sm-12 estimate-contain">
                <h6 class="estimate-purchase-title2">$0-Down loan</h6>
                <div class="estimate-description pb-2">
                    <p>Own the system; no up-front cost</p>
                    <p>Qualify for government incentives; Interest may be tax deductible.</p>
                </div>
                <div class="estimate-flex">
                    <div>
                        <div class="estimate-body highlight2">
                            <div class="row p-3 align-items-center">
                                <div class="col-5 highlight-left">$11,000</div>
                                <div class="col-7 ">20 Year net Savings</div>
                            </div>
                        </div>
                        <div >
                            <div class="row p-3 align-items-center">
                                <div class="col-5 highlight-left">$0</div>
                                <div class="col-7 ">Out-of-Pocket Cost</div>
                            </div>
                        </div>
                        <div >
                            <div class="row p-3 align-items-center">
                                <div class="col-5 highlight-left">Immediate</div>
                                <div class="col-7 ">Payback</div>
                            </div>
                        </div>
                        <div >
                            <div class="row p-3 align-items-center">
                                <div class="col-5 highlight-left4">3% or more</div>
                                <div class="col-7 ">Increase in Property Value</div>
                            </div>
                        </div>
                    </div>
                    <div >
                        <div class="purchart">
                            <svg width="245" height="186"><g transform="translate(80,20)"><g class="y axis" id="y_axis"><g class="tick" transform="translate(0,135.3533941605065)" style="opacity: 1;"><line x2="-6" y2="0"></line><text x="-9" y="0" dy=".32em" style="text-anchor: end; fill: rgb(126, 126, 126);">$-15k</text></g><g class="tick" transform="translate(0,114.01326744454947)" style="opacity: 1;"><line x2="-6" y2="0"></line><text x="-9" y="0" dy=".32em" style="text-anchor: end; fill: rgb(126, 126, 126);">$-10k</text></g><g class="tick" transform="translate(0,92.67314072859244)" style="opacity: 1;"><line x2="-6" y2="0"></line><text x="-9" y="0" dy=".32em" style="text-anchor: end; fill: rgb(126, 126, 126);">$-5k</text></g><g class="tick" transform="translate(0,71.33301401263542)" style="opacity: 1;"><line x2="-6" y2="0"></line><text x="-9" y="0" dy=".32em" style="text-anchor: end; fill: rgb(126, 126, 126);">$0k</text></g><g class="tick" transform="translate(0,49.99288729667839)" style="opacity: 1;"><line x2="-6" y2="0"></line><text x="-9" y="0" dy=".32em" style="text-anchor: end; fill: rgb(126, 126, 126);">$5k</text></g><g class="tick" transform="translate(0,28.652760580721363)" style="opacity: 1;"><line x2="-6" y2="0"></line><text x="-9" y="0" dy=".32em" style="text-anchor: end; fill: rgb(126, 126, 126);">$10k</text></g><g class="tick" transform="translate(0,7.3126338647643365)" style="opacity: 1;"><line x2="-6" y2="0"></line><text x="-9" y="0" dy=".32em" style="text-anchor: end; fill: rgb(126, 126, 126);">$15k</text></g></g><path d="M0,71.33301401263542L7.25,69.79683334477326L14.5,68.30997100734876L21.750000000000004,66.74248917229369L29,65.09310639269319L36.25,63.36052085303372L43.50000000000001,61.54341004544413L50.75000000000001,59.64043044079068L58,57.65021715454405L65.25,55.57138360733531L72.5,53.402521180116466L79.75,51.142198863839724L87.00000000000001,48.788962903568574L94.25,46.341336436931684L101.50000000000001,43.79781912683036L108.75,41.15688678830779L116,38.41699100948716L123.25000000000001,35.576558766484965L130.5,32.63399203220301L137.75,29.587667378902438L145,26.435935574460416L145,71.33301401263542L137.75,71.33301401263542L130.5,71.33301401263542L123.25000000000001,71.33301401263542L116,71.33301401263542L108.75,71.33301401263542L101.50000000000001,71.33301401263542L94.25,71.33301401263542L87.00000000000001,71.33301401263542L79.75,71.33301401263542L72.5,71.33301401263542L65.25,71.33301401263542L58,71.33301401263542L50.75000000000001,71.33301401263542L43.50000000000001,71.33301401263542L36.25,71.33301401263542L29,71.33301401263542L21.750000000000004,71.33301401263542L14.5,71.33301401263542L7.25,71.33301401263542L0,71.33301401263542Z" style="stroke: rgb(39, 91, 169); fill: rgb(39, 91, 169);"></path><text x="145" y="151" text-anchor="end" style="fill: rgb(126, 126, 126);">20yrs</text></g></svg>
                        </div>
                        <div class="text-center">
                            <span>Your Estimated Savings</span>
                        </div>
                    </div>
                </div>
                
                
            </div>
            <div class="col-lg-4 col-sm-12 estimate-contain">
                <h6 class="estimate-purchase-title3">$0-Down Lease/PPA</h6>
                <div class="estimate-description pb-2">
                    <p>Rent the system; no up-front cost</p>
                    <p>Solar company owns and maintains the system; buy electricity at a discount.</p>
                </div>
                <div class="estimate-flex">
                    <div class="estimate-f-width">
                        <div class="estimate-body highlight3">
                            <div class="row p-3 align-items-center">
                                <div class="col-5 highlight-left">$-90</div>
                                <div class="col-7 ">20 Year net Savings</div>
                            </div>
                        </div>
                        <div >
                            <div class="row p-3 align-items-center">
                                <div class="col-5 highlight-left">$0</div>
                                <div class="col-7 ">Out-of-Pocket Cost</div>
                            </div>
                        </div>
                        <div >
                            <div class="row p-3 align-items-center">
                                <div class="col-5 highlight-left">Immediate</div>
                                <div class="col-7 ">Payback</div>
                            </div>
                        </div>
                        <div >
                            <div class="row p-3 align-items-center">
                                <div class="col-5 highlight-left4">0%</div>
                                <div class="col-7 ">Increase in Property Value</div>
                            </div>
                        </div>
                    </div>
                    <div >
                        <div class="purchart">
                            <svg width="245" height="186"><g transform="translate(80,20)"><g class="y axis" id="y_axis"><g class="tick" transform="translate(0,135.3533941605065)" style="opacity: 1;"><line x2="-6" y2="0"></line><text x="-9" y="0" dy=".32em" style="text-anchor: end; fill: rgb(126, 126, 126);">$-15k</text></g><g class="tick" transform="translate(0,114.01326744454947)" style="opacity: 1;"><line x2="-6" y2="0"></line><text x="-9" y="0" dy=".32em" style="text-anchor: end; fill: rgb(126, 126, 126);">$-10k</text></g><g class="tick" transform="translate(0,92.67314072859244)" style="opacity: 1;"><line x2="-6" y2="0"></line><text x="-9" y="0" dy=".32em" style="text-anchor: end; fill: rgb(126, 126, 126);">$-5k</text></g><g class="tick" transform="translate(0,71.33301401263542)" style="opacity: 1;"><line x2="-6" y2="0"></line><text x="-9" y="0" dy=".32em" style="text-anchor: end; fill: rgb(126, 126, 126);">$0k</text></g><g class="tick" transform="translate(0,49.99288729667839)" style="opacity: 1;"><line x2="-6" y2="0"></line><text x="-9" y="0" dy=".32em" style="text-anchor: end; fill: rgb(126, 126, 126);">$5k</text></g><g class="tick" transform="translate(0,28.652760580721363)" style="opacity: 1;"><line x2="-6" y2="0"></line><text x="-9" y="0" dy=".32em" style="text-anchor: end; fill: rgb(126, 126, 126);">$10k</text></g><g class="tick" transform="translate(0,7.3126338647643365)" style="opacity: 1;"><line x2="-6" y2="0"></line><text x="-9" y="0" dy=".32em" style="text-anchor: end; fill: rgb(126, 126, 126);">$15k</text></g></g><path d="M0,71.33301401263542L7.25,70.56481571921398L14.5,69.97652946611184L21.750000000000004,69.4421352365572L29,68.96438692927059L36.25,68.54613913474286L43.50000000000001,68.19035044328737L50.75000000000001,67.90008685690047L58,67.6785253081168L65.25,67.52895728914335L72.5,67.45479259465525L79.75,67.45956318173965L87.00000000000001,67.54692715057885L94.25,67.72067284957407L101.50000000000001,67.98472310872225L108.75,68.34313960517505L116,68.80012736502752L123.25000000000001,69.360039405507L130.5,70.02738152185962L137.75,70.80681722336108L145,71.70317282301359L145,71.33301401263542L137.75,71.33301401263542L130.5,71.33301401263542L123.25000000000001,71.33301401263542L116,71.33301401263542L108.75,71.33301401263542L101.50000000000001,71.33301401263542L94.25,71.33301401263542L87.00000000000001,71.33301401263542L79.75,71.33301401263542L72.5,71.33301401263542L65.25,71.33301401263542L58,71.33301401263542L50.75000000000001,71.33301401263542L43.50000000000001,71.33301401263542L36.25,71.33301401263542L29,71.33301401263542L21.750000000000004,71.33301401263542L14.5,71.33301401263542L7.25,71.33301401263542L0,71.33301401263542Z" style="stroke: rgb(185, 74, 72); fill: rgb(185, 74, 72);"></path><text x="145" y="151" text-anchor="end" style="fill: rgb(126, 126, 126);">20yrs</text></g></svg>
                        </div>
                        <div class="text-center">
                            <span>Your Estimated Savings</span>
                        </div>
                    </div>
                </div>
                
                
            </div>
            
        </div>
    </div>
    <div class="calc-result-footer">
        <div class="calc-result-step2 row align-items-center">
            <div class="col-sm-12 col-md-8">
                <h5 class="text-uppercase">Step2</h5>
                <h6>Get competing solar quotes online from pre-screened installers</h6>
                <p class="result-step2-dec">Create your property profile on EnergySage to get multiple no-obligation solar quotes from our network of over 500 pre-screened installers. Use our 100% online platform to easily compare multiple offers, and find the best deal possible! </p>
                <button class="btn btn-primary">Compare Solar Quotes</button>
            </div>
            <div class="col-sm-12 col-md-4 smart-solar-calc">
                <a id="video_modal_link" href="#video_modal" role="button" data-toggle="modal" data-video="YXvCwVT0qkk">
                    <img class="media-container" src="https://www.energysage.com/static/img/video/one-minute-overview.40d081e3db49.gif" width="260" height="146" alt="Solar Shopping Made Easy">
                </a>
            </div>
        </div>
    </div>
    <div class="calc-previous">
        <a href="<?php echo Route::_('index.php?option=com_calculator&view=calculators'); ?>" class="btn btn-outline-primary previous-button">Previous</a>

    </div>
    
    
</div>
