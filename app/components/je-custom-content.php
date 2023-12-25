<?php

/**
 * @author:DerN3rd
 */
class JE_Custom_Content
{
    public function __construct()
    {
        /**
         * Create jbp_job post type
         */
        if (!post_type_exists('jbp_job')) {
            $jbp_job = array(
                'labels' => array(
                    'name' => __('Jobs', 'psjb'),
                    'singular_name' => __('Job', 'psjb'),
                    'add_new' => __('Neuer Job', 'psjb'),
                    'add_new_item' => __('Neuen Job hinzufügen', 'psjb'),
                    'edit_item' => __('Bearbeite Job', 'psjb'),
                    'new_item' => __('Neuer Job', 'psjb'),
                    'view_item' => __('Job ansehen', 'psjb'),
                    'search_items' => __('Suche Jobs', 'psjb'),
                    'not_found' => __('Keine jobs gefunden', 'psjb'),
                    'not_found_in_trash' => __('Keine Jobs im Papierkorb gefunden', 'psjb'),
                    'custom_fields_block' => __('Job Felder', 'psjb'),
                ),
                'supports' => array(
                    'title' => 'title',
                    'editor' => 'editor',
                    'author' => 'author',
                    'thumbnail' => 'thumbnail',
                    'excerpt' => false,
                    'custom_fields' => 'custom-fields',
                    'revisions' => 'revisions',
                    'page_attributes' => 'page-attributes',
                    'comments' => 'comments'
                ),
                'supports_reg_tax' => array(
                    'category' => '',
                    'post_tag' => '',
                ),
                'capability_type' => 'post',
                'map_meta_cap' => true,
                'description' => __('Job oausschreibungen', 'psjb'),
                'menu_position' => '',
                'public' => true,
                'hierarchical' => true,
                'has_archive' => apply_filters('jbp_job_archive_slug', 'jobs'),
                'rewrite' => array(
                    'slug' => apply_filters('jbp_job_single_slug', 'job'),
                    'with_front' => false,
                    'feeds' => true,
                    'pages' => true,
                    'ep_mask' => 4096,
                ),
                'query_var' => true,
                'can_export' => true,
                'cf_columns' => NULL,
                'menu_icon' => je()->plugin_url . 'assets/image/backend/icons/16px/16px_Jobs_Bright.svg',
            );

            register_post_type('jbp_job', apply_filters('je_job_posttype_param', $jbp_job));

        } //jbp_job post type complete

        /**
         * Create jbp_pro post type
         */
        if (!post_type_exists('jbp_pro')) {

            $jbp_pro = array(
                'labels' =>
                    array(
                        'name' => __('Experten', 'psjb'),
                        'singular_name' => __('Experte', 'psjb'),
                        'add_new' => __('Neuer Experte', 'psjb'),
                        'add_new_item' => __('Neuen Experten anlegen', 'psjb'),
                        'edit_item' => __('Bearbeite Experte', 'psjb'),
                        'new_item' => __('Neuer Experte', 'psjb'),
                        'view_item' => __('Experte ansehen', 'psjb'),
                        'search_items' => __('Suche Experte', 'psjb'),
                        'not_found' => __('Keinen Experten gefunden', 'psjb'),
                        'not_found_in_trash' => __('Keinen Experten im Papierkorb gefunden', 'psjb'),
                        'custom_fields_block' => __('Expertenfelder', 'psjb'),
                    ),
                'supports' =>
                    array(
                        'title' => 'title',
                        'editor' => 'editor',
                        'author' => 'author',
                        'thumbnail' => 'thumbnail',
                        'excerpt' => false,
                        'revisions' => 'revisions',
                        'post-formats' => 'post-formats'
                        //'page_attributes' => 'page-attributes',
                    ),
                'supports_reg_tax' =>
                    array(
                        'category' => '',
                        'post_tag' => '',
                    ),
                'capability_type' => 'post',
                'map_meta_cap' => true,
                'description' => __('Experten- und erweitertes Profil', 'psjb'),
                'menu_position' => '',
                'public' => true,
                'hierarchical' => true,
                'has_archive' => apply_filters('jbp_pro_archive_slug', 'experts'),
                'rewrite' =>
                    array(
                        'slug' => apply_filters('jbp_expert_single_slug', 'expert'),
                        'with_front' => false,
                        'feeds' => true,
                        'pages' => true,
                        'ep_mask' => 4096,
                    ),
                'query_var' => true,
                'can_export' => true,
                'cf_columns' => NULL,
                'menu_icon' => je()->plugin_url . 'assets/image/backend/icons/16px/16px_Expert_Bright.svg',
            );
            register_post_type('jbp_pro', apply_filters('je_experts_posttype_param', $jbp_pro));
        } //jbp_pro post type complete

        if (!taxonomy_exists('jbp_category')) {
            $jbp_category = array(
                'object_type' => array(
                    0 => 'jbp_job',
                ),
                'hide_type' => array(
                    0 => 'jbp_job',
                ),
                'args' => array(
                    'labels' => array(
                        'name' => __('Jobkategorien', 'psjb'),
                        'singular_name' => __('Job Category', 'psjb'),
                        'add_new_item' => __('Neue Jobkategorie', 'psjb'),
                        'new_item_name' => __('Neue Job Category', 'psjb'),
                        'edit_item' => __('Bearbeite Job Category', 'psjb'),
                        'update_item' => __('Update Job Category', 'psjb'),
                        'popular_items' => __('Suche Jobkategorien', 'psjb'),
                        'all_items' => __('Alle Jobkategorien', 'psjb'),
                        'parent_item' => __('Jobkategorien', 'psjb'),
                        'parent_item_colon' => __('Jobkategorien: ', 'psjb'),
                        'add_or_remove_items' => __('Jobkategorien hinzufügen/entfernen', 'psjb'),
                        'choose_from_most_used' => __('Alle Jobkategorien', 'psjb'),
                    ),
                    'public' => true,
                    'show_admin_column' => NULL,
                    'hierarchical' => true,
                    'rewrite' => array(
                        'slug' => 'jobs-category',
                        'with_front' => true,
                        'hierarchical' => false,
                        'ep_mask' => 0,
                    ),
                    'query_var' => true,
                    'capabilities' => array(
                        'manage_terms' => 'manage_categories',
                        'edit_terms' => 'manage_categories',
                        'delete_terms' => 'manage_categories',
                        //'assign_terms' => 'edit_jobs',
                    ),
                ),

            );

            register_taxonomy('jbp_category', array('jbp_job'), $jbp_category['args']);
        }

        if (!taxonomy_exists('jbp_skills_tag')) {
            $jbp_tag = array(
                'object_type' => array(
                    0 => 'jbp_job',
                ),
                'hide_type' => array(
                    0 => 'jbp_job',
                ),
                'args' => array(
                    'labels' => array(
                        'name' => __('Job Fähigkeiten Tags', 'psjb'),
                        'singular_name' => __('Job Fähigkeiten Tag', 'psjb'),
                        'add_new_item' => __('Add New Job Fähigkeiten Tag', 'psjb'),
                        'new_item_name' => __('New Job Fähigkeiten Tag', 'psjb'),
                        'edit_item' => __('Edit Job Fähigkeiten Tag', 'psjb'),
                        'update_item' => __('Update Job Fähigkeiten Tag', 'psjb'),
                        'search_items' => __('Search Job Fähigkeiten Tags', 'psjb'),
                        'popular_items' => __('Popular Job Fähigkeiten Tags', 'psjb'),
                        'all_items' => __('All Job Fähigkeiten Tags', 'psjb'),
                        'parent_item_colon' => __('Jobs tags:', 'psjb'),
                        'add_or_remove_items' => __('Add or Remove Job Fähigkeiten Tags', 'psjb'),
                        'choose_from_most_used' => __('All Job Fähigkeiten Tags', 'psjb'),
                    ),
                    'public' => true,
                    'hierarchical' => false,
                    'rewrite' =>
                        array(
                            'slug' => 'job-skills',
                            'with_front' => true,
                            'hierarchical' => false,
                            'ep_mask' => 0,
                        ),
                    'query_var' => true,
                    'capabilities' => array(
                        'manage_terms' => 'manage_categories',
                        'edit_terms' => 'manage_categories',
                        'delete_terms' => 'manage_categories',
                        //'assign_terms' => 'edit_jobs',
                    ),
                ),
            );

            register_taxonomy('jbp_skills_tag', array('jbp_job'), $jbp_tag['args']);
        }

        if (is_admin()) {
            register_post_status('virtual', array(
                'label' => __('Virtual', 'psjb'),
                'public' => false,
                'exclude_from_search' => true,
                'show_in_admin_all_list' => false,
                'show_in_admin_status_list' => apply_filters('jpb_virtual_status_show_in_admin_status_list', true),
                'label_count' => _n_noop('Virtual <span class="count">(%s)</span>', 'Virtual <span class="count">(%s)</span>'),
            ));
        } else {
            //we allowed this status available on frontend to make it compatibility with other themes
            register_post_status('virtual', array(
                'label' => __('Virtual', 'psjb'),
                'public' => apply_filters('jpb_virtual_status_public', true),
                'exclude_from_search' => true,
                'show_in_admin_all_list' => false,
                'show_in_admin_status_list' => apply_filters('jpb_virtual_status_show_in_admin_status_list', true),
                'label_count' => _n_noop('Virtual <span class="count">(%s)</span>', 'Virtual <span class="count">(%s)</span>'),
            ));
        }
        register_post_status('je-draft', array(
            'label' => __('Temp', 'psjb'),
            'public' => false,
            'exclude_from_search' => false,
            'show_in_admin_all_list' => false,
            'show_in_admin_status_list' => false,
        ));

        if (get_option('je_rewrite') != 1) {
            flush_rewrite_rules();
            update_option('je_rewrite', 1);
        }
    }
}