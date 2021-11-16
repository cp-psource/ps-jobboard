<div class="page-header">
    <h3><?php _e('Schaltflächen Shortcode') ?></h3>
</div>
<div class="row">
    <div class="col-md-6 col-xs-6 col-sm-6 text-center">
        <img class=""
             src="<?php echo je()->plugin_url ?>assets/image/icons/Add_an_Expert/Add_an_Experts_Dark.svg">
        <p><strong><?php _e("Werde ein Experte-Button", 'psjb') ?></strong></p>

        <div class="clearfix"></div>

        <div class="text-left">
            <p><code>[jbp-expert-post-btn]</code></p>
            <ul>
                <li>
                    <mark><?php _e("text", 'psjb') ?></mark>
                    : <?php _e("Der Text wird unter dieser Schaltfläche angezeigt.", 'psjb') ?>
                </li>
                <li>
                    <mark><?php _e("view", 'psjb') ?></mark>
                    : <?php echo sprintf(__("Szenario wem diese Schaltfläche angezeigt wird, wir haben %s %s %s", 'psjb'), "<strong>both</strong>", "<strong>loggedin</strong>", "<strong>loggedout</strong>") ?>
                </li>
                <li>
                    <mark><?php _e("class", 'psjb') ?></mark>
                    : <?php _e("Custom Css Class for this button", 'psjb') ?>
                </li>
                <li>
                    <mark><?php _e("url", 'psjb') ?></mark>
                    : <?php _e("The destination of this button.", 'psjb') ?>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-6 col-xs-6 col-sm-6 text-center">
        <img class="" src="<?php echo je()->plugin_url ?>assets/image/icons/Post_a_Job/Post_a_Job_Dark.svg">
        <p><strong><?php _e("Add new Post Button", 'psjb') ?></strong></p>
        <div class="clearfix"></div>

        <div class="text-left">
            <p><code>[jbp-job-post-btn]</code></p>
            <ul>
                <li>
                    <mark><?php _e("text", 'psjb') ?></mark>
                    : <?php _e("Der Text wird unter dieser Schaltfläche angezeigt.", 'psjb') ?>
                </li>
                <li>
                    <mark><?php _e("view", 'psjb') ?></mark>
                    : <?php echo sprintf(__("Szenario wem diese Schaltfläche angezeigt wird, wir haben %s %s %s", 'psjb'), "<strong>both</strong>", "<strong>loggedin</strong>", "<strong>loggedout</strong>") ?>
                </li>
                <li>
                    <mark><?php _e("class", 'psjb') ?></mark>
                    : <?php _e("Benutzerdefinierte CSS-Klasse für diese Schaltfläche", 'psjb') ?>
                </li>
                <li>
                    <mark><?php _e("url", 'psjb') ?></mark>
                    : <?php _e("Das Ziel dieser Schaltfläche.", 'psjb') ?>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-6 col-xs-6 col-sm-6 text-center">
        <img class=""
             src="<?php echo je()->plugin_url ?>assets/image/icons/Browse_Jobs/Browse_Jobs_Dark.svg">
        <!-- <p><strong><?php _e("Schaltfläche Jobs auflisten", 'psjb') ?></strong></p> -->
        <div class="clearfix"></div>

        <div class="text-left">
            <p><code>[jbp-job-browse-btn]</code></p>
            <ul>
                <li>
                    <mark><?php _e("text", 'psjb') ?></mark>
                    : <?php _e("Der Text wird unter dieser Schaltfläche angezeigt.", 'psjb') ?>
                </li>
                <li>
                    <mark><?php _e("view", 'psjb') ?></mark>
                    : <?php echo sprintf(__("Szenario wem diese Schaltfläche angezeigt wird, wir haben %s %s %s", 'psjb'), "<strong>both</strong>", "<strong>loggedin</strong>", "<strong>loggedout</strong>") ?>
                </li>
                <li>
                    <mark><?php _e("class", 'psjb') ?></mark>
                    : <?php _e("Benutzerdefinierte CSS-Klasse für diese Schaltfläche", 'psjb') ?>
                </li>
                <li>
                    <mark><?php _e("url", 'psjb') ?></mark>
                    : <?php _e("Das Ziel dieser Schaltfläche.", 'psjb') ?>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-6 col-xs-6 col-sm-6 text-center">
        <img class=""
             src="<?php echo je()->plugin_url ?>assets/image/icons/Browse_Experts/Browse_Experts_Dark.svg">
        <p><strong><?php _e("Schaltfläche Experten auflisten", 'psjb') ?></strong></p>
        <div class="clearfix"></div>

        <div class="text-left">
            <p><code>[jbp-expert-browse-btn]</code></p>
            <ul>
                <li>
                    <mark><?php _e("text", 'psjb') ?></mark>
                    : <?php _e("Der Text wird unter dieser Schaltfläche angezeigt.", 'psjb') ?>
                </li>
                <li>
                    <mark><?php _e("view", 'psjb') ?></mark>
                    : <?php echo sprintf(__("Szenario wem diese Schaltfläche angezeigt wird, wir haben %s %s %s", 'psjb'), "<strong>both</strong>", "<strong>loggedin</strong>", "<strong>loggedout</strong>") ?>
                </li>
                <li>
                    <mark><?php _e("class", 'psjb') ?></mark>
                    : <?php _e("Benutzerdefinierte CSS-Klasse für diese Schaltfläche", 'psjb') ?>
                </li>
                <li>
                    <mark><?php _e("url", 'psjb') ?></mark>
                    : <?php _e("Das Ziel dieser Schaltfläche.", 'psjb') ?>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-6 col-xs-6 col-sm-6 text-center">
        <img class=""
             src="<?php echo je()->plugin_url ?>assets/image/icons/My_Job/My_Job_Dark.svg">
        <p><strong><?php _e("Auflistung der eigenen Jobs", 'psjb') ?></strong></p>
        <div class="clearfix"></div>

        <div class="text-left">
            <p><code>[jbp-my-job-btn]</code></p>
            <ul>
                <li>
                    <mark><?php _e("text", 'psjb') ?></mark>
                    : <?php _e("Der Text wird unter dieser Schaltfläche angezeigt.", 'psjb') ?>
                </li>
                <li>
                    <mark><?php _e("view", 'psjb') ?></mark>
                    : <?php echo sprintf(__("Szenario wem diese Schaltfläche angezeigt wird, wir haben %s %s %s", 'psjb'), "<strong>both</strong>", "<strong>loggedin</strong>", "<strong>loggedout</strong>") ?>
                </li>
                <li>
                    <mark><?php _e("class", 'psjb') ?></mark>
                    : <?php _e("Benutzerdefinierte CSS-Klasse für diese Schaltfläche", 'psjb') ?>
                </li>
                <li>
                    <mark><?php _e("url", 'psjb') ?></mark>
                    : <?php _e("Das Ziel dieser Schaltfläche.", 'psjb') ?>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-6 col-xs-6 col-sm-6 text-center">
        <img class=""
             src="<?php echo je()->plugin_url ?>assets/image/icons/My_Profile/My_Profile_Dark.svg">
        <p><strong><?php _e("Auflisten der Experten Profile", 'psjb') ?></strong></p>
        <div class="clearfix"></div>

        <div class="text-left">
            <p><code>[jbp-expert-profile-btn]</code></p>
            <ul>
                <li>
                    <mark><?php _e("text", 'psjb') ?></mark>
                    : <?php _e("Der Text wird unter dieser Schaltfläche angezeigt.", 'psjb') ?>
                </li>
                <li>
                    <mark><?php _e("view", 'psjb') ?></mark>
                    : <?php echo sprintf(__("Szenario wem diese Schaltfläche angezeigt wird, wir haben %s %s %s", 'psjb'), "<strong>both</strong>", "<strong>loggedin</strong>", "<strong>loggedout</strong>") ?>
                </li>
                <li>
                    <mark><?php _e("class", 'psjb') ?></mark>
                    : <?php _e("Benutzerdefinierte CSS-Klasse für diese Schaltfläche", 'psjb') ?>
                </li>
                <li>
                    <mark><?php _e("url", 'psjb') ?></mark>
                    : <?php _e("Das Ziel dieser Schaltfläche.", 'psjb') ?>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-6 col-xs-6 col-sm-6 text-center">
        <img class=""
             src="<?php echo je()->plugin_url ?>assets/image/icons/My_Profile/My_Profile_Dark.svg">
        <p><strong><?php _e("Expertensuchformular", 'psjb') ?></strong></p>
        <div class="clearfix"></div>

        <div class="text-left">
            <p><code>[jbp-expert-search]</code></p>
            <ul>
                <li>
                    <mark><?php _e("search_placeholder", 'psjb') ?></mark>
                    : <?php _e( 'Platzhaltertext für Suchformular', 'psjb' ); ?>
                </li>
            </ul>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="page-header">
    <h3><?php _e('Listing Page') ?></h3>
