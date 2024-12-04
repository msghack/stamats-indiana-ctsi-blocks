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
$feature_title = get_field('feature_title');
$slide = get_field('slide');

//var_dump(count($slide));


?>
<?php if ($slide) {

    if (count($slide) < 4 ) { ?>
    <section class="ImageCard_Carousel ImgCard_Container">
    <?php } else { ?>
        <section class="ImageCard_Carousel">
        <?php } ?>
        <div class="container">
            <?php if (!empty($feature_title)) { ?>
                <h2 class="ImageCard_Title"><?= $feature_title ?></h2>
            <?php } ?>
        </div>
        <div class="image-carousel owl-carousel">
            <?php foreach ($slide as $key => $value) {
                if (!empty($value["video"])) { ?>
                    <div class="item">
                        <?php if (!empty($value["link"])) { ?>
                            <!-- <div class="url-data sr-only" data-url="<?= $value["link"]["url"] ?>"></div> -->
                            <a target="<?= $value["link"]["target"] === "_blank" ? "_blank" : "_self" ?>"
                                href="<?= $value["link"]["url"] ?>">
                                <div class="ImageCard_Img">
                                    <img src="<?= $value["image"]["url"] ?>" alt="<?= $value["image"]["alt"] ?>">
                                </div>
                                <p class="ImageCard_Img_Title"><?= $value["title"] ?></p>
                                <p class="ImageCard_Img_Desc"><?= $value["description"] ?></p>
                            </a>
                        <?php } else { ?>
                            <div class="no_link_carousel_item">
                                <div class="ImageCard_Img">
                                    <img src="<?= $value["image"]["url"] ?>" alt="<?= $value["image"]["alt"] ?>">
                                </div>
                                <p class="ImageCard_Img_Title"><?= $value["title"] ?></p>
                                <p class="ImageCard_Img_Desc"><?= $value["description"] ?></p>
                            </div>
                        <?php } ?>
                        <span class="playButton">
                            <button class="video_play" type="button" data-bs-toggle="modal" data-bs-target="#ctsi-modal"
                                data-iframe-link="<?php preg_match('/src="(.+?)"/', $value["video"], $matches);
                                echo $matches[1] ?>" data-iframe-height="<?php preg_match('/height="(.+?)"/', $value["video"], $matches);
                                  echo $matches[1] ?>" data-iframe-width="<?php preg_match('/width="(.+?)"/', $value["video"], $matches);
                                    echo $matches[1] ?>" data-iframe-title="<?php preg_match('/title="(.+?)"/', $value["video"], $matches);
                                      echo $matches[1] ?>">
                                <span class="sr-only">
                                    <?php preg_match('/title="(.+?)"/', $value["video"], $matches);
                                    echo $matches[1] ?>
                                </span>
                                <img src="/wp-content/themes/ctsi/assets/images/play_btn.png" alt="Play Video">
                            </button>
                        </span>
                    </div>
                <?php } else { ?>
                    <div class="item">
                        <?php if (!empty($value["link"])) { ?>
                            <!-- <div class="url-data sr-only" data-url="<?= $value["link"]["url"] ?>"></div> -->
                            <a target="<?= $value["link"]["target"] === "_blank" ? "_blank" : "_self" ?>"
                                href="<?= $value["link"]["url"] ?>">
                                <div class="ImageCard_Img">
                                    <img src="<?= $value["image"]["url"] ?>" alt="<?= $value["image"]["alt"] ?>">
                                </div>
                                <p class="ImageCard_Img_Title"><?= $value["title"] ?></p>
                                <p class="ImageCard_Img_Desc"><?= $value["description"] ?></p>
                            </a>
                        <?php } else { ?>
                            <div class="no_link_carousel_item">
                                <div class="ImageCard_Img">
                                    <img src="<?= $value["image"]["url"] ?>" alt="<?= $value["image"]["alt"] ?>">
                                </div>
                                <p class="ImageCard_Img_Title"><?= $value["title"] ?></p>
                                <p class="ImageCard_Img_Desc"><?= $value["description"] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                <?php }
            } ?>
        </div>
    </section>
    <?php } ?>