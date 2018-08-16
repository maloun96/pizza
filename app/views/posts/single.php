<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class ="container">
        <h1>Pizza</h1>
           Pizza name: <?= $data['pizza']['pizzaName'] ?>

        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nume</th>
                    <th>Pret</th>
                    <th>Cantitate</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['ingridiente'] as $ingridient) : ?>
                     <tr>
                        <td><?= $ingridient['idIngredient'] ?></td>
                        <td><?= $ingridient['nameIngredient'] ?></td>
                        <td><?= $ingridient['priceIngredient'] ?></td>
                        <td><?= $ingridient['amountIngredient'] ?></td>
                        <td>
                            <form action="<?php echo URLROOT; ?>/posts/delete" method="post">
                                <input type="hidden" name="idIngredient" value="<?=$ingridient['idIngredient'] ?>">
                                <input type="hidden" name="idPizza" value="<?= $data['pizza']['idPizza'] ?>">
                                <button type="submit">Delete</button>
                            </form>
                            <form action="<?php echo URLROOT; ?>/posts/update" method="post">
                                <input type="hidden" name="idIngredient" value="<?=$ingridient['idIngredient'] ?>">
                                <input type="hidden" name="idPizza" value="<?= $data['pizza']['idPizza'] ?>">
                                <button type="submit">Update</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php

            $formMethod = isset($data['ingridient']) ? '/posts/updateIngredient' : '/posts/addIngredient';
        ?>
        <form action="<?php echo URLROOT.$formMethod; ?>" method="post">
            <input type="hidden" value="<?=$data['pizza']['idPizza'] ?>" name="idPizza">
            <input type="hidden" value="<?= isset($data['ingridient']) ? $data['ingridient']['idIngredient'] : '' ?>" name="idIngredient">
            <input type="text" name="name" placeholder="Nume ingridient" value="<?= isset($data['ingridient']) ? $data['ingridient']['nameIngredient'] : '' ?>">
            <input type="text" name="price" placeholder="Pret ingridient" value="<?= isset($data['ingridient']) ? $data['ingridient']['priceIngredient'] : '' ?>">
            <input type="text" name="amount" placeholder="Cantitate ingridient" value="<?= isset($data['ingridient']) ? $data['ingridient']['amountIngredient'] : '' ?>">
            <button type="submit"><?= isset($data['ingridient']) ? 'UPDATE' : 'ADD' ?></button>
            <?php if(isset($data['ingridient'])) : ?>
                <a href="<?= URLROOT ?>/posts/<?= $data['pizza']['idPizza'] ?>">Add</a>
            <?php endif; ?>
        </form>

    </div>


<?php require APPROOT . '/views/inc/footer.php'; ?>