<?php

return [
    /**
     * default cache driver
     */
    'default' => 'file',

    /**
     * cache life time
     */
    'life_time' => 1800,

    /**
     * available cache drivers
     */
    'drivers' => [
        'file' => [
            'path' => __DIR__ . '/../cache/',
        ],
        'memcached' => [
            'dsn' => [
                'memcached://localhost:11211'
            ]
        ],
        'redis' => [
            'dsn' => 'redis://localhost:6379',
        ]
    ]
];