</div>
<div class="row">
    <div class="col-md-6 col-xs-6 col-sm-6 text-center">
        <p><strong><?php _e("Jobarchiv Seite", 'psjb') ?></strong></p>
        <div class="clearfix"></div>

        <div class="text-left">
            <p><code>[jbp-job-archive-page]</code></p>
            <ul>
                <li>
                    <mark><?php _e("post_per_page", 'psjb') ?></mark>
                    : <?php _e("Anzahl der Jobs, die Du auf einer Seite auflisten möchtest. Standard ist die Konfiguration von der Einstellungsseite.", 'psjb') ?>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-6 col-xs-6 col-sm-6 text-center">
        <p><strong><?php _e("Expertenarchiv Seite", 'psjb') ?></strong></p>
        <div class="clearfix"></div>

        <div class="text-left">
            <p><code>[jbp-expert-archive-page]</code></p>
            <ul>
                <li>
                    <mark><?php _e("post_per_page", 'psjb') ?></mark>
                    : <?php _e("Anzahl der Jobs, die Du auf einer Seite auflisten möchtest. Standard ist die Konfiguration von der Einstellungsseite.", 'psjb') ?>
                </li>
            </ul>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="page-header">
    <h3><?php _e('Formularseite') ?></h3>
</div>
<div class="row">
    <div class="col-md-6 col-xs-6 col-sm-6 text-center">
        <p><strong><?php _e("Seite zum Hinzufügen/Aktualisieren von Jobs", 'psjb') ?></strong></p>
        <div class="clearfix"></div>

        <div class="text-left">
            <p><code>[jbp-job-update-page]</code></p>
            <ul>
                <li>
                    <?php _e("Dieser Shortcode hat keine Parameter.", 'psjb') ?>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-6 col-xs-6 col-sm-6 text-center">
        <p><strong><?php _e("Seite zum Hinzufügen/Aktualisieren von Experten", 'psjb') ?></strong></p>
        <div class="clearfix"></div>

        <div class="text-left">
            <p><code>[jbp-expert-update-page]</code></p>
            <ul>
                <li>
                    <?php _e("Dieser Shortcode hat keine Parameter.", 'psjb') ?>
                </li>
            </ul>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="page-header">
    <h3><?php _e('Kommunikationsseite') ?></h3>
