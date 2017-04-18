<?php

/**
 * -----------------------------------------------------------------------------
 * Generated 2017-04-18T10:35:55+02:00
 *
 * DO NOT EDIT THIS FILE DIRECTLY
 *
 * @item      misc.do_page_reindex_check
 * @group     concrete
 * @namespace null
 * -----------------------------------------------------------------------------
 */
return [
    'version_installed' => '8.1.0',
    'version_db_installed' => '20170123000000',
    'cache' => [
        'blocks' => false,
        'assets' => false,
        'theme_css' => false,
        'overrides' => false,
        'pages' => '0',
        'full_page_lifetime' => 'default',
        'full_page_lifetime_value' => null,
    ],
    'theme' => [
        'compress_preprocessor_output' => false,
        'generate_less_sourcemap' => false,
    ],
    'seo' => [
        'redirect_to_canonical_url' => 0,
        'url_rewriting' => true,
    ],
    'misc' => [
        'do_page_reindex_check' => false,
    ],
    'user' => [
        'registration' => [
            'email_registration' => false,
            'type' => 'enabled',
            'captcha' => false,
            'enabled' => true,
            'validate_email' => false,
            'notification' => null,
            'notification_email' => false,
        ],
    ],
];
