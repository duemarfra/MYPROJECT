<?php
/* @autor Marcelo Dueñas */
class Categories
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function insert($name)
    {
        try {
            $stmt = $this->db->getConnection()->prepare("INSERT INTO categories (name) VALUES (:name)");
            $stmt->bindParam(':name', $name);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function update($id, $name)
    {
        try {
            $stmt = $this->db->getConnection()->prepare("UPDATE categories SET name = :name WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $stmt = $this->db->getConnection()->prepare("DELETE FROM categories WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function selectAll()
    {
        $stmt = $this->db->getConnection()->query("SELECT * FROM categories");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findOrCreate($category_name)
    {
        $existing_category = $this->getCategoryByName($category_name);

        if ($existing_category) {
            return $existing_category['id'];
        } else {
            $this->insert($category_name);
            return $this->getCategoryByName($category_name)['id'];
        }
    }

    private function getCategoryByName($category_name)
    {
        $stmt = $this->db->getConnection()->prepare("SELECT id FROM categories WHERE name = :name");
        $stmt->bindParam(':name', $category_name);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
