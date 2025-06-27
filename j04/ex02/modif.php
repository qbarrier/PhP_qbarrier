<?php

$doublon = 0;
if (isset($_POST['login'], $_POST['oldpw'], $_POST['newpw'], $_POST['submit']) && strlen($_POST['login']) && strlen($_POST['oldpw']) && strlen($_POST['newpw']) && $_POST['submit'] === "OK")
{
    $file = unserialize(file_get_contents('../private/passwd'));
    if ($file)
    {
        foreach ($file as $key => $value)
        {
            if ($value['login'] === $_POST['login'] )
            {
                $doublon = 1;
                if ($value['passwd'] === hash('sha512', $_POST['oldpw']))
                {
                    if (hash('sha512', $_POST['newpw']) === hash('sha512', $_POST['oldpw']))
                        echo "Votre Nouveau Mdp doit différé de l'ancien\n"; 
                    else
                    {
                        $file[$key]['passwd'] = hash('sha512', $_POST['newpw']);
                        file_put_contents('../private/passwd', serialize($file));
                        echo "OK\n";
                    }
                }
                else
                    echo "Ancien Mot de passe incorrect\n"; 
            }      
        }
        if (!$doublon)
            echo "login inexistant\n";  
    }
    else
        echo "FILE ERROR\n";
}
else
    echo "ERROR\n";
?>