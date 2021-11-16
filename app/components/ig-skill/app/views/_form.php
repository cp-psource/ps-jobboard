<div class="ig-container">
	<div class="alert alert-danger hide">
	</div>
	<div class="skill-add-form">
		<div class="row">
			<div class="col-md-6 hidden-xs hidden-sm" style="box-sizing: border-box">
				<div class="skill-preview">
					<div class="page-header">
						<h5><?php _e( "Vorschau", ig_skill()->domain ) ?></h5>
					</div>
					<h5 class="skill-name"><?php echo is_object( $model ) ? $model->name : __( 'Fähigkeitsname', ig_skill()->domain ) ?></h5>

					<div class="progress">
						<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0"
						     aria-valuemax="100" style="width: 0%;">
							0%
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6" style="box-sizing: border-box">
				<form method="post" class="ig-skill-form">
					<label><?php _e( "Name", ig_skill()->domain ) ?></label>
					<input type="text" name="name" value="<?php echo is_object( $model ) ? $model->name : '' ?>">
					<label><?php _e( "Score", ig_skill()->domain ) ?></label>
					<input type="range" min="0" max="100" name="score"
					       value="<?php echo is_object( $model ) ? $model->value : 50 ?>"/>
					<label><?php _e( "Farbe", ig_skill()->domain ) ?></label>
					<?php if ( is_object( $model ) ): ?>
						<select name="color">
							<option <?php echo is_object( $model ) ? selected( $model->find_css(), 'primary' ) : null; ?>
								value="primary"><?php _e( 'Blau', ig_skill()->domain ) ?></option>
							<option <?php echo is_object( $model ) ? selected( $model->find_css(), 'danger' ) : null; ?>
								value="danger"><?php _e( 'Rot', ig_skill()->domain ) ?></option>
							<option <?php echo is_object( $model ) ? selected( $model->find_css(), 'warning' ) : null; ?>
								value="warning"><?php _e( 'Orange', ig_skill()->domain ) ?></option>
							<option <?php echo is_object( $model ) ? selected( $model->find_css(), 'info' ) : null; ?>
								value="info"><?php _e( 'Hellblau', ig_skill()->domain ) ?></option>
							<option <?php echo is_object( $model ) ? selected( $model->find_css(), 'success' ) : null; ?>
								value="success"><?php _e( 'Grün', ig_skill()->domain ) ?></option>
						</select>
					<?php else: ?>
						<select name="color">
							<option value="primary"><?php _e( 'Blau', 'psjb' ) ?></option>
							<option value="danger"><?php _e( 'Rot', 'psjb' ) ?></option>
							<option value="warning"><?php _e( 'Orange', 'psjb' ) ?></option>
							<option value="info"><?php _e( 'Hellblau', 'psjb' ) ?></option>
							<option value="success"><?php _e( 'Grün', 'psjb' ) ?></option>
						</select>
					<?php endif; ?>
					<label><?php _e( 'Aktiviere Animiert', 'psjb' ) ?> &nbsp;&nbsp;&nbsp;
						<?php if ( is_object( $model ) ): ?>
							<?php $animated = stristr( $model->css, 'active' ) ?>
							<input <?php echo $animated == true ? 'checked' : null ?>
								style="position: relative;top:-2px" type="checkbox" name="animated">
						<?php else: ?>
							<input style="position: relative;top:-2px" type="checkbox" name="animated">
						<?php endif; ?></label>
					<button class="btn btn-primary btn-sm hn-save-skill"
					        type="submit"><?php _e( 'Übermitteln', ig_skill()->domain ) ?></button>
					&nbsp;
					<button class="btn btn-default btn-sm hn-cancel-skill"
					        type="button"><?php _e( 'Abbrechen', ig_skill()->domain ) ?></button>
					<?php if ( is_object( $model ) ): ?>
						&nbsp;
						<button class="btn btn-danger btn-sm hn-delete-skill"
						        type="button"><?php _e( 'Löschen', 'psjb' ) ?></button>
					<?php endif; ?>
				</form>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="ig-overlay hide"
	     style="position: absolute;width: 100%;height:100%;background: white;opacity: 0.5;top:0">
		<img style="
    display: block;
    position: relative;
    margin: auto;
    top: 50%;
    margin-top: -24px;
" src="<?php echo ig_skill()->plugin_url . 'assets/ajax-loader.gif' ?>">
	</div>
</div>