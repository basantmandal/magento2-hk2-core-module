# Usage Guide

The HK2 Core Module operates primarily in the background. It provides:

- Base abstract classes for models and blocks.
- Shared helper functions available via `HK2\Core\Helper\Data`.
- Common dependency management.

## For Developers

You can extend the core classes in your own modules:

```php
use HK2\Core\Block\BaseBlock;

class MyBlock extends BaseBlock
{
    // Implementation
}
```

## Available Helpers

| Helper Class | Purpose |
| :--- | :--- |
| `HK2\Core\Helper\Data` | General utility methods shared across HK2 modules |

## Using the Core Helper

Inject the helper into your class constructor:

```php
use HK2\Core\Helper\Data as HK2Helper;

class MyClass
{
    public function __construct(
        private readonly HK2Helper $hk2Helper
    ) {}

    public function doSomething(): void
    {
        // Use shared helper methods
        $result = $this->hk2Helper->someUtilityMethod();
    }
}
```

## Module Dependencies

When creating a new HK2 module, declare the core module as a dependency in your `composer.json`:

```json
{
    "require": {
        "hk2/core": "^1.0"
    }
}
```

And in your `etc/module.xml`:

```xml
<sequence>
    <module name="HK2_Core"/>
</sequence>
```

---

<div align="center">
  <b>Basant Mandal</b><br>
  <a href="https://www.basantmandal.in/"><img src="https://img.shields.io/badge/Website-000?style=flat-square&logo=ko-fi&logoColor=white" alt="Website"></a>
  <a href="https://www.linkedin.com/in/basantmandal/"><img src="https://img.shields.io/badge/LinkedIn-0A66C2?style=flat-square&logo=linkedin&logoColor=white" alt="LinkedIn"></a>
  <a href="mailto:support@basantmandal.in"><img src="https://img.shields.io/badge/Email-support%40basantmandal.in-blue?style=flat-square&logo=gmail" alt="Email"></a>
  
  ---
</div>