</div>
<div class="row">
    <div class="col-md-6 col-xs-6 col-sm-6 text-center">
        <p><strong><?php _e("Job Kontakteite", 'psjb') ?></strong></p>
        <div class="clearfix"></div>

        <div class="text-left">
            <p><code>[jbp-job-contact-page]</code></p>
            <ul>
                <li>
                    <mark>id</mark>:
                    <?php _e("ID des Jobs, an den Du den Kontakt senden möchtest.",'psjb') ?>
                </li>
                <li>
                    <mark><?php _e("success_text", 'psjb') ?></mark>
                    : <?php _e("Der Text, der nach erfolgreicher Übermittlung durch den Benutzer angezeigt werden soll.", 'psjb') ?>
                </li>
                <li>
                    <mark><?php _e("error_text", 'psjb') ?></mark>
                    : <?php _e("Der Text, der angezeigt wird, wenn nach der Übermittlung durch den Benutzer ein Fehler auftritt.", 'psjb') ?>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-6 col-xs-6 col-sm-6 text-center">
        <p><strong><?php _e("Experten Kontaktseite", 'psjb') ?></strong></p>
        <div class="clearfix"></div>

        <div class="text-left">
            <p><code>[jbp-expert-contact-page]</code></p>
            <ul>
                <li>
                    <mark>id</mark>:
                    <?php _e("ID des Experten, an den Du den Kontakt senden möchtest.",'psjb') ?>
                </li>
                <li>
                    <mark><?php _e("success_text", 'psjb') ?></mark>
                    : <?php _e("Der Text, der nach erfolgreicher Übermittlung durch den Benutzer angezeigt werden soll.", 'psjb') ?>
                </li>
                <li>
                    <mark><?php _e("error_text", 'psjb') ?></mark>
                    : <?php _e("Der Text, der angezeigt wird, wenn nach der Übermittlung durch den Benutzer ein Fehler auftritt.", 'psjb') ?>
                </li>
            </ul>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="page-header">
    <h3><?php _e('Einzelne Seite') ?></h3>
