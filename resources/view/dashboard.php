<?php

use App\Controller\Dashboard;

view("tamp", "header");
echo getMsg('msg');
$dashboardC = new Dashboard();
$data = $dashboardC->postData;
?>

<section id="blog-container">
    <?php
    if (!empty($data)) {
        foreach ($data as $post) :
    ?>
            <div class="blog">
                <div class="blog-detail">
                    <h2 class="blog-title"><?= $post['post_name']; ?></h2>
                    <div class="blog-image">
                        <img src="resources/uploads/<?= $post['image']; ?>" alt="images">
                    </div>
                    <div class="blog-des">
                        <p><?= $post['content']; ?></p>
                    </div>
                    <div class="blog-function">
                        <div class="like">
                            <a href="#" class="like-icon"> <i class="fa-solid fa-heart"></i></a><span class="like-cont">1.5k</span>
                            <a href=""></a>
                        </div>
                        <div class="crud">
                            <li><a href="post-delete?id=<?= $post['id']; ?>">Delete</a></li>
                            <li><a href="post-edit?id=<?= $post['id']; ?>">Edit</a></li>
                        </div>
                    </div>
                </div>
            </div>
    <?php endforeach;
    } else {
        setMsg('No Blog');
        redirect('add-blog');
    } ?>

</section>