<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1 style="color: red">TITA COMPANY</h1>
  <?php include "methodBX24.php"?>
  <table border="1" width=100%>
    <tr >
        <th>ID</th>
        <th>Tên Khách Hàng</th>
        <th>Ngày sinh</th>
        <th>Số điện thoại</th>
        <th>Email</th>
        <th>Tuỳ chỉnh</th>
    </tr>
  <?php foreach (contactList()['result'] as $contact)
    if($contact['PHONE'] == null || $contact['EMAIL'] == null) {?>
    <tr> 
        <td><?=$contact['ID']?></td>
        <td><?=$contact['LAST_NAME']?> <?=$contact['NAME']?></td>
        <td><?=date("d/m/Y", strtotime($contact['BIRTHDATE']));?></td>
        <td><?php foreach ($contact['PHONE'] as $phone) { echo $phone['VALUE'];}?></td>
        <td><?php foreach ($contact['EMAIL'] as $email) { echo $email['VALUE'];}?></td>
        <td width=20%>        
            <a href="updateContact.php?id=<?=$contact['ID']?>">Sửa</a>
            <a href="deleteContact.php?id=<?=$contact['ID']?>">Xoá</a>
        </td>
    </tr>
    <?php }?>
    </table>
</body>
</html>