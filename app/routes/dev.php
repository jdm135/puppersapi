<?php

use Puppers\User;
use Puppers\Pup;

$app->get('/dev', function($req, $res, $args){
	$users = User::all();
	return $res->withStatus(200)->withJson($users);
});

$app->get('/pup', function($req, $res, $args){
    $pup = Pup::all();
    return $res->withStatus(200)->withJson($pup);
});

$app->get('/pup/{pup_id}', function($req, $res, $args){
    $id = $args['pup_id'];
	$pup = Pup::find($id);
    return $res->withStatus(200)->withJson($pup);
});

$app->post('/add-pup', function($req, $res, $args){
    $post = $req->getParsedBody();
    $addpup = Pup::create($post);
});

$app->post('/update-pup', function($req, $res, $args){
    $post = $req->getParsedBody();
    $updatepup = Pup::where('name', $post['name']);
    //->update(['name' => $post['new-name'], 'age' => $post['age'], 'breed' => $post['breed']]);
});

$app->post('/delete-pup', function($req, $res, $args){
    $post = $req->getParsedBody();
    $deletepup = Pup::where('name', $post['name'])->delete();
});

?>
