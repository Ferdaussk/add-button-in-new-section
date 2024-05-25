<?php

namespace ferdaussk01NamEelementorPlugiN;

use Elementor\Controls_Manager;

define("__ASS_PUBLIC__", plugin_dir_url(__FILE__) . "assets/public");
define("FERDAUSSK01_ASFSK_ASSETS_ADMIN_DIR_FILE", plugin_dir_url(__FILE__) . "assets/admin");

class ClassFERDAUSSK01ElementorP {

    private static $_instance = null;

    public static function instance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function get_name() {
        return 'bdt-threed-text';
    }

    public function sk_enqueue_scripts() {
        wp_enqueue_script('sk-ztext-fdf', __ASS_PUBLIC__ . '/js/for-3d-text/ep-scripts.js', ['jquery'], '2', true);
        wp_enqueue_script('sk-ztext-j44s', __ASS_PUBLIC__ . '/js/for-3d-text/ep-scripts.min.js', ['jquery'], '2', true);
        wp_enqueue_script('sk-ztext-js', __ASS_PUBLIC__ . '/js/for-3d-text/ztext.min.js', ['jquery'], '2', true);
    }

    public function ferdaussk01_admin_inline_js() { ?>
        <script type="text/javascript">
            var ElementPackLibreryData = {
                "libraryButton": "Elements Button",
                "modalRegions": {
                    "modalHeader": ".dialog-header",
                    "modalContent": ".dialog-message"
                },
                "license": {
                    "activated": true,
                    "link": "https://google.com"
                },
                "tabs": {
                    "bdt_elementpack_page": {
                        "title": "Ready Pages",
                        "data": [],
                        "settings": {
                            "show_title": true,
                            "show_keywords": true
                        }
                    },
                    "bdt_elementpack_header": {
                        "title": "Headers",
                        "data": [],
                        "settings": {
                            "show_title": false,
                            "show_keywords": true
                        }
                    },
                    "bdt_elementpack_footer": {
                        "title": "Footers",
                        "data": [],
                        "settings": {
                            "show_title": false,
                            "show_keywords": true
                        }
                    },
                    "bdt_elementpack_block": {
                        "title": "Blocks",
                        "data": [],
                        "settings": {
                            "show_title": false,
                            "show_keywords": true
                        }
                    },
                },
                "defaultTab": "bdt_elementpack_page",
                "new_demo_rang_date": "<?php echo date('Ymd', strtotime('-31 days')) ?>"
            };
        </script> <?php
    }
    public function ferdaussk01_print_views() {
        foreach (glob($this->dir . 'template-library/editor/views/editor/*.php') as $file) {
            $name = basename($file, '.php');
            // alert($name);
            ob_start();
            include $file;
            printf('<script type="text/html" id="view-bdt-elementpack-%1$s">%2$s</script>', $name, ob_get_clean());
        }
    }
    public function ferdaussk01_enqueue_scripts() {
        wp_enqueue_script(
            'ferdaussk01-template-library-editor-scripts',
            plugin_dir_url(__FILE__) . '/template-library/editor/assets/js/editor-template-library.min.js',
            array('jquery', 'underscore', 'backbone-marionette'),
            '1.0',
            true
        );
    }

    public function ferdaussk01_editor_styles() {
        $direction_suffix = is_rtl() ? '.rtl' : '';

        wp_enqueue_style(
            'bdt-template-library-editor-style',
            plugin_dir_url(__FILE__) . '/template-library/editor/assets/css/editor-template-library' . $direction_suffix . '.css',
            array(),
            '1.0'
        );
    }

    public function ferdaussk01_preview_styles() {

        $direction_suffix = is_rtl() ? '.rtl' : '';

        wp_enqueue_style(
            'bdt-template-library-preview-style',
            plugin_dir_url(__FILE__) . '/template-library/editor/assets/css/editor-template-preview' . $direction_suffix . '.css',
            array(),
            '1.0'
        );
        wp_enqueue_style('ferdaussk01-se',plugin_dir_url(__FILE__) . 'custom-style.css',null,'1.0','all');
    }

    public function __construct() {
        // add_action('elementor/preview/enqueue_scripts', [$this, 'sk_enqueue_scripts']);
        $this->dir = dirname(__FILE__) . '/';
        add_action('elementor/editor/before_enqueue_scripts', array($this, 'ferdaussk01_enqueue_scripts'), 1);

        add_action('elementor/editor/after_enqueue_styles', array($this, 'ferdaussk01_editor_styles'));
        add_action('elementor/preview/enqueue_styles', array($this, 'ferdaussk01_preview_styles'));

        add_action('elementor/editor/footer', array($this, 'ferdaussk01_admin_inline_js'));
        add_action('elementor/editor/footer', array($this, 'ferdaussk01_print_views'));
    }
}

// Instantiate Plugin Class
ClassFERDAUSSK01ElementorP::instance();
