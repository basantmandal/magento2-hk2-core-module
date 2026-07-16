# HK2 Core

![Version](https://img.shields.io/badge/version-1.1.0-blue?style=flat-square)
![License](https://img.shields.io/badge/license-OSL--3.0-green?style=flat-square)
![Magento](https://img.shields.io/badge/Magento-2.4.4--2.4.9-f97316?style=flat-square&logo=magento&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.1%20%7C%7C%208.2%20%7C%7C%208.3%20%7C%7C%208.4-7c3aed?style=flat-square&logo=php&logoColor=white)
[![Downloads](https://img.shields.io/packagist/dt/hk2/core?style=flat-square)](https://packagist.org/packages/hk2/core)

## Overview

The HK2 Core module is the foundational base module for all Magento 2 HK2 extensions. It establishes standard administrative configurations, reusable backend blocks, and standardized headers for module configuration screens.

## 🎯 Use Cases

- **Module Base**: Required by all other HK2 extensions (AddBootstrap5, CSP, ScrollTop, etc.) to function correctly.
- **Admin Consolidation**: Consolidates HK2 module configurations into a single, organized tab in the Magento Admin Panel.

## 🚀 Features

- ⚙️ Registers a centralized "HK2 Extensions" configuration tab.
- 📂 Sets up a main admin menu item under System for HK2.
- 🔒 Implements a root ACL resource for all HK2 modules.
- 🎨 Provides a reusable `ModuleHeader` block for consistent branding.

## 🏗 Architecture

- **Core Module Components**: Base adminhtml system configurations.
- **Design Patterns**: Standard Magento UI configuration implementations.

## 🧩 Magento Components

### Blocks

- `HK2\Core\Block\Adminhtml\System\Config\ModuleHeader`

### Layout XML

- `HK2_Core::system/config/module_header.phtml`

## 📦 Requirements

- **Magento version**: 2.4.4 - 2.4.9
- **PHP requirements**: 8.1 || 8.2 || 8.3 || 8.4
- **Composer requirements**: `magento/framework: ^103.0.0`

## ⚙️ Installation

1. `composer require hk2/core`
2. `bin/magento module:enable HK2_Core`
3. `bin/magento setup:upgrade`
4. `bin/magento setup:di:compile`
5. `bin/magento cache:flush`

## 🔧 Configuration

This module primarily provides configuration tabs for other modules. No specific configuration is required for the Core module itself.

## Usage

This module works silently in the background. Once installed, navigating to **Stores > Configuration** will display a new "HK2" tab where dependent modules will render their settings.

## 🗄 Database Changes

Not Applicable

## 📂 Module Structure

```text
Block/
├── Adminhtml/
│   └── System/
│       └── Config/
│           └── ModuleHeader.php
etc/
├── adminhtml/
│   ├── menu.xml
│   └── system.xml
├── acl.xml
└── module.xml
view/
└── adminhtml/
    └── templates/
        └── system/
            └── config/
                └── module_header.phtml
```

## 🧪 Testing

Not Applicable

## 📈 Performance Considerations

Not Applicable

## 🔐 Security Considerations

- **ACL usage**: Defines `HK2_Core::root` base ACL for administrative access to HK2 configurations.

## Compatibility

Reference: [docs/compatibility.md](docs/compatibility.md)

| Platform | Supported Versions |
|----------|-------------------|
| Magento  | 2.4.4 - 2.4.9     |
| PHP      | 8.1, 8.2, 8.3, 8.4 |

## 🔄 Upgrade Notes

Not Applicable

## 🛠 Troubleshooting

If HK2 tabs do not appear in the admin panel, ensure that the cache has been flushed and `HK2_Core` is enabled using `bin/magento module:status`.

## 🤝 Contributing

Contributions are welcome! If you'd like to improve the installer:

- ⭐ **Star this repository** (Helps others find it!)
- 🍴 Fork the project
- 🐛 Report bugs
- 💡 Suggest new features
- 🤝 Contribute improvements

Every ⭐ helps increase the visibility of the project and motivates further development.

## ⚖️ Disclaimer

The author provides this installation script "as is" without any warranties. Users are responsible for ensuring that running this script complies with their internal security and software requirements.

---

## 🤝 Support

For bug reports, feature requests, and general support:

- **Author**: Basant Mandal
- **Email**: <support@basantmandal.in>
- **Website**: <https://www.basantmandal.in>

## License

This project is licensed under the OSL 3.0 License. See the [LICENSE.txt](LICENSE.txt) file for details.

---
