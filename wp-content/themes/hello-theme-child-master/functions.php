<?php
/**
 * Theme functions and definitions.
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'HELLO_ELEMENTOR_CHILD_VERSION', '2.0.0' );

/*
|--------------------------------------------------------------------------
| Parent + Child Theme Style
|--------------------------------------------------------------------------
*/

function hello_elementor_child_scripts_styles() {

	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		HELLO_ELEMENTOR_CHILD_VERSION
	);

}
add_action(
	'wp_enqueue_scripts',
	'hello_elementor_child_scripts_styles',
	20
);

/*
|--------------------------------------------------------------------------
| CSS
|--------------------------------------------------------------------------
*/

if ( ! function_exists( 'mh_load_styles' ) ) {

	function mh_load_styles() {

		// Calendly CSS
		wp_enqueue_style(
			'calendly_css',
			'https://assets.calendly.com/assets/external/widget.css',
			false,
			null
		);

		// Slick Slider CSS
		wp_enqueue_style(
			'slick_css',
			get_stylesheet_directory_uri() . '/css/slick.css',
			false,
			null
		);

		// Jobs Custom CSS
		wp_enqueue_style(
			'jobs-css',
			get_stylesheet_directory_uri() . '/css/jobs.css',
			false,
			time()
		);

	}

}
add_action(
	'wp_enqueue_scripts',
	'mh_load_styles'
);

/*
|--------------------------------------------------------------------------
| JS
|--------------------------------------------------------------------------
*/

if ( ! function_exists( 'mh_load_scripts' ) ) {

	function mh_load_scripts() {

		// Calendly JS
		wp_enqueue_script(
			'calendly_js',
			'https://assets.calendly.com/assets/external/widget.js',
			[],
			null,
			true
		);

		// Slick Slider JS
		wp_enqueue_script(
			'slick_js',
			get_stylesheet_directory_uri() . '/js/slick.min.js',
			array( 'jquery' ),
			null,
			true
		);

		// Main JS
		wp_enqueue_script(
			'function-js',
			get_stylesheet_directory_uri() . '/js/function.js',
			array( 'jquery' ),
			rand(),
			true
		);

		// Jobs JS
		wp_enqueue_script(
			'jobs-js',
			get_stylesheet_directory_uri() . '/js/jobs.js',
			array( 'jquery' ),
			time(),
			true
		);

	}

}
add_action(
	'wp_enqueue_scripts',
	'mh_load_scripts',
	1000
);






// Change Year Automatically.
function year_shortcode()
{
	$year = date_i18n('Y');
	return $year;
}
add_shortcode('year', 'year_shortcode');


//  Customers love us start!
function Customers_love()
{

	ob_start();

	global $post;
	$post_id = $post->ID;

	$args = array(
		'post_type' => 'customer-review',
		'post_status' => 'publish',
		'posts_per_page' => -1
	);

	$query = new WP_Query($args);

	echo '<div class="testimonials">';
	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();
			$postId = get_the_ID(); // Define the variable here
			?>
			<div class="testimonials-Card-wrapper">

				<div class="reviewer-image">
					<img src="<?php echo get_the_post_thumbnail_url($postId, 'medium'); ?>" alt="Service Image" />
				</div>


				<div class="reviewer-details">
					<p><?php the_content(); ?></p>
				</div>

				<div class="meta--details">
					
						<?php if ($name = get_field('customer-name')): ?>
							<h5><?php echo esc_html($name); ?></h5>
						<?php endif; ?>

						<?php if ($customers = get_field('customers-position')): ?>
							<p><?php echo esc_html($customers); ?></p>
						<?php endif; ?>
				
				</div>

			</div>




			<?php
		}
		wp_reset_postdata();
	}

	return ob_get_clean();

}
add_shortcode('Customerslove', 'Customers_love');



/**
 * Popular Job Types Shortcode

 */

function custom_popular_job_types_shortcode() {

    $terms = get_terms(array(
        'taxonomy'   => 'job_listing_type',
        'hide_empty' => false,
    ));

    if (empty($terms) || is_wp_error($terms)) {
        return '<p>No Job Types Found.</p>';
    }

    ob_start();
    ?>

    <div class="popular-job-categories">

        <div class="section-title">
            <h2>Popular Job Categories</h2>
            <p>
                <?php echo wp_count_posts('job_listing')->publish; ?> jobs live
            </p>
        </div>

        <div class="job-category-grid">

            <?php foreach ($terms as $term) :

                $count = $term->count;
                $link  = get_term_link($term);

                // Default icon
                $icon = 'fas fa-briefcase';

                // Dynamic icons based on slug
                switch ($term->slug) {

                    case 'full-time':
                        $icon = 'fas fa-briefcase';
                        break;

                    case 'part-time':
                        $icon = 'fas fa-clock';
                        break;

                    case 'internship':
                        $icon = 'fas fa-user-graduate';
                        break;

                    case 'freelance':
                        $icon = 'fas fa-laptop-house';
                        break;

                    case 'temporary':
                        $icon = 'fas fa-calendar-alt';
                        break;

                }

            ?>

                <a href="<?php echo esc_url($link); ?>" class="job-category-card">

                    <div class="category-icon">
                        <i class="<?php echo esc_attr($icon); ?>"></i>
                    </div>

                    <div class="category-content">

                        <h3>
                            <?php echo esc_html($term->name); ?>
                        </h3>

                        <span>
                            (<?php echo esc_html($count); ?> open position<?php echo ($count > 1) ? 's' : ''; ?>)
                        </span>

                    </div>

                </a>

            <?php endforeach; ?>

        </div>

    </div>

    <?php

    return ob_get_clean();
}

