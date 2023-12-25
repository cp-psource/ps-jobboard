<div class="wrap">
    <div class="ig-container">
        <div class="page-header">
            <h2><?php _e('Neuen Job hinzufügen', 'psjb') ?></h2>
        </div>
        <?php $this->render_partial('backend/jobs/_form', array(
            'model' => $model
        )) ?>
    </div>
</div>