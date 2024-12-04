<?php

/**
 * Card Block template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Load values and assign defaults.

$background_color = get_field('background_color');
$background_image = get_field('background_image');
$title = get_field('title');
$cards = get_field('cards');
$cards_col = get_field('card_color_feat');
$vector_asset_1 = get_field('vector_asset_1');
$vector_asset_2 = get_field('vector_asset_2');
?>

<section class="cardsWrapper <?= $background_color ?> <?=  !empty($vector_asset_1) && !empty($vector_asset_2) ? 'section_with_vector' : ''  ?>"
    style="background-image: url('<?= $background_image["url"] ?>'); background-repeat: no-repeat;background-position-y: 0px; background-size: cover;">
    <div class="container">
    <?php if (!empty($vector_asset_1)) { ?>
        <div style="background-image: url('<?= $vector_asset_1["url"] ?>'); background-repeat: no-repeat;"
            class="card_wrapper_icon_1">&nbsp;</div>
    <?php } ?>
    <?php if (!empty($vector_asset_2)) { ?>
        <div style="background-image: url('<?= $vector_asset_2["url"] ?>'); background-repeat: no-repeat;"
            class="card_wrapper_icon_2">&nbsp;</div>
    <?php } ?>
        <?php if (!empty($title)) { ?>
            <h2><?= $title ?></h2>
        <?php } ?>

        <ul class="list-unstyled cardItems">
            <?php foreach ($cards as $key => $value) {
                if ($value["double_width"]) {
                    if (!empty($value["card_image"])) {
                        if (!empty($value["card_link"])) { ?>
                            <li class="doubleWide <?= $cards_col ?>">
                                <a href="<?= $value["card_link"]["url"] ?>"
                                    target="<?= $value["card_link"]["target"] === "_blank" ? "_blank" : "_self" ?>">
                                    <div class="row g-0 d-flex">
                                        <div class="cardImage_Wrapper">
                                            <span class="cardImage"><img src="<?= $value["card_image"]["url"] ?>"
                                                    alt="<?= $value["card_image"]["alt"] ?>"></span>
                                        </div>
                                        <div class="cardDet_Wrapper">
                                            <p class="cardTitle"><?= $value["card_title"] ?></p>
                                            <p class="cardDesc"><?= $value["card_descrption"] ?></p>
                                            <?php if (!empty($value["card_button"])) { ?>
                                                <p><span class="Button_Link"><?= $value["card_button"]["title"] ?></span></p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        <?php } else { ?>
                            <li class="doubleWide <?= $cards_col ?>">
                                <div class="no-link-card">
                                    <div class="row g-0 d-flex">
                                        <div class="cardImage_Wrapper">
                                            <span class="cardImage"><img src="<?= $value["card_image"]["url"] ?>"
                                                    alt="<?= $value["card_image"]["alt"] ?>"></span>
                                        </div>
                                        <div class="cardDet_Wrapper">
                                            <p class="cardTitle"><?= $value["card_title"] ?></p>
                                            <p class="cardDesc"><?= $value["card_descrption"] ?></p>
                                            <?php if (!empty($value["card_button"])) { ?>
                                                <p><a href="<?= $value["card_button"]["url"] ?>"
                                                        target="<?= $value["card_button"]["target"] === "_blank" ? "_blank" : "_self" ?>"
                                                        class="Button_Link"><?= $value["card_button"]["title"] ?></a></p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                    <?php } else { ?>
                        <li class="doubleWide <?= $cards_col ?>">
                            <?php if (!empty($value["card_link"])) { ?>
                                <a href="<?= $value["card_link"]["url"] ?>"
                                    target="<?= $value["card_link"]["target"] === "_blank" ? "_blank" : "_self" ?>">
                                    <div class="cardDet_Wrapper">
                                        <p class="cardTitle"><?= $value["card_title"] ?></p>
                                        <p class="cardDesc"><?= $value["card_descrption"] ?></p>
                                        <?php if (!empty($value["card_button"])) { ?>
                                            <p><span class="Button_Link"><?= $value["card_button"]["title"] ?></span></p>
                                        <?php } ?>
                                    </div>
                                </a>
                            <?php } else { ?>
                                <div class="no-link-card">
                                    <div class="cardDet_Wrapper">
                                        <p class="cardTitle"><?= $value["card_title"] ?></p>
                                        <p class="cardDesc"><?= $value["card_descrption"] ?></p>
                                        <?php if (!empty($value["card_button"])) { ?>
                                            <p><a href="<?= $value["card_button"]["url"] ?>"
                                                    target="<?= $value["card_button"]["target"] === "_blank" ? "_blank" : "_self" ?>"
                                                    class="Button_Link"><?= $value["card_button"]["title"] ?></a></p>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php
                            } ?>
                        </li>
                    <?php } ?>
                <?php } else { ?>
                    <li class="<?= $cards_col ?>">
                        <?php if (!empty($value["card_link"])) { ?>
                            <a href="<?= $value["card_link"]["url"] ?>"
                                target="<?= $value["card_link"]["target"] === "_blank" ? "_blank" : "_self" ?>">
                                <p class="cardTitle"><?= $value["card_title"] ?></p>
                                <p class="cardDesc"><?= $value["card_descrption"] ?></p>
                            </a>
                        <?php } else { ?>
                            <div class="no-link-card">
                                <p class="cardTitle"><?= $value["card_title"] ?></p>
                                <p class="cardDesc"><?= $value["card_descrption"] ?></p>
                            </div>
                        <?php } ?>
                    </li>
                    <?php
                }
            }
            ?>
        </ul>
    </div>
</section>