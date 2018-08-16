<?php

class Posts extends Controller{
    public $postModel;

    public function __construct() {
        if(!$_SESSION['user_id']) {
            header('Location:'. URLROOT . '/users/login');
        }

        $this->postModel = $this->model('Post');
    }

    public function index(){
        $url = explode('/', $_GET['url']);

        if(isset($url[1]))
            return $this->list($url[1]);

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

    public function list($id) {
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

    // Luam datele ingredientului
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

    // Face update in DB
    public function updateIngredient() {
        $this->postModel->updateIngredient($_POST);
        header('Location:'. URLROOT . '/posts/'.$_POST['idPizza']);
    }

    public function addpizza() {
        $this->postModel->addPizza($_POST);
        header('Location:'. URLROOT . '/pages/index');
    }
}