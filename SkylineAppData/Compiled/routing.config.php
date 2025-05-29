<?php

return array (
  'URI' => 
  array (
    '/api/v1/lager-list' => 
    array (
      'controller' => 'Application\\Controller\\LagerAPIActionController',
      'method' => 'listLagerAction',
    ),
    '/api/v1/lager-add' => 
    array (
      'controller' => 'Application\\Controller\\LagerAPIActionController',
      'method' => 'addLagerAction',
    ),
    '/api/v1/lager-change' => 
    array (
      'controller' => 'Application\\Controller\\LagerAPIActionController',
      'method' => 'changeLagerAction',
    ),
    '/api/v1/lager-delete' => 
    array (
      'controller' => 'Application\\Controller\\LagerAPIActionController',
      'method' => 'deleteLagerAction',
    ),
    '/api/v1/my-api-action' => 
    array (
      'controller' => 'Application\\Controller\\MaterialAPIActionController',
      'method' => 'myAPIAction',
    ),
    '/api/v1/material-list' => 
    array (
      'controller' => 'Application\\Controller\\MaterialAPIActionController',
      'method' => 'listMaterialAction',
    ),
    '/api/v1/material-fetch' => 
    array (
      'controller' => 'Application\\Controller\\MaterialAPIActionController',
      'method' => 'fetchMaterialAction',
    ),
    '/api/v1/material-keywords-list' => 
    array (
      'controller' => 'Application\\Controller\\MaterialAPIActionController',
      'method' => 'keyWordsListAction',
    ),
    '/api/v1/material-keyword-clear' => 
    array (
      'controller' => 'Application\\Controller\\MaterialAPIActionController',
      'method' => 'clearKeywordsAction',
    ),
    '/api/v1/material-keyword-add' => 
    array (
      'controller' => 'Application\\Controller\\MaterialAPIActionController',
      'method' => 'addKeywordAction',
    ),
    '/api/v1/material-change' => 
    array (
      'controller' => 'Application\\Controller\\MaterialAPIActionController',
      'method' => 'materialChangeAction',
    ),
    '/api/v1/material-delete' => 
    array (
      'controller' => 'Application\\Controller\\MaterialAPIActionController',
      'method' => 'deleteMaterialAction',
    ),
    '/api/v1/material-add' => 
    array (
      'controller' => 'Application\\Controller\\MaterialAPIActionController',
      'method' => 'materialAddAction',
    ),
    '/api/v1/bestand-buchen' => 
    array (
      'controller' => 'Application\\Controller\\BestandAPIActionController',
      'method' => 'buchenAction',
    ),
    '/' => 
    array (
      'controller' => 'Application\\Controller\\IndexController',
      'method' => 'indexAction',
    ),
    '/test-api' => 
    array (
      'controller' => 'Application\\Controller\\IndexController',
      'method' => 'testApiAction',
    ),
    '/lagerorte' => 
    array (
      'controller' => 'Application\\Controller\\IndexController',
      'method' => 'lagerorteAction',
    ),
    '/bestand' => 
    array (
      'controller' => 'Application\\Controller\\IndexController',
      'method' => 'bestandAction',
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