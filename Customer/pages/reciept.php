<?php
session_start();
// include'config.php';
$id=$_GET['id'];
$bus = "select * from bookings where id = $id ";
$rus=mysqli_query($link,$bus);
$row=mysqli_fetch_assoc($rus);
// $name = $row['name'];

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

</head>

<body>
<table style="padding-top: 50px" width="700" border="1" align="center">
  <tbody>
    <tr>

      <td><table width="100%"height="150px" border="0">
        <tbody>
          <tr>
            <td width="150px" rowspan="2"><img src="../../admin/assets/img/logo1.png" width="144" height="63" alt=""/></td>
            <td>JOURNEY:</td>
            <td><?php echo ($row['route']);?></td>
            <td>SEAT NUMBER:</td>
            <td><?php echo ($row['seat']);?></td>
            <td>REPORTING</td>
            <td><?php //echo ($row['']);?></td>
          </tr>
          <tr>
            <td>TRAVEL DATE:</td>
            <td><?php //echo ($row['date']);?></td>
            <td>AMOUNT PAID:</td>
            <td><?php echo ($row['amount']);?></td>
            <td>DEPARTURE</td>
            <td><?php //echo ($row['name']);?></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
  </tbody>
</table>
</body>
</html>
