<?php
/**
 * The template for displaying the front page
 */

get_header();
?>

<main id="primary" class="site-main flex-1">
    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-r from-[#36698d] to-[#62bfc6] py-20 text-white">
        <div class="container relative z-10 flex flex-col items-center text-center">
            <h1 class="max-w-4xl text-4xl font-bold tracking-tight sm:text-5xl md:text-6xl">
                <?php echo get_theme_mod('hero_title', 'Zrozumiałe dane, lepsze decyzje, większa efektywność'); ?>
            </h1>
            <p class="mt-6 max-w-2xl text-lg text-[#a9dae6]">
                <?php echo get_theme_mod('hero_subtitle', 'Profesjonalne szkolenia z Excela, Power BI, storytellingu danych i AI dla firm i osób indywidualnych'); ?>
            </p>
            <a href="<?php echo esc_url(get_theme_mod('hero_button_url', '#szkolenia')); ?>" class="mt-10 inline-flex items-center rounded-md bg-white px-6 py-3 text-base font-medium text-[#36698d] hover:bg-[#a9dae6]">
                <?php echo get_theme_mod('hero_button_text', 'Odkryj nasze szkolenia'); ?>
                <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </a>

            <div class="mt-16 w-full max-w-3xl">
                <canvas id="data-animation" class="w-full rounded-lg" aria-label="Animacja transformacji danych w wizualizacje"></canvas>
            </div>
        </div>

        <div class="absolute inset-0 bg-[url('<?php echo get_template_directory_uri(); ?>/assets/images/grid-pattern.png')] bg-center opacity-20"></div>
    </section>

    <!-- Skills Development Section -->
    <section class="py-20">
        <div class="container">
            <h2 class="text-center text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                <?php echo get_theme_mod('skills_title', 'Rozwijaj kompetencje analityczne przyszłości'); ?>
            </h2>
            <div class="mt-16 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
                <?php
                // Get skills items from customizer or use defaults
                $skills_items = array();
                for ($i = 1; $i <= 4; $i++) {
                    $skills_items[] = array(
                        'title' => get_theme_mod("skills_item_{$i}_title", ''),
                        'description' => get_theme_mod("skills_item_{$i}_description", ''),
                        'icon' => get_theme_mod("skills_item_{$i}_icon", ''),
                    );
                }

                // Default skills items if not set in customizer
                if (empty($skills_items[0]['title'])) {
                    $skills_items = array(
                        array(
                            'title' => 'Excel od podstaw do mistrzostwa',
                            'description' => 'Opanuj najważniejsze funkcje, formuły i narzędzia analityczne w Excelu',
                            'icon' => '/assets/images/icons/excel.png',
                        ),
                        array(
                            'title' => 'Power BI w praktyce',
                            'description' => 'Twórz interaktywne dashboardy i wizualizacje danych w Power BI',
                            'icon' => '/assets/images/icons/powerbi.png',
                        ),
                        array(
                            'title' => 'Storytelling danych',
                            'description' => 'Przekształć liczby w przekonujące historie, które inspirują do działania',
                            'icon' => '/assets/images/icons/storytelling.png',
                        ),
                        array(
                            'title' => 'AI w analityce danych',
                            'description' => 'Wykorzystaj sztuczną inteligencję do automatyzacji i optymalizacji analiz',
                            'icon' => '/assets/images/icons/ai.png',
                        ),
                    );
                }

                foreach ($skills_items as $item) :
                    if (empty($item['title'])) continue;
                ?>
                <div class="border-2 border-gray-100 rounded-lg p-6 transition-all hover:border-[#a9dae6] hover:shadow-md">
                    <div class="flex flex-row items-center gap-4 pb-2">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-[#a9dae6]">
                            <img src="<?php echo get_template_directory_uri() . $item['icon']; ?>" alt="<?php echo esc_attr($item['title']); ?>" width="24" height="24">
                        </div>
                        <h3 class="text-lg font-medium"><?php echo esc_html($item['title']); ?></h3>
                    </div>
                    <p class="text-gray-600"><?php echo esc_html($item['description']); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="bg-gray-50 py-20">
        <div class="container">
            <h2 class="text-center text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                <?php echo get_theme_mod('why_us_title', 'Dlaczego warto szkolić się z Numeriką?'); ?>
            </h2>
            <div class="mt-16 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
                <?php
                // Get why us items from customizer or use defaults
                $why_us_items = array();
                for ($i = 1; $i <= 4; $i++) {
                    $why_us_items[] = array(
                        'title' => get_theme_mod("why_us_item_{$i}_title", ''),
                        'description' => get_theme_mod("why_us_item_{$i}_description", ''),
                        'icon' => get_theme_mod("why_us_item_{$i}_icon", ''),
                    );
                }

                // Default why us items if not set in customizer
                if (empty($why_us_items[0]['title'])) {
                    $why_us_items = array(
                        array(
                            'title' => 'Praktyczne rozwiązania',
                            'description' => 'Skupiamy się na realnych wyzwaniach, z którymi spotykasz się w codziennej pracy',
                            'icon' => '/assets/images/icons/practical.png',
                        ),
                        array(
                            'title' => 'Zrozumiały język',
                            'description' => 'Tłumaczymy skomplikowane zagadnienia bez technicznego żargonu',
                            'icon' => '/assets/images/icons/language.png',
                        ),
                        array(
                            'title' => 'Doświadczeni praktycy',
                            'description' => 'Nasi trenerzy to eksperci z wieloletnim doświadczeniem w branży',
                            'icon' => '/assets/images/icons/experts.png',
                        ),
                        array(
                            'title' => 'Wsparcie po szkoleniu',
                            'description' => 'Zapewniamy pomoc i konsultacje również po zakończeniu szkolenia',
                            'icon' => '/assets/images/icons/support.png',
                        ),
                    );
                }

                foreach ($why_us_items as $item) :
                    if (empty($item['title'])) continue;
                ?>
                <div class="flex flex-col items-center rounded-lg bg-white p-6 text-center shadow-sm transition-all hover:shadow-md">
                    <div class="flex h-16 w-16 items-center justify-center rounded-full bg-[#a9dae6]">
                        <img src="<?php echo get_template_directory_uri() . $item['icon']; ?>" alt="<?php echo esc_attr($item['title']); ?>" width="32" height="32">
                    </div>
                    <h3 class="mt-4 text-xl font-semibold text-gray-900"><?php echo esc_html($item['title']); ?></h3>
                    <p class="mt-2 text-gray-600"><?php echo esc_html($item['description']); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Training Offerings Section -->
    <section id="szkolenia" class="py-20">
        <div class="container">
            <h2 class="text-center text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                <?php echo get_theme_mod('trainings_title', 'Nasza oferta szkoleniowa'); ?>
            </h2>

            <div class="mt-12">
                <div class="flex justify-center">
                    <div class="grid w-full max-w-md grid-cols-2 overflow-hidden rounded-lg bg-gray-100">
                        <button id="tab-companies" class="tab-trigger active py-3 px-4 text-center font-medium transition-all" data-tab="companies">
                            <?php _e('Dla firm', 'numerika'); ?>
                        </button>
                        <button id="tab-individuals" class="tab-trigger py-3 px-4 text-center font-medium transition-all" data-tab="individuals">
                            <?php _e('Dla osób indywidualnych', 'numerika'); ?>
                        </button>
                    </div>
                </div>

                <div id="tab-content-companies" class="tab-content mt-8">
                    <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
                        <?php
                        // Query trainings for companies
                        $company_trainings = new WP_Query(array(
                            'post_type' => 'training',
                            'posts_per_page' => 4,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'training_category',
                                    'field' => 'slug',
                                    'terms' => 'dla-firm',
                                ),
                            ),
                        ));

                        if ($company_trainings->have_posts()) :
                            while ($company_trainings->have_posts()) : $company_trainings->the_post();
                                // Get training meta
                                $icon = get_post_meta(get_the_ID(), 'training_icon', true);
                                $levels = get_post_meta(get_the_ID(), 'training_levels', true);
                                if (!is_array($levels)) {
                                    $levels = array();
                                }
                        ?>
                        <div class="border border-[#a9dae6] rounded-lg overflow-hidden">
                            <div class="p-6">
                                <div class="flex items-center gap-3">
                                    <img src="<?php echo get_template_directory_uri() . $icon; ?>" alt="<?php the_title(); ?>" width="24" height="24">
                                    <h3 class="text-lg font-medium"><?php the_title(); ?></h3>
                                </div>
                                <p class="mt-2 text-gray-600"><?php the_excerpt(); ?></p>
                                
                                <?php if (!empty($levels)) : ?>
                                <div class="mt-4">
                                    <p class="text-sm font-medium text-gray-700"><?php _e('Dostępne poziomy:', 'numerika'); ?></p>
                                    <ul class="mt-2 space-y-1">
                                        <?php foreach ($levels as $level) : ?>
                                        <li class="flex items-center text-sm text-gray-600">
                                            <div class="mr-2 h-1.5 w-1.5 rounded-full bg-[#36698d]"></div>
                                            <?php echo esc_html($level); ?>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        else :
                            // Default training items if no posts
                            $default_trainings = array(
                                array(
                                    'title' => 'Excel dla biznesu',
                                    'description' => 'Szkolenia dostosowane do potrzeb zespołów analitycznych i finansowych',
                                    'levels' => array('Podstawowy', 'Średniozaawansowany', 'Zaawansowany'),
                                    'icon' => '/assets/images/icons/excel.png',
                                ),
                                array(
                                    'title' => 'Power BI dla organizacji',
                                    'description' => 'Tworzenie dashboardów i raportów na potrzeby całej firmy',
                                    'levels' => array('Podstawowy', 'Zaawansowany'),
                                    'icon' => '/assets/images/icons/powerbi.png',
                                ),
                                array(
                                    'title' => 'Storytelling danych w biznesie',
                                    'description' => 'Efektywna komunikacja danych w prezentacjach i raportach',
                                    'levels' => array('Warsztat praktyczny'),
                                    'icon' => '/assets/images/icons/storytelling.png',
                                ),
                                array(
                                    'title' => 'AI w procesach biznesowych',
                                    'description' => 'Wykorzystanie AI do optymalizacji procesów analitycznych',
                                    'levels' => array('Wprowadzenie', 'Implementacja'),
                                    'icon' => '/assets/images/icons/ai.png',
                                ),
                            );

                            foreach ($default_trainings as $training) :
                        ?>
                        <div class="border border-[#a9dae6] rounded-lg overflow-hidden">
                            <div class="p-6">
                                <div class="flex items-center gap-3">
                                    <img src="<?php echo get_template_directory_uri() . $training['icon']; ?>" alt="<?php echo esc_attr($training['title']); ?>" width="24" height="24">
                                    <h3 class="text-lg font-medium"><?php echo esc_html($training['title']); ?></h3>
                                </div>
                                <p class="mt-2 text-gray-600"><?php echo esc_html($training['description']); ?></p>
                                
                                <?php if (!empty($training['levels'])) : ?>
                                <div class="mt-4">
                                    <p class="text-sm font-medium text-gray-700"><?php _e('Dostępne poziomy:', 'numerika'); ?></p>
                                    <ul class="mt-2 space-y-1">
                                        <?php foreach ($training['levels'] as $level) : ?>
                                        <li class="flex items-center text-sm text-gray-600">
                                            <div class="mr-2 h-1.5 w-1.5 rounded-full bg-[#36698d]"></div>
                                            <?php echo esc_html($level); ?>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>

                <div id="tab-content-individuals" class="tab-content mt-8 hidden">
                    <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
                        <?php
                        // Query trainings for individuals
                        $individual_trainings = new WP_Query(array(
                            'post_type' => 'training',
                            'posts_per_page' => 4,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'training_category',
                                    'field' => 'slug',
                                    'terms' => 'dla-osob-indywidualnych',
                                ),
                            ),
                        ));

                        if ($individual_trainings->have_posts()) :
                            while ($individual_trainings->have_posts()) : $individual_trainings->the_post();
                                // Get training meta
                                $icon = get_post_meta(get_the_ID(), 'training_icon', true);
                                $levels = get_post_meta(get_the_ID(), 'training_levels', true);
                                if (!is_array($levels)) {
                                    $levels = array();
                                }
                        ?>
                        <div class="border border-[#a9dae6] rounded-lg overflow-hidden">
                            <div class="p-6">
                                <div class="flex items-center gap-3">
                                    <img src="<?php echo get_template_directory_uri() . $icon; ?>" alt="<?php the_title(); ?>" width="24" height="24">
                                    <h3 class="text-lg font-medium"><?php the_title(); ?></h3>
                                </div>
                                <p class="mt-2 text-gray-600"><?php the_excerpt(); ?></p>
                                
                                <?php if (!empty($levels)) : ?>
                                <div class="mt-4">
                                    <p class="text-sm font-medium text-gray-700"><?php _e('Dostępne poziomy:', 'numerika'); ?></p>
                                    <ul class="mt-2 space-y-1">
                                        <?php foreach ($levels as $level) : ?>
                                        <li class="flex items-center text-sm text-gray-600">
                                            <div class="mr-2 h-1.5 w-1.5 rounded-full bg-[#36698d]"></div>
                                            <?php echo esc_html($level); ?>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        else :
                            // Default training items if no posts
                            $default_trainings = array(
                                array(
                                    'title' => 'Excel od podstaw',
                                    'description' => 'Indywidualne szkolenia dopasowane do Twoich potrzeb zawodowych',
                                    'levels' => array('Podstawowy', 'Średniozaawansowany', 'Zaawansowany'),
                                    'icon' => '/assets/images/icons/excel.png',
                                ),
                                array(
                                    'title' => 'Power BI dla analityków',
                                    'description' => 'Nauka tworzenia profesjonalnych wizualizacji i raportów',
                                    'levels' => array('Podstawowy', 'Zaawansowany'),
                                    'icon' => '/assets/images/icons/powerbi.png',
                                ),
                                array(
                                    'title' => 'Storytelling z danymi',
                                    'description' => 'Jak przekształcić dane w przekonujące historie',
                                    'levels' => array('Warsztat praktyczny'),
                                    'icon' => '/assets/images/icons/storytelling.png',
                                ),
                                array(
                                    'title' => 'AI dla analityków',
                                    'description' => 'Wykorzystanie AI w codziennej pracy z danymi',
                                    'levels' => array('Wprowadzenie', 'Praktyczne zastosowania'),
                                    'icon' => '/assets/images/icons/ai.png',
                                ),
                            );

                            foreach ($default_trainings as $training) :
                        ?>
                        <div class="border border-[#a9dae6] rounded-lg overflow-hidden">
                            <div class="p-6">
                                <div class="flex items-center gap-3">
                                    <img src="<?php echo get_template_directory_uri() . $training['icon']; ?>" alt="<?php echo esc_attr($training['title']); ?>" width="24" height="24">
                                    <h3 class="text-lg font-medium"><?php echo esc_html($training['title']); ?></h3>
                                </div>
                                <p class="mt-2 text-gray-600"><?php echo esc_html($training['description']); ?></p>
                                
                                <?php if (!empty($training['levels'])) : ?>
                                <div class="mt-4">
                                    <p class="text-sm font-medium text-gray-700"><?php _e('Dostępne poziomy:', 'numerika'); ?></p>
                                    <ul class="mt-2 space-y-1">
                                        <?php foreach ($training['levels'] as $level) : ?>
                                        <li class="flex items-center text-sm text-gray-600">
                                            <div class="mr-2 h-1.5 w-1.5 rounded-full bg-[#36698d]"></div>
                                            <?php echo esc_html($level); ?>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>
            </div>

            <div class="mt-12 flex justify-center">
                <a href="<?php echo esc_url(get_theme_mod('trainings_button_url', '#')); ?>" class="inline-flex items-center rounded-md bg-[#36698d] px-6 py-3 text-base font-medium text-white hover:bg-[#1e8092]">
                    <?php echo get_theme_mod('trainings_button_text', 'Sprawdź harmonogram szkoleń'); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section class="bg-gray-50 py-20">
        <div class="container">
            <h2 class="text-center text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                <?php echo get_theme_mod('portfolio_title', 'Przykłady naszych realizacji'); ?>
            </h2>
            <p class="mx-auto mt-4 max-w-2xl text-center text-gray-600">
                <?php echo get_theme_mod('portfolio_subtitle', 'Zobacz przykładowe dashboardy i wizualizacje danych, które nasi kursanci tworzą podczas szkoleń'); ?>
            </p>

            <div class="mt-12">
                <div class="portfolio-gallery">
                    <div class="flex justify-center">
                        <div class="grid w-full max-w-md grid-cols-5 overflow-hidden rounded-lg bg-gray-100">
                            <button class="portfolio-filter active py-3 px-4 text-center font-medium transition-all" data-filter="all">
                                <?php _e('Wszystkie', 'numerika'); ?>
                            </button>
                            <button class="portfolio-filter py-3 px-4 text-center font-medium transition-all" data-filter="excel">
                                <?php _e('Excel', 'numerika'); ?>
                            </button>
                            <button class="portfolio-filter py-3 px-4 text-center font-medium transition-all" data-filter="powerbi">
                                <?php _e('Power BI', 'numerika'); ?>
                            </button>
                            <button class="portfolio-filter py-3 px-4 text-center font-medium transition-all" data-filter="storytelling">
                                <?php _e('Storytelling', 'numerika'); ?>
                            </button>
                            <button class="portfolio-filter py-3 px-4 text-center font-medium transition-all" data-filter="ai">
                                <?php _e('AI', 'numerika'); ?>
                            </button>
                        </div>
                    </div>

                    <div class="portfolio-items mt-8 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                        <?php
                        // Query portfolio items
                        $portfolio_items = new WP_Query(array(
                            'post_type' => 'portfolio',
                            'posts_per_page' => 8,
                        ));

                        if ($portfolio_items->have_posts()) :
                            while ($portfolio_items->have_posts()) : $portfolio_items->the_post();
                                // Get portfolio category
                                $terms = get_the_terms(get_the_ID(), 'portfolio_category');
                                $category = '';
                                if (!empty($terms) && !is_wp_error($terms)) {
                                    $category = $terms[0]->slug;
                                }
                        ?>
                        <div class="portfolio-item group cursor-pointer overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm transition-all hover:shadow-md" data-category="<?php echo esc_attr($category); ?>">
                            <div class="relative h-48 w-full overflow-hidden">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium', array('class' => 'absolute inset-0 h-full w-full object-cover transition-transform duration-300 group-hover:scale-105')); ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.jpg" alt="<?php the_title(); ?>" class="absolute inset-0 h-full w-full object-cover transition-transform duration-300 group-hover:scale-105">
                                <?php endif; ?>
                            </div>
                            <div class="p-4">
                                <h3 class="font-medium text-gray-900"><?php the_title(); ?></h3>
                                <p class="text-sm text-gray-500 capitalize">
                                    <?php
                                    if ($category === 'powerbi') {
                                        echo 'Power BI';
                                    } elseif ($category === 'ai') {
                                        echo 'AI';
                                    } elseif ($category === 'storytelling') {
                                        echo 'Storytelling danych';
                                    } else {
                                        echo 'Excel';
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        else :
                            // Default portfolio items if no posts
                            $default_items = array(
                                array(
                                    'title' => 'Dashboard sprzedażowy',
                                    'category' => 'excel',
                                    'image' => '/assets/images/excel-sales-dashboard.png',
                                ),
                                array(
                                    'title' => 'Analiza finansowa',
                                    'category' => 'excel',
                                    'image' => '/assets/images/excel-financial-analysis-dashboard.png',
                                ),
                                array(
                                    'title' => 'Dashboard HR',
                                    'category' => 'powerbi',
                                    'image' => '/assets/images/power-bi-hr-dashboard.png',
                                ),
                                array(
                                    'title' => 'Analiza marketingowa',
                                    'category' => 'powerbi',
                                    'image' => '/assets/images/placeholder.jpg',
                                ),
                                array(
                                    'title' => 'Prezentacja wyników finansowych',
                                    'category' => 'storytelling',
                                    'image' => '/assets/images/placeholder.jpg',
                                ),
                                array(
                                    'title' => 'Wizualizacja trendów rynkowych',
                                    'category' => 'storytelling',
                                    'image' => '/assets/images/placeholder.jpg',
                                ),
                                array(
                                    'title' => 'Predykcja sprzedaży z AI',
                                    'category' => 'ai',
                                    'image' => '/assets/images/placeholder.jpg',
                                ),
                                array(
                                    'title' => 'Automatyczna segmentacja klientów',
                                    'category' => 'ai',
                                    'image' => '/assets/images/placeholder.jpg',
                                ),
                            );

                            foreach ($default_items as $item) :
                        ?>
                        <div class="portfolio-item group cursor-pointer overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm transition-all hover:shadow-md" data-category="<?php echo esc_attr($item['category']); ?>">
                            <div class="relative h-48 w-full overflow-hidden">
                                <img src="<?php echo get_template_directory_uri() . $item['image']; ?>" alt="<?php echo esc_attr($item['title']); ?>" class="absolute inset-0 h-full w-full object-cover transition-transform duration-300 group-hover:scale-105">
                            </div>
                            <div class="p-4">
                                <h3 class="font-medium text-gray-900"><?php echo esc_html($item['title']); ?></h3>
                                <p class="text-sm text-gray-500 capitalize">
                                    <?php
                                    if ($item['category'] === 'powerbi') {
                                        echo 'Power BI';
                                    } elseif ($item['category'] === 'ai') {
                                        echo 'AI';
                                    } elseif ($item['category'] === 'storytelling') {
                                        echo 'Storytelling danych';
                                    } else {
                                        echo 'Excel';
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                        <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>

                <!-- Portfolio Modal -->
                <div id="portfolio-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50 p-4">
                    <div class="max-w-3xl rounded-lg bg-white p-6">
                        <div class="relative h-[60vh] w-full overflow-hidden rounded-lg">
                            <img id="modal-image" src="/placeholder.svg" alt="" class="h-full w-full object-contain">
                        </div>
                        <div class="mt-4">
                            <h2 id="modal-title" class="text-xl font-semibold text-gray-900"></h2>
                            <p id="modal-category" class="text-gray-500 capitalize"></p>
                        </div>
                        <button id="modal-close" class="absolute top-4 right-4 rounded-full bg-white p-2 text-gray-500 hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-20">
        <div class="container">
            <h2 class="text-center text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                <?php echo get_theme_mod('testimonials_title', 'Co mówią o nas uczestnicy szkoleń'); ?>
            </h2>

            <div class="mt-12">
                <div class="testimonials-carousel relative mx-auto max-w-4xl px-4">
                    <div class="overflow-hidden">
                        <div class="testimonials-slider flex transition-transform duration-500 ease-in-out">
                            <?php
                            // Query testimonials
                            $testimonials = new WP_Query(array(
                                'post_type' => 'testimonial',
                                'posts_per_page' => 5,
                            ));

                            if ($testimonials->have_posts()) :
                                while ($testimonials->have_posts()) : $testimonials->the_post();
                                    // Get testimonial meta
                                    $author_position = get_post_meta(get_the_ID(), 'testimonial_position', true);
                            ?>
                            <div class="testimonial-slide min-w-full px-4">
                                <div class="rounded-lg border-none p-8 shadow-lg">
                                    <div class="flex flex-col items-center text-center">
                                        <div class="relative mb-6 h-20 w-20 overflow-hidden rounded-full border-4 border-blue-100">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <?php the_post_thumbnail('thumbnail', array('class' => 'absolute inset-0 h-full w-full object-cover')); ?>
                                            <?php else : ?>
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder-avatar.jpg" alt="<?php the_title(); ?>" class="absolute inset-0 h-full w-full object-cover">
                                            <?php endif; ?>
                                        </div>

                                        <blockquote class="mb-6 text-lg text-gray-700">"<?php the_content(); ?>"</blockquote>

                                        <div>
                                            <p class="font-semibold text-gray-900"><?php the_title(); ?></p>
                                            <p class="text-sm text-gray-600"><?php echo esc_html($author_position); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                endwhile;
                                wp_reset_postdata();
                            else :
                                // Default testimonials if no posts
                                $default_testimonials = array(
                                    array(
                                        'content' => 'Szkolenie z Power BI zmieniło sposób, w jaki analizujemy dane w naszej firmie. Trener w przystępny sposób wyjaśnił nawet najbardziej skomplikowane zagadnienia.',
                                        'author' => 'Anna Nowak',
                                        'position' => 'Dyrektor finansowy, XYZ Corp',
                                        'image' => '/assets/images/professional-woman-portrait.png',
                                    ),
                                    array(
                                        'content' => 'Dzięki szkoleniu z Excela zaawansowanego zaoszczędzam kilka godzin tygodniowo na automatyzacji raportów. Polecam każdemu analitykowi!',
                                        'author' => 'Piotr Kowalski',
                                        'position' => 'Analityk danych, ABC Solutions',
                                        'image' => '/assets/images/professional-man-portrait.png',
                                    ),
                                    array(
                                        'content' => 'Warsztaty ze storytellingu danych pomogły mi przekształcić suche liczby w przekonujące prezentacje. Moje raporty wreszcie trafiają do odbiorców!',
                                        'author' => 'Magdalena Wiśniewska',
                                        'position' => 'Specjalista ds. marketingu, StartUp Inc.',
                                        'image' => '/assets/images/young-professional-woman.png',
                                    ),
                                    array(
                                        'content' => 'Szkolenie z AI w analityce danych otworzyło mi oczy na nowe możliwości. Teraz wykorzystuję sztuczną inteligencję do automatyzacji procesów w mojej firmie.',
                                        'author' => 'Tomasz Jankowski',
                                        'position' => 'CEO, Tech Solutions',
                                        'image' => '/assets/images/confident-businessman.png',
                                    ),
                                );

                                foreach ($default_testimonials as $testimonial) :
                            ?>
                            <div class="testimonial-slide min-w-full px-4">
                                <div class="rounded-lg border-none p-8 shadow-lg">
                                    <div class="flex flex-col items-center text-center">
                                        <div class="relative mb-6 h-20 w-20 overflow-hidden rounded-full border-4 border-blue-100">
                                            <img src="<?php echo get_template_directory_uri() . $testimonial['image']; ?>" alt="<?php echo esc_attr($testimonial['author']); ?>" class="absolute inset-0 h-full w-full object-cover">
                                        </div>

                                        <blockquote class="mb-6 text-lg text-gray-700">"<?php echo esc_html($testimonial['content']); ?>"</blockquote>

                                        <div>
                                            <p class="font-semibold text-gray-900"><?php echo esc_html($testimonial['author']); ?></p>
                                            <p class="text-sm text-gray-600"><?php echo esc_html($testimonial['position']); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                endforeach;
                            endif;
                            ?>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-center gap-2">
                        <button class="testimonial-prev rounded-full border border-[#a9dae6] p-2 hover:bg-[#a9dae6]/20 hover:text-[#36698d]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only"><?php _e('Poprzedni', 'numerika'); ?></span>
                        </button>

                        <div class="testimonial-dots flex items-center gap-2">
                            <!-- Dots will be generated by JavaScript -->
                        </div>

                        <button class="testimonial-next rounded-full border border-[#a9dae6] p-2 hover:bg-[#a9dae6]/20 hover:text-[#36698d]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only"><?php _e('Następny', 'numerika'); ?></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="kontakt" class="bg-[#36698d] py-20 text-white">
        <div class="container">
            <div class="grid grid-cols-1 gap-12 lg:grid-cols-2">
                <div>
                    <h2 class="text-3xl font-bold tracking-tight sm:text-4xl"><?php echo get_theme_mod('contact_title', 'Skontaktuj się z nami'); ?></h2>
                    <p class="mt-4 text-[#a9dae6]">
                        <?php echo get_theme_mod('contact_subtitle', 'Masz pytania dotyczące naszych szkoleń? Chcesz dowiedzieć się więcej o ofercie dla firm? Wypełnij formularz, a nasz zespół skontaktuje się z Tobą najszybciej jak to możliwe.'); ?>
                    </p>

                    <div class="mt-8 space-y-6">
                        <?php if (get_theme_mod('contact_email')) : ?>
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#36698d]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-medium"><?php _e('Email', 'numerika'); ?></p>
                                <p class="text-[#a9dae6]"><?php echo esc_html(get_theme_mod('contact_email')); ?></p>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if (get_theme_mod('contact_phone')) : ?>
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#36698d]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-medium"><?php _e('Telefon', 'numerika'); ?></p>
                                <p class="text-[#a9dae6]"><?php echo esc_html(get_theme_mod('contact_phone')); ?></p>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if (get_theme_mod('contact_address')) : ?>
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#36698d]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-medium"><?php _e('Adres', 'numerika'); ?></p>
                                <p class="text-[#a9dae6]"><?php echo esc_html(get_theme_mod('contact_address')); ?></p>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="rounded-lg bg-white p-8 shadow-lg">
                    <?php
                    // Check if Contact Form 7 is active
                    if (function_exists('wpcf7_contact_form')) {
                        $contact_form_id = get_theme_mod('contact_form_id');
                        if ($contact_form_id) {
                            echo do_shortcode('[contact-form-7 id="' . esc_attr($contact_form_id) . '"]');
                        } else {
                            // Fallback contact form
                    ?>
                    <form id="contact-form" class="space-y-6">
                        <div class="space-y-2">
                            <label for="name" class="block text-sm font-medium text-gray-700">
                                <?php _e('Imię i nazwisko', 'numerika'); ?>
                            </label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                placeholder="Jan Kowalski"
                                required
                                class="w-full rounded-md border border-gray-300 px-4 py-2 focus:border-[#36698d] focus:outline-none focus:ring-1 focus:ring-[#36698d]"
                            />
                        </div>

                        <div class="space-y-2">
                            <label for="email" class="block text-sm font-medium text-gray-700">
                                <?php _e('Email', 'numerika'); ?>
                            </label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                placeholder="jan.kowalski@example.com"
                                required
                                class="w-full rounded-md border border-gray-300 px-4 py-2 focus:border-[#36698d] focus:outline-none focus:ring-1 focus:ring-[#36698d]"
                            />
                        </div>

                        <div class="space-y-2">
                            <label for="subject" class="block text-sm font-medium text-gray-700">
                                <?php _e('Temat', 'numerika'); ?>
                            </label>
                            <input
                                type="text"
                                id="subject"
                                name="subject"
                                placeholder="Zapytanie o szkolenie"
                                required
                                class="w-full rounded-md border border-gray-300 px-4 py-2 focus:border-[#36698d] focus:outline-none focus:ring-1 focus:ring-[#36698d]"
                            />
                        </div>

                        <div class="space-y-2">
                            <label for="message" class="block text-sm font-medium text-gray-700">
                                <?php _e('Wiadomość', 'numerika'); ?>
                            </label>
                            <textarea
                                id="message"
                                name="message"
                                placeholder="Twoja wiadomość..."
                                required
                                class="min-h-[120px] w-full rounded-md border border-gray-300 px-4 py-2 focus:border-[#36698d] focus:outline-none focus:ring-1 focus:ring-[#36698d]"
                            ></textarea>
                        </div>

                        <button type="submit" class="w-full rounded-md bg-[#36698d] px-4 py-2 font-medium text-white hover:bg-[#1e8092]">
                            <?php _e('Wyślij wiadomość', 'numerika'); ?>
                        </button>

                        <div id="form-message" class="hidden rounded-md p-4 text-center"></div>
                    </form>
                    <?php
                        }
                    } else {
                        // Fallback contact form if Contact Form 7 is not active
                    ?>
                    <form id="contact-form" class="space-y-6">
                        <div class="space-y-2">
                            <label for="name" class="block text-sm font-medium text-gray-700">
                                <?php _e('Imię i nazwisko', 'numerika'); ?>
                            </label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                placeholder="Jan Kowalski"
                                required
                                class="w-full rounded-md border border-gray-300 px-4 py-2 focus:border-[#36698d] focus:outline-none focus:ring-1 focus:ring-[#36698d]"
                            />
                        </div>

                        <div class="space-y-2">
                            <label for="email" class="block text-sm font-medium text-gray-700">
                                <?php _e('Email', 'numerika'); ?>
                            </label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                placeholder="jan.kowalski@example.com"
                                required
                                class="w-full rounded-md border border-gray-300 px-4 py-2 focus:border-[#36698d] focus:outline-none focus:ring-1 focus:ring-[#36698d]"
                            />
                        </div>

                        <div class="space-y-2">
                            <label for="subject" class="block text-sm font-medium text-gray-700">
                                <?php _e('Temat', 'numerika'); ?>
                            </label>
                            <input
                                type="text"
                                id="subject"
                                name="subject"
                                placeholder="Zapytanie o szkolenie"
                                required
                                class="w-full rounded-md border border-gray-300 px-4 py-2 focus:border-[#36698d] focus:outline-none focus:ring-1 focus:ring-[#36698d]"
                            />
                        </div>

                        <div class="space-y-2">
                            <label for="message" class="block text-sm font-medium text-gray-700">
                                <?php _e('Wiadomość', 'numerika'); ?>
                            </label>
                            <textarea
                                id="message"
                                name="message"
                                placeholder="Twoja wiadomość..."
                                required
                                class="min-h-[120px] w-full rounded-md border border-gray-300 px-4 py-2 focus:border-[#36698d] focus:outline-none focus:ring-1 focus:ring-[#36698d]"
                            ></textarea>
                        </div>

                        <button type="submit" class="w-full rounded-md bg-[#36698d] px-4 py-2 font-medium text-white hover:bg-[#1e8092]">
                            <?php _e('Wyślij wiadomość', 'numerika'); ?>
                        </button>

                        <div id="form-message" class="hidden rounded-md p-4 text-center"></div>
                    </form>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
