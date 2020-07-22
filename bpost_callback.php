<?php
session_start();

$data = [
  'date' => date('r'),
  'GET' => $_GET,
  'POST' => $_POST,
  'SESSION' => $_SESSION,
  'session_id' => session_id(),
];
$message = var_export($data, true);
file_put_contents('bpost_callback.log', $message."\n\n", FILE_APPEND | LOCK_EX);

$_SESSION['bpost'] = $_POST;
?>

<p>Sending to next step. Waiting...</p>
<script type="text/javascript">
  window.parent.location.href="./confirm.php";
</script>
