<?php
/**
 *  == TASoft Config Compiler ==
 *  Target: TASoft\Config\Compiler\Target\FileTarget (/Users/thomas/Webseiten/wlw-lager/SkylineAppData//Compiled/main.config.php)
 *  Compiled from:
 *	1.	/Users/thomas/Webseiten/wlw-lager/vendor/skyline/kernel/lib/kernel.config.php
 *	2.	/Users/thomas/Webseiten/wlw-lager/vendor/skyline/exposed-symbols/exposed-symbols.config.php
 *	3.	/Users/thomas/Webseiten/wlw-lager/vendor/skyline/render/render.config.php
 *	4.	/Users/thomas/Webseiten/wlw-lager/vendor/skyline/html-render/html.render.config.php
 *	5.	/Users/thomas/Webseiten/wlw-lager/SkylineAppData/Config/default.config.php
 */

return array (
  'locations' => 
  array (
    'kernel-lib' => 'vendor/skyline/kernel/lib/',
    'C' => '$(/)/Compiled',
    'L' => '$(/)/Logs',
    '/' => '$(R)/SkylineAppData',
    'R' => NULL,
    'U' => '$(C)',
  ),
  'loaders' => 
  array (
    'requests' => 'Skyline\\Kernel\\Loader\\RequestLoader',
    'errors' => 'Skyline\\Kernel\\Loader\\StaticErrorHandler',
    'modules' => NULL,
    'services' => 'Skyline\\Kernel\\Loader\\ServiceManagerLoader',
  ),
  'services' => 
  array (
    'dependencyManager' => 
    array (
      'container' => 'Skyline\\Kernel\\Service\\DI\\DependencyInjectionContainer',
    ),
    'eventManager' => 
    array (
      'container' => 'Skyline\\Kernel\\Service\\Event\\EventManagerContainer',
      'configuration' => 
      array (
        'pluginFile' => '$(C)/plugins.php',
      ),
    ),
    'errorController' => 
    array (
      'class' => 'Skyline\\Kernel\\Service\\Error\\PriorityChainErrorHandlerService',
      'arguments' => 
      array (
        'logHandler' => 
        array (
          0 => 1,
          1 => '$logErrorHandler',
        ),
        'displayHandler' => NULL,
        'developmentHandler' => NULL,
        'productionErrorHandler' => 
        array (
          0 => 10,
          1 => '$productionErrorHandler',
        ),
      ),
    ),
    'displayErrorHandler' => 
    array (
      'class' => 'Skyline\\Kernel\\Service\\Error\\DisplayErrorHandlerService',
    ),
    'logErrorHandler' => 
    array (
      'class' => 'Skyline\\Kernel\\Service\\Error\\LogErrorHandlerService',
      'arguments' => 
      array (
        'file' => '$(L)/',
        'env' => '%Logger.Env%',
      ),
    ),
    'developmentErrorHandler' => 
    array (
      'class' => 'Skyline\\Kernel\\Service\\Error\\HTMLDevelopmentErrorHandlerService',
    ),
    'productionErrorHandler' => 
    array (
      'class' => 'Skyline\\Kernel\\Service\\Error\\HTMLProductionErrorHandlerService',
    ),
    'exposedSymbolsManager' => 
    array (
      'class' => 'Skyline\\Expose\\ExposedSymbolsManager',
      'arguments' => 
      array (
        'exposedSymbolsFile' => '$(C)/exposed.classes.php',
      ),
    ),
    'renderController' => 
    array (
      'class' => 'Skyline\\HTMLRender\\HTMLRenderController',
      'arguments' => 
      array (
        'renderFile' => '$(C)/render.config.php',
        'componentFile' => '$(C)/components.config.php',
        'publicURI' => '%component.public-uri%',
        'resourceDir' => '%component.resource-dir%',
      ),
    ),
    'renderContext' => 
    array (
      'class' => 'Skyline\\Render\\Context\\DefaultRenderContext',
      'arguments' => 
      array (
        'contextFile' => '$(C)/context.config.php',
      ),
    ),
    'templateController' => 
    array (
      'class' => 'Skyline\\Render\\Service\\CompiledTemplateController',
      'arguments' => 
      array (
        'templateFile' => '$(C)/templates.config.php',
      ),
    ),
    'mainNavigation' => 
    array (
      'class' => 'Skyline\\Navigation\\NavigationService',
      'arguments' => 
      array (
        'navFiles' => 
        array (
          0 => '$(/)/top-navigation.xml',
        ),
      ),
    ),
  ),
);