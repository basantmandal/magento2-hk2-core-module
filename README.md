<p align="center">
<img src="https://img.shields.io/badge/version-1.0.0-blue?style=flat-square" alt="Version">
<img src="https://img.shields.io/badge/Magento-2.4.x-f97316?style=flat-square&logo=magento&logoColor=white" alt="Magento">
<img src="https://img.shields.io/badge/PHP-8.2%2B-7c3aed?style=flat-square&logo=php&logoColor=white" alt="PHP">
<img src="https://img.shields.io/badge/license-OSL--3.0-green?style=flat-square" alt="License">
<a href="https://packagist.org/packages/hk2/core"><img src="https://img.shields.io/packagist/dt/hk2/core?style=flat-square" alt="Packagist"></a>
<br>
<a href="https://www.basantmandal.in/"><img src="https://img.shields.io/badge/Website-000?style=flat-square&logo=ko-fi&logoColor=white" alt="Website"></a>
<a href="https://www.linkedin.com/in/basantmandal/"><img src="https://img.shields.io/badge/LinkedIn-0A66C2?style=flat-square&logo=linkedin&logoColor=white" alt="LinkedIn"></a>
<a href="mailto:support@basantmandal.in"><img src="https://img.shields.io/badge/Email-support%40basantmandal.in-blue?style=flat-square&logo=gmail" alt="Email"></a>
</p>

# HK2 Core — Foundation Module for Magento 2

**HK2_Core** serves as the shared foundation for all HK2 Magento 2 extensions. It establishes common infrastructure — a unified admin configuration tab, a parent admin menu item, a reusable branded header block, and a root ACL resource — that every sibling HK2 module consumes.

This module contains no frontend functionality, no configuration fields of its own, and no database schema. It is purely architectural scaffolding.

---

## 📄 Overview

HK2_Core is a dependency-only module. It is not designed to provide visible features on its own but to ensure consistency, reduced duplication, and a single point of maintenance across the HK2 extension suite. When multiple HK2 modules are installed, they all share:

- A single **HK2 tab** in Stores > Configuration, eliminating tab clutter.
- A single **HK2 group** in the System menu, keeping the admin sidebar organized.
- A common **ModuleHeader** block rendering the HK2 brand with logo, website, LinkedIn, support, and donate links.

Sibling modules declare a `<sequence>` on `HK2_Core` in their `module.xml` and reference `HK2_Core::system/config/module_header` in their `system.xml` to render the branded header in their admin configuration sections.

---

## 🧠 Problem Statement

Magento 2 extension suites comprising multiple modules face a recurring organizational problem: each module that adds admin configuration tends to register its own tab or place its settings under unrelated existing tabs. The result is a disjointed admin experience — tabs scattered across Stores > Configuration, menu items littered across unrelated sections, and duplicated code for headers, branding, and ACL resources.

Without a shared foundation, each module in a suite must independently manage:

- Its own admin tab registration (creating duplicates or inconsistent naming).
- Its own menu item (cluttering the admin with unrelated entries).
- Its own ACL resource tree (inconsistent hierarchy for permission management).
- Its own header/branding block (duplicated templates, links, and styling).

These problems compound as the suite grows, making maintenance harder, permissions more confusing to configure, and the admin experience less professional.

---

## 💡 Solution Approach

HK2_Core addresses these problems through a dependency-inversion architecture: all shared admin infrastructure lives in a single module that sibling modules depend on. Specifically:

1. **Centralized tab registration** — `etc/adminhtml/system.xml` registers the `hk2_options_tab` once. Sibling modules target this tab ID in their own `system.xml` `<section>` declarations.
2. **Centralized menu registration** — `etc/adminhtml/menu.xml` creates `HK2::root` under `Magento_Backend::system`. Sibling modules add their own `<add>` entries with `parent="HK2::root"`.
3. **Centralized ACL root** — `etc/acl.xml` defines `HK2_Core::root` as the top-level permission. Sibling modules nest their own resources under it.
4. **Reusable branded header** — The `ModuleHeader` block class and its `.phtml` template are packaged once. Sibling modules reference them via layout handle or `system.xml` `frontend_model` without duplicating any code.

This keeps each sibling module focused on its domain logic while the cross-cutting admin presentation concerns live in a single, versioned place.

---

## 👥 Who is this for?

