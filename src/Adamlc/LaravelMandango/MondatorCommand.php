<?php namespace Adamlc\LaravelMandango;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Mandango\Mondator\Mondator;

class MondatorCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'mondator:run';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Run Mondator to generate classes';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire()
	{
    	// Get the schema
		$schema = \Config::get('laravel-mandango::mandango.schema');

		$mondator = new Mondator();
		$mondator->setConfigClasses($schema);

		$directory = app_path() . '/mandango';

		$this->info('Writing Mondango classes to ' . $directory);

		$mondator->setExtensions(array(
		    new \Mandango\Extension\Core(array(
		        'metadata_factory_class'  => 'Model\Mapping\Metadata',
		        'metadata_factory_output' => $directory.'/models/Mapping',
		        'default_output'          => $directory.'/models',
		    )),
		    new \Mandango\Extension\DocumentPropertyOverloading(),
		    new \Mandango\Extension\DocumentArrayAccess(),
		));
		$mondator->process();
	}
}