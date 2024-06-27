<?php
/**
 * Block Name: Job offers
 *
 * This is the template that displays the job offers block.
 */

class JobOffersBlocksRender {

    public function renderCallback($block){
        $selected_offers = get_field('job_offers_block');
        $number_offers = get_field('number_offers') ? get_field('number_offers') : 0;

        $args = array(
            'post_type' => 'job-offers',
            'posts_per_page' => -1, // Displays all posts by default
            'orderby' => 'post__in',
        );

        if ($selected_offers) {
            $selected_offer_ids = array_map(function($offer) {
                return $offer->ID;
            }, $selected_offers);

            $args['post__in'] = $selected_offer_ids;
             // If posts are selected but the number of posts is also specified, we limit the number of posts to the minimum of both values
            $args['posts_per_page'] = min(count($selected_offer_ids), $number_offers);
        } else {
            $args['posts_per_page'] = $number_offers;
        }

        $job_offers_query = new WP_Query($args);

        if ($job_offers_query->have_posts()) : ?>
            <div class="job-offers">
                <?php while ($job_offers_query->have_posts()) : $job_offers_query->the_post(); ?>
                    <div class="job-offers__aside">
                        <div class="job-offers__box">
                            <div class="job-offers__header">
                                <h4 class="job-offers__title">
                                    <a href="<?= esc_url(get_permalink()); ?>">
                                        <?= get_the_title(); ?>
                                    </a>
                                </h4>
                                <p class="job-offers__date"><?= get_the_date('j/m/Y'); ?></p>
                            </div>
                            <div class="job-offers__category">
                                <?php
                                    $job_categories = get_the_terms(get_the_ID(), 'job-category');
                                    if ($job_categories) :
                                        foreach ($job_categories as $job_category) :
                                            ?>
                                            <span class="job-offers__category-item"><?= $job_category->name; ?></span> 
                                        <?php
                                        endforeach;
                                    endif;
                                ?>
                            </div>
                        </div>
                        <div class="job-offers__footer">
                            <a href="<?= esc_url(get_permalink()); ?>" class="job-offers__actions">Zobacz więcej</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif;

        wp_reset_postdata();
    }
}
