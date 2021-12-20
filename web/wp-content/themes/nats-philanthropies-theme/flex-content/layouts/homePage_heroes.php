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
        $top_diamond_image = get_sub_field('top_diamond_image');
        $image_or_icon_for_right_diamond = get_sub_field('image_or_icon_for_right_diamond');
        if ($image_or_icon_for_right_diamond == 'image') {
          $middle_diamond_image = get_sub_field('middle_diamond_image');
          $middle_diamond_image = $middle_diamond_image['sizes']['medium-square'];
          $middle_image_styles = '';
        } else {
          $icon = get_sub_field('middle_diamond_icon');
          $middle_diamond_image = get_site_url().'/wp-content/themes/nats-philanthropies-theme/images/' . $icon['icon_selector'] . '.svg';
          $middle_image_styles = 'icon';
        }

        $bottom_diamond_image = get_sub_field('bottom_diamond_image');
      ?>
      <div class="homeHeroes-imagesContainer">
        <div class="diamond large">
          <img src="<?php echo $top_diamond_image['sizes']['medium-square']; ?>" alt="" />
        </div>
        <div class="diamond small <?php echo $middle_image_styles; ?>">
          <img class="<?php echo $middle_image_styles; ?>" src="<?php echo $middle_diamond_image; ?>" alt="" />
        </div>
        <div class="diamond medium">
          <img src="<?php echo $bottom_diamond_image['sizes']['medium-square']; ?>" alt="" />
        </div>
      </div>

  </div>
</section>
