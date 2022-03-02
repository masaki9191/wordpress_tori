<?php

$recipient = "williamhart9191@gmail.com";
//$recipient = "staff@design-kom.com";

// Subject
$subject = '株式会社コムデザインラボ';

$company_name = $_POST['company_name'];
$chinese_last = $_POST['chinese_last'];
$chinese_first = $_POST['chinese_first'];
$furigana_last = $_POST['furigana_last'];
$furigana_first = $_POST['furigana_first'];
$method = $_POST['method'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$message = $_POST['message'];
$text ="";
$text .= '<p><span class="label">会社名:</span><span>'.$company_name.'</span></p>';
$text .= '<p><span class="label">氏名(漢字):</span><span>'.$chinese_first.' '.$chinese_last .'</span></p>';
$text .= '<p><span class="label">氏名(フリガナ):</span><span>'.$furigana_first.' '.$furigana_last .'</span></p>';
$text .= '<p><span class="label">折り返しのご連絡方法:</span><span>'.$method.'</span></p>';
$text .= '<p><span class="label">電話番号:</span><span>'.$phone.'</span></p>';
$text .= '<p><span class="label">メールアドレス:</span><span>'.$email.'</span></p>';

$text .= '<p><span class="label">ご相談内容:</span></p>';
$text .= '<p>'.$message.'</p>';

// Message
$content = '
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <title>Mail Send</title>
  <style>
    .label {
      color: black;
    }
  </style>
</head>
<body>
  '.$text.'
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

// Additional headers
$headers[] = 'To: '.$recipient;
$headers[] = 'From: '.$email;

// Mail it
mail($recipient, $subject, $content, implode("\r\n", $headers)) or die("Error!");


// Subject
$subject1 = '株式会社コムデザインラボです。';

$text1 = "";
$text1 .= $chinese_first.' '.$chinese_last.'様<br>';
$text1 .= 'お問い合わせを頂きまして誠にありがとうございます。<br>';
$text1 .= '株式会社コムデザインラボです。<br>';
$text1 .= '現在、自動返信を送らせて頂いております。<br>';
$text1 .= '改めて担当よりご連絡をさせて頂きます。<br>';
$text1 .= 'よろしくお願いいたします。<br><br>';
$text1 .= 'お電話でのご相談も可能です。<br>';

// Message
$content1 = '
<html lang="jp">

<head>
  <meta charset="UTF-8">
  <title>Mail Send</title>
  <style>
    .label {
    }
  </style>
</head>
<body>
  '.$text1.'
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers1[] = 'MIME-Version: 1.0';
$headers1[] = 'Content-type: text/html; charset=iso-8859-1';

// Additional headers
$headers1[] = 'To: '.$email;
$headers1[] = 'From: '.$recipient;

// Mail it
mail($email, $subject1, $content1, implode("\r\n", $headers1)) or die("Error!");


header("Location: ".HOME . 'complete');

?>