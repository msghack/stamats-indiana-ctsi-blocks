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

// var_dump($button);

$title = get_field('title');
$image = get_field('image');
$locations = get_field('locations');

?>

<section class="locationBlock">
    <div class="container">

       <?php if (!empty($title)) { ?>
            <h2><?= $title ?></h2>
        <?php } ?>

        <div class="row g-0 d-flex flex-wrap ">
            <div class="col-lg-4 col-12 locationBlock_Map text-center">
                <img src="<?=$image["url"]?>" alt="<?=$image["alt"]?>">
            </div>
            <div class="col-lg-8 col-12 locationBlock_Cont">
                <ul>
                    <?php foreach ($locations as $key => $value) { ?>
                        <li class="<?=$value["location_hexagon"] ?>">
                           <?=$value["location_description"]?>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</section>