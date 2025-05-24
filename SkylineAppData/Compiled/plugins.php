<?php
/**
 *  == TASoft Config Compiler ==
 *  Target: TASoft\Config\Compiler\Target\FileTarget (/Users/thomas/Library/CloudStorage/OneDrive-Persönlich/TASoft Sources/WLW-Teilelager/SkylineAppData//Compiled/plugins.php)
 *  Compiled from:
 *	1.	/Users/thomas/Library/CloudStorage/OneDrive-Persönlich/TASoft Sources/WLW-Teilelager/vendor/skyline/core-application/application.plugins.php
 *	2.	/Users/thomas/Library/CloudStorage/OneDrive-Persönlich/TASoft Sources/WLW-Teilelager/vendor/skyline/direct-components/direct-components.plugins.php
 *	3.	/Users/thomas/Library/CloudStorage/OneDrive-Persönlich/TASoft Sources/WLW-Teilelager/SkylineAppData/Config/plugins.php
 */

return array (
  'routing' => 
  array (
    'section' => 'route',
    'factory' => 'Skyline\\Application\\Plugin\\Router\\ApplicationRouterPlugin',
    'arguments' => 
    array (
      0 => '$(C)/routing.config.php',
    ),
  ),
  'controller' => 
  array (
    'section' => 'control',
    'event' => 'skyline.action.create',
    'class' => 'Skyline\\Application\\Plugin\\ActionController\\ActionControllerCreationPlugin',
    'method' => 'makeActionController',
    'priority' => 100,
  ),
  'action' => 
  array (
    'section' => 'control',
    'event' => 'skyline.action.perform',
    'class' => 'Skyline\\Application\\Plugin\\ActionController\\PerformActionPlugin',
    'method' => 'performAction',
    'priority' => 100,
  ),
  'render' => 
  array (
    'section' => 'render',
    'event' => 'skyline.render',
    'class' => 'Skyline\\Application\\Plugin\\Render\\RenderResponsePlugin',
    'method' => 'renderResponse',
    'priority' => 100,
  ),
  'templates' => 
  array (
    'event' => 'skyline.render',
    'section' => 'render',
    'class' => 'Skyline\\Application\\Plugin\\Template\\TemplateResolverPlugin',
    'method' => 'resolveTemplates',
    'priority' => 90,
  ),
  'direct-component' => 
  array (
    'section' => 'bootstrap',
    'event' => 'skyline.bootstrap',
    'class' => 'Skyline\\Component\\Plugin\\InitializeDeliveryPlugin',
    'arguments' => 
    array (
      'resourceRoot' => '%component.public-uri%',
    ),
    'method' => 'initializeResourceDelivery',
    'priority' => 98,
  ),
  'dc-cache' => 
  array (
    'event' => 'skyline.direct-component.deliver',
    'class' => 'Skyline\\Component\\Plugin\\CacheControlPlugin',
    'listeners' => 
    array (
      0 => 
      array (
        'method' => 'checkIfNotModified',
        'priority' => 100,
      ),
    ),
  ),
  'dc-deliver' => 
  array (
    'event' => 'skyline.direct-component.deliver',
    'class' => 'Skyline\\Component\\Plugin\\DeliverResourcePlugin',
    'arguments' => 
    array (
      'resourceDir' => '%component.resource-dir%',
    ),
    'listeners' => 
    array (
      0 => 
      array (
        'method' => 'makeDeliverResponse',
        'priority' => 50,
      ),
    ),
  ),
  'dc-run-php' => 
  array (
    'event' => 'skyline.direct-component.deliver',
    'class' => 'Skyline\\Component\\Plugin\\DeliverPHPScriptPlugin',
    'method' => 'deliverPHPIfNeeded',
    'priority' => 90,
  ),
);