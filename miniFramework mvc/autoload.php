<?php 

    function autoCargar($claseName){
        include 'controllers/'.$claseName.'.php.';
    }

    spl_autoload_register('autoCargar');

?>