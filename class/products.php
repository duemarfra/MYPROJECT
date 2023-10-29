<?php
/* @autor Marcelo Dueñas */
class Products
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function insert($name, $price, $category_id)
    {
        try {
            $stmt = $this->db->getConnection()->prepare("INSERT INTO products (name, price, category_id) VALUES (:name, :price, :category_id)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':category_id', $category_id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function update($id, $name, $price, $category_id)
    {
        try {
            $stmt = $this->db->getConnection()->prepare("UPDATE products SET name = :name, price = :price, category_id = :category_id WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':category_id', $category_id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $stmt = $this->db->getConnection()->prepare("DELETE FROM products WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function selectAll()
    {
        $stmt = $this->db->getConnection()->query("SELECT p.id, p.name, p.price, c.name as category_name
                                FROM products p
                                JOIN categories c ON p.category_id = c.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
