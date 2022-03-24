<?php
//Namespace used for the autoloading function
namespace Service;

//cleans inputs from the user
class Sanitize
{
    function StripSpaces( array $arr ): array
    {
        foreach ( $arr as $key => $value )
        {
            $arr[$key] = trim($value);
        }

        return $arr;
    }

    function ConvertSpecialChars( array $arr ): array
    {
        foreach ( $arr as $key => $value )
        {
            $arr[$key] = htmlspecialchars($value, ENT_QUOTES);
        }

        return $arr;
    }
}