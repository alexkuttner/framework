<?php

/**
 * This class will autoload and require any classes when a new instance is required like below
 * $obj = new ClassName
 * or Class::doSomething()
 * The spl_autoload_register will run the specified method
 * If the class is not found a Fatal error will be thrown!!
 */
spl_autoload_register('Autoload::autoloadModels');
spl_autoload_register('Autoload::autoloadControllers');
spl_autoload_register('Autoload::autoloadLibrary');
spl_autoload_register('Autoload::autoloadFramework');

class Autoload
{
    //Not being used but good to save for later use
    public function autoloadEverythingInDirectory()
    {
        //Create an array of all the files in the "controllers" directory
        $files = scandir(ROOT.'/app/controllers');

        //Go through directory files
        foreach($files as $file) {
            //Get the file extension
            $fileExtension = new SplFileInfo($file);

            //If there was a file extension and if it ends in php then load it
            if($fileExtension->getExtension() == 'php') {
                //Require the controller class
                require_once ROOT . DS . 'app' . DS . 'controllers' . DS . $file;
            }

        }
    }

    /**
     * Functions below are called any time a class is instance is made.
     * If you were to do something like:
     * $obj = new Controller;
     * Then all these methods are called and will search for the controller and require it
     **/
    public static function autoloadControllers($className)
    {
        self::autoloader('app/controllers', $className);
    }

    public static function autoloadModels($className)
    {
        self::autoloader('app/models', $className);
    }
    public static function autoloadLibrary($className)
    {
        self::autoloader('library', $className);
    }
    public static function autoloadFramework($className)
    {
        self::autoloader('library/framework/helpers', $className);
    }

    /**
     * This method does all the loading of the classes that are needed
     */
    public static function autoloader($directory, $className)
    {
        //Avoid conflicts by making everything lower case
        $directory = strtolower($directory);
        $className = strtolower($className);

        //Create an array of all the files in the "controllers" directory
        $files = scandir(ROOT. DS . $directory);

        foreach($files as $file) {
            //Remove the .php extension
            $file = basename($file, '.php');

            //If the $file matches the $className then require it.
            //Compare lower case to lower case
            if(strtolower($file) == $className) {
                //Require the controller class DO NOT convert to lower case
                require_once ROOT . DS . $directory . DS . $file . '.php';
            }

        }
    }
}
