<?php require_once('views/header.php') ?>
<?php require_once('views/navbar.php') ?>

<?php 
    require_once('../Controllers/Admin.php');
    require_once('../Models/DataBase.php');

    $database = new DataBase();
    $admin = new Admin($database->connectDb());

    $items = $admin->read(null,'contacts');
    $members = $admin->read(null,'members');
    
    if( !empty($_GET) ) {
        if( isset($_GET['btn-2']) && $_GET['btn-2'] == 'search') {
            $search = $admin->search($_GET['search']);   
        }
    }


?>

    <h3>Messages</h3>
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
        <?php foreach($items as $item): ?>
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


    <?php if(!empty($_GET['btn-2'])):?>
        <h3>search results</h3>
    <table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Message</th>
        <th scope="col">Date</th>
        <th></th>
        <th></th>
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
            <td>
                <a href=""></a>
            </td>
            <td></td>
        </tr>
        <?php endforeach ?>
    </tbody>
    </table>
    <?php endif?>
    
    <h3>Members</h3>
    <table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Date Registered</th>
        <th></th>
        <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($members as $item): ?>
        <tr class="table-active">
            <td><?= $item['id'] ?></td>
            <td><?= $item['name'] ?></td>
            <td><?= $item['email'] ?></td>
            <td><?= $item['phone_number'] ?></td>
            <td><?= $item['date_registered'] ?></td>
            <td>
                <a href="edit_members.php?id=<?=$item['id']?>&action=edit">Edit</a>
            </td>
            <td>
                <a href="edit_members.php?id=<?=$item['id']?>&action=delete">delete</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
    </table>
<?php require_once('views/footer.php') ?>
