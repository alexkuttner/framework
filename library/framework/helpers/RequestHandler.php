<?php

class RequestHandler
{

    /**
     * @return string
     *
     * This will formate the URI needed in the routes.php file
     */
    public function modifyURIforRoute()
    {
        $uri = $_SERVER['REQUEST_URI'];

        $uri = explode('/',$uri);

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

            if($string == 'public')
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

        return $route;

    }
}