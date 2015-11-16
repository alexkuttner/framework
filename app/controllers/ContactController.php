<?php

class ContactController extends BaseController
{
    public function index()
    {
        $this->loadView('contact/contact');
    }
}