<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            //'dsn' => 'mysql:host=localhost;dbname=kdsv5',
            //'username' => 'root',
            //'password' => '',
            // develop by m.fuad
            'dsn' => 'mysql:host=192.168.0.20;dbname=kdsv4',
            'username' => 'pokok',
            'password' => 'pokok',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];
