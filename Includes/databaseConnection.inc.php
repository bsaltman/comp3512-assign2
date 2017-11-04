<?php
    define('DBHOST', '');
    define('DBNAME', 'book');
    define('DBUSER', 'bsaltman');
    define('DBPASS', '');
    define('DBCONNSTRING','mysql:dbname=book;charset=utf8mb4;');
        try	{
        $pdo	=	new	PDO(DBCONNSTRING,DBUSER,DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,	PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException	$e)	{
            die($e->getMessage());
        }
?>