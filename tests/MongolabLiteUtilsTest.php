<?php 

use MongolabLiteUtils\MongolabLiteUtils;

class MongolabLiteUtilsTest extends PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		// The first phase of testing is verify that the provided MONGOLAB_URI is valid.
		if (!getenv('MONGOLAB_URI')) {
			printf(
				'You must provide a Mongo Lab URI to test this tool.' . PHP_EOL . 
				'export MONGOLAB_URI=YOUR_MONGOLAB_URI' . PHP_EOL . 
				'Example: mongodb://heroku_app12345678:12345678901234567890123456@ds123456.mongolab.com:12345/heroku_app12345678' . PHP_EOL
			);

			die();
		}

		$testUri = getenv('MONGOLAB_URI');
		
		$this->mongolabLiteUtils = new MongolabLiteUtils($testUri);
	}

	public function testMongolabLiteUtils()
	{
		$this->assertInstanceOf('MongolabLiteUtils\MongolabLiteUtils', $this->mongolabLiteUtils);
	}
}