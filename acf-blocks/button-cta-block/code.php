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
$background_image = get_field('background_image');
$buttons = get_field('buttons');

// var_dump($button);


?>

<section>
  <div class="container">
    <div class="row g-0 buttonCTA" style="background: url('<?= $background_image["url"] ?>') no-repeat center;">
      <div class="col-lg-6 col-12 order-lg-2">
        <?php if (!empty($title)) { ?>
          <h2><?= $title ?></h2>
        <?php } ?>
      </div>

      <div class="col-lg-6 col-12 order-lg-1">
        <?php foreach ($buttons as $key => $value) {
          if (!empty($value["button"])) { ?>
            <a target="<?=$value["button"]["target"] === "_blank" ? "_blank" : "_self" ?>" href="<?=$value["button"]["url"]?>" class="Button_Link"><?=$value["button"]["title"]?></a>
        <?php }
        }
        ?>


      </div>
    </div>
  </div>
</section>