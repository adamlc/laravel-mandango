<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| MongoDB Connection Details
	|--------------------------------------------------------------------------
	|
	| Provide the connection details for your mongo instance here
	|
	*/

	'connection' => array(
	    'host'     => 'localhost:27017',
	    'database' => 'test',
	    'options' => array(

	    )
	),


	/*
	|--------------------------------------------------------------------------
	| Mandango Schema
	|--------------------------------------------------------------------------
	|
	| Build up your schema here for the automatic class generation by Mondator
	|
	*/

	'schema' => array(
	    'Model\Author' => array(
	        'collection' => 'author',
	       'fields' => array(
	         'name' => 'string',
	       ),
	    ),

	    'Model\Article' => array(
	        'collection' => 'articles',
	        'fields' => array(
	            'title'   => 'string',
	            'content' => 'string',
	       ),
	       'referencesOne' => array(
	            'author' => array('class' => 'Model\Author'),
	       ),
	    ),
	),

);
