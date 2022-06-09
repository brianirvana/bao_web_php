<?
    // archivo: captcha.php
    function randomText($length) {
        $pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
        for($i=0;$i<$length;$i++) {
          $key .= $pattern{rand(0,35)};
        }
        return $key;
    }
?>