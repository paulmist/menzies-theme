<?php

/**
 * Post Title Block Template.
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
$className = 'post-title';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

    <div class="uk-container post-title-container p-t-<?php echo esc_html(get_field('padding_top')); ?> p-b-<?php echo esc_html(get_field('padding_bottom')); ?>">

        <?php
        $post_title = get_field('post_title');
        $heading_level = get_field('title_heading_size');
        $alignment = get_field('title_alignment');
        $highlighted_words = get_field('title_highlighted_words');


        if (!$heading_level) {
            $heading_level = 'h2';
        }

        if (!$alignment) {
            $alignment = 'left';
        }


        function highlight_words($text, $words)
        {
            if (!$words) return $text;

            $words_array = explode(',', $words);
            foreach ($words_array as $word) {
                $word = trim($word);
                if ($word) {
                    $text = preg_replace('/\b' . preg_quote($word, '/') . '\b/', '<span style="color: var(--yellow);">' . $word . '</span>', $text);
                }
            }
            return $text;
        }


        if ($post_title) {
            $highlighted_title = highlight_words($post_title, $highlighted_words);
            echo '<' . esc_html($heading_level) . ' style="text-align: ' . esc_html($alignment) . ';">' . $highlighted_title . '</' . esc_html($heading_level) . '>';
        }
        ?>




    </div>
</div>