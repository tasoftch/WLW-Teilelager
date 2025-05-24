<?php
/**
 *  == TASoft Config Compiler ==
 *  Target: TASoft\Config\Compiler\Target\FileTarget (/Users/thomas/Library/CloudStorage/OneDrive-Persönlich/TASoft Sources/WLW-Teilelager/SkylineAppData//Compiled/render.config.php)
 *  Compiled from:
 *	1.	/Users/thomas/Library/CloudStorage/OneDrive-Persönlich/TASoft Sources/WLW-Teilelager/vendor/skyline/render/render.cfg.php
 *	2.	/Users/thomas/Library/CloudStorage/OneDrive-Persönlich/TASoft Sources/WLW-Teilelager/vendor/skyline/html-render/render.cfg.php
 *	3.	/Users/thomas/Library/CloudStorage/OneDrive-Persönlich/TASoft Sources/WLW-Teilelager/vendor/skyline/api/render.cfg.php
 */

return array (
  'null-render' => 
  array (
    'class' => 'Skyline\\Render\\CompiledRender',
    'plugins' => 
    array (
      0 => 
      array (
        'class' => 'Skyline\\Render\\Plugin\\NullPlugin',
      ),
    ),
  ),
  'incremential-t-render' => 
  array (
    'class' => 'Skyline\\Render\\CompiledRender',
    'plugins' => 
    array (
      0 => 
      array (
        'class' => 'Skyline\\Render\\Plugin\\RenderTemplateDefaultDispatchPlugin',
      ),
    ),
  ),
  'atomic-t-render' => 
  array (
    'class' => 'Skyline\\Render\\CompiledRender',
    'plugins' => 
    array (
      0 => 
      array (
        'class' => 'Skyline\\Render\\Plugin\\CaptureContentsPlugin',
      ),
      1 => 
      array (
        'class' => 'Skyline\\Render\\Plugin\\RenderTemplateDefaultDispatchPlugin',
      ),
    ),
  ),
  'html-render' => 
  array (
    'class' => 'Skyline\\Render\\CompiledRender',
    'plugins' => 
    array (
      0 => 
      array (
        'class' => 'Skyline\\Render\\Plugin\\RenderTemplateDefaultDispatchPlugin',
      ),
      1 => 
      array (
        'class' => 'Skyline\\HTMLRender\\Plugin\\MainLayoutPlugin',
      ),
    ),
  ),
  'html-head-render' => 
  array (
    'class' => 'Skyline\\Render\\CompiledRender',
    'plugins' => 
    array (
      0 => 
      array (
        'class' => 'Skyline\\Render\\Plugin\\RenderTemplateBodylessDispatchPlugin',
      ),
      1 => 
      array (
        'class' => 'Skyline\\HTMLRender\\Plugin\\MainLayoutPlugin',
      ),
    ),
  ),
  'plain-text' => 
  array (
    'class' => 'Skyline\\API\\Render\\PlainTextRender',
  ),
  'json-render' => 
  array (
    'class' => 'Skyline\\API\\Render\\JSONRender',
  ),
  'xml-render' => 
  array (
    'class' => 'Skyline\\API\\Render\\XMLRender',
  ),
  'partial-template-render' => 
  array (
    'class' => 'Skyline\\API\\Render\\PartialTemplateRender',
  ),
  'html-part-render' => 
  array (
    'class' => 'Skyline\\API\\Render\\HTMLRender',
  ),
);