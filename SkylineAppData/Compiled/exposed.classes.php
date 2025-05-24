<?php
return array (
  'purposes' => 
  array (
    'ACTIONCONTROLLER' => 
    array (
      '#' => 
      array (
        0 => 'Application\\Controller\\GeneralHTTPErrorController',
        1 => 'Application\\Controller\\LagerAPIActionController',
        2 => 'Application\\Controller\\MaterialAPIActionController',
        3 => 'Application\\Controller\\BestandAPIActionController',
        4 => 'Application\\Controller\\IndexController',
        5 => 'Skyline\\Application\\Controller\\AbstractActionController',
        6 => 'Skyline\\CMS\\Controller\\AbstractTemplateActionController',
        7 => 'Skyline\\API\\Controller\\AbstractAPIActionController',
      ),
    ),
    'PDO' => 
    array (
      '#' => 
      array (
        0 => 'Skyline\\PDO\\MySQL',
        1 => 'Skyline\\PDO\\AbstractPDO',
        2 => 'Skyline\\PDO\\SQLite',
      ),
    ),
    'ERRORHANDLER' => 
    array (
      '#' => 
      array (
        0 => 'Skyline\\Kernel\\Service\\Error\\HTMLDevelopmentErrorHandlerService',
        1 => 'Skyline\\Kernel\\Service\\Error\\AbstractErrorHandlerService',
        2 => 'Skyline\\Kernel\\Service\\Error\\LogErrorHandlerService',
        3 => 'Skyline\\Kernel\\Service\\Error\\DisplayErrorHandlerService',
        4 => 'Skyline\\Kernel\\Service\\Error\\HTMLProductionErrorHandlerService',
        5 => 'Skyline\\Kernel\\Service\\Error\\AbstractHTTPErrorHandlerService',
      ),
    ),
  ),
  'method_purposes' => 
  array (
  ),
  'classes' => 
  array (
  ),
  'methods' => 
  array (
  ),
);