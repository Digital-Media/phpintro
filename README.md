# PHPintro

*PHPintro* provides a basic skeleton for web programming exercises.

The code is meant only for educational purpose, even though some parts can be used for smaller web projects.
We try to meet web, coding and security standards as good as possible in these basic lessons.

Templates and CSS are complete, because this part is taught in different lessons. 

Visit us at https://www.fh-ooe.at/en/hagenberg-campus/studiengaenge/bachelor/media-technology-and-design/

# Used technologies and requirements

The exercises have been developed with [Vagrant](https://www.vagrantup.com/) and [Virtualbox](https://www.virtualbox.org/). 
A [Vagrantfile](https://github.com/Digital-Media/hgb-phpdev-base) with the installation of the web environment is hosted on GitHub.
But *PHPintro* can be installed in a different environment as well.

PHP 7.1 is required to run the examples.

* [HTML5](https://www.w3.org/TR/html5/)
* [CSS3](https://www.w3.org/Style/CSS/specs)
* [PHP 7.0](http://php.net/manual/en/migration70.new-features.php)
* [PHP 7.1](http://php.net/manual/en/migration71.new-features.php)
* [TNormform](https://github.com/Digital-Media/normform)
* [TWIG Templates](https://twig.symfony.com/)
* [CSS3 Flexbox](https://www.w3.org/TR/css-flexbox-1/)
* [PHP-FIG PSR: PHP Standards Recommendations](https://www.php-fig.org/psr/)


The files, that have to be completed for the exercises, are stored in the subdirectory ``src/exercises``.
Each lesson has its own subdirectory. For one exercise only files in this subdirectory have to be completed.
All other files are for reference.

Sample solutions are included with ``require`` from a solution folder. The git repostitory, that holds the solution is private.
These parts can be ignored for your own solution or deleted completely.
Do not include these files, but work directly in the files in ``src/exercises`` to complete your solution. ``TODO``s will guide you, what to do for completing the solution. For a better understanding read the PHPDoc comments, that describe the classes, methods, properties and constants and have a look at the provided examples src/Examples, src/NormFormSkeleton/NormFormDemo.php and src/FileAccess/FADemo.php.

For example:  
    
    /*--
    require '<path-to-solution>/index/construct.inc.php';
    //*/

Given parts of the solution are marked as seen below. These parts ensure, that the code works without PHP runtime errors, even before the solution is completed.
     
     //##
     return true;
     //*/
     
For example a fake login is implemented in a way, that you can login without given user credentials. 
To complete the solution you have to implement the file access to validate the given user credentials.
Keep these parts of the code, they can be part of your final solution, if you put them on the right place in your own code.

To demonstrate, how the skeleton works, the comments are set, as seen in the examples above.
If you have access to the solution repository you can demonstrate, how the pattern solution works.
In this case the comments are switched to

    //--
    require '<path-to-solution>/index/construct.inc.php';
    //*/

and

     /*##
     return true;
     //*/

Shell scripts are used to toggle comments. They are stored in a private git repository, that holds the solution. 
They use GNU ``sed`` to toggle the commenting of both blocks from ``/*`` to ``//`` and the other way round.

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

Ein grobes Klassendiagramm für PHPintro (erstellt mit http://www.umlet.com/umletino/

![PHPintro Klassendiagramm](src/KlassenDiagrammPHPintro.png "PHPIntro Klassendiagramm")
