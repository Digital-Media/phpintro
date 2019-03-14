# PHPintro

*PHPintro* provides a basic skeleton for web programming exercises.

The code is meant only for educational purpose, even though some parts can be used for smaller web projects.
We try to meet web, coding and security standards as far as possible in these basic lessons.

Templates and CSS are complete, because this part is taught in different lessons. 

Visit us at https://www.fh-ooe.at/en/hagenberg-campus/studiengaenge/bachelor/media-technology-and-design/

# Basic usage

* ``cd <code>`` which should be accessible for your web server.
* ``sudo git clone https://github.com/Digital-Media/phpintro.git phpintro``
* ``cd phpintro``
* ``composer install``

# Used technologies and requirements

The exercises have been developed with [Vagrant](https://www.vagrantup.com/) and [Virtualbox](https://www.virtualbox.org/). 
A [Vagrantfile](https://github.com/Digital-Media/fhooe-webdev-base) with the installation of the web environment is hosted on GitHub.
But *PHPintro* can be installed in a different environment as well.
[XAMPP](https://www.apachefriends.org/de/download.html) or [MAMP](https://www.mamp.info/de/)


PHP 7.1 is required to run the examples.

* [HTML5](https://www.w3.org/TR/html5/)
* [CSS3](https://www.w3.org/Style/CSS/specs)
* [PHP 7.0](http://php.net/manual/en/migration70.new-features.php)
* [PHP 7.1](http://php.net/manual/en/migration71.new-features.php)
* [Normform](https://github.com/Digital-Media/normform)
* [TWIG Templates](https://twig.symfony.com/)
* [CSS3 Flexbox](https://www.w3.org/TR/css-flexbox-1/)
* [PHP-FIG PSR: PHP Standards Recommendations](https://www.php-fig.org/psr/)
* [Monolog PSR3](https://github.com/Seldaek/monolog)


The files, that have to be completed for the exercises, are stored in the subdirectory ``src/exercises``.
Each lesson has its own subdirectory. For one exercise only files in this subdirectory have to be completed.
All other files are for reference.

Sample solutions from a solution folder can be copied into the exercise templates with the class src/Solution/Solution.php.
The git repository, that holds the solution is private. If necessary ``TODO``s will guide you, what has to be done for completing the exercises. 
For a better understanding read the PHPDoc comments, that describe the classes, methods, properties and constants 
and have a look at the provided examples in ``src/DBAccess/`` especially at ``DBDemo.php`` 
and ``DBAccess`` for queries against MariaDB. 
You can use ``onlineshop/src/onlinshop.sql`` to restore the MariaDB database provided for the exercises.
You can use ``onlineshop/src/ESCreateIndex.sh`` to restore the ElasticSearch Index provided for the exercises.

For example the following line is replaced with the content of <solutionfolder>/index/construct.inc.php:  
    
    //%%<path-to-solution>/index/construct

Given parts of the solution are marked as seen below. These parts ensure, that the code works without PHP runtime errors, even before the exercise is completed.
     
     //##%%
     return true;
     //#%#%
     
For example a fake login is implemented in a way, that you can login without given user credentials. 
To complete the exercise you have to implement the database access to validate the given user credentials.
Keep these parts of the code, they may be part of your final solution, if you put them on the right place in your own code.

## Structure of this Repository

Folder | Description
--- | ---
``data`` | Directory to hold the json files, to store user credentials or testdata with class FileAccess 
``examples`` | Examples for developing with PHP 7.x. 
``htdocs`` |Frontend stuff. Files accessed by the web server. They initialize the classes with the actual implementation. CSS
``htdocs/css`` | A set of predefined styles to be used with [NormForm](https://github.com/Digital-Media/normform). Include ``main.css`` to use it.
``templates`` | HTML templates for the TWIG template engine used in ``/src/*.php``.
``templates_c`` | Output folder for compiled TWIG templates.
``src`` | Classes implemented for *PHPintro*, including a demo for [NormFormDemo](https://github.com/Digital-Media/normform) and FAdemo for FileAccess. The Trait Utilities provides static helper methods, that can be used in any context.
``src/exercises`` | Classes to be implemented for *PHPintro* exercises.
``vendor`` | Third party libraries installed with composer: [NormForm](https://github.com/Digital-Media/normform), [TWIG Templates](https://twig.symfony.com/), Javascript Libraries ...

A basic class diagramm for OnlineShop (built with http://www.umlet.com/umletino/ can be found at phpintro/src/ClassDiagramPHPintro.png.
