<?php 
// No direct access
defined('_JEXEC') or die;
use \Joomla\CMS\Router\Route;


?>

<div class="slideshow-wrap mt-5">
    <div class="row  align-items-center">
        <div class="col-12 col-md-6 mb-4 mb-md-0 text-center text-sm-start">
            <h3 class="fs-2 mt-0 mb-3">Home solar</h3>
            <p class="mb-4">Receive and compare multiple quotes for rooftop solar panels from vetted installers in your
                area.</p>
            <form action="<?php echo Route::_("index.php?option=com_quoteform&view=quoteforms") ?>" method="get">
                <div class="row justify-content-center mt-5">
                    <div class="col-md-6 mx-2 input-holder-zipcode2">
                        <div class="zip-code-icon"><img src="images/energy/zip-code-icon.png" width="24" height="24"
                                loading="lazy" data-path="local-images:/energy/zip-code-icon.png"></div>
                        <input id="zip_code" class="zip-code-solar-banner" maxlength="5" name="zip_code" type="text" placeholder="ZIP code" required>
                    </div>
                    <div class="col-md-4 mx-2 contain-zip-button"><button class="btn btn-primary zip-button"
                            type="submit">Compare</button></div>
                </div>
            </form>
<div class="mt-4 banner-lock-item">
                <div class="mr-1"><img src="images/energy/banner-lock-black.png" width="24" height="24" loading="lazy"
                        data-path="local-images:/energy/banner-lock-black.png"></div>
                <div>Your information is safe with us. Privacy Policy.</div>
            </div>
        </div>
        <div class="col-12 col-md-6"><img
                src="https://a-us.storyblok.com/f/1006156/540x262/1f7ec7d8c5/rooftop-hero-desktop.svg" alt=""></div>
    </div>
</div>