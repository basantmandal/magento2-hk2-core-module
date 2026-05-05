# Installation Guide

## Recommended Method: Composer

This is the preferred installation method as it handles all dependencies automatically.

1. Require the module via Composer:

   ```bash
   composer require hk2/core
   ```

2. Enable the module:

   ```bash
   bin/magento module:enable HK2_Core
   ```

3. Run setup upgrade and clear cache:

   ```bash
   bin/magento setup:upgrade
   bin/magento setup:di:compile
   bin/magento setup:static-content:deploy
   bin/magento cache:clean
   ```

## Manual Installation

1. Download the extension ZIP file.
2. Extract into `app/code/HK2/Core`.
3. Run standard Magento commands:

   ```bash
   bin/magento module:enable HK2_Core
   bin/magento setup:upgrade
   bin/magento setup:di:compile
   bin/magento setup:static-content:deploy
   bin/magento cache:clean
   ```

> ⚠ **Security Warning:** Ensure appropriate file permissions are maintained after installation. The web server user should own the Magento root directory.

---

<div align="center">
  <b>Basant Mandal</b><br>
  <a href="https://www.basantmandal.in/"><img src="https://img.shields.io/badge/Website-000?style=flat-square&logo=ko-fi&logoColor=white" alt="Website"></a>
  <a href="https://www.linkedin.com/in/basantmandal/"><img src="https://img.shields.io/badge/LinkedIn-0A66C2?style=flat-square&logo=linkedin&logoColor=white" alt="LinkedIn"></a>
  <a href="mailto:support@basantmandal.in"><img src="https://img.shields.io/badge/Email-support%40basantmandal.in-blue?style=flat-square&logo=gmail" alt="Email"></a>
  
  ---
</div>
