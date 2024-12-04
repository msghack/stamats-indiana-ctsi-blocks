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

$background = get_field('background');
$description = get_field('description');


?>

<section class="announcement-block">
    <div class="container">
        <div class="announcement_Wrapper <?= $background ?>">
            <?= $description ?>
        </div>
    </div>
</section>