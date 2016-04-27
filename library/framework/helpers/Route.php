<?php

class Route
{
    public function __construct()
    {

    }

    public static function request($route, $controller, $method)
    {
        $requestHandler = new requestHandler;

        $uri = $requestHandler->modifyURIforRoute();

        //Get the URI example /customers/1

        /**
         * If there is a INT after the first string like customers/1 then
         * we need a route that has a question mark after the first string
         */
        if(preg_match("/.*\/[0-9].*/", $uri))
        {
            //If the route contains a ? then we are a bit closer to finding the route
            if(strpos($route, '?')) {

                $uri = explode('/', $uri);
                $route = explode('/', $route);

                //Remove any empty values
                foreach($uri as $uriSeg) {
                    if($uriSeg != '') {
                        $uriSegments[] = $uriSeg;
                    }
                }
                foreach($route as $routeSeg) {
                    if($routeSeg != '') {
                        $routeSegments[] = $routeSeg;
                    }
                }

                //If there are only 2 segments like /customers/1 then continue
                if(count($uriSegments) < 3)
                {
                    //Compare the first segment with the first route segment
                    if($uriSegments[0] == $routeSegments[0])
                    {
                        //Go to the correct method and pass along the INT after the first segment customers/1
                        $obj = new $controller();
                        $obj->$method($uriSegments[1]);
                    }
                }
            }
        }
        elseif($route == $uri)
        {
            $obj = new $controller();
            $obj->$method();

            /**
             * The request is now finished and we do not want to look at any more routes that might be in the routes.php file
             */
            exit;
        }
    }
}