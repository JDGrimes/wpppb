# WP Plugin PHPUnit Bootstrap [![Build Status](https://travis-ci.org/JDGrimes/wpppb.svg?branch=master)](https://travis-ci.org/JDGrimes/wpppb) [![Latest Stable Version](https://poser.pugx.org/jdgrimes/wpppb/version)](https://packagist.org/packages/jdgrimes/wpppb) [![License](https://poser.pugx.org/jdgrimes/wpppb/license)](https://packagist.org/packages/jdgrimes/wpppb)

Bootstrap for integration testing WordPress plugins with PHPUnit.

## Installation

```bash
composer require --dev jdgrimes/wpppb
```

## Set Up

Include the composer autoload file in your PHPUnit PHP bootstrap file:

```php
require_once( dirname( __FILE__ ) . '/../../vendor/autoload.php' );
```

(See here for [instructions on usage with PHP 5.2](https://github.com/JDGrimes/wpppb/wiki/PHP-5.2).)

Then, before you run your tests from the command line, you'll need to set the path
to the WordPress test suite:

```bash
export WP_TESTS_DIR=/full/path/to/wordpress/tests/phpunit/
```

You'll probably want to add that to your `.bash_profile`.

Finally, note that the plugins that you want to load during your tests will need
to be present in the `src/wp-content/plugins` directory of the test site. You can
copy them there, or just create symlinks to them, which is the easiest approach
when they are under development in a different directory.

```bash
ln -s /path/to/plugin/src /path/to/wordpress/src/wp-content/plugins/plugin
```

## Usage

Next in your PHPUnit bootstrap file, grab the loader and tell it what plugins
should be active during the tests:

```php
$loader = WPPPB_Loader::instance();
$loader->add_plugin( 'my-plugin/my-plugin.php' );
```

That's it. Now the loader will see to it that your plugin is activated and loaded
before the test suite is run.

You can also do other cool things like [test your plugin's uninstall routine](https://github.com/JDGrimes/wpppb/wiki/Testing-Uninstallation).

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
