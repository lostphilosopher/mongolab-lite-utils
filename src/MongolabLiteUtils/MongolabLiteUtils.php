<?php 

namespace MongolabLiteUtils;

use MongoClient;

class MongolabLiteUtils
{
	protected $mongolabUri;
	protected $databaseName;

	/*
	 * Constructor for MongolabLiteUtils
	 *
	 * @param string
	 * @return MongolabLiteUtils
	 */
	public function __construct($mongolabUri)
	{
	    // SOURCE: https://gist.github.com/pedro/1288447
	    $this->mongolabUri   = parse_url($mongolabUri);
	    $this->databaseName  = str_replace('/', '', $this->mongolabUri['path']);

	    $this->mongoClient = new MongoClient($mongolabUri);	
	}

	/*
	 * Deconstructor for MongolabLiteUtils
	 *
	 * @param string
	 * @return MongolabLiteUtils
	 */
	public function __destruct()
	{
		$this->mongoClient->close();	
	}

	/*
	 * Uses the MongoClient to access the database specifed by $mongolabUri
	 *
	 * @return MongoDb
	 */
	public function getDatabase()
	{
		$databaseName 	= $this->databaseName;
	    $database   	= $this->mongoClient->$databaseName;

	    return $database;		
	}

	/*
	 * Uses the MongoDb to access a collection specified by $collectionName
	 * This has access to the find() and insert() methods
	 *
	 * @param string	 
	 * @return MongoCollection
	 */
	public function getCollection($collectionName)
	{
		$database = $this->getDatabase();

	    $collection = $database->$collectionName;

	    return $collection;
	}
}