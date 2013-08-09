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