<?php

class CustomersController extends BaseController
{
    public function index()
    {
        $names = [
            'names' => [
                'alex'
            ]
        ];

        $this->loadView('contact/contact', [$names]);
    }

    public function view($id)
    {
        $id = [
            'id' => $id
        ];

        $this->loadView('contact/contact', [$id]);
    }
}