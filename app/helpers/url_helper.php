<?php

    // simple page redirect
    function redirect($location){
        header('location: ' . URLROOT . '/' . $location);
    }