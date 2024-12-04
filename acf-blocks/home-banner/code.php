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
$images = get_field('images');
$button = get_field('button');
$button_intro_text = get_field('button_intro_text');
$tagline = get_field('tagline');
$title = get_field('title');
// var_dump($button);
if ($images) {
    $random_image = array_rand($images);
}


?>


<section class="home_Banner">
    <div class="home_Banner_Img banner_hidden_Desktop">
        <?php if (!empty($images[$random_image]["desktop_image"])) {
            $attachment_metadata = wp_get_attachment_metadata($images[$random_image]["desktop_image"]["ID"]);

        ?>
            <img src="<?= $images[$random_image]["desktop_image"]["url"] ?>" alt="<?= $images[$random_image]["desktop_image"]["alt"] ?>">
        <?php } ?>
    </div>

    <div class="home_Banner_Img  banner_hidden_Mobile">
        <?php if (empty($images[$random_image]["mobile_image"])) {
            $attachment_metadata = wp_get_attachment_metadata($images[$random_image]["mobile_image"]["ID"]); ?>
            <img src="<?= $images[$random_image]["desktop_image"]["url"] ?>" alt="<?= $images[$random_image]["desktop_image"]["alt"] ?>">
        <?php } else {
            $attachment_metadata = wp_get_attachment_metadata($images[$random_image]["desktop_image"]["ID"]); ?>
            <img src="<?= $images[$random_image]["mobile_image"]["url"] ?>" alt="<?= $images[$random_image]["mobile_image"]["alt"] ?>">
        <?php } ?>
    </div>

    <div class="home_Banner_Content">
        <h2><?= $title ?></h2>
        <?php if (!empty($tagline)) { ?>
            <p class="tagLine">
                <span><?= $tagline ?></span>
            </p>
        <?php } ?>
        <?php if (!empty($button) || !empty($button_intro_text)) { ?>
            <div class="CTA_wrapper">
                <?php if (!empty($button_intro_text)) { ?>
                    <p class="Button_Intro_Text "><?= $button_intro_text ?></p>
                <?php } ?>
                <?php if (!empty($button)) {
                    foreach ($button as $key => $value) {
                        if (!empty($value["button"])) { ?>
                            <a href="<?= $value["button"]["url"] ?>" target="<?= $value["button"]["target"] === "_blank" ? "_blank" : "_self"  ?>" class="Button_Link"><?= $value["button"]["title"] ?></a>
                <?php }
                    }
                } ?>
            </div>
        <?php } ?>
    </div>
</section>