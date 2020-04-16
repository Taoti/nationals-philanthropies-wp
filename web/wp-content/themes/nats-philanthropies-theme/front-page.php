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

<nav class="sectionNavigation">
  <ul>
    <li class="active">01</li>
    <li>02</li>
    <li>03</li>
    <li>04</li>
    <li>05</li>
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

<section class="home-module home-statistics">
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

<section class="home-image">
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

<?php the_page_builder( 'modules_homePage' ); ?>



<?php
get_footer();

endif;
