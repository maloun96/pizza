<?php

class Post extends AbstractModel {

    public function getPosts(){
        $this->db->query("SELECT * FROM pizzatable");
        return $this->db->resultSet();
    }

    public function getPost($id) {
        $this->db->query("SELECT * FROM pizzatable WHERE idPizza = ".intval($id)." LIMIT 1");
        return $this->db->single();
    }

    public function getIngridient($id) {
        $this->db->query("SELECT * FROM ingredientstable WHERE idIngredient = ".intval($id)." LIMIT 1");
        return $this->db->single();
    }

    public function getIngridiente($pizzaId) {
        $this->db->query("SELECT DISTINCT i.* FROm relation r LEFT JOIN ingredientstable i ON r.idIngredient = i.idIngredient
                              WHERE r.idPizza = ".intval($pizzaId));

        return $this->db->resultSet();
    }

    public function deleteIngredient($id) {
        $this->db->query("DELETE FROM relation WHERE idIngredient = ".intval($id));
        $this->db->execute();
        $this->db->query("DELETE FROM ingredientstable WHERE idIngredient = ".intval($id));
        $this->db->execute();
    }

    public function addIngredient($data) {
        $this->db->query("INSERT INTO ingredientstable (nameIngredient, priceIngredient, amountIngredient) VALUEs ('".$data['name']."', '".$data['price']."', '".$data['amount']."')");
        $this->db->execute();

        $id = $this->db->lastId();

        $this->db->query("INSERT INTO relation (idPizza, idIngredient, positionIngredient) VALUE ('".$data['idPizza']."', '".$id."', 1)");
        $this->db->execute();

    }

    public function updateIngredient($data) {
        $this->db->query("UPDATE ingredientstable SET nameIngredient = '".$data['name']."', priceIngredient = '".$data['price']."', amountIngredient = '".$data['name']."' WHERE idIngredient = ".intval($_POST['idIngredient']));
        $this->db->execute();
    }

    public function addPizza($data) {

        $this->db->query("INSERT INTO pizzatable (pizzaName, pizzaPrice) VALUES ('".$data['name']."', '".$data['price']."')");
        $this->db->execute();
    }
    
}