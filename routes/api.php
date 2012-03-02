<?php
require_once("../lib/model/Contacts.php");
require_once("../lib/model/Locations.php");


$app->get('/api/contacts/', function () {
    $cn = new Contacts();
	$cn->getContacts();
});

$app->get('/api/contacts/:id', function ($id) {
    $cn = new Contacts();
	$cn->getContactsById($id);
});

$app->put('/api/contacts/:id', function ($id) use ($app) {
	
	$req = $app->request();
	$bdy = $req->getBody();
	//$updateContact = json_decode($bdy,true);
	$contact = json_decode($bdy);
	//$test = $contact[0];
	// var_dump($test->first_name);
	// 	var_dump($updateContact[0]);
	// 	var_dump($updateContact[0]["first_name"]);
	 $cn = new Contacts();
	 $cn->updateContact($id,$contact[0]);
});

$app->get('/api/locations/', function () {
    $cn = new Locations();
	$cn->getLocations();
});

?>