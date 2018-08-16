<?php require APPROOT . '/views/inc/header.php'; ?>

    <div class ="container">
        <h1>Pizza</h1>
        <form action="<?php echo URLROOT; ?>/posts/addpizza" method="POST">
            <input type="text" name="name" placeholder="Nume pizza">
            <input type="text" name="price" placeholder="Pret">
            <button type="submit"> SUBMIT </button>
        </form>
    </div>


<?php require APPROOT . '/views/inc/footer.php'; ?>