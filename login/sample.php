<?php
$pass = password_hash('1234', PASSWORD_BCRYPT);
echo $pass."   ";
echo md5('1234');
?>
.top-row:after {
  content: "";
  display: table;
  clear: both;
}
.top-row > div {
  float: left;
  width: 48%;
  margin-right: 4%;
}
.top-row > div:last-child {
  margin: 0;
}