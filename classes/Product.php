<?php

require_once "MySql.php";

class Product extends Mysql
{
    // get all products
    public function getAll()
    {
        $sql = "SELECT * FROM products";
        $res =  $this->connect()->query($sql);
        $products = [];
        if ($res->num_rows > 0) {
            while ($row =  $res->fetch_assoc()) {
                $products[] = $row;
            }
        }
        return $products;
    }

    // get one product 
    public function getOne($id)
    {
        $sql = "SELECT * FROM products WHERE id = '$id'";
        $res =  $this->connect()->query($sql);
        $product = NULL;
        if ($res->num_rows > 0) {
            $product = $res->fetch_assoc();
        } else {
            echo "<div class='container text-center' ><h1>No such id</h1></div>";
        }
        return $product;
    }


    // create
    public function create(array $data)
    {
        $data['name'] = mysqli_real_escape_string($this->connect(), $data['name']);
        $data['description'] = mysqli_real_escape_string($this->connect(), $data['description']);
        $sql = "INSERT INTO products(`name`,`description`,`img`,`price`,`created_at`) 
        VALUES ('{$data['name']}','{$data['description']}','{$data['img']}','{$data['price']}',CURRENT_TIME())";
        $res =  $this->connect()->query($sql);
        if ($res == true) {
            return true;
        }
        return false;
    }

    // edit 
    public function update($id, array $data)
    {
        $data['name'] = mysqli_real_escape_string($this->connect(), $data['name']);
        $data['description'] = mysqli_real_escape_string($this->connect(), $data['description']);
        $sql = " UPDATE products SET
        `name` = '{$data['name']}',
        `description` = '{$data['description']}',
        `price` = '{$data['price']}'
         WHERE id ='$id' ";
        $res =  $this->connect()->query($sql);
        if ($res == true) {
            return true;
        }
        return false;
    }
    // delete 
    public function delete($id)
    {
        $sql = " DELETE FROM products 
        WHERE id ='$id' ";
        $res =  $this->connect()->query($sql);
        if ($res == true) {
            return true;
        }
        return false;
    }
}
