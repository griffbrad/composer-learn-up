# Composer, auto-loading and object-oriented programming in PHP

History
-------

In PHP 4, classes are just fancy associative arrays.  Most things in PHP are just fancy
associative arrays.  The language provided no way to hide properties or methods.  Objects
were passed by value just like all other types.  Explicitly requesting that an object be
passed by reference was requiring throughout most libraries.  Forgetting to do so led to
subtle bugs.  WordPress and some frameworks (e.g. CodeIgniter) were built with these
limitations in mind.

In PHP 5, the `public`, `protected` and `private` keywords were added.  Objects were
passed by reference by default.  Static vs instance semantics were now part of the class
definition rather than being a call-time decision.  Class constants and interfaces were
also added.  Major MVC frameworks like Zend Framework 1.x and Symfony 1.x came out during 
this period.

In PHP 5.3, namespaces and closures/anonymous functions were added.  Updated versions of
ZF and Symfony leveraged these additions to improve APIs, make code more testable, and
distribute their code modularly.  Newer frameworks like Laravel and new CMS versions
(e.g. Drupal 8) used those modules via Composer.


Autoloading
-----------

As class hierarchies ballooned in size, manually loading files prior to using classes
became burdensome.  To alleviate this pain, autoloading was introduced.  When you reference
an undefined class, the autoload API will run any registered loaders to give them an
opportunity to `require` the file before an error is triggered.

The PHP-FIG was formed to standardize the approach to autoloading used by major frameworks.
The first standard was PSR-0, which used `_` characters to separate segments of class
names.  The loader replaces those underscores with directory separators, mapping the class
name back to a filesystem path.

Once namespace support was added in 5.3, PSR-4 was written to supplant PSR-0.


Composer
--------

Composer provides built-in support for the autoloading standards.

While Composer is generally thought of as PHP's equivalent of NPM, gems, CPAN, etc, it's
worth keeping in mind that it can be used soley for autoloading as well.

The docs are quite good and are the best place to learn the basics about installation and
usage: https://getcomposer.org/doc/00-intro.md#locally

Composer dependencies are typically loaded via packagist, which is a public package
repository.  You can also use Private Packagist (https://packagist.com/) to publish
private packages.

Both your dependencies and your autoloader will be stored in a folder called `vendor` by
default.

After your initial install, a `composer.lock` file will be generated.  This file specifies
the exact versions of your direct and transitive dependencies so that you can reproduce
the installation.  This theoretically also means you do not need to store the `vendor` folder
in version control.  Only the project-level `composer.lock` is relevant.  If a library you
depend upon includes a `composer.lock` file, it will be completely ignored when running
an install in your project.

### Common commands

Fresh install (when no composer.lock is present) or reproduction of install in composer.lock:
`php composer.phar install`

Update all dependencies: `php composer.phar update`

Generate optimized autoloader: `php composer.phar dump-autoload -o`

Require a dependency: `php composer.phar require zendframework/zend-escaper ^2.0.1`

Remove a dependency and its transitive dependencies: `php composer.phar remove zendframework/zend-escape`

Check for available updates: `php composer.phar outdated`


wpackagist
----------

WordPress Packagist (https://wpackagist.org/) provides a Composer repository that
essentially mirrors the WordPress plugin SVN repository.  Tags in SVN are represented as
package versions in Composer.  Using wpackagist, you can essentially replace the default 
WordPress plugin installation and updating mechanisms altogether.  The project is not
particularly relevant for plugin development, however.  It's solely a tool for WP site
administrators.


WordPress Plugin Development
----------------------------

If we wanted to add support for modern autoloading and dependency management in core, it
would probably require a process wherein dependencies specified in each plugin were merged,
reconciled and installed all together, resulting in a single `vendor` folder and
autoloader.

Assuming we don't want to block further explorations on that approach, it may be best to
be cautious about autoloading.  Because autoloading is triggered by a reference to an 
undefined class name (something that in PHP is global), multiple plugins with different
versions of the same dependency have no guarantee they'll load the version they actually
require.

There are 2 viable paths for isolated plugins and their dependencies that I'm aware of:

1) Tools like php-scoper (https://github.com/humbug/php-scoper) that prefix all code with
a randomly generated namespace.

2) Using anonymous functions and classes rather than named definitions.  These are just
values can be loaded explicitly, ensuring that versions are kept separate.

Using some combination of the above mechanisms, we can ensure that at least some code is
fully isolated to a single plugin.  We still have to be cognizant of interactions with
inherently global entities (e.g. the DB, API endpoints, the HTTP response, etc).  However,
by using a mechanism to isolate some code, we can design a protocol for deciding how these
global-entangled concerns are handled.

