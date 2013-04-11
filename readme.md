Unfinalizer
===========

Plugs in the composer autolader and removes the final keywords from autoloaded classes on the fly.

This allows you to mock the final classes and methods in your unit tests.

Usage
-----

Add the Unfinalizer to your project:

```
composer require --dev jasir/unfinalizer:dev-master
````

In your tests bootstrap file, load Unfinalizer before your composer loading:

```
include __DIR__ . '/vendor/jasir/unfinalizer/init.php' //add this line
include __DIR__ . '/vendor/autoload.php';
```

That's all. Now all the files loaded by the composer autoloading process are without the final methods and classes.

Adding own files or files with their own loader
-----------------------------------------------

Some frameworks, like Nette, uses their own loader. You can solve this by adding own files to loader:

```
include __DIR__ . '/vendor/jasir/unfinalizer/init.php' //add this line
$loader = include __DIR__ . '/vendor/autoload.php';

$loader->add('Nette', __DIR__ . '/vendor/nette/nette');

```

Now you can mock those finals! Happy testing.

TODO
----

Please note this project is in a very alpha stage, so the code is very minimalistic.

I would like to add (maybe):

- not evaluate changed files, but saving them in cache for easier debugging
- ... ?
