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
$background_color = get_field('background_color');
$background_image = get_field('background_image');
$image = get_field('image');
$description = get_field('description');
$button = get_field('button');
$video = get_field('video');
$video_title = get_field('video_title');
$MODAL_RAND = "modal" . mt_rand();
// var_dump($image);

?>


<section class="mediaShowcase <?php echo $background_color ?>"
    style="<?= !empty($background_image) ? "background-image: url(" . $background_image['url'] . "); background-repeat: repeat; background-position: top left; background-size:cover;" : "" ?>">
    <div class="container">
        <div class="mediaShowcase_wrapper d-flex flex-wrap ">
            <?php if (!empty($image)) { ?>
                <div class="mediaShowcase_Img">
                    <img src="<?= $image["url"] ?>" alt="<?= $image["alt"] ?>">
                    <?php if (!empty($video)) { ?>
                        <span class="playButton">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#ctsi-modal" data-iframe-link="<?php preg_match('/src="(.+?)"/', $video, $matches);
                            echo $src = $matches[1] ?>" data-iframe-height="<?php preg_match('/height="(.+?)"/', $video, $matches);
                                echo $src = $matches[1] ?>" data-iframe-width="<?php preg_match('/width="(.+?)"/', $video, $matches);
                                    echo $src = $matches[1] ?>" data-iframe-title="<?php preg_match('/title="(.+?)"/', $video, $matches);
                                        echo $src = $matches[1] ?>">
                                <img src="/wp-content/themes/ctsi/assets/images/play_btn.png"
                                    alt="Play Video<?= $video_title ?>">
                            </button>
                        </span>
                    <?php } ?>
                </div>
            <?php } ?>
            <div class="mediaShowcase_Cont">
                <?php if (!empty($button)) { ?>
                    <a class="media-showcase-click" target="<?= $button["target"] === "_blank" ? "_blank" : "_self" ?>"
                        href="<?= $button["url"] ?>">
                        <?= $description ?>
                        <span class="Button_Link"><?= $button["title"] ?></span>
                    </a>
                <?php } else { ?>
                    <?= $description ?>
                <?php } ?>
            </div>
        </div>
    </div>
</section>