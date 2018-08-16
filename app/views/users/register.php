<?php 
require APPROOT . '/views/inc/header.php'; ?>
<div class="content-left">
    <h1>Register Account</h1>
    
    <form action="<?php echo URLROOT; ?>/users/register" method="post">
        <table>
            <td>
            <label>Name:</label>
            <input type="text" name="name"  value="<?php echo $data['name']; ?>" />
            </td>
            <td>
            <label>Email:</label>
            <input type="text" name="email"  value="<?php echo $data['email']; ?>" />
            </td>
            <td>
            <label>Password:</label>
            <input type="text" name="password"  value="<?php echo $data['password']; ?>" />
            </td>
            <td>
            <label>Confirm Password:</label>
            <input type="text" name="confirm_password"  value="<?php echo $data['confirm_password']; ?>" />
            </td>
        </table>
        <input type="submit" value="Register">
    </form>
    
 </div>   
<?php require APPROOT . '/views/inc/footer.php'; ?>