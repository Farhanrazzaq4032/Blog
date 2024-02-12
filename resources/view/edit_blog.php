<?php

use App\Controller\Blog;

 view("tamp", "header");

 $post = new Blog;

 $data = $post->getSinglePost();
//  print_r($data);
?>

<section id="blog-ulf">
    <form class="blog-form"  action="update-post" method="POST" enctype="multipart/form-data">
        <h1 class="form-name">Edit Blog</h1>
        <div class="blog-name mt">
            <input class="blog-inp" type="text" name="postname" placeholder="Blog Title" value="<?php echo $data[0]['post_name']; ?>">
        </div>
        <div class="img-upl mt">
            <label class="blog-img-lab" for="img">Blog Image</label>
            <span class="img-des">Please upload the file you want to share with us</span>
            <div class="blog-file mt-s">
                <input class="file-inp" id="fileupl" type="file" name="image" value="<?php echo $data[0]['image']; ?>">
                <label class="blog-upload" for="fileupl">Upload File</label>
                <div>
                <img width="100px" height="100px" src="resources/uploads/<?= $data[0]['image']; ?>" alt="images">

                </div>
            </div>
        </div>
        <div class="blog-des mt">
            <label class="blog-dec-lab" for="blog">Blog Description</label>
            <textarea class="blog-inp blog-text mt-s" name="blogDes" id="" cols="30" rows="7" placeholder="Enter Blog Description" ><?php echo $data[0]['content']; ?></textarea>
        </div>
        <div class="blog-btn mt">
            <button class="btn" type="submit" name="editPostBtn">Submit</button>
        </div>
        <input type="hidden" name="id" value="<?php echo $data[0]['id']; ?>">

        <?php echo getMsg('msg'); ?>
    </form>
</section>
<?php view("tamp", "footer") ?>
