<?php
    include"methodBX24.php";
    $id = $_GET["id"];

if(isset($_POST["Add"])) {
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $test = [
        'EMAIL' => [['VALUE' => $email]],
        'PHONE' => [['VALUE' => $phone]]
    ];
    updateContact($id, $test);
    header('location: index.php');
}
  
?>

<h3>CẬP NHẬP DỮ LIỆU</h3>
<?php
    foreach (getContact($id) as $contact) {
        if($contact['start'] == null){       
        if($contact['PHONE'] == null && $contact['EMAIL'] != null)
    {?>
    <form action="" method="POST">
        <input type="text" name="phone" placeholder="Số điện thoại">
        <div>
            <a href="index.php">Quay lại</a>
            <input type="submit" name="Add" value="Thêm">
        </div>
    </form>
<?php } else if($contact['PHONE'] != null && $contact['EMAIL'] == null) {?>
    <form action="" method="POST">
        <input type="text" name="email" id="" placeholder="email">
    <div>
        <a href="index.php">Quay lại</a>
        <input type="submit" name="Add" value="Thêm">
    </div>      
    </form>
<?php } else {?>
    <form action=""  method="POST">
        <input type="text" name="phone" placeholder="Số điện thoại">
        <input type="text" name="email" id="" placeholder="email">
    <div>
        <a href="index.php">Quay lại</a>
        <input type="submit" name="Add" value="Thêm">
    </div>  
    </form>
<?php }?>
<?php }?>
<?php }?>