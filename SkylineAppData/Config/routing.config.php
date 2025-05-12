<?php

use Application\Controller\StaticActionController;
use Application\Controller\SubmenuActionController;
use Skyline\Application\Plugin\Router\ApplicationRouterPlugin;

return [
	ApplicationRouterPlugin::URI_ROUTE => [
		'/submenu-1' => [
			ApplicationRouterPlugin::ROUTED_CONTROLLER_KEY => SubmenuActionController::class,
			ApplicationRouterPlugin::ROUTED_METHOD_KEY => "submenu1Action"
		],
		'/submenu-2' => [
			ApplicationRouterPlugin::ROUTED_CONTROLLER_KEY => SubmenuActionController::class,
			ApplicationRouterPlugin::ROUTED_METHOD_KEY => "submenu2Action"
		],
		'/submenu-3' => [
			ApplicationRouterPlugin::ROUTED_CONTROLLER_KEY => SubmenuActionController::class,
			ApplicationRouterPlugin::ROUTED_METHOD_KEY => "submenu3Action"
		]
	],
    ApplicationRouterPlugin::REGEX_URI_ROUTE => [
        "%^(/|index|main|overview)$%i" => [
            ApplicationRouterPlugin::ROUTED_CONTROLLER_KEY => StaticActionController::class,
            ApplicationRouterPlugin::ROUTED_METHOD_KEY => "homeAction"
        ]
    ]
];