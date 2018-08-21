<?php
    class Post {
        private $db;

        public function __construct(){
            $this -> db = new Database;
        }

        public function getPosts(){
            $this -> db -> query('SELECT *, 
                                   SUBSTRING('. DB_PREFIX .'posts.body, 1, 400) AS abstract, 
                                   '. DB_PREFIX .'posts.id AS postId,
                                   '. DB_PREFIX .'users.id AS userId,
                                   '. DB_PREFIX .'posts.created_at AS postCreated,
                                   '. DB_PREFIX .'users.created_at AS userCreated                                   
                                  FROM  '. DB_PREFIX .'posts
                                  INNER JOIN  '. DB_PREFIX .'users
                                  ON  '. DB_PREFIX .'posts.user_id = '. DB_PREFIX .'users.id
                                  ORDER BY  '. DB_PREFIX .'posts.created_at DESC
                                ');

            $results = $this -> db -> resultSet();

            return $results;
        }

        public function addPost($data){
            $this -> db -> query('INSERT INTO  '. DB_PREFIX .'posts (user_id, title, body) VALUES (:user_id, :title, :body)');
            // Bind values
            $this -> db -> bind (':user_id', $data['user_id']);
            $this -> db -> bind (':title', $data['title']);
            $this -> db -> bind (':body', $data['body']);
            
            // Execute the query
            if ($this -> db -> execute()){
                return true;
            } else {
                return false;
            }
        }

        public function updatePost($data){
            $this -> db -> query('UPDATE  '. DB_PREFIX .'posts SET title = :title, body = :body WHERE id = :id');
            // Bind values
            $this -> db -> bind (':id', $data['id']);
            $this -> db -> bind (':title', $data['title']);
            $this -> db -> bind (':body', $data['body']);
            
            // Execute the query
            if ($this -> db -> execute()){
                return true;
            } else {
                return false;
            }
        }

        public function getPostById($id){
            $this -> db -> query('SELECT * FROM '. DB_PREFIX .'posts WHERE id = :id');
            // Bind values
            $this -> db -> bind(':id', $id);

            // Execute the query
           
            return $this -> db -> single();
            
        }

        public function deletePostById($id){
            $this -> db -> query('DELETE FROM  '. DB_PREFIX .'posts WHERE id = :id');
            // Bind values
            $this -> db -> bind(':id', $id);

            // Execute the query
            if ($this -> db -> execute()){
                return true;
            } else {
                return false;
            }
        }
    }

   