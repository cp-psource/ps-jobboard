<h4><?php _e("Wähle aus, welche Benutzerrollen Dateien hochladen können", 'psjb') ?></h4>
<?php $form = new IG_Active_Form($model);
$form->open(array("attributes" => array("class" => "form-horizontal"))); ?>
<input type="hidden" name="<?php echo $form->build_name('allow_attachment') ?>[]" value="">
<table class="table table-condensed table-hover">
    <thead>
    <tr>
        <th><?php _e("Rollenname", 'psjb') ?></th>
        <th><?php _e("Kann hochladen", 'psjb') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php
    $roles = get_editable_roles();
    foreach ($roles as $key => $role): ?>
        <?php if (isset($role['capabilities']['upload_files']) && $role['capabilities']['upload_files'] == false || !isset($role['capabilities']['upload_files'])): ?>
            <?php $is = in_array($key, $model->allow_attachment); ?>
            <tr>
                <td><?php echo $role['name'] ?></td>
                <td>
                    <?php
                    $form->checkbox('allow_attachment', array(
                        'multiple' => true,
                        'checked' => $is,
                        'attributes' => array(
                            'value' => $key
                        )
                    )) ?>
                </td>
            </tr>
        <?php endif; ?>
    <?php endforeach; ?>
    </tbody>
</table>
<?php wp_nonce_field('je_settings', '_je_setting_nonce') ?>
<button type="submit" class="btn btn-primary"><?php _e("Änderungen speichern", 'psjb') ?></button>
<?php $form->close() ?>