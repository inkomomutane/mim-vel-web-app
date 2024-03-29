<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been set up for each driver as an example of the required values.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
        ],
        'backup' => [
            'driver' => 'local',
            'root' => storage_path('backup'),
            'throw' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,
        ],
        'posts' => [
            'driver' => 'local',
            'root' => storage_path('app/public/posts'),
            'url' => env('APP_URL').'/storage/posts',
            'visibility' => 'public',
            'throw' => true,
        ],
        'hotels' => [
            'driver' => 'local',
            'root' => storage_path('app/public/hotels'),
            'url' => env('APP_URL').'/storage/hotels',
            'visibility' => 'public',
            'throw' => true,
        ],
        'hotels_metadata' => [
            'driver' => 'local',
            'root' => storage_path('app/public/hotels_metadata'),
            'url' => env('APP_URL').'/storage/hotels_metadata',
            'visibility' => 'public',
            'throw' => true,
        ],
        'attributes' => [
            'driver' => 'local',
            'root' => storage_path('app/public/attributes'),
            'url' => env('APP_URL').'/storage/attributes',
            'visibility' => 'public',
            'throw' => true,
        ],
        'banners' => [
            'driver' => 'local',
            'root' => storage_path('app/public/banners'),
            'url' => env('APP_URL').'/storage/banners',
            'visibility' => 'public',
            'throw' => true,
        ],
        'avatars' => [
            'driver' => 'local',
            'root' => storage_path('app/public/avatars'),
            'url' => env('APP_URL').'/storage/avatars',
            'visibility' => 'public',
            'throw' => false,
        ],
        'pages' => [
            'driver' => 'local',
            'root' => storage_path('app/public/pages'),
            'url' => env('APP_URL').'/storage/pages',
            'visibility' => 'public',
            'throw' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
        ],
        'google' => [
            'driver' => 'google',
            'clientId' => env('GOOGLE_DRIVE_CLIENT_ID'),
            'clientSecret' => env('GOOGLE_DRIVE_CLIENT_SECRET'),
            'refreshToken' => env('GOOGLE_DRIVE_REFRESH_TOKEN'),
            'folder' => env('GOOGLE_DRIVE_FOLDER'), // without folder is root of drive or team drive
            //'teamDriveId' => env('GOOGLE_DRIVE_TEAM_DRIVE_ID'),
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
