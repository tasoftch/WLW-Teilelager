# Skyline Core Application
_Core Content Management System_

This package provides a skeleton template configuration to design a web application using Skyline CMS by TASoft Applications.  
It also includes the Bootstrap CSS Framework.
## Usage
````bin
$ composer create-project skyline-project/web-application-with-bootstrap -sdev ./my-skyline-application
````
This will install everything that Skyline CMS needs to deliver a compiled web application to clients.  
Run your project local just type:
````bin
$ cd ./my-skyline-application
$ php -S localhost:8080 Public/skyline.php
````

To compile the bootstrap CSS Framework, you need to have npm installed.  
Then simply type
````bin
$ cd ./my-skyline-application
$ npm install
$ npm run build:css
````
or as a startup:
````bin
$ cd ./my-skyline-application
$ composer startup
````
The ```composer startup``` command compiles everything and finally launches a default webserver on port 8080.

#### Compilation
Skyline CMS runs from a compiled application to increase performance and while development detect possible bugs.  
There are several options, to compile an application:
- **Use the Skyline CMS Compiler package**  
    This allows developers to work directly with source files and compile them manually.  
    The Skyline CMS Compiler package is installed automatically when creating a development project.
    ````bin
    $ composer create-project skyline-project/web-application --no-dev ./my-skyline-application
    ````
    This command won't install the compiler
- **Use a Skyline CMS Control Panel**  
    With control panels, you can edit and manage the content, as you expect, online by the content management system.
    