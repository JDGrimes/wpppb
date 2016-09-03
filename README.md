# WP Plugin PHPUnit Bootstrap

Bootstrap for integration testing WordPress plugins with PHPUnit.

## Installation

```bash
composer require --dev jdgrimes/wp-plugin-phpunit-bootstrap
```

## Set Up

Include the composer autoload file in your PHPUnit PHP bootstrap file:

```php
require_once( dirname( __FILE__ ) . '/../../vendor/autoload.php' );
```

## Usage

Next in your PHPUnit bootstrap file, construct the loader and tell it what plugins
should be active during the tests:

```php
$loader = new WP_Plugin_PHPUnit_Bootstrap_Loader;
$loader->add_plugin( 'my-plugin/my-plugin.php' );
```

That's it. Now the loader will see to it that your plugin is activated and loaded
during the tests.

## Purpose

The purpose of this project is to provide a bootstrap for plugin developers who want
to perform integration tests for their plugin using WordPress core's testsuite. Its
aim is not only to make this easier, but also better, by providing an implementation
that makes the tests as realistic as possible.

To this end, the loader works by remotely activating the plugin(s), and letting
WordPress load them just as it normally would. This provides more realistic testing
than manually including and activating the plugins on the `muplugins_loaded` action,
as is usually done.

## License

This project's code is provided under the MIT license.
