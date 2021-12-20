<?php
class dvd extends main
{
    public function saveProduct(array $insert)
    {
        $db = new connection;
        $this->sku = $insert['sku'];
        $this->name = $insert['name'];
        $this->price = $insert['price'];
        $this->type = $insert['type'];
        $this->size = $insert['size'];

        $sql = "INSERT INTO product (sku,name,type,size,price) VALUES (?,?,?,?,?)";
        $query = $db->Query($sql, [$this->sku, $this->name, $this->type, $this->size, $this->price]);
        return $query;
    }

    public function getSpecs($id)
    {
        $db = new connection;
        $this->id = $id;
        $sql = "SELECT size FROM product WHERE id = ?";
        $query = $db->Query($sql, [$this->id]);
        $specs = $query->fetch(PDO::FETCH_OBJ);
        $specs = "<p>Size: " . $specs->size . " Mb</p>";
        return $specs;
    }
}
?>