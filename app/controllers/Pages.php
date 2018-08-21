<?php

    class Pages extends Controller {
        public function __construct(){
            
        }

        public function index(){
            if (!isLoggedIn()){
            
                $data = [
                    'title' => 'SharePosts',
                    'description' =>  'Simple social network built on the TraversyMVC PHP Framework.'
                ];

                
                $this -> view ('pages/index',$data);
            } else {
                redirect('posts');
            }
        }

        public function about(){
            $data = [
                'title' => 'About Us',
                'description' =>  'App to share posts among users.'
            ];
            $this -> view ('pages/about', $data);
        }

        public function edit(){

        }
    }