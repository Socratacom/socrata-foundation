<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Config;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Config\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

/**
 * Enqueue Scripts
 */
function my_enqueues() {
wp_register_style( 'google-fonts', 'http://fonts.googleapis.com/css?family=Lato:300,400,700', false, null);
wp_enqueue_style('google-fonts');
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\my_enqueues');

/**
 * Remove Menus
 */
function remove_menus(){
  
  //remove_menu_page( 'index.php' );                  //Dashboard
  remove_menu_page( 'edit.php' );                   //Posts
  //remove_menu_page( 'upload.php' );                 //Media
  //remove_menu_page( 'edit.php?post_type=page' );    //Pages
  remove_menu_page( 'edit-comments.php' );          //Comments
  //remove_menu_page( 'themes.php' );                 //Appearance
  //remove_menu_page( 'plugins.php' );                //Plugins
  //remove_menu_page( 'users.php' );                  //Users
  //remove_menu_page( 'tools.php' );                  //Tools
  //remove_menu_page( 'options-general.php' );        //Settings
  
}
add_action( 'admin_menu', __NAMESPACE__ . '\\remove_menus' );

/**
 * Shortcodes
 */
function slider_one_shortcode($atts, $content = null) { ob_start(); ?>
<section class="slider-container">
  <div class="arrowsContainer"></div>
  <div class="row slider">
    <div class="col-sm-12 slide slide-one">
      <div class="container">
        <div class="row">
          <div class="col-lg-offset-6 col-md-6 col-md-offset-6 col-sm-10 col-sm-offset-1 slide-content">
            <small>Showcase</small>
            <h3>Making Data-Driven Government in Detroit a Reality</h3>
            <p>The Socrata Foundation’s first technology grant will be in the City of Detroit’s open data portal – <a href="http://data.detroitmi.gov" target="_blank">data.detroitmi.gov</a> – which will make volumes of non-personal government information broadly available and usable by people and machines without any constraints.</p>
            <p>Detroit Mayor Mike Duggan wants to show residents in his city that their government is finally working for them after years of instability and insolvency. That’s why he turned to data-driven government, which is creating a new form of digital democracy for the 21st century in innovative cities, counties, states, countries and regions all over the world.</p>
            <p>“Detroit knew that the transparency, accountability and fact-based decision-making that stem from open data was the absolute right thing for its citizens, but buying the technology just didn’t seem fiscally responsible, given where the city has been financially,” explains Merritt. “So we asked the Socrata Foundation to remove these obstacles and concerns, and that’s how Detroit was able to gain access to our platform, providing for the foundation of a robust form of data-driven government going forward.” </p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-12 slide slide-two">
      <div class="container">
        <div class="row">
          <div class="col-lg-offset-6 col-md-6 col-md-offset-6 col-sm-10 col-sm-offset-1 slide-content">
            <small>Showcase</small>
            <h3>Taking on Family Abuse and Violence</h3>
            <p>The Socrata Foundation will also support <a href="https://bigmountaindata.partner.socrata.com" target="_blank">Big Mountain Data (BMD)</a>, which develops data science solutions to help in the fight against family abuse and violence.</p>
            <p>BMD’s long-term ambition is to establish a national open source repository on repeat offender data that can be made available to civic hackers, governments, law enforcement, social service, universities and state and federal agencies.</p>
            <p>In conjunction with SunGard Public Sector, a leading provider of public safety and justice software, Socrata will provide BMD with a digital platform so it can upload its datasets and begin digging deep into the structured information that’s available from its sources. According to its Founder, Susan Scrupski, BMD hopes to build custom applications from these datasets that can be employed and tested in the field.</p>
            <p>“We believe access to open data will help determine and deter domestic abuse offenders,” says Scrupski, “and we believe that this approach will help us solve a very serious, painful and damaging societal problem. We have to end the tragedy of family abuse and violence.” </p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-12 slide slide-three">
      <div class="container">
        <div class="row">
          <div class="col-lg-offset-6 col-md-6 col-md-offset-6 col-sm-10 col-sm-offset-1 slide-content">
            <small>Showcase</small>
            <h3>Focusing on Affordable Housing</h3>
            <p>A 21st century digital infrastructure will attract new information-based ventures, maintain competitiveness in traditional industry, and dramatically reduce business transaction costs in your community.</p>
            <p>The Socrata Foundation sponsors Socrata’s annual employee sabbatical program called “One Month to Make an Open Data Difference.” The winner of this unique initiative receives a month of paid leave, plus $5,000 to be used for open data-powered community service and civic engagement.</p>
            <p>The first winner of Socrata’s “One Month to Make an Open Data Difference” sabbatical was Marcus Louie, who submitted a winning proposal focused on the value that open data could bring to affordable housing in Washington, DC. The story of his work, completed in January of this year, is documented on <a href="http://www.marcuslouie.com/blog" target="_blank"> www.marcuslouie.com/blog</a>.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
$content = ob_get_contents();
ob_end_clean();
return $content;
}
add_shortcode('slider-one', __NAMESPACE__ . '\\slider_one_shortcode');
