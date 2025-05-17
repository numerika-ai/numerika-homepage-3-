<?php
/**
 * Template part for displaying a message that posts cannot be found
 */
?>

<section class="no-results not-found bg-white p-8 rounded-lg shadow-sm">
    <header class="page-header mb-6">
        <h1 class="page-title text-2xl font-bold text-gray-900"><?php esc_html_e('Nothing Found', 'numerika'); ?></h1>
    </header>

    <div class="page-content">
        <?php
        if (is_home() && current_user_can('publish_posts')) :
            printf(
                '<p>' . wp_kses(
                    /* translators: 1: link to WP admin new post page. */
                    __('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'numerika'),
                    array(
                        'a' => array(
                            'href' => array(),
                        ),
                    )
                ) . '</p>',
                esc_url(admin_url('post-new.php'))
            );
        elseif (is_search()) :
        ?>
            <p class="mb-4"><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'numerika'); ?></p>
            <?php get_search_form(); ?>
        <?php
        else :
        ?>
            <p class="mb-4"><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'numerika'); ?></p>
            <?php get_search_form(); ?>
        <?php
        endif;
        ?>
    </div>
</section>
