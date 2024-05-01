<?php
  class config_2 {
    private static $pdo = NULL;

    public static function getConnexion() {
      if (!isset(self::$pdo)) {
        try{
          self::$pdo = new PDO('mysql:host=localhost;dbname=malek11', 'root', '',
          [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
          
        }catch(Exception $e){
          die('Erreur: '.$e->getMessage());
        }
      }
      return self::$pdo;
    }
  }
  class config {
    private static $pdo = NULL;

    public static function getConnexion() {
      if (!isset(self::$pdo)) {
        try {
          self::$pdo = new PDO('mysql:host=localhost;dbname=malek11', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
          ]);
        } catch (Exception $e) {
          error_log('Connection error: ' . $e->getMessage()); // Log error to a file.
          return null; // Return null or handle the lack of connection gracefully.
        }
      }
      return self::$pdo;
    }
}
  class config_3   {
    private static $pdo = NULL;

    public static function getConnexion() {
      if (!isset(self::$pdo)) {
        try {
          self::$pdo = new PDO('mysql:host=localhost;dbname=malek11', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
          ]);
        } catch (Exception $e) {
          error_log('Connection error: ' . $e->getMessage()); // Log error to a file.
          return null; // Return null or handle the lack of connection gracefully.
        }
      }
      return self::$pdo;
    }
}
?>
