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
$contacts = get_field('contacts');
$background_color = get_field('background_color');
$centering_class = '';
if (count($contacts) > 3) {
    if (count($contacts) % 2 != 0) {
        $centering_class = 'odd_li';
    }else{
        $centering_class = 'even_li';
    }
} else if (count($contacts) == 1) {
    $centering_class = 'single_li';
}


?>
<section class="ContactBlock <?= $background_color ?>">
    <div class="container">
        <?php if (!empty($title)) { ?>
            <h2><?= $title ?></h2>
        <?php } ?>
        <ul class="list-unstyled <?=$centering_class?>">
            <?php foreach ($contacts as $key => $value) { ?>
                <li>
                    <?= $value["contact"] ?>
                </li>
            <?php } ?>


        </ul>
    </div>
</section>