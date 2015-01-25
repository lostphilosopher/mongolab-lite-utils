mongolab-lite-utils
===================

MongolabLiteUtils provides convenient wrapper methods for connecting to and using a mongolab database.

https://mongolab.com/

MongolabLiteUtils Usage
=======================

use MongolabLiteUtils\MongolabLiteUtils;

$mongo = new MongolabLiteUtils(getenv('MONGOLAB_URI'));
$collection = $mongo->getCollection('collection_name');		    
$collection->insert($record);
$data = $collection->find();