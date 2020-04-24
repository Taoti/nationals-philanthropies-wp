<?php
use Modules\ContentGroup;
use JP\Get;
?>
<section class="l-homePageModule homeImage scrollspy scrollspy-dark">
  <div class="homeImage-inner">

      <div class="homeImage-imageContainer">
        <?php
        $image = get_sub_field('image');
        $image_html = '';

        if( is_array($image) ){
          $image_args = [
            'image_array' => $image,
            'size' => 'quote-image',
            'classes' => ['homeImage-img'],
          ];
          $image_html = Get::image_html( $image_args );
        }

        echo $image_html;
        ?>
      </div>

      <div class="homeImage-contentGroup">
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

  </div>
</section>
