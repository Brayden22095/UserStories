<?php
require_once('../../config/db_config.php');

class Database
{
    private $connectie;

    public function __construct()
    {
        try {
            $this->connectie = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS);
            $this->connectie->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function voerQueryUit($query, $params = [])
    {
        try {
            $stmt = $this->connectie->prepare($query);

            if ($params) {
                foreach ($params as $key => &$val) {
                    $stmt->bindParam($key + 1, $val);
                }
            }

            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }

    public function getAllCategories()
    {
        return $this->voerQueryUit("SELECT * FROM categories")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getItemsByCategory($categoryId)
    {
        return $this->voerQueryUit("SELECT * FROM items WHERE categorie_id = ?", [$categoryId])->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
