<?php
/**
 * User: Just
 * Date: 29/03/13
 * Time: 19.44
 */
define('BASE_URL', 'http://www.gravatar.com/avatar/');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $size = isset($_POST['size']) ? $_POST['size'] : 200;
  if (isset($email) && isset($size)) {
    $md5Email = md5($email);
    $gravatarURL = BASE_URL . $md5Email . '?s=' . $size;
  }
}
?>


<!DOCTYPE HTML>
<html lang="it-IT">
<head>
    <meta charset="UTF-8">
    <title>JGravatar - Get Gravatar from email</title>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="style.css">

</head>
<body>

<div id="wrapper">
    <h1>Gravatar retriever</h1>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <p><label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Email address"></p>

        <p><label for="size">Size</label>
            <input type="number" min="1"  id="size" name="size" placeholder="Desired Size"></p>

        <p><input type="submit" value="Show me the face!"></p>
    </form>
  <?php if (isset($size) && isset($gravatarURL)): ?>
    <img width="<?= $size ?>" height="<?= $size ?>" src="<?= $gravatarURL ?>">
  <?php endif; ?>
</div>



</body>
</html>