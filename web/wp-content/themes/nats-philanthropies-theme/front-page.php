<?php
use Modules\Hero;
use Modules\ContentGroup;

$temporary_page_enabled = ( get_field( 'temporary_landing_page_is_enabled', 'option' ) );

if( $temporary_page_enabled ):
  get_template_part( 'template-temporary-front-page' );

else :


### Critical CSS for the front page template
taoti_enqueue_critical_css( get_template_directory().'/styles/css/critical/front-page-critical.min.css' );


get_header();
?>

<?php
// The total number of sections on the homepage is the hero plus the number of modules in the home page builder.
$modules_homePage = get_field('modules_homePage');
$total_sections = 1 + count($modules_homePage); // The 1 is the hero.

$total_sections = 5; // tmporary hardcode to 5

// Output the numbered page based on the total number of homepage sections. The number should be at least 2 digits with a leading zero if it's only one digit.
?>
<nav class="sectionNavigation">
  <ul>
    <?php for( $i = 1; $i <= $total_sections; $i++ ): ?>
      <li class="scrollspy-navItem"><?php echo sprintf('%02d', $i); ?></li>
    <?php endfor; ?>

    <!-- <li class="scrollspy-navItem active">01</li>
    <li class="scrollspy-navItem">02</li>
    <li class="scrollspy-navItem">03</li>
    <li class="scrollspy-navItem">04</li>
    <li class="scrollspy-navItem">05</li> -->

  </ul>
</nav>


<?php
$args = [
  'heading_line_1' => 'One Pursuit For',
  'heading_line_2' => 'A Better Washington',
  'description' => 'We are committed to holistically improving the lives of children and families across Washington, D.C. and beyond. Join our movement today.',
  'button_label' => 'make a donation',
  'button_link' => '#',
  'background_image_url' => wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id()), 'large')
];
$hero = new Hero($args);
$hero->render();
?>

<section class="l-homePageModule home-module home-statistics scrollspy scrollspy-light">
  <div class="l-container">
    <div class="home-content-row">
      <div class="home-content-column">
        <?php
        // ContentGroup
        $args = [
         'primary_heading' => 'ONE PURSUIT FOR',
         'secondary_heading' => 'MEASURABLE IMPACT',
         'description' => 'We are commited to holistcally improving the lives of children and families across Washington, D.C. and beyond. Join our movement today.',
         'cta_link' => '#',
         'cta_label' => 'learn about our impact',
        ];
        $new_module = new ContentGroup($args);
        $new_module->render();
        ?>
      </div>
      <div class="home-content-column">
        <div class="statistics">
          <div class="statistics_row">
            <div class="statistic">
              <div class="statistic-number">10</div>
              <div class="statistic-info">We are commited to holistcally improving the lives of children and families across Washington, D.C. and</div>
            </div>
            <div class="statistic">
              <div class="statistic-number statistic-number-m">20</div>
              <div class="statistic-info">We are commited to holistcally improving the lives of children and families across Washington, D.C. and</div>
            </div>
            <div class="statistic">
              <div class="statistic-number">30</div>
              <div class="statistic-info">We are commited to holistcally improving the lives of children and families across Washington, D.C. and</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="l-homePageModule home-image scrollspy scrollspy-dark">
  <div class="l-container">
    <div class="home-content-row">
      <div class="home-content-column">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/NYBA-logo@2x.png" alt="" class="home-image-img">
      </div>
      <div class="home-content-column">
        <?php
        // ContentGroup
        $args = [
         'primary_heading' => 'ONE PURSUIT FOR',
         'secondary_heading' => 'Supporting Family',
         'description' => 'We are commited to holistcally improving the lives of children and families across Washington, D.C. and beyond. Join our movement today.',
         'cta_link' => '#',
         'cta_label' => 'about the academy',
        ];
        $new_module = new ContentGroup($args);
        $new_module->render();
        ?>
      </div>
    </div>
  </div>
</section>


<section class="l-homePageModule home-quote scrollspy scrollspy-light">
  <div class="l-container">
    <div class="home-content-row">
      <div class="home-content-column">
        <?php
        // ContentGroup
        $args = [
         'primary_heading' => 'ONE PURSUIT FOR',
         'secondary_heading' => 'Supporting Family',
         'description' => 'We are commited to holistcally improving the lives of children and families across Washington, D.C. and beyond. Join our movement today.',
        ];
        $new_module = new ContentGroup($args);
        $new_module->render();
        ?>
      </div>
      <div class="home-content-column">
        <div class="quote">
          <div class="quote-row">
            <div class="quote-column quote-column-image">
              <div class="quote-image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home-quote-header-image.png" alt=""></div>
            </div>
            <div class="quote-column quote-column-text">
              <span class="quotoe-icon">“</span>
              <div class="quote-quoteText">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.
              </div>
              <div class="quote-author">JANE SMITH</div>
              <div class="quote-location">ORGANIZATION POSITION</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php the_page_builder( 'modules_homePage' ); ?>



<?php
get_footer();

endif;
