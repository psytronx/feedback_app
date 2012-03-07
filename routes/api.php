<?php
require_once("../lib/model/Contacts.php");
require_once("../lib/model/Locations.php");
require_once("../lib/model/Venues.php");
require_once("../lib/model/Users.php");
require_once("../lib/model/Suggestions.php");


$app->get('/api/contacts/', function () {
    $cn = new Contacts();
	$cn->getContacts();
});

$app->post('/api/contacts/', function () use ($app) {
	
	$req = $app->request();
	$bdy = $req->getBody();
	$contact = json_decode($bdy);
	$cn = new Contacts();
	$cn->insertContact($contact[0]);
});

$app->get('/api/contacts/:id', function ($id) {
    $cn = new Contacts();
	$cn->getContactsById($id);
});

$app->put('/api/contacts/:id', function ($id) use ($app) {
	
	$req = $app->request();
	$bdy = $req->getBody();
	$contact = json_decode($bdy);
	 $cn = new Contacts();
	 $cn->updateContact($id,$contact[0]);
});

$app->delete('/api/contacts/:id', function ($id) {
    $cn = new Contacts();
	$cn->deleteContact($id);
});

$app->get('/api/contacts/:id/venues', function ($id) {
    $cn = new Venues();
	$cn->getVenuesByContactId($id);
});

$app->get('/api/users/', function () {
    $cn = new Users();
	$cn->getUsers();
});

$app->post('/api/users/', function () use ($app) {
	
	$req = $app->request();
	$bdy = $req->getBody();
	$user = json_decode($bdy);
	$cn = new Users();
	$cn->insertUsers($user[0]);
});

$app->get('/api/users/:id', function ($id) {
    $cn = new Users();
	$cn->getUsersById($id);
});

$app->put('/api/users/:id', function ($id) use ($app) {
	
	$req = $app->request();
	$bdy = $req->getBody();
    	$user = json_decode($bdy);
	 $cn = new Users();
	 $cn->updateUser($id,$user[0]);
});

$app->delete('/api/users/:id', function ($id) {
    $cn = new Users();
	$cn->deleteUser($id);
});

$app->get('/api/users/:id/suggestions', function ($id) {
    $cn = new Suggestions();
	$cn->getSuggestionsByUser($id);
});

$app->get('/api/suggestions/', function () {
    $cn = new Suggestions();
	$cn->getSuggestions();
});

$app->get('/api/suggestions/:id', function ($id) {
    $cn = new Suggestions();
	$cn->getSuggestionsByID($id);
});

$app->post('/api/suggestions/', function () use ($app) {
	
	$req = $app->request();
	$bdy = $req->getBody();
	$suggestion = json_decode($bdy);
	$cn = new Suggestions();
	$cn->insertSuggestion($suggestion[0]);
});

$app->put('/api/suggestions/:id', function ($id) use ($app) {
	
	$req = $app->request();
	$bdy = $req->getBody();
    	$suggestion = json_decode($bdy);
	 $cn = new Suggestions();
	 $cn->updateSuggestion($id,$suggestion[0]);
});

$app->delete('/api/suggestions/:id', function ($id) {
    $cn = new Suggestions();
	$cn->deleteSuggestion($id);
});


$app->get('/api/locations/', function () {
    $cn = new Locations();
	$cn->getLocations();
});

$app->post('/api/locations/', function () use ($app) {
	
	$req = $app->request();
	$bdy = $req->getBody();
	$location = json_decode($bdy);
	$cn = new Locations();
	$cn->insertLocation($locaiton[0]);
});

$app->get('/api/locations/:id', function ($id) {
    $cn = new Locations();
	$cn->getLocationById($id);
});

$app->put('/api/locations/:id', function ($id) use ($app) {
	
	$req = $app->request();
	$bdy = $req->getBody();
	$contact = json_decode($bdy);
	 $cn = new Locations();
	 $cn->updateLocation($id,$location[0]);
});

$app->delete('/api/locations/:id', function ($id) {
    $cn = new Locations();
	$cn->deleteLocation($id);
});

$app->get('/api/venues/', function () {
    $cn = new Venues();
	$cn->getVenues();
});

$app->post('/api/venues/', function () use ($app) {
	
	$req = $app->request();
	$bdy = $req->getBody();
	$venue = json_decode($bdy);
	$cn = new Venues();
	$cn->insertVenue($venue[0]);
});

$app->get('/api/venues/:id', function ($id) {
    $cn = new Venues();
	$cn->getVenueById($id);
});

$app->put('/api/venues/:id', function ($id) use ($app) {
	
	$req = $app->request();
	$bdy = $req->getBody();
	$contact = json_decode($bdy);
	 $cn = new Venues();
	 $cn->updateVenue($id,$location[0]);
});

$app->delete('/api/venues/:id', function ($id) {
    $cn = new Venues();
	$cn->deleteVenue($id);
});

$app->get('/api/venues/:id/suggestions', function ($id) {
    $cn = new Suggestions();
	$cn->getSuggestionsByVenue($id);
});



?>