- **Magento 2 store owners** who install one or more HK2 extensions and want a clean, organized admin interface.
- **Magento 2 developers** building or extending HK2 modules who need consistent admin infrastructure without reinventing the wheel.
- **System administrators** who manage user roles and permissions and need a predictable ACL hierarchy for HK2 functionality.
- **Agencies** deploying HK2 modules across multiple client projects who value standardized branding and reduced configuration drift.

---

## 🎯 Use Cases

| Use Case | Description |
|---|---|
| **Multi-module admin organization** | When HK2_AddBootstrap5, HK2_CspWhitelisting, and HK2_ScrollTop are installed, all their config pages appear under the single HK2 tab rather than scattered across tabs. |
| **Unified permissions management** | An admin can grant or deny access to all HK2 features at once via `HK2_Core::root`, or granularly per sibling module's child resource. |
| **Brand consistency** | Each sibling module's configuration page automatically renders the HK2 ModuleHeader with logo and links, ensuring a consistent look. |
| **Reduced maintenance** | A branding update (logo URL, support link, etc.) is made in one place and propagates to all modules. |

---

## ✨ Key Features

- **Shared Admin Configuration Tab** (`hk2_options_tab`) — appears in Stores > Configuration with sort order 3000 and label "HK2". All sibling HK2 modules target this tab for their sections.
- **Shared Admin Menu Item** (`HK2::root`) — appears under System menu with sort order 85. Sibling modules nest their menu entries under this parent.
- **Reusable ModuleHeader Block** (`HK2\Core\Block\Adminhtml\System\Config\ModuleHeader`) — renders a branded header with the HK2 logo, website link, LinkedIn profile, support page link, and donate link. Used as the `frontend_model` in sibling module `system.xml` fields.
- **Root ACL Resource** (`HK2_Core::root`) — establishes a single top-level permission node for all HK2 extensions, enabling role-based access control.
- **Zero Frontend Footprint** — no routes, no storefront blocks, no JavaScript, no CSS. The module is entirely admin-side infrastructure.
- **No Database Schema** — no setup patches, no schema tables, no data patches. Purely declarative XML configuration.

---

## 🏗️ Architecture Overview

```
HK2_Core (this module)
│
├── etc/
│   ├── module.xml              ← Declares module name, version, sequence
│   ├── adminhtml/
│   │   ├── system.xml          ← Registers hk2_options_tab
│   │   └── menu.xml            ← Registers HK2::root under System menu
│   └── acl.xml                 ← Defines HK2_Core::root resource
│
├── Block/
│   └── Adminhtml/System/Config/
│       └── ModuleHeader.php    ← Reusable branded header block
│
├── view/
│   └── adminhtml/templates/system/config/
│       └── module_header.phtml ← Header template (logo, links)
│
└── registration.php            ← Magento component registration
```

**Sibling module consumption pattern** (example: HK2_AddBootstrap5):

```
HK2_AddBootstrap5
├── etc/
│   ├── module.xml              ← <sequence> HK2_Core
│   └── adminhtml/
│       └── system.xml          ← <section tab="hk2_options_tab">, frontend_model=HK2_Core::...
│
├── etc/adminhtml/menu.xml      ← <add parent="HK2::root">
└── etc/acl.xml                 ← <resource id="HK2_Core::root"> > <resource id="vendor_module::...">
```

---

## 📋 System Requirements

### Supported Magento Versions

- Magento **2.4.x** (Open Source / Commerce / Cloud)
- `magento/framework` **^103.0.0**

### Supported PHP Versions

- PHP **8.1**
- PHP **8.2**
- PHP **8.3**
- PHP **8.4**

### Platform

- Magento 2 instance (any edition) running on a standard LAMP/LEMP stack
- Composer 2.x for installation

---

## 🚀 Installation

Install via Composer:

```bash
composer require hk2/core
```

Then register and compile:

```bash
bin/magento module:enable HK2_Core
bin/magento setup:upgrade
bin/magento setup:di:compile
bin/magento cache:flush
```

See [docs/installation.md](docs/installation.md) for detailed steps and verification.

---

## ⚙️ Configuration

HK2_Core defines **zero configuration fields of its own**. Its sole contribution to Stores > Configuration is the **HK2 tab** (`hk2_options_tab`), which serves as a container for sibling module sections.

**Admin path:** Stores → Settings → Configuration → HK2

