unfinalizer
===========

Plugs in composer autolader and removes final keyword from autoloaded classes on fly.

It allows you to mock final classes and final methods in your unit tests.

Usage
-----

add it to your composer.json

```
composer require --dev jasir/unfinalizer:dev-master
````

In your test bootstrap file, add before your composer loading:

```
include __DIR__ . '/vendor/jasir/unfinalizer/init.php' //add this line
include __DIR__ . '/vendor/autoload.php';
```

Done, now all files loaded by composer autoloading process are without final methods and final classes.

Adding own files or files with their own loader
-----------------------------------------------

Some frameworks, like Nette, uses their own loader. You can solve this by adding own files to loader:

```
include __DIR__ . '/vendor/jasir/unfinalizer/init.php' //add this line
$loader = include __DIR__ . '/vendor/autoload.php';

$loader->add('Nette', __DIR__ . '/vendor/nette/nette');

```

Now you can mock those final! Happy testing.

TODO
----

Plese not this is in very alpha stage, so code is very minimalistic.

I would like to add (maybe):

- not evaluating changed files, but saving them in cache for easier debugging
- ... ?