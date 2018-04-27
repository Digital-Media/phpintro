# NormForm-Skeleton

An example application or skeleton for the for getting started with [*NormForm*](https://github.com/Digital-Media/normform), the simple template application for PHP form processing developed for PHP classes in the program [Media Technology and Design](https://www.fh-ooe.at/en/hagenberg-campus/studiengaenge/bachelor/media-technology-and-design/) at the [University of Applied Sciences Upper Austria](https://www.fh-ooe.at/en/hagenberg-campus/). This skeleton and the library behind it are primarily designed for educational purposes (learning object oriented PHP, form processing and templating languages). Use it for "public" applications at your own risk.

## Creating a NormForm Application

Use Composer to create a new project containing the skeleton files:

    composer create-project fhooe/normform-skeleton path/to/install

Composer will create a project in the specified `path/to/install` directory.

## Basic Usage

- Edit `templates/normFormDemo.html.twig` to modify the HTML (add/remove form fields, etc.).
- Modify `src/NormFormDemo.php` to change the form validation behavior (method `isValid()`) and the business logic that is executed one the form is filled out correctly (method `business()`)). Create constants with the names of your form fields here for easier referencing.
- Adapt `htdocs/index.php` if you have edited your form. Supply `PostParameter` instances to the `View` object so that the form data can be processed and displayed accordingly.

If you prefer your form without all the ([SUIT CSS](https://suitcss.github.io/) inspired) CSS, start working with `htdocs/index_simple.php` and `templates/normFormDemoSimple.html.twig` instead.

## Browsing the Application

For taking a quick look you can use the PHP built-in web server:

    cd path/to/install
    composer start

Navigate to <http://localhost:8888/index.php> or <http://localhost:8888/index_simple.php> in your browser to see the application in action.

## Contributing

If you'd like to contribute, please refer to [CONTRIBUTING](https://github.com/Digital-Media/normform-skeleton/blob/master/CONTRIBUTING.md) for details.

## License

NormForm is licensed under the MIT license. See [LICENSE](https://github.com/Digital-Media/normform-skeleton/blob/master/LICENSE) for more information.

## More Information

- [API Documentation](https://digital-media.github.io/normform-skeleton/)
