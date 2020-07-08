
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Display the pdf file using php</title>
</head>

<body>
<?php
$file = 'php_tutorial.pdf';
$filename = 'php_tutorial.pdf';

header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="' . $filename . '"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($file));
header('Accept-Ranges: bytes');

@readfile($file);
?>
<a href="http://www.sanwebtutorials.blogspot.in/">San web corner</a>
</body>
</html>
