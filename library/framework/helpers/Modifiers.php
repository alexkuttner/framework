<?php

class Modifiers
{
    public function stringLowerCase($strings)
    {
        if(is_array($strings))
        {
            //Avoid conflicts by making everything lower case
            array_walk($strings, function(&$value)
            {
                $value = strtolower($value);
            });

            return $strings;
        }
        else
        {
            return strtolower($strings);
        }
    }
}