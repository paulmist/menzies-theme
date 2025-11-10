<?php

/**
 * Post Table Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'splits-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'post-table';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="background-color: var(--<?php echo esc_attr(get_field('background_colour')); ?>)">

    <?php $table_type = get_field('table-type'); ?>

    <?php if ($table_type === 'standard') : ?>
        <div class="availability-table-container fadeInUp animationDelayone animatable p-t-<?php echo esc_attr(get_field('padding_top')); ?> p-b-<?php echo esc_attr(get_field('padding_bottom')); ?>" style="overflow-x:auto;">
            <?php
            $table = get_field('availability_table');
            if (!empty($table)) {
                echo '<table border="0">';

                if (!empty($table['caption'])) {
                    echo '<caption>' . esc_html($table['caption']) . '</caption>';
                }

                if (!empty($table['header'])) {
                    echo '<thead>';
                    echo '<tr>';

                    foreach ($table['header'] as $th) {
                        echo '<th>';
                        echo wpautop(wp_kses_post($th['c']));
                        echo '</th>';
                    }

                    echo '</tr>';
                    echo '</thead>';
                }

                echo '<tbody>';
                foreach ($table['body'] as $tr) {
                    echo '<tr>';
                    foreach ($tr as $td) {
                        echo '<td>';
                        echo wpautop(wp_kses_post($td['c']));
                        echo '</td>';
                    }
                    echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
            } ?>
        </div>
    <?php elseif ($table_type === 'package') : ?>
        <div class="p-t-small p-b-large">
            <div class="sectors-section-title">
                <h2 class="modTitle fadeInUp animationDelayone animated">Package Details</h2>
                <p class="subPara">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rerum accusamus eligendi provident reprehenderit assumenda quidem veritatis ut! Sunt, ipsam deleniti.
                </p>
            </div>
            <div class="table-wrapper">
                [table id=1 /]
            </div>
        </div>
    <?php endif; ?>

</div>