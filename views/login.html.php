<?php
/**
* @author Thorne Melcher <tmelcher@portdusk.com>
*/
?>
Login or create a new account below.

<br /><br />
<?=$login_error?>
<form method="post">
  <strong>Email Address</strong><br />
  <input type="text" name="email_address" /><br />
  <br />
  <strong>Password</strong><br />
  <input type="password" name="password" /><br />
  <br />
  <input type="checkbox" name="new_account" /> Register as new account.
  <br /><br />

  <input type="submit" name="submit_login" />
</form>