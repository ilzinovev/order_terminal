
<?php
include 'config.php';


$url = 'http://10.11.21.11:420/printsburg/hs/ChangeOrderStatus/Data?key='.$key.'&order='.$_POST['order'].'&status=15&operator='.$_POST['subject2'];
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, "Content-Type:application/xml");
$response = curl_exec($ch);
$fh = fopen("file3.xml", 'w');
fwrite($fh, $response);
fclose($fh);
if(curl_errno($ch)){
    throw new Exception(curl_error($ch));
}
?>
<script>
 window.location.href = "polka2.php"
</script>
