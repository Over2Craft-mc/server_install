<?php

$config = include 'settings.php';

chdir(getcwd() . '/..');

if (isset($config['server_os']['override_with_file']) && isset($config['server_os']['override_with_file']) !== null) {
    copy($config['server_os']['override_with_file'], $config['server_os']['name']);
} else {

    switch ($config['server_os']['type']) {
        case 'paper1.16.4':
            copy(sprintf('https://papermc.io/api/v1/paper/1.16.4/%s/download', $config['server_os']['build']), getcwd() . '/' . $config['server_os']['name']);
            break;
        case 'waterfall':
            copy(sprintf('https://papermc.io/api/v1/waterfall/1.16/%s/download', $config['server_os']['build']), getcwd() . '/' . $config['server_os']['name']);
            break;
    }

}

foreach ($config['find'] as $findItem) {
    $file = file_get_contents(getcwd() . '/' . $findItem['filename']);
    $new_file = preg_replace($findItem['stringToFind'], $findItem['replaceWith'], $file);
    file_put_contents(getcwd() . '/' . $findItem['filename'], $new_file);
}

system("/bin/chown -R . " . $config['fiesOwner']. " " . getcwd() . '/*');

