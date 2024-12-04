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
$featured_title = get_field('featured_title');
$accordion_items = get_field('accordion_item');
$RAND_ACCORDION_ID =  "accordion_" . mt_rand();
$RAND_ACCORION_COLLAPSE_ID = $RAND_ACCORDION_ID."_accodion_collapse_";
$RAND_ACCORDION_HEADING_ID = $RAND_ACCORDION_ID."_accodion_heading_";
// var_dump($button);


?>

<section class="accordion_Wrapper">
    <div class="container">
        <?php if ($featured_title) { ?>
            <h2><?= $featured_title ?></h2>
        <?php } ?>
        <div class="accordion accordion-flush" id="<?=$RAND_ACCORDION_ID?>">
            <?php if ($accordion_items) {
                foreach ($accordion_items as $key => $item) { ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="<?=$RAND_ACCORDION_HEADING_ID.$key+1?>">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?=$RAND_ACCORION_COLLAPSE_ID.$key+1?>" aria-expanded="false" aria-controls="<?=$RAND_ACCORION_COLLAPSE_ID.$key+1?>">
                                <?= $item["accordion_title"] ?>
                            </button>
                        </h2>
                        <div id="<?=$RAND_ACCORION_COLLAPSE_ID.$key+1?>" class="accordion-collapse collapse" aria-labelledby="<?=$RAND_ACCORDION_HEADING_ID.$key+1?>" data-bs-parent="#<?=$RAND_ACCORDION_ID?>">
                            <div class="accordion-body">
                                <?= $item["accordion_content"] ?>
                            </div>
                        </div>
                    </div>
                <?php  } ?>
            <?php } ?>
        </div>
    </div>
</section>