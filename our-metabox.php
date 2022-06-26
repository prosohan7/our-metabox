<?php
/**
 * Plugin Name:       Our Metabox
 * Plugin URI:        https://example.com/plugins/our-metabox/
 * Description:       This is practise plugin.
 * Version:           1.0
 * Author:            Sohan
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       our-metabox
 * Domain Path:       /languages
 */

 class OurMetabox{
    public function __construct() {
        add_action( 'plugins_loaded', array( $this, 'omb_load_textdomain' ) );
        // add_action( 'plugins_loaded', 'pqrc_load_textdomain');
        add_action( 'admin_menu', array( $this, 'omb_add_metabox' ) );
    }

    function omb_add_metabox() {
        add_meta_box(
            'omb_post_location',
            __( 'Location Info', 'our-metabox' ),
            array( $this, 'omb_display_post_location' ),
            'post',
            'side',
            'high'
        );
    }

    function omb_display_post_location() {
        $label = __( 'Location ', 'our-metabox' );
        $metabox_html = <<<EOD
            <p>
                <label for="omb_location">{$label}</label>
                <input type="text" name="omb_location" id="omb_location" />
            </p>
        EOD;

        echo $metabox_html;
    }
    

    function omb_load_textdomain(){
        load_plugin_textdomain( 'posts-to-qrcode', false, dirname(__FILE__) . "/languages" );
    }
    
 }

 new OurMetabox();