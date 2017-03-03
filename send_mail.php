<?

$subject = $_POST["subject"];
$sender = $_POST["sender"];
$body = $_POST["body"];

mail("dmytro@sheiko.net", $subject, $sender.", ".$body);

echo json_encode(array("response"=>"success"));

?>