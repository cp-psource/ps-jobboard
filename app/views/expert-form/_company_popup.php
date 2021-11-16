<div class="hide" id="company-template">
    <form class="can-edit-form form-horizontal" style="width100%;">
        <div class="form-group">
            <label class="col-md-3 control-label"><?php _e("Unternehmen", 'psjb') ?></label>

            <div class="col-lg-9">
                <input type="text" id="first_name" name="company" value="<?php echo $model->company ?>"
                       class="form-control input-sm">
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label"><?php _e("Webseite", 'psjb') ?></label>

            <div class="col-lg-9">
                <input type="text" name="company_url" class="form-control input-sm" value="<?php echo $model->company_url ?>">
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row">
            <div class="col-md-9 col-md-offset-3">
                <button type="submit" class="btn btn-xs btn-primary"><?php _e("Speichern", 'psjb') ?></button>
                <button type="button"
                        class="btn btn-xs btn-default can-edit-cancel"><?php _e("Abbrechen", 'psjb') ?></button>
            </div>
            <div class="clearfix"></div>
        </div>
    </form>
</div>