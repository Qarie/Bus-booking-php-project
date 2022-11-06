<?php

require_once'config.php';
$seat=$_GET['seat'];
$query=mysqli_query($link,"select * from bookings where seat= $seat ");
$row=mysqli_fetch_assoc($query);
