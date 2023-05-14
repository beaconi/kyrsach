<?php
class Shop {
    private $dbh = null;


    private function connect() {
        $dsn = 'mysql:host=localhost;dbname=shop';
        $username = 'root';
        $password = '';
        $dsn = 'mysql:host=localhost;dbname=shop';
        $username = 'hochy';
        $password = 'avt0mat';

        try  {
            $this->dbh = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            echo 'Подключение не удалось: ' . $e->getMessage();
        }
    }

    public function getSingleProduct($product_id){

        if (!$this->dbh) {
            $this->connect();
        }
        $stmt = $this->dbh->prepare('SELECT * FROM products WHERE id = :id');
        $stmt->bindParam(':id', $product_id);
        $stmt->execute();

        // Обработка данных из результата выборки
        $row = $stmt->fetch();

        return $row;
    }
    public function getProducts(){
        if (!$this->dbh) {
            $this->connect();
        }
        return $this->dbh->query('SELECT * FROM products');
    }
}




