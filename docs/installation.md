# Installation Guide

## Prerequisites

- Magento **2.4.x** (Open Source, Commerce, or Cloud)
- PHP **8.1, 8.2, 8.3, or 8.4**
- Composer **2.x**
- Access to a Magento 2 instance with CLI access

## Composer Installation

1. **Require the package** via Composer:

   ```bash
   composer require hk2/core
   ```

   Composer will resolve `magento/framework ^103.0.0` and the PHP version constraint automatically.

2. **Enable the module**:

   ```bash
   bin/magento module:enable HK2_Core
   ```

3. **Run the Magento upgrade** to register the module:

   ```bash
   bin/magento setup:upgrade
   ```

4. **Compile the dependency injection configuration**:

   ```bash
   bin/magento setup:di:compile
   ```

5. **Flush the cache**:

   ```bash
   bin/magento cache:flush
   ```

### Alternative (single-command flow)

```bash
composer require hk2/core && \
bin/magento module:enable HK2_Core && \
bin/magento setup:upgrade && \
bin/magento setup:di:compile && \
bin/magento cache:flush
```

### Production mode notes

If your Magento instance runs in **production mode**, you also need to deploy static content:

```bash
bin/magento setup:static-content:deploy
```

This is generally not required for HK2_Core since it has no frontend assets, but running it as part of your standard deployment workflow is safe.

## Verification

After installation, verify that the module is registered and active:

```bash
bin/magento module:status HK2_Core
```

Expected output:

```
Module is enabled:
- HK2_Core
```

### Admin panel checks

1. Log in to the Magento admin panel.
2. Navigate to **Stores → Settings → Configuration**.
3. Look for the **HK2** tab in the left navigation panel. It will appear as an empty tab if no sibling HK2 modules are enabled.
4. Navigate to **System** in the admin sidebar. The **HK2** menu group should appear (with no child items unless sibling modules are installed).

## Uninstalling

To remove the module:

```bash
bin/magento module:disable HK2_Core
bin/magento setup:upgrade
bin/magento cache:flush
```

To completely remove the code:

```bash
composer remove hk2/core
```

**Note:** Do not uninstall HK2_Core if other HK2 modules are installed and enabled, as they depend on its shared infrastructure.

## Troubleshooting

| Issue | Solution |
|---|---|
| `Module 'HK2_Core' is not defined` | Run `bin/magento setup:upgrade` to register the module. |
| Composer fails with version conflict | Ensure your Magento version is 2.4.x (requires `magento/framework ^103.0.0`). |
| HK2 tab not visible in admin | Verify the module is enabled (`bin/magento module:status HK2_Core`). The tab only shows if you have permission; check admin role resources. |
| PHP version compatibility error | Verify your PHP version (`php -v`) meets the `^8.1 \|\| ^8.2 \|\| ^8.3 \|\| ^8.4` constraint. |
