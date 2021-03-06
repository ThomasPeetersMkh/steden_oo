<?php
//Namespace used for the autoloading function
namespace Service;

//functions used to generate HTML
class MakeHTML
{
    function PrintHead()
    {
        $head = file_get_contents("templates/head.html");
        print $head;
    }

    function PrintJumbo( $title = "", $subtitle = "" )
    {
        $jumbo = file_get_contents("templates/jumbo.html");

        $jumbo = str_replace( "@jumbo_title@", $title, $jumbo );
        $jumbo = str_replace( "@jumbo_subtitle@", $subtitle, $jumbo );

        print $jumbo;
    }

    function PrintNavbar( )
    {
        $navbar = file_get_contents("templates/navbar.html");

        print $navbar;
    }

    function MergeViewWithDataObjects( $template, $data )
    {
        $returnvalue = "";

        foreach ( $data as $row )
        {
            $output = $template;
            $arr = ($row->getDataAsArray());

            foreach(array_keys($arr) as $field )  //eerst "img_id", dan "img_title", ...
            {
                $output = str_replace( "@$field@", $arr["$field"], $output );
            }

            $returnvalue .= $output;
        }

        if ( $data == [] )
        {
            $returnvalue = $template;
        }

        return $returnvalue;
    }

    function MergeMuseum( $template, $data )
    {
        $returnvalue = "";

        foreach ( $data as $row )
        {
            $output = $template;
            $arr = ($row->getDataAsArray());

            foreach(array_keys($arr) as $field )  //eerst "img_id", dan "img_title", ...
            {
                $output = str_replace( "@$field@", $arr["$field"], $output );
            }
            $output = str_replace("@info@",$row,$output);
            $returnvalue .= $output;
        }

        if ( $data == [] )
        {
            $returnvalue = $template;
        }

        return $returnvalue;
    }

    function MergeViewWithData( $template, $data )
    {
        $returnvalue = "";

        foreach ( $data as $row )
        {
            $output = $template;

            foreach(array_keys($row) as $field )  //eerst "img_id", dan "img_title", ...
            {
                $output = str_replace( "@$field@", $row["$field"], $output );
            }

            $returnvalue .= $output;
        }

        if ( $data == [] )
        {
            $returnvalue = $template;
        }

        return $returnvalue;
    }


    function MergeViewWithExtraElements( $template, $elements )
    {
        foreach ( $elements as $key => $element )
        {
            $template = str_replace( "@$key@", $element, $template );
        }
        return $template;
    }

    function MergeViewWithErrors( $template, $errors)
    {
        foreach ( $errors as $key => $error )
        {
            $template = str_replace( "@$key@", "<p style='color:red'>$error</p>", $template );
        }
        return $template;
    }

    function RemoveEmptyErrorTags( $template, $data )
    {
        foreach ($data as $row) {
            foreach (array_keys($row) as $field)  //eerst "img_id", dan "img_title", ...
            {
                $template = str_replace("@$field" . "_error@", "", $template);
            }
        }

        return $template;
    }
}