<?php

/**
 * @author:DerN3rd
 */
class JE_Expert_Form_Shortcode_Controller extends IG_Request {
	protected $model;

	public function __construct() {
		add_shortcode( 'jbp-expert-update-page', array( &$this, 'main' ) );
		if ( is_user_logged_in() ) {
			add_action( 'wp_loaded', array( &$this, 'process' ) );
			add_action( 'wp_loaded', array( &$this, 'avatar_process' ) );
		}
	}

	function avatar_process() {
		if ( wp_verify_nonce( je()->get( 'upload_file_nonce' ), 'hn_upload_avatar' ) ) {
			if ( ! function_exists( 'wp_handle_upload' ) ) {
				require_once( ABSPATH . 'wp-admin/includes/file.php' );
			}
			$uploadedfile     = $_FILES['hn_uploader'];
			$upload_overrides = array( 'test_form' => false );
			$movefile         = wp_handle_upload( $uploadedfile, $upload_overrides );
			update_post_meta( $_POST['parent_id'], '_expert_avatar', $movefile['url'] );
			echo $movefile['url'];
			exit;
		}

		if ( wp_verify_nonce( je()->post( '_nonce' ), 'expert_delete_avatar' ) ) {
			$parent_id = je()->post( 'parent_id' );
			$model     = JE_Expert_Model::model()->find( $parent_id );
			if ( is_object( $model ) ) {
				delete_post_meta( $parent_id, '_expert_avatar' );
				echo $model->get_avatar();
			}
			exit;
		}
	}

	function process() {
		if ( ! wp_verify_nonce( je()->post( '_wpnonce' ), 'jbp_add_pro' ) ) {
			return;
		}
		$data = je()->post( 'JE_Expert_Model' );
		//the model should already stored
		$model = JE_Expert_Model::model()->find( $data['id'] );

		if ( is_object( $model ) ) {
			$model->import( $data );
			$model->status            = je()->post( 'status' );
			$model->name              = $model->first_name . ' ' . $model->last_name;
			$model->biography         = jbp_filter_text( stripslashes( $model->biography ) );
			$model->short_description = jbp_filter_text( stripslashes( $model->short_description ) );

			if ( $model->validate() ) {
				do_action( 'je_expert_saving_process', $model );
				$model->save();
				if ( $model->status == 'publish' ) {
					$this->redirect( get_permalink( $model->id ) );
				} else {
					$this->redirect( get_permalink( je()->pages->page( JE_Page_Factory::MY_EXPERT ) ) );
				}
			} else {
				je()->global['expert_model'] = $model;
			}
		}
	}

	function main() {
		if ( ! is_user_logged_in() ) {
			return $this->render( 'login', array(), false );
		} else {
			je()->load_script( 'expert-form' );
			//translate
			$translation_array = array(
				'name_title'        => __( 'Dein Name', 'psjb' ),
				'company_title'     => __( "Dein Unternehmen", 'psjb' ),
				'location_title'    => __( "Woher kommst Du?", 'psjb' ),
				'email_title'       => __( "Deine E-Mail wird nicht über die Website veröffentlicht", 'psjb' ),
				'biography_title'   => __( "Erzähl uns von dir", 'psjb' ),
				'tagline_title'     => __( "Kurze Beschreibung über dich", 'psjb' ),
				'avatar_error_file' => __( 'Avatar muss ein Bild sein', 'psjb' ),
				'avatar_error_size' => __( 'Datei zu groß.', 'psjb' ),
				'avatar_empty'      => __( 'Bitte wähle eine Datei ause', 'psjb' )
			);
			wp_localize_script( 'jobs-main', 'expert_form', $translation_array );

			$slug = je()->get( 'pro', null );
			if ( isset( je()->global['expert_model'] ) ) {
				$model = je()->global['expert_model'];
			} else {
				if ( is_null( $slug ) ) {
					//check does this man can post new
					if ( JE_Expert_Model::model()->count() >= je()->settings()->expert_max_records && ! current_user_can( 'manage_options' ) ) {
						return $this->render( 'expert-form/limit', array(), false );
					} else {
						//check does this user has a undone profile
						$model = JE_Expert_Model::model()->find_one_by_attributes( array(
							'status'  => 'je-draft',
							'user_id' => get_current_user_id()
						) );
						if ( ! is_object( $model ) ) {
							$model            = new JE_Expert_Model();
							$model->status    = 'je-draft';
							$model->biography = '';
							$model->user_id   = get_current_user_id();
							$model->save();
						}
					}
					if ( je()->get( 'first_name', null ) != null ) {
						$model->first_name = je()->get( 'first_name' );
					}
					if ( je()->get( 'last_name', null ) != null ) {
						$model->last_name = je()->get( 'last_name' );
					}
					$model->name = trim( $model->first_name . ' ' . $model->last_name );
				} elseif ( filter_var( $slug, FILTER_VALIDATE_INT ) ) {
					$model = JE_Expert_Model::model()->find( $slug );
				} else {
					$model = JE_Expert_Model::model()->find_by_slug( $slug );
				}
			}

			if ( is_object( $model ) ) {
				$model->name = trim( $model->name );
				$this->model = $model;
				//add avatar form
				add_action( 'wp_footer', array( &$this, 'avatar_form' ) );

				return $this->render( 'expert-form/main', array(
					'model' => $model
				), false );
			} else {
				//todo something wrong here
			}
		}
	}

	function avatar_form() {
		$model = $this->model;
		?>
        <div class="ig-container">
            <div class="hide" id="je_avatar_uploader">
                <div class="file-uploader-form" style="position: relative">
                    <form class="">
                        <label>
							<?php _e( 'Wähle ein Bild oder eine Datei aus', 'psjb' ) ?>
                        </label>
                        <input type="file" class="hn_uploader_element" name="hn_uploader">

                        <div class="clearfix" style="margin-top: 5px"></div>
                        <input type="hidden" name="parent_id" value="<?php echo $model->id ?>">
                        <button class="btn btn-primary btn-sm hn-upload-avatar"
                                type="submit"><?php _e( 'Einreichen', 'psjb' ) ?></button>
						<?php if ( $model->has_avatar() ): ?>
                            <button class="btn btn-danger btn-sm hn-delete-avatar"
                                    type="button"><?php _e( 'Hochgeladenen Avatar löschen', 'psjb' ) ?></button>
						<?php else: ?>
                            <button class="btn btn-danger btn-sm hn-delete-avatar hide"
                                    type="button"><?php _e( 'Hochgeladenen Avatar löschen', 'psjb' ) ?></button>
						<?php endif; ?>
                        <button class="btn btn-default btn-sm hn-cancel-avatar"
                                type="button"><?php _e( 'Abbrechen', 'psjb' ) ?></button>
                    </form>
                </div>
            </div>
        </div>
		<?php
	}
}