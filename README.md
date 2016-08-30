[![StyleCI](https://styleci.io/repos/48806051/shield)](https://styleci.io/repos/48806051)
[![Total Downloads](https://poser.pugx.org/rduuke/newbie/d/total.svg)](https://packagist.org/packages/rduuke/newbie)
[![Latest Stable Version](https://poser.pugx.org/rduuke/newbie/v/stable.svg)](https://packagist.org/packages/rduuke/newbie)
[![Latest Unstable Version](https://poser.pugx.org/rduuke/newbie/v/unstable.svg)](https://packagist.org/packages/rduuke/newbie)
[![License](https://poser.pugx.org/rduuke/newbie/license.svg)](https://packagist.org/packages/rduuke/newbie)
# **Newbie**

## Installation:
##### Composer:

```sh
composer create-project rduuke/newbie
```
##### Configuration Files:
The file `config\Config.php` data from the database is added and define the two global routes `BASE_URL` and `BASE_PUBLIC`. 
```php
define('BASE_URL', 'http://example.com/newbie');
define('BASE_PUBLIC', 'http://example.com/newbie/public');
```
#### Directory Structure:
```
Root Director/
├── bootstrap
├── config
├── public
├── resource
    ├── views
        ├── layout
├── src
    ├── Contracts
    ├── Controllers 
    ├── Models
    ├── Tools
├── vendor
```
#### The HTTP Layer
#### Route
##### Basic Routing:
The most basic Newbie routes simply accept a URI and a Closure, providing a very simple and expressive method of defining routes:
```php
    $app->get('/', function(Request $request, Response $response){
        $response->getBody()->write("Hello Word');
        return $reponse;
    });
```
All Newbie routes are defined in your route files `src/routes.php`.
Available Router Methods:
The router allows you to register routes that respond to any HTTP verb:
```php
    $app->get($uri, $callback);
    $app->post($uri, $callback);
    $app->put($uri, $callback);
    $app->delete($uri, $callback);
    $app->patch($uri, $callback);
    $app->options($uri, $callback);
    $app->head($uri, $callback);
```
#### Route Parameters

##### Required Parameters:
Of course, sometimes you will need to capture segments of the URI within your route. For example, you may need to capture a user's ID from the URL. You may do so by defining route parameters:
```php
    $app->get('/users/{id}', function (Request $request, Response $response) {
        $id = $request->getAttribute('id');
        return $id;
    });
```
##### Optional Parameters:
Occasionally you may need to specify a route parameter, but make the presence of that route parameter optional. You may do so by placing []; Make sure to give the route's corresponding variable a default value:
```php
     $app->get('/users[/{id}]', function (Request $request, Response $response) {
        $id = $request->getAttribute('id');
        return $id;
    });
```
##### Route Groups
Route groups allow you to share route attributes , across a large number of routes without Needing to define Those attributes on each single route . Shared attributes are specified in an array format as the first parameter. 
```php
    $app->group('/users', function () use ($app) {
        $this->get('', function ()); 
        //http://example.com/newbie/public/users
        $this->get('/create', function()); 
        //http://example.com/newbie/public/users/create
    });
```
##### Route Controller:
```php
    $app->group('/users', function () use ($app) {
        $controller = new RDuuke\Newbie\Controllers\UsersController($app);
        $this->get('', $controller('index'));
        $this->get('/create', $controller('create'));
    });
    ó
    // index routes (homepage, about, etc)
    $app->group('', function () use ($app) {
        $controller = new App\Controller\IndexController($app);
        $this->get('/', $controller('index'));
        $this->get('/contact', $controller('contact'));
    });
```
#### Controllers:
##### Defining Controllers:
Below is an example of a basic controller class. Note that the controller extends the Controller class included with `Newbie(Slim3/Controllers)`. The Controller class provides a few convenience,
```php
<?php
    namespace RDuuke\Newbie\Controllers;
    
    use MartynBiz\Slim3Controller\Controller;
    use RDuuke\Newbie\Models\Users;
    
    class UsersController extends Controller
    {
    
        /**
        * Edit method, receives numeric parameter.
        *
        * @param $id int
        */
        public function edit($id)
        {
            $user = Users::find($id);

            return view('users/edit', compact('user'));
        }
    }
```
##### Resource Controllers:
To use your controller REST structure , you must implement the interface `ResourceController` 
Methods:
* index
* show($id)
* create()
* store()
* edit($id)
* update($id)
* destroy($id)

```php
<?php
    namespace RDuuke\Newbie\Controllers;
    
    use MartynBiz\Slim3Controller\Controller;
    use RDuuke\Newbie\Models\Users;
    
    use RDuuke\Newbie\Contracts\Controller\ResourceController;
    
    class UsersController extends Controller implements ResourceController
    {
    
        /**
        * Edit method, receives numeric parameter.
        *
        * @param $id int
        */
        public function edit($id)
        {
            $user = Users::find($id);

            return view('users/edit', compact('user'));
        }
    }
```
### Database
##### Query Builder:
Capsule importing the class, we can use the query builder.

```php
    $users = Capsule::table('users')->where('votes', '>', 100)->get();
```
Other core methods May be Directly accessed from the Capsule in the same manner as from the DB facade :
```php
    $results = Capsule::select('select * from users where id = ?', array(1));
```
##### Using The Eloquent ORM:
```php
    class User extends Illuminate\Database\Eloquent\Model {}
    $users = User::where('votes', '>', 1)->get();
```
For further documentation on using the various database facilities this library provides, consult the [Laravel framework documentation](https://laravel.com/docs/5.3/eloquent#eloquent-model-conventions).  

### Views
##### Creating Views:
Views contain the HTML served by your application and separate your controller / application logic from your presentation logic. Views are stored in the `resources/views` directory. A simple view might look something like this:

```html
    <!-- view in resource/views/testing.tpl.php -->
    <html>
        <body>
            <?= $this->e($title) ?>
        </body>
    </html>
```
Since this view is stored at `resources/views/testing.tpl.php`, we may return it using the global view helper like so:
```php
    public function Index()
    {
        $title = 'Newbie Framework';

        return view('testing', compact('title'));
    }
```
##### Creating a Layouts:
To save the Repeated many times the same blocks of code in the views can be generated layout , These will be stored in the directory `resource/view/layout`, A single Layout Might look something like this :

```html
    <!-- layout in resource/views/layout/template.tpl.php -->
    <html>
        <head>
            <title>Newbie</title>
        </head>
        <body>
            <?=$this->section('content')?>
        </body>
        </html>
```
Using the design in view `blog.tpl.php`
```html
    <!-- view in resource/views/blog.tpl.php -->
    <?php $this->layout('layout/template') ?>
    <h2><?=$this->e($article->title)?></h2>
    <article>
        <?=$this->e($article->content)?>
    </article>
```
### Helpers
They are in the `src/Tools/Helpers.php` file in this file can modify or add new helpers.
##### redirect:
Receives as a string with the path to the redirection.
```php
    return redirect('users'); 
    // http://example.com/newbie/public/users
```
##### style:
Receives as a parameter the path where is the css `public/css/template.css` file, only use in the view or layout.
```html
    <head>
         <?php style('css/template.css'); ?>
         <!-- public/css/template.css -->
    </head>
```
##### script:
Receives as a parameter the path where is the js `public/js/template.js` file, only use in the view or layout.
```html
    <body>
         <?php script('css/template.js'); ?>
         <!--  public/script/template.js -->
    </body>
```
##### route:
Get two obligatory and 2 optional parameters , are mandatory and the url link name , the two are optional data url html tag and attributes , just use viees recommended or layout.
Example:
```html
    <!-- $id = 1 -->
    <?= route('users/', 'Edit', $user->id, ['class' => 'btn']) ?>
    <a href="http://example.com/newbie/public/users/1" class="btn" >Edit</a>
```

##### newFlashMessage:
It takes two obligatory parameters and one optional , is used to generate alerts flash.
Type: 
Edit `public/css/template.css`
* news #01579b
* warning #ff6f00
* success #004d40
* danger #b71c1c
```php
    public function index()
    {
        newFlashMessage('test', 'test', 'warning');
        return view('users\home');
    }
```
##### getFlashMessage:
which asks whether there is a warning flash with that message.
returns true if otherwise false.
```html
    <h3 class="thin">Welcome to Users!!!</h3>
    <?php if (getFlashMessage('test')): ?>
        <!-- more code -->
    <?php endif ?>
```
##### printFlashMessage:
which is the name of the alert to show, **style alerts are the [chips materialize](http://materializecss.com/chips.html).**
```html
    <h3 class="thin">Welcome to Users!!!</h3>
    <?php printFlashMessage('test'); ?>
    <!-- 
        <div class='chip warning'>Test
            <i class='material-icons'>close</i>
        </div> 
    -->
```
##### arrayAdd:
Adds an item to a key value array.
```php
    $array = ['uno' => 1 ];
    $array = arrayAdd($array, 'dos', 2);
    //['uno' => 1, 'dos' => 2];
```
##### arrayFirst:
He gets the first element of an array
```php
    $array = ['uno' => 1, 'dos' => 2];
    $first = arrayFirst($array);
    //1;
```

##### arrayLast:
Gets the last element of an array.
```php
    $array = ['uno' => 1, 'dos' => 2]
    $last = arrayLast($array);
    //2;
```
##### arrayJson
Transforms an array to json.
```php
    $array = ['uno' => 1, 'dos' => 2];
    $json = arrayJson($array);
    //[{'uno':1,'dos': 2}];
```

##### jsonObject
Transforms a json to an object.
```php
    $json = [{'uno':1,'dos': 2}];
    $object = jsonObject($json);
    //stdClass Object( [uno] => 1 [dos] => 2 ); $object->uno; 1
```
##### jsonArray:
Transforms a json to an array.
```php
    $json = [{'uno':1,'dos': 2}];
    $array = jsonObject($json);
    //array( [uno] => 1 [dos] => 2 ); $array['uno']; 1
```
##### strLimit
It limits the number of carateres containing a string, for default is 10.
```php
    $str = 'abc def ghi';
    $strLimit = strLimit(5);
    //$strLimit = 'abc d...';
```
##### strRandom
Generates a random string of characters , according to the assigned limit, for default is 10.
```php
    $strLimit = strRandom(15);
    //$strLimit = 'asbh123opkaas6x';
```
## Note:
Any suggestions or concerns can do in
 *juuanduuke@gmail.com* ó  [@RDuuke](http://www.twitter.com/rduuke)
