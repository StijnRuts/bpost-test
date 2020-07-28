<?php require_once 'session_start.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <title>bpost test - Cart</title>
  </head>
  <body>
    <h1>Cart</h1>
    <table>
      <tr>
        <th>Product</th>
        <th>Amount</th>
        <th></th>
      </tr>
      <?php $products = ['apple', 'banana', 'cherry']; ?>
      <?php foreach ($products as $product): ?>
        <tr>
          <td><?php echo $product; ?></td>
          <td><?php echo isset($_SESSION['cart'][$product]) ? $_SESSION['cart'][$product] : 0; ?></td>
          <td><a href="./add-to-cart.php?product=<?php echo $product; ?>">Add</a></td>
        </tr>
      <?php endforeach; ?>
    </table>
    <hr>
    <p><a href="./bpost.php">Go to bpost</a></p>
    <p>Session id: <code><?php echo session_id(); ?></code></p>
  </body>
</html>