add_shortcode('popular_job_types', 'custom_popular_job_types_shortcode');



/**
 * Featured Jobs Slider Shortcode
 * Shortcode: [featured_jobs_slider]
 */

function custom_featured_jobs_slider_shortcode() {

    $args = array(
        'post_type'      => 'job_listing',
        'posts_per_page' => 10,
        'post_status'    => 'publish'
    );

    $jobs = new WP_Query($args);

    ob_start();

    if ($jobs->have_posts()) :
    ?>

    <div class="featured-jobs-slider">

        <?php while ($jobs->have_posts()) : $jobs->the_post();

            $job_id = get_the_ID();

            // Company Logo
            $company_logo = get_the_company_logo($job_id);

            // Job Types
            $types = wpjm_get_the_job_types();

            // Location
            $location = get_the_job_location();

        ?>

            <div class="featured-job-item">

                <a href="<?php the_permalink(); ?>" class="job-box">

                    <div class="job-top">

                        <div class="job-logo">
                            <?php the_company_logo(); ?>
                        </div>

                        <div class="job-content">

                            <h3><?php the_title(); ?></h3>

                            <div class="job-meta">

                                <?php if ($types) : ?>
                                    <span>
                                        <i class="fas fa-briefcase"></i>

                                        <?php
                                        $type_names = array();

                                        foreach ($types as $type) {
                                            $type_names[] = $type->name;
                                        }

                                        echo implode(', ', $type_names);
                                        ?>
                                    </span>
                                <?php endif; ?>

                                <?php if ($location) : ?>
                                    <span>
                                        <i class="fas fa-map-marker-alt"></i>
                                        <?php echo esc_html($location); ?>
                                    </span>
                                <?php endif; ?>

                            </div>

                        </div>

                    </div>

                    <?php if ($types) : ?>

                        <div class="job-bottom">

                            <?php foreach ($types as $type) : ?>

                                <span class="job-type <?php echo esc_attr($type->slug); ?>">
                                    <?php echo esc_html($type->name); ?>
                                </span>

                            <?php endforeach; ?>

                        </div>

                    <?php endif; ?>

                </a>

            </div>

        <?php endwhile; ?>

    </div>

    

    <?php

    endif;

    wp_reset_postdata();

    return ob_get_clean();
}

add_shortcode('featured_jobs_slider', 'custom_featured_jobs_slider_shortcode');


/*========================================
=  Advanced Job Search Shortcode
=  WP Job Manager Required
========================================*/

function custom_advanced_job_search() {

	ob_start();

	$job_types = get_terms(array(
		'taxonomy'   => 'job_listing_type',
		'hide_empty' => false,
	));

	?>

	<form role="search" method="GET" class="advanced-job-search" action="<?php echo site_url('/jobs'); ?>">

		<div class="search-field keyword-field">
			<span class="icon">🔍</span>
			<input type="text" name="search_keywords" placeholder="Job title, keywords..." value="<?php echo isset($_GET['search_keywords']) ? esc_attr($_GET['search_keywords']) : ''; ?>">
		</div>

		<div class="search-field location-field">
			<span class="icon">📍</span>
			<input type="text" name="search_location" placeholder="City or postcode" value="<?php echo isset($_GET['search_location']) ? esc_attr($_GET['search_location']) : ''; ?>">
		</div>

		<div class="search-field type-field">
			<span class="icon">💼</span>

			<select name="filter_job_type">
				<option value="">All Job Types</option>

				<?php
				if ( ! empty($job_types) && ! is_wp_error($job_types) ) {

					foreach ( $job_types as $type ) {

						$selected = '';

						if (
							isset($_GET['filter_job_type']) &&
							$_GET['filter_job_type'] == $type->slug
						) {
							$selected = 'selected';
						}

						echo '<option value="' . esc_attr($type->slug) . '" '.$selected.'>' . esc_html($type->name) . '</option>';
					}
				}
				?>

			</select>

		</div>

		<div class="search-btn">
			<button type="submit">Find Jobs</button>
		</div>

	</form>

	<?php

	return ob_get_clean();
}
add_shortcode('advanced_job_search', 'custom_advanced_job_search');


	