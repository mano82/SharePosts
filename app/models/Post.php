<?php
    class Post {
        private $db;

        public function __construct(){
            $this -> db = new Database;
        }

        public function getPosts(){
            $this -> db -> query('SELECT *, 
                                   SUBSTRING('. $this -> db->tblpfx .'posts.body, 1, 400) AS abstract, 
                                   '. $this -> db->tblpfx .'posts.id AS postId,
                                   '. $this -> db->tblpfx .'users.id AS userId,
                                   '. $this -> db->tblpfx .'posts.created_at AS postCreated,
                                   '. $this -> db->tblpfx .'users.created_at AS userCreated                                   
                                  FROM  '. $this -> db->tblpfx .'posts
                                  INNER JOIN  '. $this -> db->tblpfx .'users
                                  ON  '. $this -> db->tblpfx .'posts.user_id = '. $this -> db->tblpfx .'users.id
                                  ORDER BY  '. $this -> db->tblpfx .'posts.created_at DESC
                                ');

            $results = $this -> db -> resultSet();

            return $results;
        }

        public function addPost($data){
            $this -> db -> query('INSERT INTO  '. $this -> db->tblpfx .'posts (user_id, title, body) VALUES (:user_id, :title, :body)');
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
            $this -> db -> query('UPDATE  '. $this -> db->tblpfx .'posts SET title = :title, body = :body WHERE id = :id');
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
            $this -> db -> query('SELECT * FROM '. $this -> db->tblpfx .'posts WHERE id = :id');
            // Bind values
            $this -> db -> bind(':id', $id);

            // Execute the query
           
            return $this -> db -> single();
            
        }

        public function deletePostById($id){
            $this -> db -> query('DELETE FROM  '. $this -> db->tblpfx .'posts WHERE id = :id');
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

   