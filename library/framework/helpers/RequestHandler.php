<?php

class RequestHandler
{

    /**
     * @return string
     *
     * This will format the URI needed in the routes.php file
     *
     * For the moment the URL must start with public like so:
     * localhost/public/contacts
     */
    public function modifyURIforRoute()
    {
        $uri = $_SERVER['REQUEST_URI'];

        $uri = explode('/',$uri);

        //We need to get the site root so if the files were all at /var/www/example/framework
        //then "framework" would be considered the root and the url would be http://localhost/example/framework/about
        //We need $siteRoot to be equal to "framework"
        //Anything after the $siteRoot would be considered the URI
        //The URI is what we send back

        //We first go back 4 folders this would be the root of the site.
        //Example (.*)/library/framework/helpers/RequestHandler.php
        //This would get /var/www/public_html/temp
        $siteRoot = dirname(dirname(dirname(dirname(__FILE__))));
        //Grab example "temp" this will be used as the site root! :)
        $siteRoot = substr($siteRoot, strrpos($siteRoot, '/') + 1);

        //When we get to 'public' set marker to true to indicate anything that follows will be the requested route
        $setMarker = false;

        $route = '';

        foreach($uri as $string)
        {
            if($setMarker === true)
            {
                //Create route.
                //This will be sent to the routes.php file
                $route .= '/'.$string;
            }

            if($string == $siteRoot)
            {
                $setMarker = true;
            }
        }

        //Remove JUST the trailing "/" slashes
        //$route = str_replace(array('/', '\\'), '', $route); //Htis removed all slashes. Not what we wanted.
        if(substr($route, -1) == '/')
        {
            $route = substr($route, 0, -1);
        }

        // This should return the formatted uri
        return $route;

    }
}