<?php

switch($_GET['action'])
{
    case 'set':
        if (isset($_GET['name']) && isset($_GET['value']))
            setcookie($_GET['name'], $_GET['value'], time() + 60);
        break;

    case 'get':
        if (isset($_GET['name']) && isset($_COOKIE[$_GET['name']]))
            echo $_COOKIE[$_GET['name']] . "\n";
        break;

    case 'del':
        if (isset($_GET['name']))
            setcookie($_GET['name'], '', 1);
        break;
        
    }