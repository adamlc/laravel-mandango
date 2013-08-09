Laravel Mandango
================

This small package will allow you to use the Mandango ODM in your Laravel application.

This package has been thrown together quite quickly. I will update it when I have time!


## Composer

To install Laravel Mandango as a Composer package to be used with Laravel 4, add this to your composer.json:

```json
"adamlc/laravel-mandango": "dev-master"
```

Run `composer update`.

Once it's installed, you can register the service provider and facade in `app/config/app.php`:

```php
'providers' => array(
    'Adamlc\LaravelMandango\LaravelMandangoServiceProvider',
)
```

```php
'aliases' => array(
	'Mandango' => 'Adamlc\LaravelMandango\LaravelMandangoFacade'
)
```

Then publish the config file with `php artisan config:publish adamlc/laravel-mandango`. This will add the file `app/config/packages/adamlc/laravel-mandango/mandango.php`.


## Configuration

In the configuration file you will need to configure you MongoDB connection and setup your [Mondator schema](http://mandango.org/doc/mandango/mondator.html) which will be used for automatic class generation.


## Mondator Class Generation

Once you have configured your schema as per the documentation you need to run thr artisan command to generate the classes, make sure you run `composer dump-autoload` followed by `php artisan mondator:run`

When Mandator has generated your classes you need to tell composer how to auto load them. Add the following to your composer.json under classmap:

```json
"classmap": [
	"app/mandango"
],
```

After that make sure you do another `composer dump-autoload`


## Usage

Once the above steps have been completed you can simply get your repository by calling like this:

```php
$articleRepository = Mandango::getRepository('Model\Article');
```
