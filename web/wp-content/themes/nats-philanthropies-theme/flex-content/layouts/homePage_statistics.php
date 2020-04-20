<?php
use Modules\ContentGroup;
use Modules\Stats;
?>

<section class="l-homePageModule home-module home-statistics scrollspy scrollspy-light">
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
        // Stats
        $args = [
         'stats' => get_sub_field('statistic_columns'),
        ];
        $stats = new Stats($args);
        $stats->render();
        ?>
      </div>
    </div>
  </div>
</section>