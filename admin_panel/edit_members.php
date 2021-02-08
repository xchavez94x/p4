
<?php require_once('views/header.php') ?>
<?php require_once('views/navbar.php') ?>

<?php 
    require_once "../Controllers/Admin.php";
    require_once "../Models/DataBase.php";

    $database = new DataBase();
    $admin = new Admin($database->connectDb());

    if(isset($_GET['id']) && $_GET['action'] == "edit")
    {
        $member = $admin->read($_GET['id'],'members');
        
        $name = $member[0]['name'];
        $email = $member[0]['email'];
        $phone_number = $member[0]['phone_number'];
        $date_registered = $member[0]['date_registered'];
        
    }

    

?>
    <form method="post" enctype="multipart/form-data">
        
        <div class="form-group">
            <label class="col-form-label" for="inputDefault"> Name</label>
            <input type="text" class="form-control" id="inputDefault" name="name"
                value="<?= isset($name)? $name: "" ; ?>"
            >
        </div>

        <div class="form-group">
            <label class="col-form-label" for="inputDefault"> Email</label>
            <input type="text" class="form-control" id="inputDefault" name="email"
                value="<?= isset($email)? $email : "" ; ?>"
            >
        </div>

        <div class="form-group">
            <label class="col-form-label" for="inputDefault"> Phone number</label>
            <input type="text" class="form-control" id="inputDefault" name="phone_number"
                value="<?= isset($phone_number)? $phone_number : "" ; ?>"
            >
        </div>

        <div class="form-group">
            <label class="col-form-label" for="inputDefault"> Date registered</label>
            <input type="text" class="form-control"  id="inputDefault" name="date_registered"
                value="<?= isset($date_registered)? $date_registered : "" ; ?>"
            >
        </div>
        
        <button class="btn btn-success" type="btn" name="btn-3" value="btn-edit">
        edit
        </button>

    </form>

    <?php require_once('views/footer.php') ?>