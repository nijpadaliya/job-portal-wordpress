<div class="job-card">

    <div class="job-logo">

        <?php the_company_logo(); ?>

    </div>

    <div class="job-info">

        <div class="job-top">

            <h3 class="job-title">

                <a href="<?php the_permalink(); ?>">

                    <?php the_title(); ?>

                </a>

            </h3>

            <?php if ( is_position_featured() ) : ?>

                <span class="featured-badge">

                    Featured

                </span>

            <?php endif; ?>

        </div>

        <div class="job-meta">

            <span>
                📍 <?php the_job_location(); ?>
            </span>

            <span>
                💼 <?php the_job_type(); ?>
            </span>

            <span>
                🕒 <?php the_job_publish_date(); ?>
            </span>

        </div>

        <a
            href="<?php the_permalink(); ?>"
            class="job-btn"
        >
            Apply Now
        </a>

    </div>

</div>