<?php require_once 'session_start.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <title>bpost test - Confirm</title>
  </head>
  <body>
    <h1>Confirm order</h1>

    <?php if (empty($_SESSION['cart'])): ?>
      <p style="border: 2px solid red; padding: 5px 10px;">ERROR: Empty cart</p>
    <?php else: ?>
      <table>
        <tr>
          <th>Product</th>
          <th>Amount</th>
        </tr>
        <?php foreach ($_SESSION['cart'] as $product => $amount): ?>
          <tr>
            <td><?php echo $product; ?></td>
            <td><?php echo $amount; ?></td>
          </tr>
        <?php endforeach; ?>
      </table>
    <?php endif; ?>

    <table>
      <tr>
        <th>name</th>
        <td>
          <?php echo $_SESSION['bpost']['customerFirstName']; ?>
          <?php echo $_SESSION['bpost']['customerLastName']; ?>
        </td>
      </tr>
      <tr>
        <th>address</th>
        <td>
          <?php echo $_SESSION['bpost']['customerStreet']; ?>
          <?php echo $_SESSION['bpost']['customerStreetNumber']; ?>
          <?php echo $_SESSION['bpost']['customerBox']; ?><br>
          <?php echo $_SESSION['bpost']['customerPostalCode']; ?>
          <?php echo $_SESSION['bpost']['customerCity']; ?>
          <?php echo $_SESSION['bpost']['customerCountry']; ?>
        </td>
      </tr>
      <tr>
        <th>deliveryDate</th>
        <td><?php echo $_SESSION['bpost']['deliveryDate']; ?></td>
      </tr>
      <tr>
        <th>deliveryMethod</th>
        <td><?php echo $_SESSION['bpost']['deliveryMethod']; ?></td>
      </tr>
      <tr>
        <th>orderReference</th>
        <td><?php echo $_SESSION['bpost']['orderReference']; ?></td>
      </tr>
    </table>

    <hr>
    <p><a href="./success.php">Confirm order</a></p>
    <p>Session id: <code><?php echo session_id(); ?></code></p>
  </body>
</html>
