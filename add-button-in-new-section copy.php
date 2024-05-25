<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
// Enqueue custom scripts and styles
function custom_elementor_section_button_enqueue_scripts() {
    // Enqueue JavaScript
    wp_enqueue_script( 'custom-elementor-section-button', plugin_dir_url( __FILE__ ) . 'custom-elementor-section-button.js', array( 'jquery' ), '1.0', true );
}
add_action( 'elementor/editor/after_enqueue_scripts', 'custom_elementor_section_button_enqueue_scripts' );

// Add button to Elementor panel
function custom_elementor_add_section_button( $elementor_panel ) {
    // Check if Elementor is active
    if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
        ?>
        <script>
            jQuery(document).ready(function($){
                // Create a new button
                var customSectionButton = '<div class="elementor-panel-footer-widget"> \
                                                <button id="custom-section-button" class="elementor-button elementor-button-success"> \
                                                    Add Custom Section \
                                                </button> \
                                            </div>';

                // Append the button to the Elementor panel footer
                $('.elementor-controls-area').append(customSectionButton);

                // Handle button click event
                $(document).on('click', '#custom-section-button', function() {
                    // Trigger the Elementor 'section:add' event to add a new section
                    Elementor.getPanelView().getPanelContent().view.trigger('section:add');
                });
            });
        </script>
        <?php
    }
}
add_action( 'elementor/editor/after_panel', 'custom_elementor_add_section_button' );

class AnewClass{
    function __construct(){
        add_action( 'elementor/editor/before_enqueue_scripts', array($this, 'sk_abins_enqueue_scripts'), 1 );
    }
    public function sk_abins_enqueue_scripts(){
        //array('jquery', 'underscore', 'backbone-marionette')
        wp_enqueue_script( 'sk_abins-template-scripts',plugins_url(__FILE__) . 'assets/template-library/editor/assets/js/editor-template-library.min.js',array('jquery'),'1.0',true);

        //wp_enqueue_style( 'sk_abins-template-scripts',plugins_url(__FILE__) . 'assets/template-library/editor/assets/js/editor-template-library.min.js',null,'1.0','all');
    }
}
new AnewClass();