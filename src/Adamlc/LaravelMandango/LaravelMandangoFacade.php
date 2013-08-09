<?php namespace Adamlc\LaravelMandango;

use Illuminate\Support\Facades\Facade;

class LaravelMandangoFacade extends Facade {

	protected static function getFacadeAccessor() { return 'mandango'; }

}