<?php
/**
 *  == TASoft Config Compiler ==
 *  Target: TASoft\Config\Compiler\Target\FileTarget (/Users/thomas/Library/CloudStorage/OneDrive-Persönlich/TASoft Sources/WLW-Teilelager/SkylineAppData//Compiled/parameters.config.php)
 *  Compiled from:
 *	1.	/Users/thomas/Library/CloudStorage/OneDrive-Persönlich/TASoft Sources/WLW-Teilelager/vendor/skyline/kernel/lib/parameters.cfg.php
 *	2.	/Users/thomas/Library/CloudStorage/OneDrive-Persönlich/TASoft Sources/WLW-Teilelager/vendor/skyline/html-render/parameters.cfg.php
 *	3.	/Users/thomas/Library/CloudStorage/OneDrive-Persönlich/TASoft Sources/WLW-Teilelager/vendor/skyline/pdo/parameters.cfg.php
 *	4.	/Users/thomas/Library/CloudStorage/OneDrive-Persönlich/TASoft Sources/WLW-Teilelager/vendor/skyline/component-api/parameters.cfg.php
 *	5.	/Users/thomas/Library/CloudStorage/OneDrive-Persönlich/TASoft Sources/WLW-Teilelager/SkylineAppData/Config/parameters.config.php
 */

return array (
  'Logger.Env' => false,
  'component.public-uri' => '/Public',
  'component.resource-dir' => '$(/)/Components',
  'pdo.primary' => 'SQLite',
  'pdo.secondary' => 'SQLite',
  'pdo.prefix' => 'SKY_',
  'pdo.mysql.host' => 'localhost',
  'pdo.mysql.dataBase' => '',
  'pdo.mysql.username' => '',
  'pdo.mysql.password' => '',
  'pdo.mysql.socket' => '',
  'pdo.sqlite.filename' => '$(U)/wlw-teilelager.db',
  'pdo.sqlite.username' => '',
  'pdo.sqlite.password' => '',
  'api.js.csrf-token-name' => 'skyline-component-api-csrf',
);