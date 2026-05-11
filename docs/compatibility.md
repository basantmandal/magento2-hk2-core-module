# Compatibility Guide

## Magento Versions

HK2_Core is compatible with Magento **2.4.x** across all editions:

| Magento Edition | Compatibility |
|---|---|
| Magento Open Source 2.4.x | ✅ |
| Adobe Commerce (formerly Magento Commerce) 2.4.x | ✅ |
| Adobe Commerce Cloud 2.4.x | ✅ |

The module requires `magento/framework` **^103.0.0**, which corresponds to the Magento 2.4.x release line.

### Module sequence

The module loads after the following Magento modules (defined in `etc/module.xml`):

- `Magento_Backend`
- `Magento_Config`
- `Magento_Store`

These dependencies ensure that the admin configuration tab, menu item, and ACL resource are registered during the correct load phase.

## PHP Versions

| PHP Version | Compatibility |
|---|---|
| 8.1 | ✅ Fully supported |
| 8.2 | ✅ Fully supported |
| 8.3 | ✅ Fully supported |
| 8.4 | ✅ Fully supported |

The `composer.json` requires `^8.1 || ^8.2 || ^8.3 || ^8.4`, and the PHPCS configuration targets `testVersion="8.2-"` to ensure forward compatibility.

## Dependency Compatibility Matrix

| Dependency | Required Version | Notes |
|---|---|---|
| `magento/framework` | `^103.0.0` | Core Magento framework; ships with Magento 2.4.x |
| `php` | `^8.1 \|\| ^8.2 \|\| ^8.3 \|\| ^8.4` | All supported PHP 8.x lines |

No other third-party Composer dependencies are required. The module has zero runtime dependencies beyond the Magento framework itself.

## Browser Requirements

This module is admin-only and has no browser requirements. It renders no frontend assets — all functionality is server-side XML configuration and PHP block classes.

## Sibling Module Compatibility

The following HK2 modules depend on HK2_Core and are fully compatible:

| Module | Composer Package | Sequences On |
|---|---|---|
| HK2_AddBootstrap5 | `hk2/bootstrap5` | `HK2_Core` |
| HK2_CspWhitelisting | `hk2/csp-whitelisting` | `HK2_Core` |
| HK2_SanitizeSearch | `hk2/search-sanitizer` | `HK2_Core` |
| HK2_ScrollTop | `hk2/scrolltop` | `HK2_Core` |

## Upgrade Compatibility

- **No breaking schema changes** — The module defines no database tables, columns, or EAV attributes. Upgrades between versions are purely XML configuration changes.
- **No setup patches** — The module has no `Setup` directory or patch classes. Version bumps are informational only.
- **Backward compatible** — The public API consists of the `ModuleHeader` block class, the `hk2_options_tab` tab ID, the `HK2::root` menu ID, and the `HK2_Core::root` ACL resource ID. These identifiers will not change without a major version bump.
