<div align="center">

# HK2 Core Module

**The foundational base module for all Magento 2 HK2 extensions.**

<img src="https://img.shields.io/badge/version-1.0.0-blue?style=flat-square" alt="Version">
<img src="https://img.shields.io/badge/Magento-2.4.x-orange?style=flat-square" alt="Magento">
<img src="https://img.shields.io/badge/PHP-8.1%2B-8A2BE2?style=flat-square" alt="PHP">
<img src="https://img.shields.io/badge/license-OSL--3.0-green?style=flat-square" alt="License">

<br>

<a href="https://www.basantmandal.in/"><img src="https://img.shields.io/badge/Website-000?style=flat-square&logo=ko-fi&logoColor=white" alt="Website"></a>
<a href="https://www.linkedin.com/in/basantmandal/"><img src="https://img.shields.io/badge/LinkedIn-0A66C2?style=flat-square&logo=linkedin&logoColor=white" alt="LinkedIn"></a>
<a href="mailto:support@basantmandal.in"><img src="https://img.shields.io/badge/Email-support%40basantmandal.in-blue?style=flat-square&logo=gmail" alt="Email"></a>

</div>

---

## 📄 Overview

The **HK2 Core Module** (`HK2_Core`) serves as the essential foundational layer for all other HK2 Magento 2 extensions. It provides shared utilities, base classes, and common configurations required across the HK2 extension ecosystem, ensuring consistency and reducing code duplication.

## 🧠 Problem Statement

When building multiple Magento 2 extensions, developers often face code duplication, inconsistent patterns, and dependency conflicts. Without a shared foundation, each module reinvents common utilities, leading to maintenance overhead and potential incompatibilities between extensions.

## 💡 Solution Approach

The HK2 Core Module centralizes shared functionality into a single, well-tested base module. By providing standardized base classes, helper utilities, and configuration patterns, it ensures all HK2 extensions follow consistent architecture while reducing development time and potential conflicts.

## 🆚 Alternatives Considered

| Approach | Why Not Chosen |
| :--- | :--- |
| Copy-paste utilities per module | Leads to code duplication and maintenance nightmares |
| Third-party shared libraries | Introduces external dependencies and version conflicts |
| No shared base | Inconsistent architecture across HK2 extensions |

### 👥 Who is this for?

- **Store Owners:** Required to run any HK2 Magento 2 extension.
- **Developers:** Provides a standardized foundation for building custom features on top of HK2 modules.

---

## 🎯 Use Cases

- Serving as a prerequisite for any HK2 Magento 2 extension
- Providing reusable base classes for custom module development
- Ensuring consistent coding patterns across the HK2 extension ecosystem
- Simplifying dependency management for multi-module HK2 setups

---

## ✨ Key Features

| Feature | Details |
| :--- | :--- |
| 💻 **Shared Utilities** | Common helper classes and functions used across HK2 modules. |
| 🧱 **Base Classes** | Standardized base models, blocks, and controllers for consistent development. |
| ⚙️ **Core Configuration** | Centralized configuration settings and UI components for the admin panel. |
| 📦 **Dependency Management** | Simplifies dependency resolution for other HK2 extensions. |

---

## 🏗️ Architecture Overview

The HK2 Core Module follows Magento 2's modular architecture pattern:

- **Helper Layer:** Provides shared utility methods accessible across all HK2 modules
- **Block Layer:** Offers base block classes that child modules can extend
- **Model Layer:** Contains base models and resource models for consistent data handling
- **Configuration Layer:** Centralizes system.xml and config.xml settings

All dependent HK2 modules declare `hk2/core` as a composer dependency and extend from the provided base classes.

---

## 📋 System Requirements

| Requirement | Minimum Version |
| :--- | :--- |
| **Magento** | 2.4.x |
| **PHP** | ^8.1 |

