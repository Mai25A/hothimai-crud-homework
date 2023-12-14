<?php require_once('partial/header.php');
    include_once('./database/database.php');
    $id = $_GET['id'];
    $st = selectOnestudent($id);
?>
    <div class="container p-4">
        <form action="update_model.php?id=<?php echo $_GET['id'] ?>" method="post">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $st[0]['name']; ?>">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" placeholder="Age" name="age" value="<?php echo $st[0]['age']; ?>">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $st[0]['email']; ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Image URL" name="image_url" value="<?php echo $st[0]['profile']; ?>">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Update</button>
            </div>
        </form>
    </div>
<?php require_once('partial/footer.php'); ?>