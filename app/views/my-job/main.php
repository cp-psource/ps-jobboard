<div class="ig-container">
    <?php if ($this->has_flash('job_deleted')): ?>
        <div class="alert alert-success">
            <?php echo $this->get_flash('job_deleted') ?>
        </div>
    <?php endif; ?>
    <table class="table table-hover table-striped table-bordered">
        <thead>
        <th><?php _e('Titel', 'psjb') ?></th>
        <th><?php _e('Budget', 'psjb') ?></th>
        <th><?php _e('Status', 'psjb') ?></th>
        <th></th>
        </thead>
        <tbody>
        <?php if ($models): ?>
            <?php foreach ($models as $model): ?>
            <tr>
                <td>
                    <?php
                        if( isset( $model->job_img ) && $model->job_img != '' ) {
                            $image = wp_get_attachment_url( $model->job_img );
                            ?>
                            <img src="<?php echo $image ?>" alt="<?php echo wp_trim_words($model->job_title, 10) ?>" style="width: 40px">
                            <?php
                        }
                    ?>
                    <a href="<?php echo get_permalink($model->id) ?>"><?php echo $model->job_title ?>
                </a>
                </td>
                <td><?php echo $model->render_prices() ?></td>
                <td><?php echo ucfirst($model->get_status()) ?></td>
                <td style="width: 120px">
                    <a class="btn btn-primary btn-sm" href="<?php echo esc_url(add_query_arg(array(
                        'job' => $model->id
                    ), get_permalink(je()->pages->page(JE_Page_Factory::JOB_EDIT)))) ?>"><?php _e('Bearbeiten', 'psjb') ?></a>

                    <form class="frm-delete" method="post" style="display: inline-block">
                        <input name="job_id" type="hidden" value="<?php echo $model->id ?>">
                        <?php wp_nonce_field('delete_job_' . $model->id) ?>
                        <button name="delete_job" class="btn btn-danger btn-sm"
                                type="submit"><?php _e('Löschen', 'psjb') ?></button>
                    </form>

                </td>

            </tr>
        <?php endforeach; ?>
            <script type="text/javascript">
                jQuery(document).ready(function ($) {
                    $('.frm-delete').submit(function () {
                        if (confirm('<?php echo esc_js(__('Bist Du sicher?','psjb')) ?>')) {

                        } else {
                            return false;
                        }
                    })
                })
            </script>
        <?php else: ?>
            <tr>
                <td colspan="4"><?php _e('Du hast keinen Job ausgeschrieben.', 'psjb') ?></td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
