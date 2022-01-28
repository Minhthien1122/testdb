<?php

function showError($errno, $errstr, $errfile, $errline){
    echo 'co loi: '.$errno;
    echo '<br>Thong bao loi: '.$errstr;
    echo '<br>File: '.$errfile;
    echo '<br>Dong: '.$errline;
}

function show404Error(){
    die('Page not found');
}