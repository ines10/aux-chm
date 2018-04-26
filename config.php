<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 3/20/18
 * Time: 11:14
 */
class config {
    private static $instance = NULL;

    public static function getConnexion() {
        if (!isset(self::$instance)) {
            try{
                self::$instance = new PDO('mysql:host=localhost;dbname=users', 'root', 'PASSWORD');
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }
        return self::$instance;
    }
}