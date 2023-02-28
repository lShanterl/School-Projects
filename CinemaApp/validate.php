<?php

function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    $data_length = strlen($data);

    return $data;
}

?>