> ⚠ **Note:** Compatibility with Magento versions older than 2.4.0 or PHP versions older than 8.1 is not guaranteed and unsupported.

---

## 🚀 Installation

### Composer — Recommended

This is the preferred method as it handles all dependencies automatically.

```bash
composer require hk2/core
bin/magento module:enable HK2_Core
bin/magento setup:upgrade
bin/magento setup:di:compile
bin/magento setup:static-content:deploy
bin/magento cache:clean
```

### Manual Installation

**1. Prerequisites**
Download the extension ZIP file and extract its contents.

**2. Configuration**
Copy the extracted contents into `app/code/HK2/Core`.

**3. Start Services**
Run the following commands:

```bash
bin/magento module:enable HK2_Core
bin/magento setup:upgrade
bin/magento setup:di:compile
bin/magento setup:static-content:deploy
bin/magento cache:clean
```

> ⚠ **Security Warning:** Ensure appropriate file permissions are maintained after installation.

---

## ⚙️ Configuration

| Service | Version | Purpose |
| :--- | :--- | :--- |
| **HK2 Core Module** | 1.0.0 | There are no standalone user-facing configurations for the Core module. It operates silently in the background. |

---

## 🔒 Content Security Policy (CSP)

This module complies with Magento's standard CSP guidelines. It does not introduce any external resources or inline scripts that require additional whitelisting.

---

## 🔐 Privacy & GDPR

- Does not collect or store any personally identifiable information (PII).
- Does not track user behavior or send telemetry data.
- Fully compliant with GDPR and other data protection regulations.

---

## 🧪 Testing Strategy

- **Unit Tests:** Test helper utilities and base classes using PHPUnit
- **Integration Tests:** Verify module registration, configuration loading, and dependency injection
- **Manual Testing:** Install on a fresh Magento 2.4.x instance and verify all dependent HK2 modules load correctly

---

## 🚀 Production Readiness

- Tested against Magento 2.4.x production environments
- No external API calls or telemetry
- Minimal database footprint (no custom tables)
- Compatible with Magento's built-in full-page caching and Varnish

---

## 📚 Documentation

| Document | Purpose |
| :--- | :--- |
| [**Compatibility**](docs/compatibility.md) | Module compatibility information |
| [**Installation**](docs/installation.md) | Detailed installation instructions |
| [**Usage**](docs/usage.md) | How to use and configure the module |
| [**Contribution Guidelines**](.github/CONTRIBUTING.md) | How to contribute to this project |

---

## ⚠️ Known Limitations

- Must be installed **before** or **alongside** any dependent HK2 extensions.
- Designed specifically for Magento 2.4.x and may not function correctly on older legacy versions.

---

## 🤝 Contributing

We welcome contributions! Please see our [Contributing Guidelines](.github/CONTRIBUTING.md) for details on how to submit pull requests, report issues, and suggest enhancements.

---

## 📄 License

This project is licensed under the Open Software License 3.0 (OSL-3.0) - see the [LICENCE.txt](LICENCE.txt) file for details.

---

## ⚖️ Disclaimer

This software is provided "as is", without warranty of any kind, express or implied. In no event shall the authors or copyright holders be liable for any claim, damages or other liability arising from, out of or in connection with the software or the use or other dealings in the software.

---

<div align="center">
  <b>Basant Mandal</b><br>
  <a href="https://www.basantmandal.in/"><img src="https://img.shields.io/badge/Website-000?style=flat-square&logo=ko-fi&logoColor=white" alt="Website"></a>
  <a href="https://www.linkedin.com/in/basantmandal/"><img src="https://img.shields.io/badge/LinkedIn-0A66C2?style=flat-square&logo=linkedin&logoColor=white" alt="LinkedIn"></a>
  <a href="mailto:support@basantmandal.in"><img src="https://img.shields.io/badge/Email-support%40basantmandal.in-blue?style=flat-square&logo=gmail" alt="Email"></a>
  
  ---
</div>
