<?php 
// No direct access
defined('_JEXEC') or die;
use \Joomla\CMS\Router\Route;


?>

<div>
    <ul class="about-link mt-3">
        <li class="about-link active"> <a href="<?php echo JUri::base().'about-us' ?>"> Company </a></li>
        <li><a href="<?php echo JUri::base().'about-us/team' ?>">Team </a></li>
        <li><a href="<?php echo JUri::base().'about-us/careers' ?>">Career </a></li>
    </ul>
    <div class="container">
        <div class="row text-center about-company-banner">
            <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                <div class="mb-5">
                    <h2> We are EnergySage</h2>
                    <h5 class="eyebrow text-orange"> Our Mission </h5>
                    <p class="lead">
                        To empower people everywhere to switch to affordable, reliable clean energy solutions with trusted
                        resources, unbiased advice, and a simple shopping experience.
                    </p>
                    <p>
                        Every day, millions of Americans shop for clean energy products and energy-saving solutions, and thousands
                        of companies look for well-qualified customers to connect with. But the process is often complex, expensive,
                        and intimidating. That’s why we built EnergySage – the simplest, most trusted way to make confident energy
                        decisions and to gain control over the buying process.
                    </p>
                </div>
                <div>
                    <h5 class="eyebrow text-orange"> Our Vision </h5>
                    <p class="lead">A planet powered by clean, affordable and reliable energy for all. </p>
                    <p>
                        From solar and batteries to heat pumps and electric vehicles, we recognize the impact that clean energy
                        products and energy-saving solutions will have on our future. We‘re committed to safeguarding our
                        environment and creating clean energy solutions and resources that are available to everyone as we embark on
                        a global energy transformation.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>