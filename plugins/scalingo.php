<?php

/** Disable version checker
* @link https://www.adminer.org/plugins/#use
* @author Jakub Vrana, https://www.vrana.cz/
* @license https://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
*/
class AdminerScalingo {
  function name() {
    return "<a href='https://adminer.scalingo.com'" . target_blank() . " id='h1'>Scalingo's Adminer</a>";
  }

  function loginForm() {
    global $drivers;
    $drivers = array('MySQL', 'PostgreSQL', 'MongoDB', 'Elasticsearch (beta)');
?>
<table cellspacing="0">
  <tr><th><?php echo lang('System'); ?><td><?php echo html_select("auth[driver]", $drivers, DRIVER) . "\n"; ?>
  <tr><th><?php echo lang('Server'); ?><td><input name="auth[server]" value="<?php echo h(SERVER); ?>" title="hostname[:port]" placeholder="localhost" autocapitalize="off">
  <tr><th><?php echo lang('Username'); ?><td><input name="auth[username]" id="username" value="<?php echo h($_GET["username"]); ?>" autocapitalize="off">
  <tr><th><?php echo lang('Password'); ?><td><input type="password" name="auth[password]">
  <tr><th><?php echo lang('Database'); ?><td><input name="auth[db]" value="<?php echo h($_GET["db"]); ?>" autocapitalize="off">
</table>
<?php
    echo script("focus(qs('#username'));");
		echo "<p><input type='submit' value='" . lang('Login') . "'>\n";
		echo checkbox("auth[permanent]", 1, $_COOKIE["adminer_permanent"], lang('Permanent login')) . "\n";
    return false;
  }
}
