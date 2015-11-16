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
         * The array should be structured like so:
         * 0 =>
                array (size=1)
                    'names' =>
                        array (size=4)
                            0 => string 'alex' (length=4)
                            1 => string 'john' (length=4)
                            2 => string 'zoe' (length=3)
                            3 => string 'paola' (length=5)
         *
         * We want to get the 'names' and create a variable called $names that holds the data in the array
         */
        if(!empty($array))
        {
            foreach($array as $row) {
                //Step into the first array 'names'
                foreach($row as $arrayName => $array) {
                    //Create a variable that holds the value 'names'
                    $variable = $arrayName;
                    //Create a variable called 'names'
                    $$variable = $variable;
                    //$names can now be accessed and we will give it all the array data that 'names' held
                    ${$variable} = $array;
                    //$names will now be accessible in the View
                }
            }
        }

        require '../views/'.$view.'.php';
    }

}