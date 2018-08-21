<?php require APPROOT . '/views/inc/header.php'; ?>
    <?php flash('post_message'); ?>
    <div class="row mb-3">
        <div class="col-md-6">
            <h1>Posts</h1>
        </div>
    
        <div class="col-md-6">
            <a href="<?php echo URLROOT; ?>/posts/add" class="btn btn-primary float-right">
                <i class="fas fa-pencil-alt"></i> Add Post
            </a>
        </div>
    </div>
    <!-- Elenco Post -->
    <?php foreach ($data['posts'] as $post) : ?>
        <div class="card card-body mb-3">
            <h4 class="card-title"><?php echo $post->title; ?></h4>
            <div class="small bg-light p-2 mb-3 float-right">Written by <?php echo $post->name; ?> on <?php echo $post->postCreated; ?></div>
            <p class="card-text"><?php echo strlen($post->body) > 400 ? $post->abstract . '...' : $post->body; ?></p>

            <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>" class="btn btn-dark">More</a>
        </div>
    <?php endforeach; ?>
    
<?php require APPROOT . '/views/inc/footer.php'; ?>
