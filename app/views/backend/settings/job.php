<?php $form = new IG_Active_Form($model);
$form->open(array("attributes" => array("class" => "form-horizontal"))); ?>
    <div class="page-header">
        <h3 class="hndle">
            <span><?php printf(__('%s Status Optionen', 'psjb'), $job_labels->singular_name); ?></span>
        </h3>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">
            <?php printf(esc_html__('Maximal %s Datensätze pro Benutzer', 'psjb'), $job_labels->singular_name) ?>
        </label>

        <div class="col-md-9">
            <?php $form->text('job_max_records') ?>
            <p class="help-block"><?php printf(esc_html__('Maximale Anzahl von %s Profilen für jeden Benutzer.', 'psjb'), $job_labels->singular_name); ?></p>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">
            <?php printf(esc_html__('%s Datensätze pro Seite', 'psjb'), $job_labels->singular_name); ?>
        </label>

        <div class="col-md-9">
            <?php $form->text('job_per_page') ?>
            <p class="help-block"><?php printf(esc_html__('Maximale Anzahl von %s Profilen für jede Seite.', 'psjb'), $job_labels->singular_name); ?></p>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">
            <?php _e('Verwende den Budgetbereich', 'psjb'); ?>
        </label>

        <div class="col-md-9">
            <?php $form->hidden('job_budget_range', array('value' => 0)) ?>
            <?php $form->checkBox('job_budget_range', array('attributes' => array('value' => 1))) ?>
            <?php _e('Verwende Min- und Max-Budgetfelder', 'psjb'); ?>
            <p class="help-block"><?php _e('Zeigt sowohl minimale als auch maximale Budgetfelder an.', 'psjb'); ?></p>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">
            <?php _e("Kommentare zu Jobs zulassen", 'psjb'); ?>
        </label>

        <div class="col-md-9">
            <?php $form->hidden('job_allow_discussion', array('value' => 0)) ?>
            <?php $form->checkBox('job_allow_discussion', array('attributes' => array('value' => 1))) ?>
            <?php _e('Dadurch können Benutzer Jobs kommentieren.', 'psjb'); ?>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">
            <?php _e( "Abgelaufene Jobs im Archiv verbergen?", 'psjb' ); ?>
        </label>
        
        <div class="col-md-9">
            <?php $form->hidden('hide_expired_from_archive', array('value' => 0)) ?>
            <?php $form->checkBox( 'hide_expired_from_archive', array( 'attributes' => array( 'value' => 1 ) ) ) ?>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">
            <?php printf(esc_html__('Neu erstellte %s Statusoptionen', 'psjb'), $job_labels->singular_name); ?>
        </label>

        <div class="col-md-9">
            <label><?php $form->radio('job_new_job_status', array(
                    'value' => 'publish'
                )) ?>

                <?php _e('Veröffentlicht', 'psjb'); ?></label>

            <p class="help-block">
                <?php printf(esc_html__('Ermögliche Mitgliedern, %s selbst zu veröffentlichen.', 'psjb'), $job_labels->name); ?>
            </p>
            <label> <?php $form->radio('job_new_job_status', array(
                    'value' => 'pending'
                )) ?>
                <?php _e('Ausstehende Begutachtung', 'psjb'); ?></label>

            <p class="help-block">
                <?php printf(esc_html__('%s muss noch von einem Administrator überprüft werden.', 'psjb'), $job_labels->singular_name); ?>
            </p>
            <label>
                <?php $form->hidden('job_allow_draft', array('value' => 0)) ?>
                <?php $form->checkbox('job_allow_draft', array('attributes' => array('value' => 1))) ?>
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
            <span><?php printf(esc_html__('%s Bildspeicher', 'psjb'), $job_labels->singular_name); ?></span>
        </h3>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">
            <?php _e('Maximale Galerie-Bilder', 'psjb') ?>
        </label>

        <div class="col-md-9">
            <?php $form->text('job_sample_size') ?>
            <p class="help-block">
                <?php printf(esc_html__('Maximale Anzahl von Bildern, die in die %s Portfolio-Galerie hochgeladen werden können. Standard ist 4', 'psjb'), $job_labels->name); ?></p>
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
                <?php $form->hidden('job_contact_form', array('value' => 0)) ?>
                <?php $form->checkbox('job_contact_form', array('attributes' => array('value' => 1))) ?>
                <?php _e('disable contact form', 'psjb'); ?>
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
                <?php $form->hidden('job_cc_admin', array('value' => 0)) ?>
                <?php $form->checkbox('job_cc_admin', array('attributes' => array('value' => 1))) ?>
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
            <?php $form->text('job_email_subject', array('attributes' => array(
                'class' => 'large-text'
            ))); ?>
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
            <?php $form->text_area('job_email_content', array(
                'attributes' => array(
                    'class' => 'large-text', 'rows' => 5
                )
            )); ?>
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
<?php $form->close(); ?>