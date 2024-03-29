<div class="ig-container">
    <div class="hn-container">
        <div class="job-search">
            <form method="get"
                  action="<?php echo is_singular() ? get_permalink(get_the_ID()) : get_post_type_archive_link('jbp_job') ?>">
                <div class="search input-group input-group-lg has-feedback" role="search" id="mySearch">
                    <input style="border-radius: 0;box-sizing: border-box" name="query" value="<?php echo $search ?>"
                           type="search"
                           class="form-control job-query"
                           placeholder="<?php echo __('Suche nach Job', 'psjb') ?>"/>
<span class="input-group-btn">
    <button style="border-radius: 0" class="btn btn-default" type="submit">
        <span class="glyphicon glyphicon-search"></span>
        <span class="sr-only">Search</span>
    </button>
  </span>
                </div>
                <?php do_action('jbp_job_listing_after_search_form') ?>
            </form>
        </div>
        <?php if (empty($chunks)): ?>
            <h2><?php _e('Kein Job gefunden', 'psjb'); ?></h2>
        <?php else: ?>
            <div class="jbp-job-list">
                <?php foreach ($chunks as $chunk): ?>
                    <div class="row no-margin">
                        <?php foreach ($chunk as $key => $col): ?>
                            <?php
                            $color = '';
                            if ($colors) {
                                $color = $colors[array_rand($colors)];
                            }
                            $model = $col['item'];
                            $size = $col['class'];

                            setup_postdata($model->wp_post);
                            ?>
                            <div <?php echo $key == 0 ? 'style="margin-left:0"' : null ?>
                                class="jbp_job_item <?php echo $size; ?> no-padding">
                                <div class="jbp_job_except <?php echo $color ?>">
                                    <div class="jbp_inside">
                                        <div class="row">
                                            <?php if( isset( $model->job_img ) && $model->job_img != '' ) { ?>
                                            <div style="padding-right: 0" class="col-sm-3">
                                                <?php $image = wp_get_attachment_url( $model->job_img ); ?>
                                                <img src="<?php echo $image ?>" alt="<?php echo wp_trim_words($model->job_title, 10) ?>">
                                            </div>
                                            <?php } ?>
                                            <div class="col-sm-<?php echo isset( $model->job_img ) && $model->job_img != '' ? 9 : 12; ?>">
                                                <h4>
                                                    <a href="<?php echo get_permalink($model->id) ?>"><?php echo wp_trim_words($model->job_title, 10) ?></a>
                                                </h4>
                                                <?php if ($model->is_expired()): ?>
                                                    <?php _e( "Dieser Job ist abgelaufen", 'psjb' ) ?>
                                                <?php else: ?>
                                                    <?php if (!isset($lite) || $lite == false): ?>
                                                        <div class="ellipsis">
                                                            <?php
                                                            $content = get_the_content();
                                                            //cal the except words count base on element width
                                                            $sub = count($chunk);
                                                            if (isset($col['text_length'])) {
                                                                $sub = $col['text_length'];
                                                            }
                                                            $content = strip_tags($content);
                                                            $charlength = 36 / $sub;
                                                            echo apply_filters('jbp_job_list_content', wp_trim_words($content, $charlength), $content, $charlength);
                                                            ?>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                </div>
                                            <div style="clear: both"></div>
                                        </div>
                                        <div class="jbp_job_bottom">
                                            <div class="jbp_terms">
                                                <?php echo the_terms($model->id, 'jbp_category', __('Kategorien: ', 'psjb'), ', ', ''); ?>
                                            </div>
                                            <div class="jbp_meta">
                                                <div class="pull-left">
                                                    <?php _e('Bis: ', 'psjb'); ?><?php echo $model->get_end_date() ?>
                                                </div>
                                                <div class="pull-right">
                                                    <?php _e('Budget: ', 'psjb'); ?><?php $model->render_prices(); ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div style="clear: both"></div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php $this->render_partial('job-archive/_paging', array(
                'total_pages' => $total_pages
            )) ?>
        <?php endif; ?>
        <div style="clear: both"></div>
    </div>
</div>