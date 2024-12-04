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
$card = get_field('card');
// var_dump($button);


?>
<section class="iconLinks_Wrapper">
    <div class="container">
        <?php if (!empty($title)) { ?>
            <h2><?= $title ?></h2>
        <?php } ?>

        <?php if ($card) { ?>
            <ul class="list-unstyled">
                <?php foreach ($card as $key => $single_card) { ?>

                    <li>
                        <?php if (!empty($single_card["card_link"])) { ?>
                            <a href="<?= $single_card["card_link"]["url"] ?>"
                                target="<?= $single_card["card_link"]["target"] === "_blank" ? "_blank" : "_self" ?>">
                                <?php if (!empty($single_card["card_image"])) { ?>
                                    <span class="iconLinkImg"><img src="<?= $single_card["card_image"]["url"] ?>"
                                            alt="<?= $single_card["card_image"]["alt"] ?>"></span>
                                <?php } ?>
                                <?php if (!empty($single_card["card_description"])) { ?>
                                    <span class="iconLinkText"><?= $single_card["card_description"] ?></span>
                                <?php } ?>
                            </a>
                        <?php } else { ?>
                            <div class="icon_no_link">
                                <?php if (!empty($single_card["card_image"])) { ?>
                                    <span class="iconLinkImg"><img src="<?= $single_card["card_image"]["url"] ?>"
                                            alt="<?= $single_card["card_image"]["alt"] ?>"></span>
                                <?php } ?>
                                <?php if (!empty($single_card["card_description"])) { ?>
                                    <span class="iconLinkText"><?= $single_card["card_description"] ?></span>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </li>
                <?php } ?>
            </ul>
        <?php } ?>
    </div>
</section>