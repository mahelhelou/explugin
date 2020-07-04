# Documentation

## Folder Structure

- admin
  - css
  - js
  - admin-menu.php
  - index.php
  - settings-callbacks.php
  - settings-page.php
  - settings-register.php
  - settings-validate.php
- inc
  - core-functions.php
  - index.php
- languages
  - index.php
- public
  - css
    - explugin-login.css
  - js
    - explugin-login.js
- explugin.php
- index.php
- license.txt
- readme.txt

## Steps of Building the Plugin

- Add submenu page in `admin-menu.php`
- Add settings section to page in `settings-page.php`
- Register settings in `settings-register.php`
- Add plugin default options in main plugin file
- Add settings callbacks in `settings-callbacks.php`
- Validate options on changes, use `settings-validate.php`
- Add core functionalities for the plugin `inc/core-functions.php`
- Add internationlization feature to the plguin
  - POEdit
  - Loco Translate
- Test the plugin
- Remove plugin data on uninstall
  - Use `register_uninstall_hook()`
  - Or, prefered by wp, a separate `uninstall.php`. Added to the root of plugin folder and executed automatically on uninstall