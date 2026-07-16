# Usage Guide

## Overview

HK2_Core is a **foundation module**. It provides no user-facing features or configuration options on its own. Its purpose is entirely architectural: it establishes the shared admin infrastructure that sibling HK2 modules depend on.

## What HK2_Core Provides

### 1. Shared Admin Configuration Tab

**Tab ID:** `hk2_options_tab`

**Location:** Stores → Settings → Configuration → **HK2** (left navigation tab)

The `hk2_options_tab` is registered in `etc/adminhtml/system.xml`. Any sibling module that needs to add configuration settings under the HK2 brand targets this tab ID in its own `system.xml`:

```xml
<section id="vendor_section" translate="label" type="text"
         sortOrder="100" showInDefault="1" showInWebsite="1" showInStore="1"
         tab="hk2_options_tab">
    <!-- section config -->
</section>
```

**Behavior:**

- The tab is always present in Stores > Configuration once HK2_Core is enabled.
- It has no sections of its own; it serves as a container.
- Sections appear under it only when sibling modules are installed.

### 2. Shared Admin Menu Item

**Menu ID:** `HK2::root`

**Location:** System → **HK2** (sidebar menu group)

Registered in `etc/adminhtml/menu.xml`. Sibling modules add their own entries under this parent:

```xml
<add id="Vendor_Module::menu_item"
     title="My Module"
     module="Vendor_Module"
     sortOrder="10"
     parent="HK2::root"
     resource="Vendor_Module::config"
     action="adminhtml/system_config/edit/section/vendor_section"/>
```

**Behavior:**

- The `HK2::root` entry appears under the System menu with sort order 85.
- When no sibling modules add child entries, the group may appear empty or collapsed.
- Each sibling module is responsible for its own ACL resource.

### 3. Reusable ModuleHeader Block

**Class:** `HK2\Core\Block\Adminhtml\System\Config\ModuleHeader`

**Template:** `view/adminhtml/templates/system/config/module_header.phtml`

**Layout handle:** `HK2_Core::system/config/module_header`

This block extends `Magento\Config\Block\System\Config\Form\Field` and renders a branded header with:

- HK2 logo image
- "HK2 Extensions Suite for Magento" heading
- Links: Website, LinkedIn, Support, Donate

Sibling modules reference this block in their `system.xml` as a `frontend_model` for a dedicated field:

```xml
<group id="module_header" translate="label" type="text"
       sortOrder="0" showInDefault="1" showInWebsite="1" showInStore="1">
    <field id="header" translate="label" type="label"
           sortOrder="0" showInDefault="1" showInWebsite="1" showInStore="1">
        <label></label>
        <frontend_model>HK2_Core::system/config/module_header</frontend_model>
    </field>
</group>
```

This ensures every HK2 module's configuration page displays the same branded header without duplicating the block class or template.

### 4. Root ACL Resource

**Resource ID:** `HK2_Core::root`

**Title:** "HK2 Extensions"

Registered in `etc/acl.xml`. Sibling modules nest their own resources under it:

```xml
<resource id="HK2_Core::root" title="HK2 Extensions">
    <resource id="Vendor_Module::config" title="My Module Config"/>
</resource>
```

This allows admins to grant or restrict access to all HK2 functionality at once, or per-module via child resources.

## Admin Panel Paths

| What | Path |
|---|---|
| Configuration tab | **Stores → Settings → Configuration → HK2** |
| Menu group | **System → HK2** |
| User roles / permissions | **System → Permissions → User Roles → Role Resources → HK2 Extensions** |

## How Sibling Modules Consume HK2_Core

A typical sibling module declares the dependency in three files:

| File | What it does |
|---|---|
| `etc/module.xml` | `<sequence><module name="HK2_Core"/></sequence>` — ensures HK2_Core loads first |
| `etc/adminhtml/system.xml` | `<section tab="hk2_options_tab">` — targets the shared tab |
| `etc/adminhtml/menu.xml` | `<add parent="HK2::root">` — nests under the shared menu group |
| `etc/acl.xml` | `<resource id="HK2_Core::root">` — nests under the shared ACL root |
| `system.xml` field | `<frontend_model>HK2_Core::system/config/module_header</frontend_model>` — uses the shared header |

## What HK2_Core Does NOT Do

- It has no routes, controllers, or routers.
- It does not register any cron jobs, observers, or scheduled tasks.
- It does not define any configuration fields, groups, or sections of its own within the HK2 tab.
- It has no storefront (frontend) files — no JavaScript, CSS, layout updates, or templates.
- It does not create any database tables, columns, or EAV attributes.
- It does not modify the Magento admin theme, add JavaScript, or inject CSS.
- It does not collect any data, set any cookies, or communicate with any external service.
