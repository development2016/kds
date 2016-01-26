<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            //'dsn' => 'mysql:host=localhost;dbname=kdsv5',
            //'username' => 'root',
            //'password' => '',
            // develop by m.fuad
            'dsn' => 'mysql:host=localhost;dbname=kds_local',
            'username' => 'root',
            'password' => 'arel2004',
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
