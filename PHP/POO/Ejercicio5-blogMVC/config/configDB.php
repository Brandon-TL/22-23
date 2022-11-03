<?php
    //Generales a la BD
    define("DBHOST", 'localhost');
    define("DBUSER", 'root');
    define("DBPASS", '');
    define("DBPORT", 3306);
    define("DB", 'dwes');
    define("DBOPTIONS", [
            'PDO::ATTR_ERRMODE' => 'PDO::ERRMODE_EXCEPTION',
            'PDO::ATTR_DEFAULT_FETCH_MODE' => 'PDO::FETCH_BOTH'
    ]);

    //Relativas al chequeo de los usuario logueados
    define("USER_FIELD", 'username');
    define("PASS_FIELD", 'password');
    define("AUTH_FIELD", 'autenticacion');
?>

