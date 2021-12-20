<?php
class book extends main
{
    public function saveProduct(array $insert)
    {
        $db = new connection;
        $this->sku = $insert['sku'];
        $this->name = $insert['name'];
        $this->price = $insert['price'];
        $this->type = $insert['type'];
        $this->weight = $insert['weight'];

        $sql = "INSERT INTO product (sku,name,type,weight,price) VALUES (?,?,?,?,?)";
        $query = $db->Query($sql, [$this->sku, $this->name, $this->type, $this->weight, $this->price]);
        return $query;
    }

    public function getSpecs($id)
    {
        $db = new connection;
        $this->id = $id;
        $sql = "SELECT weight FROM product WHERE id = ?";
        $query = $db->Query($sql, [$this->id]);
        $specs = $query->fetch(PDO::FETCH_OBJ);
        $specs = "<p>Weight: " . $specs->weight . " Kg</p>";
        return $specs;
    }
}
?>