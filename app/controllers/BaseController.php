<?php

class BaseController
{
    /**
     * @param $view
     *
     * This is called in the controller when loading a view
     */
    public function loadView($view, array $array = [])
    {
        /**
         * If there was an array of data sent to the view then we need to make it accessible in the view
         *
         * If this was sent from the controller
         * ['names' => $names, 'city' => $city]
         */
        if(!empty($array) && is_array($array))
        {
            foreach($array as $key => $values)
            {
                $variable = $key; //this will holde the string 'names' and 'city'
                //Create a variable called 'names'
                $$variable = $variable; //The variables will be called 'names' on the first loop
                //$names can now be accessed and we will give it all the array data that 'names' held
                ${$variable} = $values;
                //$names will now be accessible in the View
            }
        }
        elseif(!empty($array) && !is_array($array))
        {

        }

        require '../views/'.$view.'.php';
    }

}