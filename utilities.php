<?php
function showmsg($msg, $from)
{ ?>
<html>
  <head>
    <title> Error info </title>
    <meta charset="utf-8" />
  </head>
  <body>
    <p>
	  <?php echo $msg; ?>
	  <a href="<?php echo $from; ?>"> Return </a>
	</p>
  </body>
</html>
<?php
}
