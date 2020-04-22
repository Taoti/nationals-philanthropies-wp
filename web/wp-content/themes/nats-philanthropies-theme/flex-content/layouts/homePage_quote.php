<?php
use Modules\ContentGroup;
use JP\Get;
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
        $image = get_sub_field('image');
        $quoted_text = get_sub_field('quoted_text');
        $author = get_sub_field('attribution_name');
        $location = get_sub_field('attribution_description');

        $image_html = '';
        if( is_array($image) ){
          $image_args = [
            'image_array' => $image,
            'size' => 'medium',
            'classes' => ['homeQuote-image'],
          ];
          $image_html = Get::image_html( $image_args );
        }
        ?>

        <div class="homeQuote">
          <div class="homeQuote-row">

            <?php if( $image_html ): ?>
            <div class="homeQuote-column homeQuote-column-image">
              <div class="homeQuote-imageContainer"><?php echo $image_html; ?></div>
            </div>
            <?php endif; ?>

            <?php if( $quoted_text ) : ?>
            <div class="homeQuote-column homeQuote-column-text">

              <span class="homeQuote-icon">&ldquo;</span>

              <div class="homeQuote-quoteText">
                <?php echo $quoted_text; ?>
              </div>

              <?php if( $author ) : ?>
              <div class="homeQuote-author"><?php echo $author; ?></div>
              <?php endif; ?>

              <?php if( $location ) : ?>
              <div class="homeQuote-location"><?php echo $location; ?></div>
              <?php endif; ?>

            </div>
            <?php endif; ?>

          </div>
        </div>
      </div>

    </div>
  </div>
</section>
