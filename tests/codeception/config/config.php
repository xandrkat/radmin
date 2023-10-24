<?php
/**
 * Application configuration shared by all test types
 */
return [
    'id'            => 'radmin-admin-test',
    'basePath'      => dirname(dirname(__DIR__)), // @tests
    'vendorPath'    => dirname(dirname(dirname(__DIR__))) . '/vendor',
    'language'      => 'en-US',
    'aliases'       => [
        '@xandrkat/radmin' => dirname(dirname(dirname(__DIR__))),
    ],
    'modules'       => [
        'admin' => [
            'class' => 'xandrkat\radmin\Module',
        ]
    ],
    'controllerMap' => [
        'fixture' => [
            'class'     => 'yii\console\controllers\FixtureController',
            'namespace' => 'tests\codeception\fixtures',
        ],
    ],
    'components'    => [
        'db'          => require(__DIR__ . '/db.php'),
        'mailer'      => [
            'useFileTransport' => true,
        ],
        'urlManager'  => [
            'showScriptName' => true,
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager'
        ],
        'cache'       => [
            'class' => 'yii\caching\DummyCache',
        ],
        'i18n'        => [
            'translations' => [
                'radmin' => [
                    'class'          => 'yii\i18n\PhpMessageSource',
                    'sourceLanguage' => 'en',
                    'basePath'       => '@xandrkat/radmin/messages'
                ]
            ]
        ]
    ],
];
