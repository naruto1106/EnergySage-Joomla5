<?php 
// No direct access
defined('_JEXEC') or die;
use \Joomla\CMS\Router\Route;


?>

<div>
    <ul class="about-link mt-3">
        <li > <a href="<?php echo JUri::base().'about-us' ?>"> Company </a></li>
        <li class="about-link active"class="about-link active"><a href="<?php echo JUri::base().'about-us/team' ?>">Team </a></li>
        <li><a href="<?php echo JUri::base().'about-us/careers' ?>">Career </a></li>
    </ul>
    <div  class="container text-center mb-5 about-team-banner">
        <p  class="font-header-spaced"> who we are </p>
        <h2  class="text-dark font-header mb-5">
            Meet our team of genuine, forward-thinking EnergySagers, passionate about clean energy, making a difference, and
            having fun while we’re at it.
        </h2>
        <button class="btn about-us-button btn btn-outline-primary font-weight-normal font-size-base text-headings">
            Meet the Team
        </button>
    </div>
</div>