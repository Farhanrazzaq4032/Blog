<?php

namespace App\Controller;

use App\Model\Post;

class Blog
{
    private $imageExe = array('png', 'jgp');

    private $singlePost;
    private $id;

    public function index()
    {

        view("view", "add_blog");
    }
    public function edit()
    {
        $post = new Post();
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $this->singlePost = $post->singlePost($id);
            if (!empty($this->singlePost)) {
                view("view", "edit_blog");
            } else {

                setMsg("Not Post Find");
                redirect("dashboard");
            }
        } else {
            setMsg("Not Post Find");
            redirect("dashboard");
        }
    }

    public function getSinglePost()
    {
        $post = new Post();
        return $post->singlePost($_GET['id']);
    }

    function userPost()
    {
        if (isset($_POST['savePostBtn'])) {
            $post = new Post();
            $postName = cleanString($_POST['postname']);
            $content = cleanString($_POST['blogDes']);
            $image = $_FILES['image']['name'];
            if ($postName !== '' && $content !== '' && $image !== '') {
                if ($this->imageCheck($image)) {
                    $file_exe = pathinfo($image, PATHINFO_EXTENSION);
                    $imageName = time() . '.' . $file_exe;
                    $post->setPost($postName, $content, $imageName);
                    $post->savePost();
                    $image_tmp = $_FILES['image']['tmp_name'];
                    move_uploaded_file($image_tmp, 'resources/uploads/' . $imageName);
                    setMsg("Post Save");
                    redirect("dashboard");
                } else {
                    setMsg('Your are allowed only png, jpg');
                    redirect("add-blog");
                }
            } else {
                setMsg("Please insert all fields");
                redirect("add-blog");
            }
        } else {
            redirect("deshboard");
        }
    }

    function updatePost()
    {
        if (isset($_POST["editPostBtn"])) {
            $post = new Post();
            $id = $_POST['id'];
            $postName = cleanString($_POST["postname"]);
            $content = cleanString($_POST["blogDes"]);
            $image = $_FILES['image']['name'];
            $post->setPost($postName, $content, $image);
            $post->updatePost($id);
            setMsg('Post Updated');
            redirect('dashboard');
        }
    }

    //this function is used ot delete post
    function delete()
    {
        $post = new Post();
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $post->deletePost($id);
            setMsg("Post Deleted");
            redirect("dashboard");
        } else {
            setMsg("Not Post Find");
            redirect("dashboard");
        }
    }

    function imageCheck($imageName)
    {
        $file_exe = pathinfo($imageName, PATHINFO_EXTENSION);
        if (!in_array($file_exe, $this->imageExe)) {
            return false;
        } else {

            return true;
        }
    }
}
