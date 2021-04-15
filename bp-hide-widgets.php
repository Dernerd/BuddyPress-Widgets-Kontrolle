<?php

/*

Plugin Name: BuddyPress Hide Widgets

Version: 1.0.7

Plugin URI: http://n3rds.work

Description: Fügt in den BuddyPress Einstellungen die Möglichkeit hinzu, auszuwählen welche Buddypress-Widgets nur für die Hauptseite verfügbar sein sollen.

Author: DerN3rd (WMS N@W)

Author URI: https://n3rds.work

Network: true

Textdomain: bp_hide_widgets




Copyright 2014-2021 WMS N@W


This program is free software; you can redistribute it and/or modify

it under the terms of the GNU General Public License (Version 2 - GPLv2) as published by

the Free Software Foundation.



This program is distributed in the hope that it will be useful,

but WITHOUT ANY WARRANTY; without even the implied warranty of

MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the

GNU General Public License for more details.



You should have received a copy of the GNU General Public License

along with this program; if not, write to the Free Software

Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/


require 'psource-plugin-update/plugin-update-checker.php';
$MyUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://n3rds.work//wp-update-server/?action=get_metadata&slug=bp-hide-widgets', 
	__FILE__, 
	'bp-hide-widgets' 
);


//------------------------------------------------------------------------//



//---Config---------------------------------------------------------------//



//------------------------------------------------------------------------//





//------------------------------------------------------------------------//



//---Hook-----------------------------------------------------------------//



//------------------------------------------------------------------------//



add_action( 'plugins_loaded', 'bp_hide_widgets_localization' );

add_action( 'bp_register_admin_settings', 'bp_hide_widgets_register_settings' );

add_action( 'bp_register_widgets', 'bp_hide_widgets_unregister', 20 );



//------------------------------------------------------------------------//



//---Functions------------------------------------------------------------//



//------------------------------------------------------------------------//



function bp_hide_widgets_localization() {

  // Laden Sie die Lokalisierungsdatei, wenn WordPress in einer anderen Sprache verwendet wird

	// Place it in this plugin's "languages" folder and name it "bp_hide_widgets-[value in wp-config].mo"

	load_plugin_textdomain( 'bp_hide_widgets', FALSE, '/bp-hide-widgets/languages' );

}



function bp_hide_widgets_unregister() {



  //ignore main site

  if (is_main_site())

    return;



  if ( bp_get_option( 'BP_Blogs_Recent_Posts_Widget', '0' ) )

    //add_action('widgets_init', create_function('', 'return unregister_widget("BP_Blogs_Recent_Posts_Widget");'), 21 ); //run after bp
	add_action('widgets_init', function() {return unregister_widget("BP_Blogs_Recent_Posts_Widget");}, 21 );



	if ( bp_get_option( 'BP_Groups_Widget', '0' ) )

    //add_action('widgets_init', create_function('', 'return unregister_widget("BP_Groups_Widget");'), 21 ); //run after bp
	add_action('widgets_init', function() {return unregister_widget("BP_Groups_Widget");}, 21 );



	if ( bp_get_option( 'BP_Core_Members_Widget', '0' ) )

    //add_action('widgets_init', create_function('', 'return unregister_widget("BP_Core_Members_Widget");'), 21 ); //run after bp
	add_action('widgets_init', function() {return unregister_widget("BP_Core_Members_Widget");}, 21 );



	if ( bp_get_option( 'BP_Core_Whos_Online_Widget', '0' ) )

    //add_action('widgets_init', create_function('', 'return unregister_widget("BP_Core_Whos_Online_Widget");'), 21 ); //run after bp
	add_action('widgets_init', function() {return unregister_widget("BP_Core_Whos_Online_Widget");}, 21 );



	if ( bp_get_option( 'BP_Core_Recently_Active_Widget', '0' ) )

    //add_action('widgets_init', create_function('', 'return unregister_widget("BP_Core_Recently_Active_Widget");'), 21 ); //run after bp
	add_action('widgets_init', function() {return unregister_widget("BP_Core_Recently_Active_Widget");}, 21 );



	if ( bp_get_option( 'BP_Core_Friends_Widget', '0' ) )

    //add_action('widgets_init', create_function('', 'return unregister_widget("BP_Core_Friends_Widget");'), 21 ); //run after bp
	add_action('widgets_init', function() {return unregister_widget("BP_Core_Friends_Widget");}, 21 );



	if ( bp_get_option( 'BP_Core_Login_Widget', '0' ) )

    //add_action('widgets_init', create_function('', 'return unregister_widget("BP_Core_Login_Widget");'), 21 ); //run after bp
	add_action('widgets_init', function() {return unregister_widget("BP_Core_Login_Widget");}, 21 );



	if ( bp_get_option( 'BP_Messages_Sitewide_Notices_Widget', '0' ) )

    //add_action('widgets_init', create_function('', 'return unregister_widget("BP_Messages_Sitewide_Notices_Widget");'), 21 ); //run after bp
	add_action('widgets_init', function() {return unregister_widget("BP_Messages_Sitewide_Notices_Widget");}, 21 );

}



//------------------------------------------------------------------------//



//---Output Functions-----------------------------------------------------//



//------------------------------------------------------------------------//



function bp_hide_widgets_register_settings() {

	// Add the main section

	add_settings_section( 'bp_hide_widgets', __( 'Widgets ausblenden', 'bp_hide_widgets' ), 'bp_hide_widgets_admin_section', 'buddypress' );

	add_settings_field( 'BP_Blogs_Recent_Posts_Widget', __( 'Aktuelle netzwerkweite Beiträge', 'bp_hide_widgets' ), 'bp_hide_widgets_admin1', 'buddypress', 'bp_hide_widgets' );

	add_settings_field( 'BP_Groups_Widget', __( 'Gruppen', 'bp_hide_widgets' ), 'bp_hide_widgets_admin2', 'buddypress', 'bp_hide_widgets' );

	add_settings_field( 'BP_Core_Members_Widget', __( 'Mitglieder', 'bp_hide_widgets' ), 'bp_hide_widgets_admin3', 'buddypress', 'bp_hide_widgets' );

	add_settings_field( 'BP_Core_Whos_Online_Widget', __( "Wer ist Online-Avatare?", 'bp_hide_widgets' ), 'bp_hide_widgets_admin4', 'buddypress', 'bp_hide_widgets' );

	add_settings_field( 'BP_Core_Recently_Active_Widget', __( 'Kürzlich aktive Mitglieder-Avatare', 'bp_hide_widgets' ), 'bp_hide_widgets_admin5', 'buddypress', 'bp_hide_widgets' );

	add_settings_field( 'BP_Core_Friends_Widget', __( 'Freunde', 'bp_hide_widgets' ), 'bp_hide_widgets_admin6', 'buddypress', 'bp_hide_widgets' );

	add_settings_field( 'BP_Core_Login_Widget', __( 'Login', 'bp_hide_widgets' ), 'bp_hide_widgets_admin7', 'buddypress', 'bp_hide_widgets' );

	add_settings_field( 'BP_Messages_Sitewide_Notices_Widget', __( 'Seitenweite-Hinweise', 'bp_hide_widgets' ), 'bp_hide_widgets_admin8', 'buddypress', 'bp_hide_widgets' );



	register_setting( 'buddypress', 'BP_Blogs_Recent_Posts_Widget', 'intval');

	register_setting( 'buddypress', 'BP_Groups_Widget', 'intval');

	register_setting( 'buddypress', 'BP_Core_Members_Widget', 'intval');

	register_setting( 'buddypress', 'BP_Core_Whos_Online_Widget', 'intval');

	register_setting( 'buddypress', 'BP_Core_Recently_Active_Widget', 'intval');

	register_setting( 'buddypress', 'BP_Core_Friends_Widget', 'intval');

	register_setting( 'buddypress', 'BP_Core_Login_Widget', 'intval');

	register_setting( 'buddypress', 'BP_Messages_Sitewide_Notices_Widget', 'intval');

}



function bp_hide_widgets_admin_section() {

	?><span class="description"><?php _e( 'Wähle aus, welche BuddyPress-Widgets nur für die Hauptseite verfügbar sein sollen.', 'bp_hide_widgets' ) ?></span><?php

}



function bp_hide_widgets_admin1() {

  ?>

	<label><input type="radio" name="BP_Blogs_Recent_Posts_Widget"<?php checked( bp_get_option( 'BP_Blogs_Recent_Posts_Widget', '0' ) ); ?>value="1" /> <?php _e( 'Hauptseite', 'bp_hide_widgets' ) ?></label> &nbsp;

	<label><input type="radio" name="BP_Blogs_Recent_Posts_Widget"<?php checked( !bp_get_option( 'BP_Blogs_Recent_Posts_Widget', '0' ) ); ?>value="0" /> <?php _e( 'Alle', 'bp_hide_widgets' ) ?></label>

  <?php

}



function bp_hide_widgets_admin2() {

  ?>

	<label><input type="radio" name="BP_Groups_Widget"<?php checked( bp_get_option( 'BP_Groups_Widget', '0' ) ); ?>value="1" /> <?php _e( 'Hauptseite', 'bp_hide_widgets' ) ?></label> &nbsp;

	<label><input type="radio" name="BP_Groups_Widget"<?php checked( !bp_get_option( 'BP_Groups_Widget', '0' ) ); ?>value="0" /> <?php _e( 'Alle', 'bp_hide_widgets' ) ?></label>

  <?php

}



function bp_hide_widgets_admin3() {

  ?>

	<label><input type="radio" name="BP_Core_Members_Widget"<?php checked( bp_get_option( 'BP_Core_Members_Widget', '0' ) ); ?>value="1" /> <?php _e( 'Hauptseite', 'bp_hide_widgets' ) ?></label> &nbsp;

	<label><input type="radio" name="BP_Core_Members_Widget"<?php checked( !bp_get_option( 'BP_Core_Members_Widget', '0' ) ); ?>value="0" /> <?php _e( 'Alle', 'bp_hide_widgets' ) ?></label>

  <?php

}



function bp_hide_widgets_admin4() {

  ?>

	<label><input type="radio" name="BP_Core_Whos_Online_Widget"<?php checked( bp_get_option( 'BP_Core_Whos_Online_Widget', '0' ) ); ?>value="1" /> <?php _e( 'Hauptseite', 'bp_hide_widgets' ) ?></label> &nbsp;

	<label><input type="radio" name="BP_Core_Whos_Online_Widget"<?php checked( !bp_get_option( 'BP_Core_Whos_Online_Widget', '0' ) ); ?>value="0" /> <?php _e( 'Alle', 'bp_hide_widgets' ) ?></label>

  <?php

}



function bp_hide_widgets_admin5() {

  ?>

	<input type="radio" name="BP_Core_Recently_Active_Widget"<?php checked( bp_get_option( 'BP_Core_Recently_Active_Widget', '0' ) ); ?>value="1" /> <?php _e( 'Hauptseite', 'bp_hide_widgets' ) ?></label> &nbsp;

	<input type="radio" name="BP_Core_Recently_Active_Widget"<?php checked( !bp_get_option( 'BP_Core_Recently_Active_Widget', '0' ) ); ?>value="0" /> <?php _e( 'Alle', 'bp_hide_widgets' ) ?></label>

  <?php

}



function bp_hide_widgets_admin6() {

  ?>

	<input type="radio" name="BP_Core_Friends_Widget"<?php checked( bp_get_option( 'BP_Core_Friends_Widget', '0' ) ); ?>value="1" /> <?php _e( 'Hauptseite', 'bp_hide_widgets' ) ?></label> &nbsp;

	<input type="radio" name="BP_Core_Friends_Widget"<?php checked( !bp_get_option( 'BP_Core_Friends_Widget', '0' ) ); ?>value="0" /> <?php _e( 'Alle', 'bp_hide_widgets' ) ?></label>

  <?php

}



function bp_hide_widgets_admin7() {

  ?>

	<input type="radio" name="BP_Core_Login_Widget"<?php checked( bp_get_option( 'BP_Core_Login_Widget', '0' ) ); ?>value="1" /> <?php _e( 'Hauptseite', 'bp_hide_widgets' ) ?></label> &nbsp;

	<input type="radio" name="BP_Core_Login_Widget"<?php checked( !bp_get_option( 'BP_Core_Login_Widget', '0' ) ); ?>value="0" /> <?php _e( 'Alle', 'bp_hide_widgets' ) ?></label>

  <?php

}



function bp_hide_widgets_admin8() {

  ?>

	<input type="radio" name="BP_Messages_Sitewide_Notices_Widget"<?php checked( bp_get_option( 'BP_Messages_Sitewide_Notices_Widget', '0' ) ); ?>value="1" /> <?php _e( 'Hauptseite', 'bp_hide_widgets' ) ?></label> &nbsp;

	<input type="radio" name="BP_Messages_Sitewide_Notices_Widget"<?php checked( !bp_get_option( 'BP_Messages_Sitewide_Notices_Widget', '0' ) ); ?>value="0" /> <?php _e( 'Alle', 'bp_hide_widgets' ) ?></label>

  <?php

}



//------------------------------------------------------------------------//



//---Support Functions----------------------------------------------------//



//------------------------------------------------------------------------//



