<?php

defined( 'ABSPATH' ) or die;

add_action('admin_init', 'code_block_pro_register_settings');
add_action('rest_api_init', 'code_block_pro_register_settings');
function code_block_pro_register_settings() {
    register_setting('code_block_pro_settings', 'code_block_pro_settings', [
        'type' => 'object',
        'show_in_rest' => [
            'schema' => [
                'type' => 'object',
                'properties' => [
                    "version" => [ 'type' => ['string', 'number'] ],
                    'previousTheme' => [ 'type' => ['string', 'null']],
                    'previousFontFamily' => [ 'type' => ['string', 'null']],
                    'previousFontSize' => [ 'type' => ['string', 'null']],
                    'previousLineHeight' => [ 'type' => ['string', 'null']],
                ],
            ],
        ],
    ]);
}
