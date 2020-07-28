<?php require_once 'session_start.php'; ?>
<?php
function calculateChecksum($data, $passphrase)
{
    $hashedFields = ['accountId', 'action', 'orderReference', 'costCenter', 'customerCountry', 'orderWeight', 'deliveryMethodOverrides', 'extraSecure'];
    $hashedData = [];

    foreach ($data as $field => $value) {
        if (in_array($field, $hashedFields)) {
            $hashedData[$field] = $value;
        }
    }

    ksort($hashedData);
    $hashString = http_build_query($hashedData);
    $hashString .= '&' . $passphrase;

    return hash('sha256', $hashString);
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>bpost test - bpost</title>
  </head>
  <body>
    <?php if (file_exists('./settings.php')): ?>
      <?php
        require_once './settings.php';

        $bpostData = [
          'accountId' => $settings['accountId'],
          'action' => 'START',
          'orderReference' => uniqid(),
          'customerCountry' => 'BE',
          'cancelUrl' => $settings['root_url'] . '/bpost_callback.php?type=cancel',
          'confirmUrl' => $settings['root_url'] . '/bpost_callback.php?type=confirm',
          'errorUrl' => $settings['root_url'] . '/bpost_callback.php?type=error',
        ];
        $bpostData['checksum'] = calculateChecksum($bpostData, $settings['passphrase']);
      ?>
      <form method="POST" action="https://shippingmanager.bpost.be/ShmFrontEnd/start" target="shmFrame" style="display:none;" id="shmDataForm">
        <?php foreach ($bpostData as $field => $value): ?>
          <label for="<?php echo $field; ?>"><?php echo $field; ?></label>
          <input name="<?php echo $field; ?>" value="<?php echo $value; ?>"/>
          <br>
        <?php endforeach; ?>
        <input type="submit">
      </form>
      <iframe width="100%" height="600" name="shmFrame"></iframe>
      <script type="text/javascript">document.getElementById("shmDataForm").submit();</script>
    <?php else: ?>
      <p style="border: 2px solid red; padding: 5px 10px;">ERROR: settings.php does not exist</p>
      <p>Create the file, based on settings.example.php</p>
    <?php endif; ?>
    <hr>
    <p>Session id: <code><?php echo session_id(); ?></code></p>
  </body>
</html>
