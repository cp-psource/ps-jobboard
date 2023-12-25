<div class="row">
    <div class="col-md-4">
        <ul id="main-list" data-id="free" class="dd-list je-fields-list">
            <?php $this->render_partial('_item', array(
                'models' => $this->find_free_fields()
            )) ?>
        </ul>
    </div>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong><?php _e("Vor dem Kategoriefeld") ?></strong>
            </div>
            <div class="panel-body field-drop-place dd">
                <ul data-id="before-cat" class="dd-list je-fields-list">
                    <?php $this->render_partial('_item', array(
                        'models' => $this->find_before_cat_fields()
                    )) ?>
                </ul>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong><?php _e("Nach Kategoriefeld") ?></strong>
            </div>
            <div class="panel-body field-drop-place dd">
                <ul data-id="after-cat" class="dd-list je-fields-list">
                    <?php $this->render_partial('_item', array(
                        'models' => $this->find_after_cat_fields()
                    )) ?>
                </ul>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong><?php _e("Vor dem Jobtitelfeld") ?></strong>
            </div>
            <div class="panel-body field-drop-place dd">
                <ul data-id="before-job-title" class="dd-list je-fields-list">

                </ul>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong><?php _e("Nach dem Jobtitelfeld") ?></strong>
            </div>
            <div class="panel-body field-drop-place dd">
                <ul data-id="after-job-title" class="dd-list je-fields-list">
                </ul>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong><?php _e("Vor Beschreibung Feld") ?></strong>
            </div>
            <div class="panel-body field-drop-place dd">
                <ul data-id="before-description" class="dd-list je-fields-list">
                </ul>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong><?php _e("Nach Beschreibung Feld") ?></strong>
            </div>
            <div data-id="after-description" class="panel-body field-drop-place dd">
                <ul class="dd-list je-fields-list">
                </ul>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong><?php _e("Vor dem Fähigkeitsfeld") ?></strong>
            </div>
            <div data-id="before-skill" class="panel-body field-drop-place dd">
                <ul class="dd-list je-fields-list">
                </ul>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong><?php _e("Nach dem Fähigkeitsfeld") ?></strong>
            </div>
            <div class="panel-body field-drop-place dd">
                <ul data-id="after-skill" class="dd-list je-fields-list">
                </ul>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong><?php _e("Vor Preisfeld(ern)") ?></strong>
            </div>
            <div class="panel-body field-drop-place dd">
                <ul data-id="before-price" class="dd-list je-fields-list">
                </ul>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong><?php _e("Nach Preisfeld(ern)") ?></strong>
            </div>
            <div class="panel-body field-drop-place dd">
                <ul data-id="after-price" class="dd-list je-fields-list">
                </ul>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong><?php _e("Vor dem E-Mail-Feld") ?></strong>
            </div>
            <div class="panel-body field-drop-place dd">
                <ul data-id="before-email" class="dd-list je-fields-list">
                </ul>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong><?php _e("Nach E-Mail-Feld") ?></strong>
            </div>
            <div class="panel-body field-drop-place dd">
                <ul data-id="after-email" class="dd-list je-fields-list">
                </ul>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong><?php _e("Vor dem Deadline Datumsfeld") ?></strong>
            </div>
            <div class="panel-body field-drop-place dd">
                <ul data-id="before-complete-date" class="dd-list je-fields-list">
                </ul>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong><?php _e("Nach dem Deadline Datumsfeld") ?></strong>
            </div>
            <div class="panel-body field-drop-place dd">
                <ul data-id="after-complete-date" class="dd-list je-fields-list">
                </ul>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong><?php _e("Vor dem Offen für Feld") ?></strong>
            </div>
            <div class="panel-body field-drop-place dd">
                <ul data-id="before-open-field" class="dd-list je-fields-list">
                </ul>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong><?php _e("Nach dem Offen für Feld") ?></strong>
            </div>
            <div class="panel-body field-drop-place dd">
                <ul data-id="after-open-field" class="dd-list je-fields-list">
                </ul>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    jQuery(function ($) {
        $(".je-fields-list").sortable({
            connectWith: ".je-fields-list",
            stop: function (e, ui) {
                //loop throuh the lists
                var ul = ui.item.closest('ul');
                if (ul) {
                    //check does the item move in section
                    if (ul.data('id') != undefined) {
                        var data = ul.sortable('toArray', {
                            attribute: 'data-id'
                        })
                        //call ajax to store it
                        $.ajax({
                            type: 'POST',
                            data: {
                                action: 'job_assign_to_block',
                                id: ul.data('id'),
                                data: data,
                                _wpnonce: '<?php echo wp_create_nonce('job_assign_to_block') ?>'
                            },
                            url: ajaxurl,
                            success: function () {

                            }
                        })
                    }
                }

            }
        }).disableSelection();
    })
</script>