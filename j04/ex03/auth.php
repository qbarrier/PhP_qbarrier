<?php

function auth($login, $passwd){
    if (!$login || !$passwd)
        return false;
    $file = unserialize(file_get_contents('../private/passwd'));
    if ($file)
    {
        foreach ($file as $key => $value)
        {
            if ($value['login'] === $login && $value['passwd'] === hash('sha512', $passwd))
                return true;    
        } 
    }
    else
        echo "FILE ERROR\n";
    return false;
}

?>