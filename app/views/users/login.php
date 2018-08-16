

<?php 
require APPROOT . '/views/inc/header.php'; ?>
<div class="content-left">
    <h1>Login</h1>
    
    <form action="<?php echo URLROOT; ?>/users/login" method="post">
        <table>
            <td>
            <label>Email:</label>
            <input type="text" name="email"  value="<?php echo $data['email']; ?>" />
            </td>
            <td>
            <label>Password:</label>
            <input type="password" name="password"  value="<?php echo $data['password']; ?>" />
            </td>
        </table>
        <input type="submit" value="Login">
    </form>
    
 </div>   
<?php require APPROOT . '/views/inc/footer.php'; ?>
