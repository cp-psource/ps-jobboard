<?php
/**
 * @author:DerN3rd
 */
$paged_query_var = ! is_front_page() ? 'je-paged' : 'page';

$paged = (get_query_var( $paged_query_var )) ? get_query_var( $paged_query_var ) : 1;
$pages = $total_pages;
if (!$pages) {
    $pages = 1;
}
$range = 4;
$showitems = ($range * 2) + 1;
?>

<div class="jbp-navigation group"><!--begin .jbp-navigation-->

    <?php if ($pages > 1) : ?>

        <?php $pagination_args = array( 'query_vars' => $paged_query_var ); ?>

        <div class="jbp-pagination"><!--begin .jbp-pagination-->

            <span><?php printf(__('Seite %1$d von %2$d', 'psjb'), $paged, $pages); ?></span>

            <?php if ($paged > 2 && $paged > $range + 1 && $showitems < $pages): ?>
                <?php $pagination_args['paged'] = 1; ?>
                <a href="<?php echo esc_url( JobsExperts_Helper::add_query_arg( $pagination_args ) ); ?>">&laquo;<?php _e('Erste', 'psjb'); ?></a>
            <?php endif; ?>

            <?php if ($paged > 1 && $showitems < $pages) : ?>
                 <?php $pagination_args['paged'] = $paged - 1; ?>
                <a href="<?php echo esc_url( JobsExperts_Helper::add_query_arg( $pagination_args ) ); ?>">&lsaquo;<?php _e('Vorherige', 'psjb'); ?></a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $pages; $i++) :
                if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)):
                    $pagination_args['paged'] = $i;
                    echo ($paged == $i) ? '<span class="current">' . $i . '</span>' : '<a href="' . esc_url( JobsExperts_Helper::add_query_arg( $pagination_args ) ) . '" class="inactive">' . $i . '</a>';
                endif;
            endfor;

            if ($paged < $pages && $showitems < $pages) : ?>
            <?php $pagination_args['paged'] = $paged + 1; ?>
                <a href="<?php echo esc_url( JobsExperts_Helper::add_query_arg( $pagination_args ) ); ?>"><?php _e('Nächste', 'psjb'); ?>&rsaquo;</a>
            <?php endif; ?>

            <?php if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages): ?>
                <?php $pagination_args['paged'] = $pages; ?>
                <a href="<?php echo esc_url( JobsExperts_Helper::add_query_arg( $pagination_args ) ); ?>"><?php _e('Letzte', 'psjb'); ?>&raquo;</a>
            <?php endif; ?>

        </div> <!--end .jbp-pagination-->

    <?php endif; ?>
</div><!--end .jbp-navigation -->
