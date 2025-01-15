<?php

/**
 * Accordion Block template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Load values and assign defaults.

$title = get_field('title');
$column1 = get_field('column_1');
$column2 = get_field('column_2');
$image = get_field('image');
$background_color = get_field('background_color');
?>

<div class="contact-card-container <?= $background_color ?>">
  <div class=" row">
    <div class="col-12 col-lg-8 contact-text-area container">
      <div class="row contact-card-inner-container-text">
        <?php if (!empty($title)) { ?>
          <div class="col-12">
            <h2><?= $title ?></h2>
          </div>
        <?php } ?>
        <?php if (!empty($column1)) { ?>
          <div class="col col-md-6">
            <?= $column1 ?>
          </div>
        <?php } ?>
        <?php if (!empty($column2)) { ?>
          <div class="col col-md-6">
            <?= $column2 ?>
          </div>
        <?php } ?>
      </div>
    </div>
    <?php if (!empty($image)) { ?>
      <div class="col-12 col-lg-4 contact-image-area d-none d-lg-block">
        <div class="row contact-card-inner-container-image" style="height:100%">
          <div class="col-12">
            <div class="d-none d-lg-block" style="width:100%;height:100%;background-color: #0c2340;background-image: url('<?= $image["url"] ?>');background-size:cover;" aria-label="<?= $image["alt"] ?>"></div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>