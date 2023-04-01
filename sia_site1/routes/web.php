return $this->successResponse($user);
// old code
/*
$user = User::where('userid', $id)->first();
if($user){
$user->delete();
return $this->successResponse($user);
}
{
return $this->errorResponse('User ID Does Not Exists',
Response::HTTP_NOT_FOUND);
}
*/
}

Create View ( Routes (API Link) )
Goto routes -> web.php
<?php
/** @var \Laravel\Lumen\Routing\Router $router */
/*
|---------------------------------------------------------------------
-----
| Application Routes
|---------------------------------------------------------------------
-----
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->get('/', function () use ($router) {
return $router->app->version();
});
// unsecure routes
$router->group(['prefix' => 'api'], function () use ($router) {
$router->get('/users',['uses' => 'UserController@getUsers']);
});
// more simple routes
$router->get('/users',['uses' => 'UserController@getUsers']);
$router->get('/users', 'UserController@index'); // get all usersrecords
$router->post('/users', 'UserController@add'); // create new userrecord
$router->get('/users/{id}', 'UserController@show'); // get user by id
$router->put('/users/{id}', 'UserController@update'); // update userrecord
$router->patch('/users/{id}', 'UserController@update'); // update userrecord
$router->delete('/users/{id}', 'UserController@delete'); // delete record