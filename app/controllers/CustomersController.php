<?php

class CustomersController extends BaseController
{
    public function index()
    {
        //If passing datat to the views the parent would become the name of the variable accessible in the view
        $names = [
            '0' => [
                'name' => 'alex',
                'age' => '24'
            ],
            '1' => [
                'name' => 'paola',
                'age' => '22'
            ]
        ];
        $string = ['test me as string'];

        $this->loadView('customers/index', ['names' => $names, 'string' => $string]);
    }

    public function view($id)
    {
        $id = [
            'id' => $id
        ];

        $this->loadView('contact/contact');
    }
}