<?php

/**
 * Interior Banner Block template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Load values and assign defaults.
$title = get_field('title');
$images = get_field('images');
$menu_title = get_field('menu_title', get_queried_object_id());
$display_section_navigation = get_field('display_section_navigation', get_queried_object_id());
$section_nav_data = create_section_navigation();

if ($images) {
    $image_array = $images;
    $random_image = array_rand($image_array);
}

?>

<section class="interior_Banner">
    <div class="interior_Banner_Img banner_hidden_Desktop">
    <?php if (!empty($images[$random_image]["desktop_image"])) {
            $attachment_metadata = wp_get_attachment_metadata($images[$random_image]["desktop_image"]["ID"]);

        ?>
            <img  src="<?= $images[$random_image]["desktop_image"]["url"] ?>" alt="<?= $images[$random_image]["desktop_image"]["alt"] ?>">
        <?php } ?>
    </div>

    <div class="interior_Banner_Img banner_hidden_Mobile">
    <?php if (empty($images[$random_image]["mobile_image"])) {
            $attachment_metadata = wp_get_attachment_metadata($images[$random_image]["mobile_image"]["ID"]); ?>
            <img  src="<?= $images[$random_image]["desktop_image"]["url"] ?>" alt="<?= $images[$random_image]["desktop_image"]["alt"] ?>">
        <?php } else {
            $attachment_metadata = wp_get_attachment_metadata($images[$random_image]["desktop_image"]["ID"]); ?>
            <img  src="<?= $images[$random_image]["mobile_image"]["url"] ?>" alt="<?= $images[$random_image]["mobile_image"]["alt"] ?>">
        <?php } ?>
    </div>

    <div class="interior_Banner_Content">
        <h1><?= $title ?></h1>
        <?php if ($display_section_navigation && !empty($section_nav_data)) { ?>
            <div class="section_Nav">
                <div class="section_Nav_Inner">
                    <p class="accordion-button section_Nav_Title collapsed" data-bs-toggle="collapse" data-bs-target="#secNav"><?= !empty($menu_title) ? $menu_title : "IN THIS SECTION" ?></p>
                    <ul id="secNav" class="list-unstyled collapse">
                        <?php foreach ($section_nav_data as $key => $value) {
                            if (get_queried_object_id() === $value->ID) { ?>
                                <li class="active"><?= get_the_title($value->ID) ?></li>
                            <?php } else { ?>
                                <li><a href="<?= get_permalink($value->ID) ?>"><?= get_the_title($value->ID) ?></a></li>
                        <?php }
                        } ?>
                    </ul>
                </div>
            </div>
        <?php } ?>

        <?php if (!is_front_page()) {
            if (function_exists('custom_breadcrumb')) {
                do_action('custom_breadcrumb');
            }
        } ?>

    </div>

</section>