<?php

class Posts extends Controller{
    public $postModel;

    public function __construct() {
        if(!isset($_SESSION['user_id'])) {
            header('Location:'. URLROOT . '/users/login');
        }

        $this->postModel = $this->model('Post');
    }

    public function index(){
        $url = explode('/', $_GET['url']);

        if(isset($url[1]))
            return $this->llist($url[1]);

        $data = [];
        $this->view('posts/index');
    }

    public function add() {
        $this->view('posts/add');
    }

    public function delete(){
        $this->postModel->deleteIngredient($_POST['idIngredient']);
        header('Location:'. URLROOT . '/posts/'.$_POST['idPizza']);
    }

    public function llist($id) {
        $pizza = $this->postModel->getPost($id);
        $ingridiente = $this->postModel->getIngridiente($id);
        $data = [
            'pizza' => $pizza,
            'ingridiente' => $ingridiente,
        ];

        $data = json_decode(json_encode($data), true);

        $this->view('posts/single', $data);
    }

    public function addIngredient() {
        $this->postModel->addIngredient($_POST);

        header('Location:'. URLROOT . '/posts/'.$_POST['idPizza']);
    }

    public function update() {
        $pizza = $this->postModel->getPost($_POST['idPizza']);
        $ingridiente = $this->postModel->getIngridiente($_POST['idPizza']);
        $ingridient = $this->postModel->getIngridient($_POST['idIngredient']);
        $data = [
            'pizza' => $pizza,
            'ingridiente' => $ingridiente,
            'ingridient' => $ingridient
        ];

        $data = json_decode(json_encode($data), true);

        $this->view('posts/single', $data);
    }

    
    public function updateIngredient() {
        $this->postModel->updateIngredient($_POST);
        header('Location:'. URLROOT . '/posts/'.$_POST['idPizza']);
    }

    
    
//    --------------------------------------------------------------------------------
    
    public function addpizza() {
        $this->postModel->addPizza($_POST);
        header('Location:'. URLROOT . '/pages/index');
    }
    
    public function updateP() {
        $this->postModel->updatePizza($_POST);
        
        header('Location:'. URLROOT . '/posts/index');
    }
    
    public function updatePizzaDate() {
        $pizza = $this->postModel->getPost($_POST['idPizza']);
        
        $pizzaName = $this->postModel->getIngridiente($_POST['pizzaName']);
        $pricePizza = $this->postModel->getIngridient($_POST['pizzaPrice']);
        $data = [
            'pizza' => $pizza,
            'pizzaName' => $pizzaName,
            'pricePizza' => $pricePizza
        ];
        
        $data = json_decode(json_encode($data), true);

        $this->view('pages/posts', $data);
    }
 
    
}