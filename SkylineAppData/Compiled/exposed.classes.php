<?php
return array (
  'purposes' => 
  array (
    'ACTIONCONTROLLER' => 
    array (
      '#' => 
      array (
        0 => 'Application\\Controller\\GeneralHTTPErrorController',
        1 => 'Application\\Controller\\IndexController',
        2 => 'Skyline\\Application\\Controller\\AbstractActionController',
        3 => 'Skyline\\CMS\\Controller\\AbstractTemplateActionController',
        4 => 'Skyline\\API\\Controller\\AbstractAPIActionController',
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