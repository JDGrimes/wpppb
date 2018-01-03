# WP Plugin PHPUnit Bootstrap [![Build Status](https://travis-ci.org/JDGrimes/wpppb.svg?branch=master)](https://travis-ci.org/JDGrimes/wpppb) [![Latest Stable Version](https://poser.pugx.org/jdgrimes/wpppb/version)](https://packagist.org/packages/jdgrimes/wpppb) [![License](https://poser.pugx.org/jdgrimes/wpppb/license)](https://packagist.org/packages/jdgrimes/wpppb)

Bootstrap for integration testing WordPress plugins with PHPUnit.

## Installation

```bash
composer require --dev jdgrimes/wpppb
```

## Set Up

First, you will need a local checkout of the WordPress development repo, including the `tests` directory. The recommended way to get this, particularly if you intend to contribute to WordPress core, is with [VVV](https://make.wordpress.org/core/handbook/tutorials/installing-a-local-server/installing-vvv/).

Once you have a local copy of WordPress's `tests` directory, you can run the set-up script for WPPPB:

```bash
vendor/bin/wpppb-init
```

Answer the prompts, and you are ready to go!

Your tests will be placed in the `tests` directory that will be created in the root of your project (i.e., alongside the `vendor` directory added by Composer). Your plugin's source (the part that would be zipped up and installed on a WordPress site) is expected to be in a `src` directory alonside these two, and not in the root of your project itself. Example file structure would look like this:

```
- src/
  - my-plugin.php
  - includes/
  - etc.
- tests/
- vendor/
```

With a few modifications, you could probably use WPPPB with a different directory structure, but this is what it expects by default.

## Usage

You can run your PHPUnit tests just as you normally would:

```bash
phpunit
```

You can also do other cool things like [test your plugin's uninstall routine](https://github.com/JDGrimes/wpppb/wiki/Testing-Uninstallation).

(Note that the default bootstrap utilizes Composer's PHP autoloader, which requires
PHP 5.3. See here for [instructions on usage with PHP 5.2](https://github.com/JDGrimes/wpppb/wiki/PHP-5.2).)

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
