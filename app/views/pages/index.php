<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class ="container">
        <h1><?php echo $data['title'] ?></h1>

        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nume</th>
                    <th>Pret</th>
                    
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php  foreach($data['posts'] as $post): ?>
                     <tr>
                        <td><?= $post->idPizza ?></td>
                        <td><a href="<?php echo URLROOT; ?>/posts/<?= $post->idPizza ?>"><?php echo $post->pizzaName; ?></a></td>
                        <td><?= $post->pizzaPrice  ?></td>
                        
                        <td>
                            <form action="<?php echo URLROOT; ?>/posts/deleteP" method="post">
                                <input type="hidden" name="idPizza" value="<?= $post->idPizza ?>">
                                <button type="submit">Delete</button>
                            </form>
                            <form action="<?php echo URLROOT; ?>/posts/updateP" method="post">
                                <input type="hidden" name="idPizza" value="<?= $post->idPizza ?>">
                                <button type="submit">Update</button>
                                
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

       
        <?php

            $formMethod = isset($post) ? '/posts/updatePizza' : '/posts/addpizza';
        ?>
        <form action="<?php echo URLROOT.$formMethod; ?>" method="post">
            <input type="hidden" value="<?= $post->idPizza ?>" name="idPizza">
            <input type="text" name="name" placeholder="Nume Pizza" value=" <?php $post->pizzaName ?>">
            <input type="text" name="price" placeholder="Pret Pizza" value="<?= $post->pizzaPrice ?>">
            <button type="submit"> <?= isset($post->pizzaNames) ? 'UPDATE' : 'ADD' ?></button>
            
        </form>

    </div>


<?php require APPROOT . '/views/inc/footer.php'; ?>