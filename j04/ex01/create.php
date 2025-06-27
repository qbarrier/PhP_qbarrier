<?php

$doublon = 0;
if (isset($_POST['login'], $_POST['passwd'], $_POST['submit']) && strlen($_POST['login']) && strlen($_POST['passwd']) && $_POST['submit'] === "OK")
{
    if (!file_exists('./private'))
        mkdir('./private');
    if (!file_exists('./private/passwd'))
        file_put_contents('./private/passwd', null);

    

    $file = unserialize(file_get_contents('./private/passwd'));
    if ($file)
    {
        foreach ($file as $key => $value)
        {
        
            if ($value['login'] === $_POST['login'])
                $doublon = 1;
        }
    }
    if ($doublon == 0)
    {
        $file[] = ['login' => $_POST['login'], 'passwd' => hash('sha512', $_POST['passwd'])];
        file_put_contents('./private/passwd', serialize($file));
        echo "OK\n";
    }
    else
        echo "ERROR\n";
}
else
    echo "ERROR\n";
?>