<?php

/**
 *
 * @since 1.0
 */
class JE_Job_Recent_Widget_Controller extends WP_Widget
{
    public $id;

    function __construct()
    {
        $this->id = uniqid();

        $widget_ops = array(
            'classname' => 'widget_recent_job_entries',
            'description' => __("Die neuesten Jobangebote", 'psjb')
        );
        parent::__construct('recent-jobs', __('Jobbo Die neuesten Jobangebote', 'psjb'), $widget_ops);
        $this->alt_option_name = 'widget_recent_job_entries';
    }

    function widget($args, $instance)
    {
        //we need the shortcode module for reuse can view function
        $view = apply_filters('widget_job_recent_can_view', empty($instance['view']) ? 'both' : $instance['view'], $instance, $this->id_base);
        if (!$this->can_view($view)) {
            return '';
        }
        je()->load_script('widget');

        ob_start();
        extract($args);

        $title = apply_filters('widget_title', empty($instance['title']) ? __('Aktuelle Jobs', 'psjb') : $instance['title'], $instance, $this->id_base);
        echo $before_widget;
        if ($title) {
            echo $before_title . $title . $after_title;
        }
        if (empty($instance['number']) || !$number = absint($instance['number'])) {
            $number = 10;
        }

        $show_cat = isset($instance['show_cat']) ? $instance['show_cat'] : false;
        $show_img = isset($instance['show_img']) ? $instance['show_img'] : false;

        $post_args = array(
            'post_type' => 'jbp_job',
            'posts_per_page' => $number,
            //'no_found_rows' => true,
            'post_status' => 'publish',
            //'ignore_sticky_posts' => true,
            'order' => 'DESC'
        );
        $order_by = isset($instance['order_by']) ? $instance['order_by'] : '';

        switch ($order_by) {
            case 'latest':
                $post_args['orderby'] = 'date';
                break;
            case 'randomize':
                $post_args['orderby'] = 'rand';
                break;
        }

        $category_val = isset($instance['category_val']) ? $instance['category_val'] : null;
        if (is_array($category_val) && count($category_val)) {
            $post_args['tax_query'] = array(
                array(
                    'taxonomy' => 'jbp_category',
                    'field' => 'term_id',
                    'terms' => $category_val
                )
            );
        }

        $colors = array(
            'jbp-yellow',
            'jbp-mint',
            'jbp-rose',
            'jbp-blue',
            'jbp-amber',
            'jbp-grey'
        );

        $data = JE_Job_Model::model()->all_with_condition($post_args);
        if (count($data)) {
            ?>
            <div class="ig-container">
                <div class="hn-container">
                    <div class="jbp-recent-job-widget">
                        <?php foreach ($data as $job): ?>
                            <div class="jbp-job-widget <?php echo $colors[array_rand($colors)] ?>">
                                <?php
                                    if( $show_img && isset( $job->job_img ) && $job->job_img != '' ) {
                                        $image = wp_get_attachment_url( $job->job_img );
                                        ?>
                                        <img src="<?php echo $image ?>" alt="<?php echo wp_trim_words($job->job_title, 10) ?>" style="width: 40px">
                                        <?php
                                    }
                                ?>
                                <a href="<?php echo get_permalink($job->id) ?>">
                                    <?php echo wp_trim_words($job->job_title, 4) ?>
                                </a>
                                <?php if ($show_cat): ?>
                                    <div class="jbp-recent-job-cat">
                                        <?php echo the_terms($job->id, 'jbp_category', __('Kategorien: ', 'psjb'), ', ', ''); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php
        }
        echo $after_widget;
        ob_get_flush();
    }

    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int)$new_instance['number'];
        $instance['show_cat'] = (bool)$new_instance['show_cat'];
        $instance['show_img'] = (bool)$new_instance['show_img'];
        $instance['order_by'] = $new_instance['order_by'];
        $instance['category_val'] = $new_instance['category_val'];
        $this->flush_widget_cache();

        $alloptions = wp_cache_get('alloptions', 'options');
        if (isset($alloptions['widget_recent_job_entries'])) {
            delete_option('widget_recent_job_entries');
        }

        return $instance;
    }

    function flush_widget_cache()
    {
        wp_cache_delete('widget_recent_jobs', 'widget');
    }

    function form($instance)
    {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $number = isset($instance['number']) ? absint($instance['number']) : 5;
        $show_cat = isset($instance['show_cat']) ? (bool)$instance['show_cat'] : false;
        $show_img = isset($instance['show_img']) ? (bool)$instance['show_img'] : false;
        $order_by = isset($instance['order_by']) ? $instance['order_by'] : 'latest';
        $category_val = isset($instance['category_val']) ? $instance['category_val'] : array();

        ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Titel:'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>

        <p>
            <label
                for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php _e('Anzahl anzuzeigender Jobs:', 'psjb'); ?></label>
            <input id="<?php echo esc_attr($this->get_field_id('number')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text"
                   value="<?php echo esc_attr($number); ?>" size="3"/>
        </p>

        <p>
            <input class="checkbox" type="checkbox" <?php checked($show_cat); ?>
                   id="<?php echo esc_attr($this->get_field_id('show_cat')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('show_cat')); ?>"/>
            <label
                for="<?php echo esc_attr($this->get_field_id('show_cat')); ?>"><?php _e('Jobkategorien anzeigen?', 'psjb'); ?></label>
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked($show_img); ?>
                   id="<?php echo esc_attr($this->get_field_id('show_img')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('show_img')); ?>"/>
            <label
                for="<?php echo esc_attr($this->get_field_id('show_img')); ?>"><?php _e('Ausgewähltes Bild anzeigen?', 'psjb'); ?></label>
        </p>
        <p>
            <label
                for="<?php echo esc_attr($this->get_field_id('order_by')); ?>"><?php _e('Sortieren nach', 'psjb'); ?>
                :</label>
            <select id="<?php echo esc_attr($this->get_field_id('order_by')); ?>"
                    name="<?php echo esc_attr($this->get_field_name('order_by')); ?>">
                <option <?php selected('randomize', $order_by) ?>
                    value="randomize"><?php _e('Zufällig', 'psjb'); ?></option>
                <option <?php selected('latest', $order_by) ?>
                    value="latest"><?php _e('Letzte', 'psjb'); ?></option>
            </select>
        </p>
        <p>
            <label><?php _e('Kategorien', 'psjb') ?>:</label>
            <?php
            $job_cats = get_terms('jbp_category', array(
                'hide_empty' => false
            ));
            ?>
            <select style="display: block;width: 100%" multiple="multiple"
                    name="<?php echo esc_attr($this->get_field_name('category_val')); ?>[]"
                    id="<?php echo esc_attr($this->get_field_id('category_val')); ?>">
                <?php foreach ($job_cats as $cat): ?>
                    <option <?php echo in_array($cat->term_id, $category_val) ? 'selected="selected"' : null ?>
                        value="<?php echo $cat->term_id ?>"><?php echo esc_html($cat->name) ?></option>
                <?php endforeach; ?>
            </select>
        </p>
    <?php
    }

    public function can_view($view = 'both')
    {
        $view = strtolower($view);
        if (is_user_logged_in()) {
            if ($view == 'loggedout') {
                return false;
            }
        } else {
            if ($view == 'loggedin') {
                return false;
            }
        }

        return true;
    }

}