</div>
<div class="row">
    <div class="col-md-6 col-xs-6 col-sm-6 text-center">
        <p><strong><?php _e("Job Einzelne Seite", 'psjb') ?></strong></p>
        <div class="clearfix"></div>

        <div class="text-left">
            <p><code>[jbp-job-single-page]</code></p>
            <ul>
                <li>
                    <mark><?php _e("id", 'psjb') ?></mark>
                    : <?php _e("ID des Jobs", 'psjb') ?>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-6 col-xs-6 col-sm-6 text-center">
        <p><strong><?php _e("Experte Einzelne Seite", 'psjb') ?></strong></p>
        <div class="clearfix"></div>

        <div class="text-left">
            <p><code>[jbp-expert-single-page]</code></p>
            <ul>
                <li>
                    <mark><?php _e("id", 'psjb') ?></mark>
                    : <?php _e("ID des Experten", 'psjb') ?>
                </li>
            </ul>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="page-header">
    <h3><?php _e('Weitere Seiten') ?></h3>
</div>
<div class="row">
    <div class="col-md-6 col-xs-6 col-sm-6 text-center">
        <p><strong><?php _e("Landeseite", 'psjb') ?></strong></p>
        <div class="clearfix"></div>

        <div class="text-left">
            <p><code>[jbp-landing-page]</code></p>
            <ul>
                <li>
                    <mark><?php _e("job_show_count", 'psjb') ?></mark>
                    : <?php _e("Anzahl der anzuzeigenden Jobs, Standard 3.", 'psjb') ?>
                </li>
                <li>
                    <mark><?php _e("expert_show_count", 'psjb') ?></mark>
                    : <?php _e("Anzahl der anzuzeigenden Experten, Standard 6.", 'psjb') ?>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-6 col-xs-6 col-sm-6 text-center">
        <p><strong><?php _e("Meine Jobseite", 'psjb') ?></strong></p>
        <div class="clearfix"></div>

        <div class="text-left">
            <p><code>[jbp-my-job-page]</code></p>
            <ul>
                <li>
                    <?php _e("Dieser Shortcode hat keine Parameter.", 'psjb') ?>
                </li>
            </ul>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-6 col-xs-6 col-sm-6 text-center">
        <p><strong><?php _e("Meine Expertenseite", 'psjb') ?></strong></p>
        <div class="clearfix"></div>

        <div class="text-left">
            <p><code>[jbp-my-expert-page]</code></p>
            <ul>
                <li>
                    <?php _e("Dieser Shortcode hat keine Parameter.", 'psjb') ?>
                </li>
            </ul>
        </div>
    </div>
    <div class="clearfix"></div>
</div>