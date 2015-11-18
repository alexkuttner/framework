<?php

/**
 * This class will autoload (require_once()) any classes when an instance is created like below is detected
 * - new ClassName
 * - Class::doSomething()
 *
 * This method does all the loading of the classes it will add require_once('path/to/class.php') to the bootstrap.php file
 *
 * If the class is not found a Fatal error will be thrown!!
 */

class Autoload
{
    public function autoLoadClasses()
    {
        spl_autoload_register(function($className) {

            $dirArray = [
                'app/controllers',
                'app/models',
                'library',
                'library/framework/helpers'
            ];

            //Avoid conflicts by making the detected class name lower case
            $className = strtolower($className);

            //Avoid conflicts by making everything lower case
            array_walk($dirArray, function(&$value)
            {
               $value = strtolower($value);
            });

            //set as false, when true the class has been found
            $valid = false;

            foreach($dirArray as $dir)
            {
                if(!$valid)
                {
                    //First check the directory exists :)
                    if(is_dir(ROOT. DS . $dir))
                    {
                        //Create an array of all the files in the "app/files/controllers/maybe" directory
                        $files = scandir(ROOT. DS . $dir);

                        foreach($files as $file) {
                            //Remove the .php extension
                            $file = basename($file, '.php');

                            //If the $file matches the $className then require it.
                            //Compare lower case to lower case
                            if(strtolower($file) == $className) {
                                //Require the controller class DO NOT convert $file (class) to lower case
                                require_once ROOT . DS . $dir . DS . $file . '.php';

                                //Set valid to true so we don't run this again
                                $valid = true;
                            }

                        }
                    }

                }
            }
        });
    }
}
