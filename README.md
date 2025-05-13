# WLW Projekt
_Kleinteile-Lager System_

Dieses Projekt wurde mit [PHP 8.2](https://www.php.net/manual/de/) als WebServer Sprache aufgesetzt.

Folgende Komponenten sind Teil davon:
- Bootstrap Styling (CSS und JS) Framework [https://getbootstrap.com](https://getbootstrap.com/docs/5.3/getting-started/introduction/)
- jQuery Basic Javascript Framework [https://jquery.com](https://jquery.com)
- Skyline CMS (von Thomas)

## Installation

Bitte installieren Sie php8.2. Folgende Anleitungen für diverse Betriebssysteme stehen [hier zur Verfügung](https://www.php.net/manual/de/install.php).
````bin
$ php -v
````
sollte eine Ausgabe liefern wie:
```
PHP 8.2.26 (cli) (built: Nov 19 2024 17:11:09) (NTS)
Copyright (c) The PHP Group
Zend Engine v4.2.26, Copyright (c) Zend Technologies
    with Xdebug v3.3.1, Copyright (c) 2002-2023, by Derick Rethans
    with Zend OPcache v8.2.26, Copyright (c), by Zend Technologies
```
```Xdebug``` ist nicht nötig.

## Inbetriebnahme

Dieses Repository wird lauffähig ausgeliefert. Die Verzeichnisse ```vendor``` und ```Skyline/Compiled``` sind bereits angelegt und vorkompiliert.
Bitte entnehmen Sie weiter unten, wie man updaten und nachkompilieren kann.

Die einfachste Möglichkeit, die Webseite zu sehen ist folgender Befehl:
```bin
cd ~/pfad/nach/wlw-lager/Public
php -S 0.0.0.0:8080 skyline.php
```
Damit wird ein Webserver gestartet, welcher unter ```http://localhost:8080``` dieses Projekt ausliefert.


````bin
$ cd ./my-skyline-application
$ php -S localhost:8080 Public/skyline.php
````

## Nacharbeiten
Das Projekt wird standardmässig mit [Composer](https://getcomposer.org/doc/00-intro.md) verwaltet und alle Dependencies werden damit sichergestellt.
Die Datei ```composer.json``` definiert die benötigten Komponenten.

Der Befehl:
````bin
php composer.phar update
````
aktualisiert die Abhängigkeiten und Autoloader. Sind weitere Änderungen an Skyline CMS nötig, so kann die Webseite mit folgendem Kommando neu kompiliert werden:
```bin
php composer.phar compile:live
```