<?php require APPROOT . '/views/inc/header.php'; ?>
    <h1><?php echo $data['title'] ?></h1>
    
    <div class="container">
        <div class="content-right">
            <ul>
                <?php foreach($data['posts'] as $post): ?>
                    <li><a href="<?php echo URLROOT; ?>/posts/<?= $post->idPizza ?>"><?php echo $post->pizzaName; ?></a></li>
                <?php endforeach;?>
            </ul>
        </div>
        
    </div> 
<?php require APPROOT . '/views/inc/footer.php'; ?>