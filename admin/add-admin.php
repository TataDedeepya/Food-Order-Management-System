<?php include('partials/menu.php');?>

<div class="main-content">
<div class="wrapper">
    <h1>Add Admin</h1> 
    <br><br>
    <?php
    if(isset($_SESSION['add'])){
        echo $_SESSION['add'];
        unsnet($_SESSION['add']);
    }
    ?>
    <form action="" method="POST">
        <table class="tbl-30">
            <tr>
                <td>Full Name: </td>
            <td>
                <input type="text" name="full_name" placeholder="Enter your name">
            </td>
            </tr>

            <tr>
                <td>Username: </td>
            <td>
                <input type="text" name="username" placeholder="your username">
            </td>
            </tr>

            <tr>
                <td>Password: </td>
            <td>
                <input type="password" name="password" placeholder="your password">
            </td>
            </tr>
            <tr>
                <td colspan="2">
                <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
            </td>
            </tr>
        </table>
    </form>
</div>
</div>

<?php include('partials/footer.php');?>
<?php
//process value from form and save in database
//check if submit button is clickeed or not
if(isset($_POST['submit'])){
    //means button is clicked and we have to get data from form
    $full_name = $_POST['full_name'];
   $username = $_POST['username'];
    $password = md5($_POST['password']);//password encrypted by md5
    
    //sql to save data into databases
    $sql = "INSERT INTO admin SET
    full_name ='$full_name',
    username = '$username',
    password = '$password'
    ";
    //executing query and saving data to database
    $res = mysqli_query($conn,$sql) or die(mysqli_error());
    //check if query is executed or not
    if($res==TRUE){
       // echo "inserted";
    //create session variable to display message
    $_SESSION['add']="Admin added successfully";
    //redirect page
    header("location:".SITEURL.'admin/manage-admin.php');
    }
    else{
        //echo"no";
        
    //create session variable to display message
    $_SESSION['add']="failed to add admin";
    //redirect page
    header("location:".SITEURL.'admin/add-admin.php');
    }
    }

?>
