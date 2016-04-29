<?php

Route::request('/contact', 'ContactController', 'index');

Route::request('/customers', 'CustomersController', 'index');

Route::request('/customers/?', 'CustomersController', 'view');

var_dump('If you are seeing this that means the route could not be found.');

