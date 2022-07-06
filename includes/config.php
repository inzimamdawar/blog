<?php
    // session_start();
    $con = mysqli_connect("localhost","root","","blog") or die("Connection Failed");

    function get_safe_value($value)
    {
        global $con;
        $value = trim($value);
        $value = htmlspecialchars(mysqli_real_escape_string($con, $value));
        $value = strip_tags($value);

        return $value;
    }