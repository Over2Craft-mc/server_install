<?php

$sererName = 'set server name here';
$discordToken = 'set discord token here';
$serverPort = 'server port here';
$serverType = 'paper';
$serverBuild = 'latest';

return [

    'server_os' => [
        'name' => $serverType . '-' .$serverBuild ,
        'type' => $serverType, // paper1.16.4|waterfall
        'build' => $serverBuild, // 'latest' or build number
        'override_with_file' => null
    ],

    'find' => [
        [
            'filename' => 'plugins/DiscordSRV/messages.yml',
            'stringToFind' => '/server_install_server_name/',
            'replaceWith' => $sererName
        ],
        [
            'filename' => 'plugins/DiscordSRV/config.yml',
            'stringToFind' => '/server_install_discord_srv_bot_token/',
            'replaceWith' => $sererName
        ],
        [
            'filename' => 'server.properties',
            'stringToFind' => '/server-port=25564/',
            'replaceWith' => $serverPort
        ]
    ],

    'fiesOwner' => 'pterodactyl:pterodactyl',
  
];
