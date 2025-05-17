<?php
/**
 * Template part for displaying posts
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('mb-8 overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm'); ?>>
    <?php if (has_post_thumbnail()) : ?>
    <div class="relative h-48 w-full overflow-hidden">
        <?php the_post_thumbnail('medium_large', array('class' => 'absolute inset-0 h-full w-full object-cover')); ?>
    </div>
    <?php endif; ?>

    <div class="p-6">
        <header class="entry-header mb-4">
            <?php
            if (is_singular()) :
                the_title('<h1 class="entry-title text-2xl font-bold text-gray-900">', '</h1>');
            else :
                the_title('<h2 class="entry-title text-xl font-bold text-gray-900"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
            endif;

            if ('post' === get_post_type()) :
            ?>
            <div class="entry-meta mt-2 text-sm text-gray-600">
                <?php
                numerika_posted_on();
                numerika_posted_by();
                ?>
            </div>
            <?php endif; ?>
        </header>

        <div class="entry-content">
            <?php
            if (is_singular()) :
                the_content(
                    sprintf(
                        wp_kses(
                            /* translators: %s: Name of current post. Only visible to screen readers */
                            __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'numerika'),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        wp_kses_post(get_the_title())
                    )
                );

                wp_link_pages(
                    array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'numerika'),
                        'after'  => '</div>',
                    )
                );
            else :
                the_excerpt();
            ?>
                <a href="<?php echo esc_url(get_permalink()); ?>" class="mt-4 inline-flex items-center text-sm font-medium text-[#36698d] hover:underline">
                    <?php esc_html_e('Read more', 'numerika'); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            <?php
            endif;
            ?>
        </div>

        <?php if (is_singular() && 'post' === get_post_type()) : ?>
        <footer class="entry-footer mt-6 border-t border-gray-100 pt-4 text-sm text-gray-600">
            <?php numerika_entry_footer(); ?>
        </footer>
        <?php endif; ?>
    </div>
</article>
