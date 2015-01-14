Hierarchical Body Class
========================

[![Version](http://img.shields.io/packagist/v/MrTool/contao-hierarchical-body-class.svg?style=flat-square)](https://github.com/MrTool/contao-hierarchicalBodyClass)
[![License](http://img.shields.io/packagist/l/MrTool/contao-hierarchical-body-class.svg?style=flat-square)](https://github.com/MrTool/contao-hierarchicalBodyClass)
[![Downloads](http://img.shields.io/packagist/dt/MrTool/contao-hierarchical-body-class.svg?style=flat-square)](https://github.com/MrTool/contao-hierarchicalBodyClass)

An contao extension which provides an inserttag to add an css-class based on the sites parent sites



How to use:
------------

You can use following inserttags directly in the backend page css field or in the template

```

{{hbc::default}}
Iterates back to the root page and returns every found valid css class string


{{hbc::first}}
Iterates back to the root page and returns the first occurrence of an valid css class string


{{hbc::12}}
Returns the css class string from the page with id 12

```

It is also possible to use the extension directly in php

```php

// Default - like {{hbc::default}}
$classes = MrTool\HierarchicalBodyClass\Provider\HierarchicalBodyClass::getAll($pageId)

// First - like {{hbc::first}}
$classes = MrTool\HierarchicalBodyClass\Provider\HierarchicalBodyClass::getFirst($pageId)

// From - like {{hbc::12}}
$classes = MrTool\HierarchicalBodyClass\Provider\HierarchicalBodyClass::getFrom($pageId)

```

Additional note
--------------

This module is provided "as is", without warranty of any kind.
It is still under development if you find any issues please use the github issue tracker.