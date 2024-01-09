<?php 
// No direct access
defined('_JEXEC') or die; 

use \Joomla\CMS\Router\Route;
use \Joomla\CMS\HTML\HTMLHelper;


?>

<div class="card shadow-sm article-sidebar-card">
    <p> Find out what solar panels cost in your area in 2023</p>
    <p><img src="https://a-us.storyblok.com/f/1006159/220x257/18c519c201/mfdp-callout.webp/m/filters:quality(100)"
            alt=""></p>
    <div class="mt-4">
        <form action="<?php echo Route::_($quoteurl); ?>" method="get">
            <div class="input-holder-zipcode-sidebar">
                <div class="zip-code-icon"><img src="images/energy/zip-code-icon.png" width="24" height="24"
                        loading="lazy" data-path="local-images:/energy/zip-code-icon.png"></div>
                <input id="" class="zip-code-sidebar" maxlength="5" name="zip_code" type="text" placeholder="ZIP code" required>
            </div>
            <div class="contain-zip-button-sidebar mt-2"><button class="btn btn-primary zip-button" type="submit">See
                    local offers</button></div>
	        <!-- <?php echo HTMLHelper::_('form.token'); ?> -->

        </form>
    </div>
    <div class="mt-4 banner-lock-item-sidebar">
        <div class="mr-1"><img src="images/energy/banner-lock-black.png" width="24" height="24" loading="lazy"
                data-path="local-images:/energy/banner-lock-black.png"></div>
        <div>Your information is safe with us. Privacy Policy.</div>
    </div>
</div>