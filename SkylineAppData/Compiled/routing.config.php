<?php

return array (
  'URI' => 
  array (
    '/' => 
    array (
      'controller' => 'Application\\Controller\\IndexController',
      'method' => 'indexAction',
    ),
    '/submenu-1' => 
    array (
      'controller' => 'Application\\Controller\\SubmenuActionController',
      'method' => 'submenu1Action',
    ),
    '/submenu-2' => 
    array (
      'controller' => 'Application\\Controller\\SubmenuActionController',
      'method' => 'submenu2Action',
    ),
    '/submenu-3' => 
    array (
      'controller' => 'Application\\Controller\\SubmenuActionController',
      'method' => 'submenu3Action',
    ),
  ),
  'RCTYPE' => 
  array (
    '%^.*?/.*?$%i' => 
    array (
      'render' => 'html-head-render',
    ),
    '/^text\\/x?(html|htm)$/i' => 
    array (
      'render' => 'html-render',
    ),
  ),
  'RURI' => 
  array (
    '%^(/|index|main|overview)$%i' => 
    array (
      'controller' => 'Application\\Controller\\StaticActionController',
      'method' => 'homeAction',
    ),
  ),
);