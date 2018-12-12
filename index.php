<?php
include_once './repositories/Request.php';
include_once './router.php';
require_once "./classes/post.php";

$router = new Router(new Request);

$router->get('/', function() {
   include_once('views/mainpage.php'); //<-- Change this to be root page instead of the login page...
});

$router->get('/test', function() {
  return "test it works";
});

$router->get('/login', function() {
  include_once('views/login.php'); //<-- This is how i specified the page for the specific route.
});

$router->get('/admin', function($request) {
    include_once('views/admin.php');
});
$router->post('/api/save-post', function($request) {
    $post = new Post;
    return $post->save($request->getBody()); //This wil send the data to the save method in the post class.
});

$router->get('/api/fetch-posts', function(){
    $post = new Post;
    return $post->index(); //This wil get all the post from the post class index method.
});
