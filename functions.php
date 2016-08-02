<?php

//Lisätään Googlen open sans -fontti
add_action( 'wp_enqueue_scripts', 'add_google_fonts' );
function add_google_fonts() {
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,700,300', false ); 
}

//Muokataan footer
add_action ('custom_copyright', 'custom_copyright', 10);
function custom_copyright() {
	$site_link = '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" ><span>' . get_bloginfo( 'name', 'display' ) . '</span></a>';
	$default_footer_value = sprintf( __( 'Tekijänoikeudet &copy; %1$s %2$s.', 'esteem' ), date( 'Y' ), $site_link ).'<br/><a href="http://kahvitauko.fi/">Nettisivujen suunnittelu: Kahvitaukomarkkinointi</a> ja <a href="http://themegrill.com/themes/esteem" target="_blank" >ThemeGrill</a>';
	$esteem_footer_copyright = '<div class="copyright">'.$default_footer_value.'</div>';
	echo $esteem_footer_copyright;
}

//Lisätään child teemaan oma käännös
add_action( 'after_setup_theme', 'kaannos_suomeksi' );
function kaannos_suomeksi() {
    load_child_theme_textdomain( 'esteem', get_stylesheet_directory() . '/languages' );
}