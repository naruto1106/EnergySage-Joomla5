<?php 
// No direct access
defined('_JEXEC') or die;
use \Joomla\CMS\Router\Route;


?>

<div>
    <ul class="about-link mt-3">
        <li> <a href="<?php echo JUri::base().'about-us' ?>"> Company </a></li>
        <li><a href="<?php echo JUri::base().'about-us/team' ?>">Team </a></li>
        <li class="about-link active"><a href="<?php echo JUri::base().'about-us/careers' ?>">Career </a></li>
    </ul>
    <div class="container text-center about-careers-banner mb-5">
        <p class="font-header-spaced">do well by doing good </p>
        <h2 class="text-dark font-header mb-5">Join the EnergySage Team!</h2>
        <p class="about-careers-banner-p">
            Become part of the global transition to renewable energy. EnergySage is a recognized leader at the forefront of
            innovation in the solar industry, and a three-time awardee of the U.S. Department of Energy’s prestigious
            <a href="">SunShot Initiative.</a>
            At EnergySage, we’re solving hard problems that matter, and would love for you to come help.
        </p>
    </div>
</div>