When no sibling HK2 modules are installed, the HK2 tab will have no visible sections. Once any HK2 extension (e.g., HK2_AddBootstrap5, HK2_CspWhitelisting, HK2_ScrollTop) is installed and enabled, its configuration sections appear under this tab.

**Menu path:** System → HK2

The `HK2::root` menu item is visible in the admin sidebar under the System menu. Sibling modules add their own child entries beneath it.

---

## 🔒 Content Security Policy (CSP)

This module does **not** introduce any CSP directives. It loads no external resources at runtime — the ModuleHeader block renders static asset references (logo URL) as links, not as active resource loads. Sibling modules that load external resources (e.g., CDN-hosted CSS/JS) are responsible for their own CSP whitelisting via `etc/csp_whitelist.xml`.

---

## 🔐 Privacy & GDPR

- **No data collection** — HK2_Core does not collect, store, or transmit any personal data.
- **No cookies** — The module sets no cookies, session data, or tracking mechanisms.
- **No third-party services** — The branded header contains links to external websites but does not embed any tracking pixels, analytics, or iframes.
- **No user data processing** — The module executes no observers, plugins, or scheduled tasks that handle customer or admin personally identifiable information (PII).

The admin links rendered in the ModuleHeader point to:

- `https://www.basantmandal.in/` (author website)
- `https://www.linkedin.com/in/basantmandal/` (LinkedIn profile)
- `https://www.basantmandal.in/support` (support page)
- `https://www.basantmandal.in/donate` (donation page)

These are standard `<a href>` links; no data is sent to these destinations unless the admin user actively clicks them.

---

## 📚 Documentation

| Document | Description |
|---|---|
| [Installation Guide](docs/installation.md) | Composer installation, Magento CLI commands, and verification |
| [Usage Guide](docs/usage.md) | Module role, shared infrastructure, admin panel paths |
| [Compatibility Matrix](docs/compatibility.md) | Supported Magento, PHP, and dependency versions |
| [CHANGELOG](CHANGELOG.md) | Version history and release notes |
| [SECURITY](SECURITY.md) | Vulnerability reporting and disclosure policy |

---

## ⚠️ Known Limitations

- **No standalone functionality** — The module provides no user-facing features on its own. It must be used in conjunction with at least one sibling HK2 module for any visible effect.
- **Tab visibility** — The HK2 tab in Stores > Configuration appears even without sibling modules installed but contains no sections until another HK2 module is enabled.
- **Admin only** — All infrastructure is scoped to the Magento admin panel. No storefront features are provided.
- **No i18n** — The module does not ship with translation files (`i18n/`). Labels in `system.xml` and `menu.xml` are currently English-only.

---

## 🤝 Contributing

Contributions are welcome! Please follow these guidelines:

1. **Bug reports** — Open a [GitHub issue](https://github.com/anomalyco/opencode/issues) with a clear description, reproduction steps, and environment details.
2. **Pull requests** — Fork the repository, create a feature branch, and submit a PR against `main`. Ensure commits follow [Conventional Commits](https://www.conventionalcommits.org/) (`feat:`, `fix:`, `docs:`, etc.).
3. **Code style** — Run `./vendor/bin/phpcs --standard=phpcs.xml .` before submitting. This module follows the Magento 2 coding standard with PSR12.
4. **No test infrastructure** — This module currently has no test suite (no `phpunit.xml`, no `tests/` directory). If you add tests, please ensure they pass.

By contributing, you agree that your contributions will be licensed under the OSL-3.0 license.

---

## 📄 License

**Open Software License (OSL 3.0)**

Copyright © 2023–present Basant Mandal / Basant Mandal

This software is licensed under the Open Software License version 3.0. A copy of the license is included in [`LICENCE.txt`](LICENCE.txt).

The AFL-3.0 license also applies as a secondary license for specific distribution channels (e.g., Magento Marketplace). For details, see the full license text.

---

## ⚖️ Disclaimer

This software is provided "as is", without warranty of any kind, express or implied, including but not limited to the warranties of merchantability, fitness for a particular purpose, and non-infringement. In no event shall the authors or copyright holders be liable for any claim, damages, or other liability, whether in an action of contract, tort, or otherwise, arising from, out of, or in connection with the software or the use or other dealings in the software.

The logo, branding, and trademark "HK2" and "Hash Tag Kitto" are the property of Basant Mandal. This module is not affiliated with, endorsed by, or sponsored by Adobe Inc. or any of its subsidiaries.
