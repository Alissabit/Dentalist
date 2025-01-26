<?php

function input_generic($name, $placeholder = "", $type = "text", $value = "")
{
    return "<div class=\"form-group\">" .
        "<label for=\"$name\" class=\"form-label\">$placeholder</label>" .
        "<input type=\"$type\" name=\"$name\" class=\"form-control\" placeholder=\"$placeholder\" id=\"$name\" value=\"$value\" />" .
        "<span class=\"errore-validazione\"></span>" .
        "</div>";
}

function input_text($name, $placeholder = "", $value = "")
{
    echo input_generic($name, $placeholder, "text", $value);
}

function input_password($name, $placeholder = "", $value = "")
{
    echo input_generic($name, $placeholder, "password", $value);
}

function input_email($name, $placeholder = "", $value = "")
{
    echo input_generic($name, $placeholder, "email", $value);
}

function input_hidden($name, $placeholder = "", $value = "")
{
    echo input_generic($name, $placeholder, "hidden", $value);
}

function input_date($name, $placeholder = "", $value = "")
{
    echo input_generic($name, $placeholder, "date", $value);
}

function bottone_submit($testo)
{
    echo "<button type=\"submit\" class=\"btn btn-primary\" id=$testo>$testo</button>";
}

?>
