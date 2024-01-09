<?php 
// No direct access
defined('_JEXEC') or die;
use \Joomla\CMS\Router\Route;


?>


<form action="<?php echo Route::_("index.php?option=com_quoteform&view=quoteforms") ?>" method="post">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6 mx-2 input-holder-zipcode2">
            <div class="zip-code-icon"><img src="images/energy/zip-code-icon.png" width="24" height="24"
                    loading="lazy" data-path="local-images:/energy/zip-code-icon.png"></div>
            <input id="" class="zip-code-solar-banner" maxlength="5" name="" type="text" placeholder="ZIP code">
        </div>
        <div class="col-md-4 mx-2 contain-zip-button"><button class="btn btn-primary zip-button"
                type="submit">Compare</button></div>
    </div>
</form>