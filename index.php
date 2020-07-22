<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>bpost test</title>
  </head>
  <body>
    <h1>bpost SameSite cookie issue</h1>
    <p>
      The new SameSite feature in Google Chrome causes issues with bpost integration in webshops.<br>
      See: <a href="https://www.chromium.org/updates/same-site">https://www.chromium.org/updates/same-site</a>
    </p>
    <p>
      Launch Google Chrome with the option<br>
      <code>--enable-features=SameSiteByDefaultCookies,CookiesWithoutSameSiteMustBeSecure,SameSiteDefaultChecksMethodRigorously,ShortLaxAllowUnsafeThreshold</code><br>
      to ensure the new SameSite feature is active
    </p>
    <p>
      You should get all green checkmarks on
      <a href="https://samesite-sandbox.glitch.me">https://samesite-sandbox.glitch.me</a>
    </p>
    <p>
      With the SameSite feature disabled you can successfully place an order.<br>
      With the SameSite feature enabled you will end up with a different session after the bpost step, so the cart will be empty.
    </p>
    <hr>
    <p><a href="./cart.php">Go to cart to start the test</a></p>
    <p>Session id: <code><?php echo session_id(); ?></code></p>
  </body>
</html>
