<?php
/**
 * The template for displaying the footer
 */
?>

    <footer class="border-t bg-gray-50 py-12">
        <div class="container">
            <div class="grid grid-cols-1 gap-12 md:grid-cols-2 lg:grid-cols-4">
                <div>
                    <div class="flex items-center gap-2">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="<?php bloginfo('name'); ?>" class="h-8 w-auto">
                        <span class="text-lg font-bold text-[#36698d]"><?php bloginfo('name'); ?></span>
                    </div>
                    <p class="mt-4 text-sm text-gray-600">
                        <?php echo get_theme_mod('footer_description', 'Profesjonalne szkolenia z Excela, Power BI, storytellingu danych i AI dla firm i osób indywidualnych.'); ?>
                    </p>

                    <div class="mt-6 flex space-x-4">
                        <?php if (get_theme_mod('facebook_url')) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('facebook_url')); ?>" class="text-gray-500 hover:text-[#36698d]" target="_blank">
                            <span class="sr-only">Facebook</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <?php endif; ?>
                        
                        <?php if (get_theme_mod('linkedin_url')) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('linkedin_url')); ?>" class="text-gray-500 hover:text-[#36698d]" target="_blank">
                            <span class="sr-only">LinkedIn</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"></path>
                            </svg>
                        </a>
                        <?php endif; ?>
                        
                        <?php if (get_theme_mod('twitter_url')) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('twitter_url')); ?>" class="text-gray-500 hover:text-[#36698d]" target="_blank">
                            <span class="sr-only">Twitter</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                            </svg>
                        </a>
                        <?php endif; ?>
                        
                        <?php if (get_theme_mod('youtube_url')) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('youtube_url')); ?>" class="text-gray-500 hover:text-[#36698d]" target="_blank">
                            <span class="sr-only">YouTube</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>

                <div>
                    <h3 class="text-sm font-semibold uppercase tracking-wider text-gray-900"><?php _e('Nawigacja', 'numerika'); ?></h3>
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer-1',
                            'menu_id'        => 'footer-menu-1',
                            'container'      => false,
                            'menu_class'     => 'mt-4 space-y-2',
                            'fallback_cb'    => false,
                            'depth'          => 1,
                        )
                    );
                    ?>
                </div>

                <div>
                    <h3 class="text-sm font-semibold uppercase tracking-wider text-gray-900"><?php _e('Szkolenia', 'numerika'); ?></h3>
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer-2',
                            'menu_id'        => 'footer-menu-2',
                            'container'      => false,
                            'menu_class'     => 'mt-4 space-y-2',
                            'fallback_cb'    => false,
                            'depth'          => 1,
                        )
                    );
                    ?>
                </div>

                <div>
                    <h3 class="text-sm font-semibold uppercase tracking-wider text-gray-900"><?php _e('Newsletter', 'numerika'); ?></h3>
                    <p class="mt-4 text-sm text-gray-600">
                        <?php echo get_theme_mod('newsletter_text', 'Zapisz się, aby otrzymywać najnowsze informacje o szkoleniach i materiały edukacyjne.'); ?>
                    </p>
                    <form action="<?php echo esc_url(get_theme_mod('newsletter_form_action', '#')); ?>" method="post" class="mt-4">
                        <div class="flex max-w-md flex-col gap-2 sm:flex-row">
                            <input
                                type="email"
                                name="email"
                                placeholder="<?php _e('Twój adres email', 'numerika'); ?>"
                                class="rounded-md border border-gray-300 px-4 py-2 text-sm focus:border-[#36698d] focus:outline-none focus:ring-1 focus:ring-[#36698d]"
                                required
                            />
                            <button type="submit" class="rounded-md bg-[#36698d] px-4 py-2 text-sm font-medium text-white hover:bg-[#1e8092]">
                                <?php _e('Zapisz się', 'numerika'); ?>
                            </button>
                        </div>
                    </form>

                    <div class="mt-6 text-xs text-gray-500">
                        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('Wszelkie prawa zastrzeżone.', 'numerika'); ?></p>
                        <div class="mt-2 flex space-x-4">
                            <a href="<?php echo esc_url(get_privacy_policy_url()); ?>" class="hover:text-[#36698d]">
                                <?php _e('Polityka prywatności', 'numerika'); ?>
                            </a>
                            <?php if (get_theme_mod('terms_page')) : ?>
                            <a href="<?php echo esc_url(get_permalink(get_theme_mod('terms_page'))); ?>" class="hover:text-[#36698d]">
                                <?php _e('Warunki korzystania', 'numerika'); ?>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
