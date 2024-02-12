<?php view("tamp", "header") ?>

<section id="blog-ulf">
    <form class="blog-form"  action="save-post" method="POST" enctype="multipart/form-data">
        <h1 class="form-name">Blog Image Upload</h1>
        <div class="blog-name mt">
            <input class="blog-inp" type="text" name="postname" placeholder="Blog Title">
        </div>
        <div class="img-upl mt">
            <label class="blog-img-lab" for="img">Blog Image</label>
            <span class="img-des">Please upload the file you want to share with us</span>
            <div class="blog-file mt-s">
                <input class="file-inp" id="fileupl" type="file" name="image">
                <label class="blog-upload" for="fileupl">Upload File</label>
            </div>
        </div>
        <div class="blog-des mt">
            <label class="blog-dec-lab" for="blog">Blog Description</label>
            <textarea class="blog-inp blog-text mt-s" name="blogDes" id="" cols="30" rows="7" placeholder="Enter Blog Description"></textarea>
        </div>
        <div class="blog-btn mt">
            <button class="btn" type="submit" name="savePostBtn">Blog Post</button>
        </div>
        <?php echo getMsg('msg'); ?>
    </form>
</section>
<?php view("tamp", "footer") ?>
