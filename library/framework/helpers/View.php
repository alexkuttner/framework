<?php

class View
{
    /**
     * @param $file
     * @return string
     *
     * Use to get the web URL good for image, javascript, css, etc
     */
    public static function url($file)
    {
        return 'http://' . BASEURL . DS . $file;
    }

    /**
     * @param $file
     * @return string
     *
     * Use to get the local path
     * Good for including php files
     */
    public static function root($file)
    {
        return ROOT . DS . $file;
    }
}