###Nothing serious here

## Quick overview of life cycle

1. /.htaccess
2. /public/.htaccess
3. public/index.php
4. library/bootstrap.php
  1. Create a Autoload instance and call autoLoadClasses() method. All directories to look in are here.
5. app/routes.php
  1. The Route:request() will check the URI
  2. When found an instance of the controller is created and the method is called using the route parameters


### Routes

#### Pass data to controllers

Pass data such as an id of '45' along with the uri.

Example, get a customer
```
/customer/45
```

#### Post Requests

Not yet.

### Controllers

#### Pass data from controller to view
You can pass either string or arrays to the views.

```
$array = [
            '0' => [
                'id' => '1',
                'name' => 'Alex'
            ],
            '1' => [
                'id' => '2',
                'name' => 'Paola'
            ]
        ];

$string = ['I am a string like all other strings!'];
```

Then in the controler you simply pass the data along with the variable name in an Array.

```
$this->loadView('customers/index', ['names' => $names, 'string' => $string]);
```

### Models

Working on it.... someday..

### Exceptions

Someday..