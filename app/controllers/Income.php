<?php

class Income extends Controller{
    private $db;

    function __construct()
    {
        $this->db = new Database;
    }
    public function index()
    {
        $incomes = $this->db->readAll('incomes');
        $data = [
            'title' => "Income",
            'incomes' => $incomes
        ];
        $this->view('incomes/index',$data);
    }

    public function create()
    {
        $categories = $this->db->readAll('categories');
        $data = [
            'title' => "New Income",
            'categories' => $categories
        ];
        $this->view('incomes/create',$data);
    }

    public function store()
    {
        if($_SERVER['REQUEST_METHOD']== "POST")
        {
            $amount = $_POST['amount'];
            $category_id = $_POST['category_id'];
            $date = $_POST['date'];
            $user_id = 1;

            $income = $this->model('IncomeModel');

            $income->setAmount($amount);
            $income->setCategory($category_id);
            $income->setUser($user_id);
            $income->setDate($date);

            $created = $this->db->create('incomes',$income->toArray());

            header('location:'.URLROOT.'/income/index');

        }
        else 
        {
            header('location:'.URLROOT.'/income/index');
        }   
    }
    public function delete($id)
    {
        $this->db->delete('incomes',$id);
        header('location:'.URLROOT.'/income/index');
    }
}


?>