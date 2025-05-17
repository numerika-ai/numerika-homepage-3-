<?php
/**
 * Numerika Theme Customizer
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function numerika_customize_register($wp_customize) {
    $wp_customize->get_setting('blogname')->transport         = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial(
            'blogname',
            array(
                'selector'        => '.site-title a',
                'render_callback' => 'numerika_customize_partial_blogname',
            )
        );
        $wp_customize->selective_refresh->add_partial(
            'blogdescription',
            array(
                'selector'        => '.site-description',
                'render_callback' => 'numerika_customize_partial_blogdescription',
            )
        );
    }

    // Hero Section
    $wp_customize->add_section(
        'numerika_hero_section',
        array(
            'title'    => __('Hero Section', 'numerika'),
            'priority' => 130,
        )
    );

    $wp_customize->add_setting(
        'hero_title',
        array(
            'default'           => 'Zrozumiałe dane, lepsze decyzje, większa efektywność',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'hero_title',
        array(
            'label'    => __('Hero Title', 'numerika'),
            'section'  => 'numerika_hero_section',
            'type'     => 'text',
        )
    );

    $wp_customize->add_setting(
        'hero_subtitle',
        array(
            'default'           => 'Profesjonalne szkolenia z Excela, Power BI, storytellingu danych i AI dla firm i osób indywidualnych',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'hero_subtitle',
        array(
            'label'    => __('Hero Subtitle', 'numerika'),
            'section'  => 'numerika_hero_section',
            'type'     => 'text',
        )
    );

    $wp_customize->add_setting(
        'hero_button_text',
        array(
            'default'           => 'Odkryj nasze szkolenia',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'hero_button_text',
        array(
            'label'    => __('Hero Button Text', 'numerika'),
            'section'  => 'numerika_hero_section',
            'type'     => 'text',
        )
    );

    $wp_customize->add_setting(
        'hero_button_url',
        array(
            'default'           => '#szkolenia',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'hero_button_url',
        array(
            'label'    => __('Hero Button URL', 'numerika'),
            'section'  => 'numerika_hero_section',
            'type'     => 'url',
        )
    );

    // Skills Section
    $wp_customize->add_section(
        'numerika_skills_section',
        array(
            'title'    => __('Skills Section', 'numerika'),
            'priority' => 140,
        )
    );

    $wp_customize->add_setting(
        'skills_title',
        array(
            'default'           => 'Rozwijaj kompetencje analityczne przyszłości',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'skills_title',
        array(
            'label'    => __('Skills Title', 'numerika'),
            'section'  => 'numerika_skills_section',
            'type'     => 'text',
        )
    );

    // Add settings for each skill item (4 items)
    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting(
            "skills_item_{$i}_title",
            array(
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            "skills_item_{$i}_title",
            array(
                'label'    => sprintf(__('Skill %d Title', 'numerika'), $i),
                'section'  => 'numerika_skills_section',
                'type'     => 'text',
            )
        );

        $wp_customize->add_setting(
            "skills_item_{$i}_description",
            array(
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            "skills_item_{$i}_description",
            array(
                'label'    => sprintf(__('Skill %d Description', 'numerika'), $i),
                'section'  => 'numerika_skills_section',
                'type'     => 'textarea',
            )
        );

        $wp_customize->add_setting(
            "skills_item_{$i}_icon",
            array(
                'default'           => "/assets/images/icons/icon{$i}.png",
                'sanitize_callback' => 'esc_url_raw',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                "skills_item_{$i}_icon",
                array(
                    'label'    => sprintf(__('Skill %d Icon', 'numerika'), $i),
                    'section'  => 'numerika_skills_section',
                )
            )
        );
    }

    // Why Us Section
    $wp_customize->add_section(
        'numerika_why_us_section',
        array(
            'title'    => __('Why Choose Us Section', 'numerika'),
            'priority' => 150,
        )
    );

    $wp_customize->add_setting(
        'why_us_title',
        array(
            'default'           => 'Dlaczego warto szkolić się z Numeriką?',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'why_us_title',
        array(
            'label'    => __('Section Title', 'numerika'),
            'section'  => 'numerika_why_us_section',
            'type'     => 'text',
        )
    );

    // Add settings for each why us item (4 items)
    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting(
            "why_us_item_{$i}_title",
            array(
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            "why_us_item_{$i}_title",
            array(
                'label'    => sprintf(__('Item %d Title', 'numerika'), $i),
                'section'  => 'numerika_why_us_section',
                'type'     => 'text',
            )
        );

        $wp_customize->add_setting(
            "why_us_item_{$i}_description",
            array(
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            "why_us_item_{$i}_description",
            array(
                'label'    => sprintf(__('Item %d Description', 'numerika'), $i),
                'section'  => 'numerika_why_us_section',
                'type'     => 'textarea',
            )
        );

        $wp_customize->add_setting(
            "why_us_item_{$i}_icon",
            array(
                'default'           => "/assets/images/icons/icon{$i}.png",
                'sanitize_callback' => 'esc_url_raw',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                "why_us_item_{$i}_icon",
                array(
                    'label'    => sprintf(__('Item %d Icon', 'numerika'), $i),
                    'section'  => 'numerika_why_us_section',
                )
            )
        );
    }

    // Trainings Section
    $wp_customize->add_section(
        'numerika_trainings_section',
        array(
            'title'    => __('Trainings Section', 'numerika'),
            'priority' => 160,
        )
    );

    $wp_customize->add_setting(
        'trainings_title',
        array(
            'default'           => 'Nasza oferta szkoleniowa',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'trainings_title',
        array(
            'label'    => __('Section Title', 'numerika'),
            'section'  => 'numerika_trainings_section',
            'type'     => 'text',
        )
    );

    $wp_customize->add_setting(
        'trainings_button_text',
        array(
            'default'           => 'Sprawdź harmonogram szkoleń',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'trainings_button_text',
        array(
            'label'    => __('Button Text', 'numerika'),
            'section'  => 'numerika_trainings_section',
            'type'     => 'text',
        )
    );

    $wp_customize->add_setting(
        'trainings_button_url',
        array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'trainings_button_url',
        array(
            'label'    => __('Button URL', 'numerika'),
            'section'  => 'numerika_trainings_section',
            'type'     => 'url',
        )
    );

    // Portfolio Section
    $wp_customize->add_section(
        'numerika_portfolio_section',
        array(
            'title'    => __('Portfolio Section', 'numerika'),
            'priority' => 170,
        )
    );

    $wp_customize->add_setting(
        'portfolio_title',
        array(
            'default'           => 'Przykłady naszych realizacji',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'portfolio_title',
        array(
            'label'    => __('Section Title', 'numerika'),
            'section'  => 'numerika_portfolio_section',
            'type'     => 'text',
        )
    );

    $wp_customize->add_setting(
        'portfolio_subtitle',
        array(
            'default'           => 'Zobacz przykładowe dashboardy i wizualizacje danych, które nasi kursanci tworzą podczas szkoleń',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'portfolio_subtitle',
        array(
            'label'    => __('Section Subtitle', 'numerika'),
            'section'  => 'numerika_portfolio_section',
            'type'     => 'textarea',
        )
    );

    // Testimonials Section
    $wp_customize->add_section(
        'numerika_testimonials_section',
        array(
            'title'    => __('Testimonials Section', 'numerika'),
            'priority' => 180,
        )
    );

    $wp_customize->add_setting(
        'testimonials_title',
        array(
            'default'           => 'Co mówią o nas uczestnicy szkoleń',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'testimonials_title',
        array(
            'label'    => __('Section Title', 'numerika'),
            'section'  => 'numerika_testimonials_section',
            'type'     => 'text',
        )
    );

    // Contact Section
    $wp_customize->add_section(
        'numerika_contact_section',
        array(
            'title'    => __('Contact Section', 'numerika'),
            'priority' => 190,
        )
    );

    $wp_customize->add_setting(
        'contact_title',
        array(
            'default'           => 'Skontaktuj się z nami',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'contact_title',
        array(
            'label'    => __('Section Title', 'numerika'),
            'section'  => 'numerika_contact_section',
            'type'     => 'text',
        )
    );

    $wp_customize->add_setting(
        'contact_subtitle',
        array(
            'default'           => 'Masz pytania dotyczące naszych szkoleń? Chcesz dowiedzieć się więcej o ofercie dla firm? Wypełnij formularz, a nasz zespół skontaktuje się z Tobą najszybciej jak to możliwe.',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'contact_subtitle',
        array(
            'label'    => __('Section Subtitle', 'numerika'),
            'section'  => 'numerika_contact_section',
            'type'     => 'textarea',
        )
    );

    $wp_customize->add_setting(
        'contact_email',
        array(
            'default'           => 'kontakt@numerika.pl',
            'sanitize_callback' => 'sanitize_email',
        )
    );

    $wp_customize->add_control(
        'contact_email',
        array(
            'label'    => __('Contact Email', 'numerika'),
            'section'  => 'numerika_contact_section',
            'type'     => 'email',
        )
    );

    $wp_customize->add_setting(
        'contact_phone',
        array(
            'default'           => '+48 123 456 789',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'contact_phone',
        array(
            'label'    => __('Contact Phone', 'numerika'),
            'section'  => 'numerika_contact_section',
            'type'     => 'text',
        )
    );

    $wp_customize->add_setting(
        'contact_address',
        array(
            'default'           => 'ul. Analityczna 42, 00-000 Warszawa',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'contact_address',
        array(
            'label'    => __('Contact Address', 'numerika'),
            'section'  => 'numerika_contact_section',
            'type'     => 'text',
        )
    );

    $wp_customize->add_setting(
        'contact_form_id',
        array(
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(
        'contact_form_id',
        array(
            'label'       => __('Contact Form 7 ID', 'numerika'),
            'description' => __('Enter the ID of the Contact Form 7 form to display in the contact section.', 'numerika'),
            'section'     => 'numerika_contact_section',
            'type'        => 'number',
        )
    );

    // Footer Section
    $wp_customize->add_section(
        'numerika_footer_section',
        array(
            'title'    => __('Footer Section', 'numerika'),
            'priority' => 200,
        )
    );

    $wp_customize->add_setting(
        'footer_description',
        array(
            'default'           => 'Profesjonalne szkolenia z Excela, Power BI, storytellingu danych i AI dla firm i osób indywidualnych.',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'footer_description',
        array(
            'label'    => __('Footer Description', 'numerika'),
            'section'  => 'numerika_footer_section',
            'type'     => 'textarea',
        )
    );

    $wp_customize->add_setting(
        'facebook_url',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'facebook_url',
        array(
            'label'    => __('Facebook URL', 'numerika'),
            'section'  => 'numerika_footer_section',
            'type'     => 'url',
        )
    );

    $wp_customize->add_setting(
        'linkedin_url',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'linkedin_url',
        array(
            'label'    => __('LinkedIn URL', 'numerika'),
            'section'  => 'numerika_footer_section',
            'type'     => 'url',
        )
    );

    $wp_customize->add_setting(
        'twitter_url',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'twitter_url',
        array(
            'label'    => __('Twitter URL', 'numerika'),
            'section'  => 'numerika_footer_section',
            'type'     => 'url',
        )
    );

    $wp_customize->add_setting(
        'youtube_url',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'youtube_url',
        array(
            'label'    => __('YouTube URL', 'numerika'),
            'section'  => 'numerika_footer_section',
            'type'     => 'url',
        )
    );

    $wp_customize->add_setting(
        'newsletter_text',
        array(
            'default'           => 'Zapisz się, aby otrzymywać najnowsze informacje o szkoleniach i materiały edukacyjne.',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'newsletter_text',
        array(
            'label'    => __('Newsletter Text', 'numerika'),
            'section'  => 'numerika_footer_section',
            'type'     => 'textarea',
        )
    );

    $wp_customize->add_setting(
        'newsletter_form_action',
        array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'newsletter_form_action',
        array(
            'label'    => __('Newsletter Form Action URL', 'numerika'),
            'section'  => 'numerika_footer_section',
            'type'     => 'url',
        )
    );

    $wp_customize->add_setting(
        'terms_page',
        array(
            'default'           => 0,
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(
        'terms_page',
        array(
            'label'    => __('Terms & Conditions Page', 'numerika'),
            'section'  => 'numerika_footer_section',
            'type'     => 'dropdown-pages',
        )
    );
}
add_action('customize_register', 'numerika_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function numerika_customize_partial_blogname() {
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function numerika_customize_partial_blogdescription() {
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function numerika_customize_preview_js() {
    wp_enqueue_script('numerika-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('customize-preview'), NUMERIKA_VERSION, true);
}
add_action('customize_preview_init', 'numerika_customize_preview_js');
