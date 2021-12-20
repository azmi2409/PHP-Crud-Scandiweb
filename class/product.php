<?php

class product
{
    public function deleteProduct($id)
    {
        $db = new connection;
        $this->id = $id;
        $sql = "DELETE FROM product WHERE id = ?";
        $db->Query($sql, [$this->id]);
        return $this->goHome();
    }

    public function getAll()
    {
        $db = new connection;
        $sql = "SELECT * FROM product";
        $query = $db->Query($sql);
        return $query;
    }

    public function getProduct()
    {
        $sql = $this->getAll();
        $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $data) {
            echo "<div class='col-sm-3 pb-3'>";
            echo "<div class='card border-dark rounded'>";
            echo "<div class='card-body text-center'>";
            echo "<input type='checkbox' name='id[]' class='delete-checkbox float-left' value=" . $data['id'] . " />";
            echo "<p>" . strtoupper($data['sku']) . "</p>";
            echo "<p>" . $data['name'] . "</p>";
            echo "<p>$" . $data['price'] . "</p>";
            $specs = new $data['type'];
            echo $specs->getSpecs($data['id']);
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    }
    public function goHome()
    {
        header("Location: index.php");
    }
}
?>