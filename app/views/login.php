<div class="ig-container">
    <div class="row">
        <?php if (get_option('users_can_register')) : ?>
            <div class="col-md-6 no-padding">
                <div class="mm_login_form">
                    <div class="page-header">
                        <h3><?php _e("Anmelden", 'psjb') ?></h3>
                    </div>
                    <?php je()->login_form(); ?>
                </div>
            </div>
            <div class="col-md-6 no-padding">
                <div class="mm_sign_up">
                    <div class="page-header">
                        <h3><?php _e("Registrieren", 'psjb') ?></h3>
                    </div>
                    <p><?php _e("MeRegistriere Dich, um ein Mitglied zu werden", 'psjb') ?></p>
                    <a href="<?php echo wp_registration_url(); ?>"
                       class="btn btn-primary mm_signup_btn"><?php _e("Konto erstellen", 'psjb') ?></a>
                </div>
            </div>
        <?php else: ?>
            <div class="col-md-6 no-padding col-md-offset-3">
                <div class="mm_login_form">
                    <div class="page-header">
                        <h3><?php _e("Sign in", 'psjb') ?></h3>
                    </div>
                    <?php je()->login_form(); ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="clearfix"></div>
    </div>
</div>