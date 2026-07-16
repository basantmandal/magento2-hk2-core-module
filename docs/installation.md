# HK2 Core

## Overview

The HK2 Core module is the foundational base module for all Magento 2 HK2 extensions. It establishes standard administrative configurations, reusable backend blocks, and standardized headers for module configuration screens.

## 📦 Installation

### ⚙️ Install Package

```bash
composer require hk2/core
```

### Step-1: Enable Module

```bash
bin/magento module:enable HK2_Core
```

### Step-2: Upgrade Database

```bash
bin/magento setup:upgrade
```

### Step-3: Compile

```bash
bin/magento setup:di:compile
```

### Step-4: Flush Cache

```bash
bin/magento cache:flush
```

### Step-5: Verification

To verify that the module is successfully installed:
1. Log in to the Magento Admin Panel.
2. Navigate to **Stores > Configuration**.
3. Verify that a new tab/section labeled **HK2** is visible.
4. Run `bin/magento module:status HK2_Core` to confirm it is listed under "List of enabled modules".

## 🛠 Uninstallation

### Step-1: Disable Module

```bash
bin/magento module:disable HK2_Core
```

### Step-2: Remove Package

```bash
composer remove hk2/core
```

### Step-3: Upgrade

```bash
bin/magento setup:upgrade
```

### Step-4: Flush Cache

```bash
bin/magento cache:flush
```

### Step-5: Verification

To verify that the module is completely removed:
1. Navigating to **Stores > Configuration** in Magento Admin Panel should no longer show the **HK2** tab/section.
2. Run `bin/magento module:status HK2_Core` and confirm that it is not present in the module list.

## 🛠 Troubleshooting

### Module not detected
Ensure that the code is in the correct directory `app/code/HK2/Core/` and that the file permissions allow Magento to read the module files. Run `bin/magento setup:upgrade` to register the module.

### Composer conflicts
If you experience dependency conflicts during installation, verify that your Magento platform version meets the requirements of `magento/framework: ^103.0.0` and that you are using a supported PHP version.

### Setup upgrade failures
Ensure that your database connection is active and that your database user has sufficient privileges to perform schema/data updates.

### Compilation failures
If Dependency Injection compilation (`setup:di:compile`) fails, clear the generated code directory by running `rm -rf generated/code/* generated/metadata/*` and retry compilation.

### Cache issues
If changes do not appear after installation or uninstallation, flush the cache using `bin/magento cache:flush` and clean the cache with `bin/magento cache:clean`.

### Permissions issues
Ensure the Magento files and directories are owned by the correct web user and have the appropriate write permissions. Run standard Magento permission fixes:
```bash
find var generated vendor pub/static pub/media app/etc -type f -exec chmod g+w {} +
find var generated vendor pub/static pub/media app/etc -type d -exec chmod g+ws {} +
```

### PHP compatibility issues
This module requires PHP 8.1, 8.2, 8.3, or 8.4. Verify your current CLI PHP version using `php -v`.

## 🤝 Support

For bug reports, feature requests, and general support:

- **Author**: Basant Mandal
- **Email**: support@basantmandal.in
- **Website**: https://www.basantmandal.in
