<?php
use Modules\ContentGroup;
?>

<section class="l-homePageModule home-module homeHeroes scrollspy scrollspy-dark">
  <div class="homeHeroes-inner">

      <div class="homeHeroes-contentGroup">
        <?php
        // ContentGroup
        $args = [
         'primary_heading' => get_sub_field('primary_heading_line_1'),
         'secondary_heading' => get_sub_field('primary_heading_line_2'),
         'tertiary_heading' => get_sub_field('primary_heading_line_3'),
         'description' => get_sub_field('description'),
         'cta_link' => get_sub_field('button_url'),
         'cta_label' => get_sub_field('button_label'),
        ];
        $contentGroup = new ContentGroup($args);
        $contentGroup->render();
        ?>
      </div>

      <?php 
        $right_image_large_top = get_sub_field('right_image_large_top');
        $right_image_medium_small = get_sub_field('right_image_medium_small');
        $right_image_bottom_large = get_sub_field('right_image_bottom_large');
      ?>
      <div class="homeHeroes-imagesContainer">
        <div class="diamond large">
          <img src="<?php echo $right_image_large_top['sizes']['medium-square']; ?>" alt="" />
        </div>
        <div class="diamond small">
          <img src="<?php echo $right_image_medium_small['sizes']['medium-square']; ?>" alt="" />
        </div>
        <div class="diamond medium">
          <img src="<?php echo $right_image_bottom_large['sizes']['medium-square']; ?>" alt="" />
        </div>
      </div>

  </div>
</section>
