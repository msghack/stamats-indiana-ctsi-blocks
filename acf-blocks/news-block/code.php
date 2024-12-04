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
$catagories = get_field('catagories');
// var_dump($catagories);

$display_author_name = get_field('display_author_name');
$display_post_date = get_field('display_post_date');
$display_featured_image = get_field('display_featured_image');
$news_link = get_field('news_link');
$filter = get_field('order_by');
$order_implode = explode("/", $filter);
// var_dump($catagories);
if ($catagories) {
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 3,
        'order' => $order_implode[1],
        'order_by' => $order_implode[0],
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field' => 'id',
                'terms' => $catagories
            )
        )
    );
} else {
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 3,
        'order' => 'DESC',
        'order_by' => 'date',
    );
}


$query = new WP_Query($args);



// The Query
// var_dump($query);


if ($query->have_posts()) {
    ?>


    <section class="news_block_section">
        <ul class="wp-block-latest-posts__list has-dates has-author wp-block-latest-posts">
            <?php while ($query->have_posts()) {
                $query->the_post(); ?>
                <li>
                    <a href="<?= the_permalink(); ?>">
                        <?php if ($display_featured_image && get_post_thumbnail_id(get_the_ID())) { ?>
                            <div class="wp-block-latest-posts__featured-image">
                                <img src="<?= get_the_post_thumbnail_url(get_the_ID()); ?>"
                                    alt="<?= esc_html(get_post_meta(get_post_thumbnail_id(get_the_ID()), '_wp_attachment_image_alt', true)) ?>">
                            </div>
                        <?php } ?>
                        <p class="wp-block-latest-posts__post-title"><?= the_title(); ?></p>
                        <?php if ($display_author_name) { ?>
                            <div class="wp-block-latest-posts__post-author"><?= get_the_author(); ?></div>
                        <?php } ?>
                        <?php if ($display_post_date) { ?>
                            <div class="wp-block-latest-posts__post-date"><?= the_time('F j, Y') ?></div>
                        <?php } ?>
                    </a>
                </li>
            <?php }
            wp_reset_query(); ?>

        </ul>
        <?php if (!empty($news_link)) { ?>
            <div
                class="wp-block-buttons is-content-justification-center is-layout-flex wp-container-core-buttons-is-layout-1 wp-block-buttons-is-layout-flex">
                <div class="wp-block-button">
                    <a href="<?= $news_link["url"] ?>" target="<?= $news_link['target'] === '_blank' ? '_blank' : '_self' ?>"
                        class="wp-block-button__link wp-element-button"><?= $news_link["title"] ?></a>
                </div>
            </div>
        <?php } ?>
    </section>

<?php } else {

    echo 'No posts found';
}
?>