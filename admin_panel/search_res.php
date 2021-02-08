<?php require_once('views/header.php') ?>
<?php require_once('views/navbar.php') ?>

<?php 
    require_once('../Controllers/Admin.php');
    require_once('../Models/DataBase.php');

    $database = new DataBase();
    $admin = new Admin($database->connectDb());
    
            
    


?>


    <table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Message</th>
        <th scope="col">Date</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($search as $item): ?>
        <tr class="table-active">
            <td><?= $item['id'] ?></td>
            <td><?= $item['name'] ?></td>
            <td><?= $item['email'] ?></td>
            <td><?= $item['message'] ?></td>
            <td><?= $item['date'] ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
    </table>

<?php require_once('views/footer.php') ?>