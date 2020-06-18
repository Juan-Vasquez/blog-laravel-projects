<?php 

    function setActive($routeNombre) {
       return request()->routeIs($routeNombre) ? 'active' : '';
    }

?>