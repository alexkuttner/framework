<?php

Route::request('/contact', 'ContactController', 'index');

Route::request('/customers/?', 'CustomersController', 'view');

