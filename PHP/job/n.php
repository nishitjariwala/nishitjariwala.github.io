<?php

    function my()
    {
        static $x=0;
        $x++;
        echo $x;
    }
    my();
    my();
    my();

?>