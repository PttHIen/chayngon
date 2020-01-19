<?php

use MongoDB\Driver\Manager;
use MongoDB\Driver\Query;

$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");


// This $filter will return any id's qualing to 2 but what if we want all the id's above 0.
// $filter = ['id' => 2];
// This is how we would do this.
$filter = ['id' => ['$gt' => 0]];
$options = [
    'projection' => [
        'id' => 1,
        'name' => 1,
        'image' => 1,
        'cover_image' => 1,
        'preparation_time' => 1,
    ],
    'limit' => 10
];
$query = new MongoDB\Driver\Query($filter, $options);
$rows = $manager->executeQuery('live_ngon365.restaurant', $query); // $mongo contains the connection object to MongoDB
$items=[];
foreach($rows as $r){
    $items[]=$r;
}
echo json_encode($items);
