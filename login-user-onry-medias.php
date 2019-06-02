<?php
/*
Plugin Name: login user onry medias
Description: 管理者権限を持たないログインユーザーのメディアを、本人のメディアに絞って出力します。
Author: Sho Tanaka
Version: 1.0.0
*/
function display_only_self_uploaded_medias( $query ) {
	if ( ( $user = wp_get_current_user() ) && ! current_user_can( 'administrator' ) ) {
		$query['author'] = $user->ID;
	}
	return $query;
}
add_action( 'ajax_query_attachments_args', 'display_only_self_uploaded_medias' );
