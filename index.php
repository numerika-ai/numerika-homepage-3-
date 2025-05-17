<?php
/**
 * The main template file
 */

get_header();
?>

<main id="primary" class="site-main flex-1">
    <div class="container py-12">
        <?php
        if (have_posts()) :
            ?>
            <header class="page-header mb-8">
                <h1 class="text-3xl font-bold text-gray-900">
                    <?php single_post_title(); ?>
                </h1>
            </header>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                <?php
                while (have_posts()) :
                    the_post();
                    get_template_part('template-parts/content', get_post_type());
                endwhile;
                ?>
            </div>

            <?php
            the_posts_navigation(array(
                'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'numerika') . '</span> <span class="nav-title">%title</span>',
                'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'numerika') . '</span> <span class="nav-title">%title</span>',
            ));
        else :
            get_template_part('template-parts/content', 'none');
        endif;
        ?>
    </div>
</main>

<?php
get_footer();
