<?php

use Skyline\Component\Config\CSSComponent;
use Skyline\Component\Config\IconComponent;
use Skyline\Component\Config\JavaScriptComponent;
use Skyline\Component\Config\JavaScriptPostLoadComponent;

return [
    'Application' => [
        'js' => new JavaScriptComponent('/Public/js/main.js'),
        'css' => new CSSComponent("/Public/css/main.css"),
        'icon' => new IconComponent("/Public/img/logo.png"),
		'@require' => [
			'jQuery'
		],
		"bootstrap-js" => new JavaScriptPostLoadComponent(
			'/Public/js/bootstrap.min.js'
		),
        "bootstrap-css" => new CSSComponent("/Public/css/bootstrap.min.css"),
    ],
    "jQuery" => [
        'js' => new JavaScriptComponent('/Public/js/jquery.js'),
    ]
];