<?php

$base = dirname(__DIR__, 2);
(new \Beebmx\KirbyEnv($base))->load();

return [
    //Matomo
    'sylvainjule.matomo.url' => 'https://track.juangomez.co/',
    'sylvainjule.matomo.id' => '4', // id 4 -- stationofcommons.org   id 5 -- staging.stationofcommons.org
    'sylvainjule.matomo.token' => 'ed0cd953cbddaa5da20a2b18e99f1fd6',
    'debug' => env('KIRBY_DEBUG', false),
    //Panel Install enable
    'panel' => [
        'install' => env('KIRBY_PANEL_INSTALL', false),
        'slug' => env('KIRBY_PANEL_SLUG', 'panel')
    ],
    //Routing
    'routes' => require_once 'routes.php',
    //cache
    'cache' => [
        'pages' => [
            'active' => env('KIRBY_CACHE', false),
            'ignore' => function ($page) {
                $options = $page->blueprint()->options();
                return isset($options['cache']) ? !$options['cache'] : false;
            }
        ]
    ],
    //Thumbs Size
    'thumbs' => [
        'quality' => '80',
        'srcsets' => [
            'default' => [360, 720]
        ]
    ],
    //Markdown extra enable
    'markdown' => [
        'extra' => true
    ],
    //Autopublish
//    'fieldName' => 'autopublish',
//    'bvdputte.kirbyAutopublish.poormanscron' => true,
    //Smartypants corrections
    'smartypants' => true


];
