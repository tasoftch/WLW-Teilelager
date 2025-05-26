<?php
/**
 *  == TASoft Config Compiler ==
 *  Target: TASoft\Config\Compiler\Target\FileTarget (/Users/thomas/Webseiten/WLW-Teilelager/SkylineAppData//Compiled/components.config.php)
 *  Compiled from:
 *	1.	/Users/thomas/Webseiten/WLW-Teilelager/vendor/skyline/component-skyline/components.cfg.php
 *	2.	/Users/thomas/Webseiten/WLW-Teilelager/vendor/skyline/component-api/components.cfg.php
 *	3.	/Users/thomas/Webseiten/WLW-Teilelager/vendor/skyline/component-bootstrap/components.cfg.php
 *	4.	/Users/thomas/Webseiten/WLW-Teilelager/SkylineAppData/Config/components.config.php
 */

return array (
  '#' => 
  array (
    '/public/skyline/skyline.min.js' => 'vendor/skyline/component-skyline/dist/skyline.min.js',
    '/public/skyline/skyline.min.css' => 'vendor/skyline/component-skyline/dist/skyline.min.css',
    '/public/skyline/skyline-api.min.js' => 'vendor/skyline/component-api/Components/js/skyline-api.min.js',
    '/public/skyline/skyline-api-loader.min.js' => 'vendor/skyline/component-api/Components/js/skyline-api.js.php',
    '/public/skyline/skyline-api.min.css' => 'vendor/skyline/component-api/Components/css/skyline-api.min.css',
    '/public/css/bootstrap.min.css' => 'vendor/skyline/component-bootstrap/bootstrap.min.css',
    '/public/js/bootstrap.bundle.min.js' => 'vendor/skyline/component-bootstrap/bootstrap.bundle.min.js',
  ),
  'Skyline' => 
  array (
    'js' => 
    array (
      'class' => 'Skyline\\HTML\\Head\\RemoteSourceScript',
      'arguments' => 
      array (
        0 => '/Public/Skyline/skyline.min.js',
        1 => 'application/javascript',
        2 => NULL,
        3 => NULL,
      ),
    ),
    'css' => 
    array (
      'class' => 'Skyline\\HTML\\Head\\LinkCSS',
      'arguments' => 
      array (
        0 => '/Public/Skyline/skyline.min.css',
        1 => 'all',
        2 => NULL,
        3 => NULL,
      ),
    ),
  ),
  '@' => 
  array (
    'API' => 
    array (
      0 => 'Skyline',
    ),
    'Bootstrap' => 
    array (
      0 => 'jQuery',
    ),
    'Application' => 
    array (
      0 => 'jQuery',
    ),
  ),
  'API' => 
  array (
    'js' => 
    array (
      'class' => 'Skyline\\HTML\\Head\\PostScript',
      'arguments' => 
      array (
        0 => '/Public/Skyline/skyline-api.min.js',
        1 => 'application/javascript',
        2 => NULL,
        3 => NULL,
      ),
    ),
    'js-loader' => 
    array (
      'class' => 'Skyline\\HTML\\Head\\PostScript',
      'arguments' => 
      array (
        0 => '/Public/Skyline/skyline-api-loader.min.js',
        1 => 'application/javascript',
        2 => NULL,
        3 => NULL,
      ),
    ),
    'css' => 
    array (
      'class' => 'Skyline\\HTML\\Head\\LinkCSS',
      'arguments' => 
      array (
        0 => '/Public/Skyline/skyline-api.min.css',
        1 => 'all',
        2 => NULL,
        3 => NULL,
      ),
    ),
    '@require' => 
    array (
      0 => 'Skyline',
    ),
  ),
  'Bootstrap' => 
  array (
    'css' => 
    array (
      'class' => 'Skyline\\HTML\\Head\\LinkCSS',
      'arguments' => 
      array (
        0 => '/Public/css/bootstrap.min.css',
        1 => 'all',
        2 => 'sha384-NDHC3A9/H0g3lRH7Yg8JROQfmlMc/bz4bx17rQH2F8ANdgJhkTtIa9mMRrr6hhZs',
        3 => 'anonymous',
      ),
    ),
    'js' => 
    array (
      'class' => 'Skyline\\HTML\\Head\\PostScript',
      'arguments' => 
      array (
        0 => '/Public/js/bootstrap.bundle.min.js',
        1 => 'application/javascript',
        2 => 'sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4',
        3 => 'anonymous',
      ),
    ),
    '@require' => 
    array (
      0 => 'jQuery',
    ),
  ),
  'Application' => 
  array (
    'js' => 
    array (
      'class' => 'Skyline\\HTML\\Head\\RemoteSourceScript',
      'arguments' => 
      array (
        0 => '/Public/js/main.js',
        1 => 'application/javascript',
        2 => NULL,
        3 => NULL,
      ),
    ),
    'css' => 
    array (
      'class' => 'Skyline\\HTML\\Head\\LinkCSS',
      'arguments' => 
      array (
        0 => '/Public/css/main.css',
        1 => 'all',
        2 => NULL,
        3 => NULL,
      ),
    ),
    'icon' => 
    array (
      'class' => 'Skyline\\HTML\\Head\\RemoteSourceLink',
      'arguments' => 
      array (
        0 => '/Public/img/logo.png',
        1 => 'icon shortcut',
        2 => 'image/png',
        3 => NULL,
        4 => NULL,
      ),
    ),
    '@require' => 
    array (
      0 => 'jQuery',
    ),
    'bootstrap-js' => 
    array (
      'class' => 'Skyline\\HTML\\Head\\PostScript',
      'arguments' => 
      array (
        0 => '/Public/js/bootstrap.min.js',
        1 => 'application/javascript',
        2 => NULL,
        3 => NULL,
      ),
    ),
    'bootstrap-css' => 
    array (
      'class' => 'Skyline\\HTML\\Head\\LinkCSS',
      'arguments' => 
      array (
        0 => '/Public/css/bootstrap.min.css',
        1 => 'all',
        2 => NULL,
        3 => NULL,
      ),
    ),
  ),
  'jQuery' => 
  array (
    'js' => 
    array (
      'class' => 'Skyline\\HTML\\Head\\RemoteSourceScript',
      'arguments' => 
      array (
        0 => '/Public/js/jquery.js',
        1 => 'application/javascript',
        2 => NULL,
        3 => NULL,
      ),
    ),
  ),
);