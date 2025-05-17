<?php
/**
 * The header for our theme
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site flex min-h-screen flex-col">
    <header class="sticky top-0 z-50 w-full border-b bg-white">
        <div class="container flex h-16 items-center justify-between">
            <div class="flex items-center gap-2">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-2">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php bloginfo('name'); ?>" class="h-10 w-auto">
                        <span class="text-xl font-bold text-[#36698d]"><?php bloginfo('name'); ?></span>
                    </a>
                <?php
                }
                ?>
            </div>
            <nav class="hidden md:flex items-center gap-6">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu(
                        array(
                            'theme_location' => 'primary',
                            'menu_id'        => 'primary-menu',
                            'container'      => false,
                            'menu_class'     => 'flex items-center gap-6',
                            'fallback_cb'    => false,
                        )
                    );
                } else {
                    // Default menu items if no menu is set
                    ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="text-sm font-medium text-blue-900 hover:text-[#36698d]">
                        <?php _e('Strona główna', 'numerika'); ?>
                    </a>
                    <a href="#oferta" class="text-sm font-medium text-gray-600 hover:text-[#36698d]">
                        <?php _e('Oferta', 'numerika'); ?>
                    </a>
                    <a href="#szkolenia" class="text-sm font-medium text-gray-600 hover:text-[#36698d]">
                        <?php _e('Szkolenia', 'numerika'); ?>
                    </a>
                    <a href="#o-nas" class="text-sm font-medium text-gray-600 hover:text-[#36698d]">
                        <?php _e('O nas', 'numerika'); ?>
                    </a>
                    <a href="#blog" class="text-sm font-medium text-gray-600 hover:text-[#36698d]">
                        <?php _e('Blog', 'numerika'); ?>
                    </a>
                    <a href="#kontakt" class="text-sm font-medium text-gray-600 hover:text-[#36698d]">
                        <?php _e('Kontakt', 'numerika'); ?>
                    </a>
                    <?php
                }
                ?>
            </nav>
            <button id="mobile-menu-toggle" class="md:hidden bg-transparent border border-gray-300 rounded-md px-3 py-1 text-sm font-medium text-gray-700">
                <?php _e('Menu', 'numerika'); ?>
            </button>
        </div>
        
        <!-- Mobile menu, hidden by default -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200">
            <div class="container py-4">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu(
                        array(
                            'theme_location' => 'primary',
                            'menu_id'        => 'mobile-primary-menu',
                            'container'      => false,
                            'menu_class'     => 'flex flex-col space-y-4',
                            'fallback_cb'    => false,
                        )
                    );
                } else {
                    // Default menu items if no menu is set
                    ?>
                    <div class="flex flex-col space-y-4">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="text-sm font-medium text-blue-900 hover:text-[#36698d]">
                            <?php _e('Strona główna', 'numerika'); ?>
                        </a>
                        <a href="#oferta" class="text-sm font-medium text-gray-600 hover:text-[#36698d]">
                            <?php _e('Oferta', 'numerika'); ?>
                        </a>
                        <a href="#szkolenia" class="text-sm font-medium text-gray-600 hover:text-[#36698d]">
                            <?php _e('Szkolenia', 'numerika'); ?>
                        </a>
                        <a href="#o-nas" class="text-sm font-medium text-gray-600 hover:text-[#36698d]">
                            <?php _e('O nas', 'numerika'); ?>
                        </a>
                        <a href="#blog" class="text-sm font-medium text-gray-600 hover:text-[#36698d]">
                            <?php _e('Blog', 'numerika'); ?>
                        </a>
                        <a href="#kontakt" class="text-sm font-medium text-gray-600 hover:text-[#36698d]">
                            <?php _e('Kontakt', 'numerika'); ?>
                        </a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </header>
