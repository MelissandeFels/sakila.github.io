<?php

/**
 * Route class for invoke url.
 */
class Route {

    /**
     * Array of url.
     */
    public static $validRoutes = array();

    /**
     * Function to construct route.
     * 
     * @param $route 
     *          define your route name
     * @param $function 
     *          put your function in
     */
    public static function set($route, $function) {

        self::$validRoutes[] = $route;

        // get valid url
        if ($_GET['url'] == $route) {
            $function->__invoke();
        }

    }
}