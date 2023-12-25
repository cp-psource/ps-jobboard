<div class="page-header">
    <h3 class="hndle">
        <span><?php printf(esc_html__('%s Status Optionen', 'psjb'), $pro_labels->singular_name); ?></span>
    </h3>
</div>
<?php $form = new IG_Active_Form($model);
$form->open(array("attributes" => array("class" => "form-horizontal")));?>
<div class="form-group">
    <label class="col-md-3 control-label">
        <?php printf(esc_html__('Maximale %s Profile pro Benutzer', 'psjb'), $pro_labels->singular_name) ?>
    </label>

    <div class="col-md-9">
        <?php $form->text('expert_max_records') ?>
        <p class="help-block"><?php printf(esc_html__('Maximale Anzahl von %s Profilen für jeden Benutzer.', 'psjb'), $pro_labels->singular_name); ?></p>
    </div>
    <div class="clearfix"></div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">
        <?php printf(esc_html__('%s Einträge pro Seite', 'psjb'), $pro_labels->singular_name); ?>
    </label>

    <div class="col-md-9">
        <?php $form->text('expert_per_page') ?>
        <p class="help-block"><?php printf(esc_html__('Maximale Anzahl von %s Profilen für jede Seite.', 'psjb'), $pro_labels->singular_name); ?></p>
    </div>
    <div class="clearfix"></div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">
        <?php printf(esc_html__('Neu erstellte %s Statusoptionen', 'psjb'), $pro_labels->singular_name); ?>
    </label>

    <div class="col-md-9">
        <label><?php $form->radio('expert_new_expert_status', array(
                'value' => 'publish'
            )) ?>

            <?php _e('Veröffentlichen', 'psjb'); ?></label>

        <p class="help-block">
            <?php printf(esc_html__('Ermögliche Mitgliedern, %s selbst zu veröffentlichen.', 'psjb'), $pro_labels->name); ?>
        </p>
        <label> <?php $form->radio('expert_new_expert_status', array(
                'value' => 'pending'
            )) ?>
            <?php _e('Ausstehende Begutachtung', 'psjb'); ?></label>

        <p class="help-block">
            <?php printf(esc_html__('%s muss noch von einem Administrator überprüft werden.', 'psjb'), $pro_labels->singular_name); ?>
        </p>
        <label>
            <?php $form->hidden('expert_allow_draft', array('value' => 0)) ?>
            <?php $form->checkbox('expert_allow_draft', array('attributes' => array('value' => 1))) ?>
            <?php _e('Entwurf', 'psjb'); ?>
        </label>

        <p class="help-block">
            <?php _e('Ermögliche Mitgliedern, Entwürfe zu speichern.', 'psjb'); ?>
        </p>
    </div>
    <div class="clearfix"></div>
</div>
<div class="page-header">
    <h3 class="hndle">
        <span><?php printf(esc_html__('%s Bildspeicher', 'psjb'), $pro_labels->singular_name); ?></span>
    </h3>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">
        <?php _e('Maximale Galerie-Bilder', 'psjb') ?>
    </label>

    <div class="col-md-9">
        <?php $form->text('expert_sample_size') ?>
        <p class="help-block">
            <?php printf(esc_html__('Maximale Anzahl von Bildern, die in die %s Portfolio-Galerie hochgeladen werden können. Standard ist 4', 'psjb'), $pro_labels->name); ?></p>
    </div>
    <div class="clearfix"></div>
</div>
<div class="page-header">
    <h3 class='hndle'><span><?php _e('Benachrichtigungseinstellungen', 'psjb'); ?></span></h3>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">
        <?php _e('Kontaktformular deaktivieren:', 'psjb'); ?>
    </label>

    <div class="col-md-9">
        <label class="text-muted" style="font-weight: normal">
            <?php $form->hidden('expert_contact_form', array('value' => 0)) ?>
            <?php $form->checkbox('expert_contact_form', array('attributes' => array('value' => 1))) ?>
            <?php _e('Kontaktformular deaktivieren', 'psjb'); ?>
        </label>
    </div>
    <div class="clearfix"></div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">
        <?php _e('CC den Administrator:', 'psjb'); ?>
    </label>

    <div class="col-md-9">
        <label class="text-muted" style="font-weight: normal">
            <?php $form->hidden('expert_cc_admin', array('value' => 0)) ?>
            <?php $form->checkbox('expert_cc_admin', array('attributes' => array('value' => 1))) ?>
            <?php _e('cc den administrator', 'psjb'); ?>
        </label>
    </div>
    <div class="clearfix"></div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">
        <?php _e('Email Betreff:', 'psjb'); ?>
    </label>

    <div class="col-md-9">
        <?php $form->text('expert_email_subject', array('attributes' => array('class' => 'large-text'))); ?>
        <p class="help-block">
            <?php _e('Variablen: TO_NAME, FROM_NAME, FROM_EMAIL, FROM_MESSAGE, POST_TITLE, POST_LINK, SITE_NAME', 'psjb'); ?>
        </p>
    </div>
    <div class="clearfix"></div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">
        <?php _e('Email Inhalt:', 'psjb'); ?>
    </label>

    <div class="col-md-9">
        <?php $form->text_area('expert_email_content', array('attributes' => array('class' => 'large-text', 'rows' => 5))); ?>
        <p class="help-block">
            <?php _e('Variablen: TO_NAME, FROM_NAME, FROM_EMAIL, FROM_MESSAGE, POST_TITLE, POST_LINK, SITE_NAME', 'psjb'); ?>
        </p>
    </div>
    <div class="clearfix"></div>
</div>
<div class="form-group">
    <div class="col-sm-10">
        <?php wp_nonce_field('je_settings', '_je_setting_nonce') ?>
        <button type="submit" class="btn btn-primary"><?php _e("Übernehmen", 'psjb') ?></button>
    </div>
</div>
<?php $form->close() ?>