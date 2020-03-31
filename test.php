<?php
function add($a,$b){
$c=$a+$b;
return $c;
}
?>
<!DOCTYPE html>
<html>
<head lang="vi">
<meta charset="UTF-8"/>
<title> php basic </title>
</head>
<body>
<button onclick='phpadd()'>add</button>
<script type="text/javascript" >
function phpadd()
{
var padd = <?php echo add(1,5);?>; // call function to insert value
alert(padd);
//alert("Hi");
}
</script>
</body>
</html>