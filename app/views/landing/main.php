<div class="ig-container">
    <div class="hn-container">
        <div class="jbp-landing-page">
            <div class="row">
                <div class="col-md-6 col-xs-12 col-sm-12">
                    <div class="page-header">
                        <h3><?php echo __('Kürzlich veröffentlichte Jobs', 'psjb') ?></h3>
                    </div>
                    <?php if (empty($jobs)): ?>
                        <div class="empty-records">
                            <p><?php echo __('Keine Jobs gefunden', 'psjb'); ?></p>
                        </div>
                    <?php else: ?>
                        <div class="jbp-job-list">
                            <div class="row" style="margin-right: 0">
                                <?php foreach ($jobs as $job): ?>
                                    <div class="jbp_job_item no-padding">
                                        <div class="jbp_job_except <?php echo $colors[array_rand($colors)] ?>">
                                            <div class="jbp_inside">
                                                <?php if( isset( $job->job_img ) && $job->job_img != '' ) { ?>
                                                <div class="col-sm-3 no-padding">
                                                    <?php $image = wp_get_attachment_url( $job->job_img ); ?>
                                                    <img src="<?php echo $image ?>" alt="<?php echo wp_trim_words($job->job_title, 10) ?>">
                                                </div>
                                                <?php } ?>
                                                <div style="padding-right: 0" class="col-sm-<?php echo isset( $job->job_img ) && $job->job_img != '' ? 9 : 12; ?>">
                                                    <h4>
                                                        <a href="<?php
                                                        echo get_permalink($job->id) ?>">
                                                            <?php echo wp_trim_words($job->job_title, 8) ?>
                                                        </a>
                                                    </h4>
    
                                                    <div class="ellipsis">
                                                        <?php echo wp_trim_words($job->description, 35) ?>
                                                    </div>
                                                </div>
                                                <div style="clear: both"></div>
                                                <div class="jbp_job_bottom">
                                                    <div class="jbp_terms">
                                                        <?php echo the_terms($job->id, 'jbp_category', __('Jobkategorien: ', 'psjb'), ', ', ''); ?>
                                                        <div class="jbp_meta">
                                                            <div class="pull-left">
                                                                <?php _e('Bis: ', 'psjb'); ?><?php echo $job->get_end_date() ?>
                                                            </div>
                                                            <div class="pull-right">
                                                                <?php _e('Budget: ', 'psjb'); ?><?php $job->render_prices(); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="add-record">
                        <a class="btn btn-primary"
                           href="<?php echo apply_filters('jbp_add_new_job_url', get_permalink(je()->pages->page(JE_Page_Factory::JOB_ADD))) ?>"><?php _e('Job hinzufügen', 'psjb') ?></a>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12 col-sm-12">
                    <div class="page-header">
                        <h3><?php echo __('Aktuelle Experten', 'psjb') ?></h3>
                    </div>
                    <div class="jbp-pro-list">
                        <?php if (!empty($pros)): ?>
                            <div class="row" style="margin-left: 0">
                                <?php foreach ($pros as $pro): ?>
                                    <div class="jbp_expert_item col-sm-6 no-padding">
                                        <div class="jbp_pro_except">
                                            <div class="jbp_inside">
                                                <div class="meta_holder">
                                                    <div class="expert-avatar">
                                                        <a href="<?php echo get_permalink($pro->id) ?>"> <?php echo $pro->get_avatar(640, true); ?></a>
                                                    </div>
                                                    <?php
                                                    $text = !empty($pro->short_description) ? $pro->short_description : $pro->biography;
                                                    $text = strip_tags($text);
                                                    ?>
                                                    <div class="jbp_pro_meta hidden-sx hidden-sm">
                                                        <div class="text-shorten">
                                                            <div class="text-shorten-inner">
                                                                <?php echo apply_filters('jbp_pro_listing_biography', $text) ?>
                                                            </div>
                                                        </div>

                                                        <div class="row no-margin jbp-pro-stat">
                                                            <div class="col-md-6 no-padding">
                                                                <span><?php echo $pro->get_view_count() ?></span>&nbsp;<i
                                                                    class="glyphicon glyphicon-eye-open"></i>
                                                                <small><?php _e('Ansichten', 'psjb') ?></small>
                                                            </div>
                                                            <div class="col-md-6 no-padding">
                                                                <span><?php echo $pro->get_like_count() ?></span><i
                                                                    class="glyphicon glyphicon-heart text-warning"></i>
                                                                <small><?php _e('Empfehlungen', 'psjb') ?></small>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p>
                                                    <a href="<?php echo get_permalink($pro->id) ?>"> <?php echo wp_trim_words($pro->name, 2); ?></a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <div class="clearfix"></div>
                            </div>
                        <?php else: ?>
                            <div class="empty-records">
                                <p><?php echo __('Kein Experte gefunden', 'psjb') ?></p>
                            </div>
                        <?php endif; ?>

                        <div class="add-record">
                            <a class="btn btn-primary"
                               href="<?php echo apply_filters('jbp_add_new_expert_url', get_permalink(je()->pages->page(JE_Page_Factory::EXPERT_ADD))) ?>"><?php _e('Biete Deine Fähigkeiten an', 'psjb') ?></a>
                        </div>

                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>