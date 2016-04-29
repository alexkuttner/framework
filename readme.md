This was just my own idea of a framework for a bit of fun.

Life cycle:

1) /.htaccess
2) /public/.htaccess
3) public/index.php
4) library/bootstrap.php
5) app/routes.php
 a) the Route:request() is called which will get the URI example "customers/1"
 b) When a route is matched with a URI it will then create a instance of the controller and call the method stated in the route.


