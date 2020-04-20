<?php
use Modules\ContentGroup;
use Modules\Quote;
?>
<section class="l-homePageModule home-quote scrollspy scrollspy-light">
  <div class="home-module-inner">
    <div class="home-content-row">
      <div class="home-content-column">
        <?php
        // ContentGroup
        $args = [
         'primary_heading' => get_sub_field('primary_heading_line_1'),
         'secondary_heading' => get_sub_field('primary_heading_line_2'),
         'description' => get_sub_field('description'),
         'cta_link' => get_sub_field('button_url'),
         'cta_label' => get_sub_field('button_label'),
        ];
        $contentGroup = new ContentGroup($args);
        $contentGroup->render();
        ?>
      </div>
      <div class="home-content-column">
        <?php
        // Quote
        $args = [
         'image' => get_sub_field('image'),
         'description' => get_sub_field('quoted_text'),
         'author' => get_sub_field('attribution_name'),
         'location' => get_sub_field('attribution_description'),
        ];
        $quote = new Quote($args);
        $quote->render();
        ?>
      </div>
    </div>
  </div>
</section>