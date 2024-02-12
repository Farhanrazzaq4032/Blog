<?php

namespace App\Model;

class Post extends ModelDB
{

    private $table = "post";
    private $postName = "";
    private $content = "";
    private $img = "";



    function setPost($postName, $content, $img)
    {
        $this->postName = $postName;
        $this->content = $content;
        $this->img = $img;
    }

    function savePost()
    {
        $query = "INSERT INTO $this->table (post_name, content, image) VALUE ('$this->postName', '$this->content', '$this->img')";
        $this->insert($query);
    }

   function getPost(){
    $query = "SELECT *FROM $this->table ";
    return $this->select($query);

    }


   function singlePost($id){
    $query = "SELECT * FROM $this->table WHERE id = '$id'";
    return $this->select($query, false);
   }

   function updatePost($id){
    $query = "UPDATE $this->table SET post_name = '$this->postName', content = '$this->content' WHERE id = '$id' ";
    $this->update($query);
}

function deletePost($id){
    $query = "DELETE FROM $this->table WHERE id = '$id'";
    return $this->delete($query);
}
}
