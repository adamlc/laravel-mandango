<?php namespace Adamlc\LaravelMandango;

use Illuminate\Support\ServiceProvider;

class LaravelMandangoServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('adamlc/laravel-mandango');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// Bind the Mondator commands for artisan
		$this->app['command.laravelmandango.mondator'] = $this->app->share(function($app)
		{
			return new MondatorCommand();
		});
		$this->commands('command.laravelmandango.mondator');

		// Bind the mandango instance
        $this->app->bind('mandango', function()
        {
        	// Get the config
			$config = \Config::get('laravel-mandango::mandango');
			$server = 'mongodb://' . $config['connection']['host'];
			$db = $config['connection']['database'];
			$options = $config['connection']['options'];

			// Setup Mandango
			$metadata = new \Model\Mapping\Metadata();
			$cache = new \Mandango\Cache\FilesystemCache(app_path().'/storage/cache/mandango');
			$mandango = new \Mandango\Mandango($metadata, $cache);
			$connection = new \Mandango\Connection($server, $db, $options);
			$mandango->setConnection($db, $connection);
			$mandango->setDefaultConnectionName($db);

            return $mandango;
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}