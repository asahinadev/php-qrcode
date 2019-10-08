<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>QR コード作成</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
</head>
<body>
<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

use Endroid\QrCode\QrCode;

$method = strtolower($_SERVER["REQUEST_METHOD"]);
$data ="";
$qrCodeByte = "";
if ($method == "post") {
    $data = filter_input(INPUT_POST, "data");
    if (strlen($data) > 0) {
        $qrCodeByte = (new QrCode($data))->writeDataUri();
    }
}
?>
<div class="container pt-5">
<div class="text-center">
<img src="<?= $qrCodeByte ?>" onerror="this.outerHTML=''" />
</div>
<form method="POST">
	<div class="form-group">
		<textarea name="data" rows="3" cols="50" class="form-control"><?=$data ?></textarea>
	</div>
	<button class="btn btn-primary">送信</button>
</form>
	</div>
</body>
</html>