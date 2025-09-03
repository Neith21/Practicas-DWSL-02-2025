<?php
class CategoryModel
{
    private $conn;

    public $CategoryID;
    public $categoryName;
    public $categoryInfo;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getCategories()
    {
        $query = "CALL sp_SelectCategory();";
        $result = $this->conn->prepare($query);
        $result->execute();
        return $result;
    }
}
