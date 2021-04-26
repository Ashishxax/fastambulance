<?php

use BeyondCode\LaravelWebSockets\Dashboard\Http\Middleware\Authorize;

return [

     
    'dashboard' => [
        'port' => env('LARAVEL_WEBSOCKETS_PORT', 6001),
    ],

     
    'apps' => [
        [
            'id' => 'AshishId',//env('PUSHER_APP_ID'),
            'name' => 'Ashish',//env('APP_NAME'),
            'key' => 'ashishkey',//env('PUSHER_APP_KEY'),
            'secret' =>'AshishSecret',// env('PUSHER_APP_SECRET'),
            'path' => env('PUSHER_APP_PATH'),
            'capacity' => null,
            'enable_client_messages' => false,
            'enable_statistics' => true,
        ],
    ],

     
    'app_provider' => BeyondCode\LaravelWebSockets\Apps\ConfigAppProvider::class,

     
    'allowed_origins' => [
        //
    ],

     
    'max_request_size_in_kb' => 250,

     
    'path' => 'admin/websockets',

     
    'middleware' => [
        'web',
        Authorize::class,
    ],

    'statistics' => [
        /*
         * This model will be used to store the statistics of the WebSocketsServer.
         * The only requirement is that the model should extend
         * `WebSocketsStatisticsEntry` provided by this package.
         */
        'model' => \BeyondCode\LaravelWebSockets\Statistics\Models\WebSocketsStatisticsEntry::class,

         
        'logger' => BeyondCode\LaravelWebSockets\Statistics\Logger\HttpStatisticsLogger::class,

        /*
          Here you can specify the interval in seconds at which statistics should be logged.
         */
        'interval_in_seconds' => 60,

        /*
         * When the clean-command is executed, all recorded statistics older than
         * the number of days specified here will be deleted.
         */
        'delete_statistics_older_than_days' => 60,

        /*
          Use an DNS resolver to make the requests to the statistics logger
          default is to resolve everything to 127.0.0.1.
         */
        'perform_dns_lookup' => false,
    ],

    /*
      Define the optional SSL context for your WebSocket connections.
      You can see all available options at: http://php.net/manual/en/context.ssl.php
     */
    'ssl' => [
        /*
          Path to local certificate file on filesystem. It must be a PEM encoded file which
          contains your certificate and private key. It can optionally contain the
          certificate chain of issuers. The private key also may be contained
          in a separate file specified by local_pk.
         */
        'local_cert' => env('LARAVEL_WEBSOCKETS_SSL_LOCAL_CERT', null),

        /*
          Path to local private key file on filesystem in case of separate files for
          certificate (local_cert) and private key.
         */
        'local_pk' => env('LARAVEL_WEBSOCKETS_SSL_LOCAL_PK', null),

        /*
          Passphrase for your local_cert file.
         */
        'passphrase' => env('LARAVEL_WEBSOCKETS_SSL_PASSPHRASE', null),
    ],

    /*
      Channel Manager
      This class handles how channel persistence is handled.
      By default, persistence is stored in an array by the running webserver.
      The only requirement is that the class should implement
      `ChannelManager` interface provided by this package.
     */
    'channel_manager' => \BeyondCode\LaravelWebSockets\WebSockets\Channels\ChannelManagers\ArrayChannelManager::class,
];
