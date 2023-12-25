<div class="wrap">
    <div class="ig-container">
        <div class="page-header">
            <h2><?php _e("Experte bearbeiten", 'psjb') ?></h2>
        </div>
        <?php $this->render_partial('backend/experts/_form', array(
            'model' => $model
        )) ?>
    </div>
</div>