<?php

class furniture extends main
{
    public function saveProduct(array $insert)
    {
        $db = new connection;
        $this->sku = $insert['sku'];
        $this->name = $insert['name'];
        $this->price = $insert['price'];
        $this->type = $insert['type'];
        $this->length = $insert['length'];
        $this->width = $insert['width'];
        $this->height = $insert['height'];

        $sql = "INSERT INTO product (sku,name,type,length,width,height,price) VALUES (?,?,?,?,?,?,?)";
        $query = $db->Query($sql, [$this->sku, $this->name, $this->type, $this->length, $this->width, $this->height, $this->price]);
        return $query;
    }

    public function getSpecs($id)
    {
        $db = new connection;
        $this->id = $id;
        $sql = "SELECT length,width,height FROM product WHERE id = ?";
        $query = $db->Query($sql, [$this->id]);
        $specs = $query->fetch(PDO::FETCH_OBJ);
        $specs = "<p>Dimension: " . $specs->length . "X" . $specs->width . "X" . $specs->height . "</p>";
        return $specs;
    }
}
?>