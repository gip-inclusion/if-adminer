<?php
function adminer_object() {
  // required to run any plugin
  include_once "./plugins/plugin.php";

  // autoloader
  foreach (glob("plugins/*.php") as $filename) {
      include_once "./$filename";
  }

  $plugins = array(
      new AdminerDumpBz2,
      new AdminerDumpZip,
      new AdminerEditCalendar,
      new AdminerEditForeign,
      new AdminerForeignSystem,
      // TODO: not ready yet
      // new AdminerScalingo,
      new AdminerVersionNoverify,
      // AdminerTheme MUST always be the latest
      new AdminerTheme,
  );

  return new AdminerPlugin($plugins);
}

// include original Adminer or Adminer Editor
include "./adminer.php";
