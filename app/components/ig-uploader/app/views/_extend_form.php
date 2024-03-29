<?php
$upload_new_id = uniqid();
$f_id = uniqid();
?>
<div id="<?php echo $c_id ?>">
    <div class="panel panel-default" style="margin-bottom: 5px;border-width: 1px;position:relative;">
        <div class="panel-heading">
            <strong
                class="hidden-xs hidden-sm"><?php echo $attributes['title'] ?></strong>
            <small
                class="hidden-md hidden-lg"><?php echo $attributes['title'] ?></small>
        </div>
        <section class="panel-body file-view-port">
        <button type="button"
                    class="btn btn-primary btn-xs pull-right add-file"><?php _e('Hinzufügen', ig_uploader()->domain) ?> <i
                    class="glyphicon glyphicon-plus"></i>
            </button>
            <?php if (is_array($models) && count($models)): ?>
                <?php foreach ($models as $model): ?>
                    <?php $this->render_partial(apply_filters('igu_single_file_template', '_single_file'), array(
                        'model' => $model
                    )) ?>
                <?php endforeach; ?>
                <div class="clearfix"></div>
            <?php else: ?>
                <p class="no-file"><?php _e("Keine Beispieldatei.", ig_uploader()->domain) ?></p>
            <?php endif; ?>
            <div class="clearfix"></div>
        </section>
    </div>
</div>