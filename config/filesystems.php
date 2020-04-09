<?php

return [
    'default' => 'local',
    'disks' => [
        'local' => [
            'driver' => 'local',
            'root' => getcwd() . '/package/TestPackage'
        ]
    ],
];
