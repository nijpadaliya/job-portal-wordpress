<?php get_header(); ?>

<div class="custom-single-job-page">

    <div class="container">

        <?php while ( have_posts() ) : the_post(); ?>

            <?php
            get_job_manager_template_part(
                'content',
                'single-job_listing'
            );
            ?>

        <?php endwhile; ?>

        <!-- Related Jobs -->

        <div class="related-jobs-section">

            <h2 class="related-title">

                Related Jobs

            </h2>

            <div class="related-jobs-grid">

                <?php

                $related_jobs = new WP_Query(array(

                    'post_type'      => 'job_listing',

                    'posts_per_page' => 3,

                    'post__not_in'   => array(get_the_ID()),

                    'post_status'    => 'publish',

                    'orderby'        => 'date',

                    'order'          => 'DESC'

                ));

                if($related_jobs->have_posts()) :

                    while($related_jobs->have_posts()) :

                        $related_jobs->the_post();
                ?>

                        <div class="related-job-card">

                            <div class="related-job-logo">

                                <?php the_company_logo(); ?>

                            </div>

                            <div class="related-job-content">

                                <h3>

                                    <a href="<?php the_permalink(); ?>">

                                        <?php the_title(); ?>

                                    </a>

                                </h3>

                                <div class="related-job-meta">

                                    <span>
                                        📍 <?php the_job_location(); ?>
                                    </span>

                                    <span>
                                        💼 <?php the_job_type(); ?>
                                    </span>

                                </div>

                                <a
                                    href="<?php the_permalink(); ?>"
                                    class="related-job-btn"
                                >
                                    View Details
                                </a>

                            </div>

                        </div>

                <?php
                    endwhile;

                    wp_reset_postdata();

                endif;
                ?>

            </div>

        </div>

    </div>

</div>

<?php get_footer(); ?>