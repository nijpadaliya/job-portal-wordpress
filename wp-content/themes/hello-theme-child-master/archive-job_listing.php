<?php get_header(); ?>

<section class="custom-job-page">

    <div class="container">

        <div class="job-layout">

            <!-- Sidebar -->

            <aside class="job-sidebar">

                <?php
                get_template_part(
                    'template-parts/sidebar-filters'
                );
                ?>

            </aside>

            <!-- Jobs -->

            <div class="job-content">

                <?php if(have_posts()) : ?>

                    <?php while(have_posts()) : the_post(); ?>

                        <?php
                        get_template_part(
                            'template-parts/job-card'
                        );
                        ?>

                    <?php endwhile; ?>

                    <!-- Pagination -->

                    <div class="custom-pagination">

                        <?php
                        echo paginate_links(array(
                            'prev_text' => '←',
                            'next_text' => '→',
                        ));
                        ?>

                    </div>

                <?php endif; ?>

            </div>

        </div>

    </div>

</section>

<?php get_footer(); ?>