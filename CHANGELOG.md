# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

## [Unreleased]
- Unit tests with [PHPUnit](https://phpunit.de/).

## [2.1.0] - 2018-07-16
### Added
- It is now possible to use normform with AJAX requests. show() is not called if currentView is an invalid View object.
- The template is not displayed in this case. The HTTP response can be sent with echo.
- Based on fhooe/normform v1.2.0

## [2.0.3] - 2018-05-16
### Fixed
Switched to NormForm v1.1.0

## [2.0.2] - 2018-05-16
### Fixed
All TODOs in English now

## [2.0.1] - 2018-04-30
### Fixed
README now references TWIG instead of Smarty

## [2.0.0] - 2018-04-27
### Added
TWIG Templates

### Removed
Smarty Templates

## [1.0.0] - 2018-04-12
### Added
- Example files (concrete class, template, index file, CSS).
- Simplified example (template and index file).
- composer.json and composer.lock to declare project information and dependencies.
- PHP version 7.1 requirement.
- Project follows [Semantic Versioning](http://semver.org/spec/v2.0.0.html).
- Directory structure (src, docs) ready for [Composer](https://getcomposer.org/).
- API Documentation generated using [Sami](https://github.com/FriendsOfPHP/Sami). 
- Changelog (yes, this one) based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/).
