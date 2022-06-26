<?php
  class Post {
    //DB stuff
    private $conn;
    private $table = 'posts';
    
    //Post Properties
    public $id;
    public $category_id;
    public $category_name;
    public $title;
    public $body;
    public $author;
    public $created_at;

    //constructor with db
    public function __construct($db) {
      $this->conn = $db;
    }
    
    //get posts
    public function read() {
      //create query
      $query = 'SELECT c.name as category_name,
                p.id, 
                p.category_id,
                p.title,
                p.body,
                p.author,
                p.created_at
                FROM 
                ' . $this->table . ' p 
                LEFT JOIN 
                categories c ON p.category_id = c.id 
                ORDER BY 
                p.created_at DESC';
      
      //prepare statement
      $stmt = $this->conn->prepare($query);
      
      //execute
      $stmt->execute();
      
      return $stmt;
    }
    
    
    //get single post
    public function read_single(){
      //create query
      $query = 'SELECT c.name as category_name,
                p.id, 
                p.category_id,
                p.title,
                p.body,
                p.author,
                p.created_at
                FROM 
                ' . $this->table . ' p 
                LEFT JOIN 
                categories c ON p.category_id = c.id 
                WHERE 
                p.id = ? 
                LIMIT 0,1';
      
      //prepare statement
      $stmt = $this->conn->prepare($query);
      
      //bind id
      $stmt->bindParam(1, $this->id);
      
    }
