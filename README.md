# Xmodule-PHP
A PHP library for implementing Modo Lab's XModule web service.

This library follows the XModule v1.0 specification as much as possible. Unless otherwise stated, each element can be instantiated via a camel-case version of their name (from the specification). For easiest use, reference the specification while using this library (while keeping in mind the "Things to remember" below).

To Install:
```sh
$ composer require dartanian300/xmodule-php
```

Be sure to include Composer's autoloader
```php
require(__DIR__.'/vendor/autoload.php');
```

Use the elements together to create your XModule response:

```php
// Create root response element
$response = new XModuleResponse();

// Create content elements
$container = new ButtonContainer();
$button = new LinkButton();

$button->title->set("Click Me");
$container->add($button);

// Add elements to root response element
$response->add($container);

// Print JSON response
echo json_encode($response);
```

Few things to remember:
- All elements will check for required fields when `json_encode()` is called. If there's a missing field, an exception will be thrown.
- String fields with predefined values are set using the value as a function (ex - setting `actionType` to 'constructive': `$linkBbutton->actionType->constructive()`)
- Freeform string fields accessed via `set()` & `get()`
- Boolean fields accessed via `get()`, `true()` & `false()`
- Array fields are generally accessed via `add()`, `get()`, `delete()` (if multiple arrays, append camel-case attribute name. See "Using elements with multiple array fields" example below)
- `elementType` & `inputType` fields are automatically set

# Get Started Examples

#### Access/Set predefined string fields
```php
$collapsible = new Collapsible();
$collapsible->disclosureIcon->plusminus();
$collapsible->disclosureIcon->get();
```

#### Access/Set freeform string fields
```php
$collapsible = new Collapsible();
$collapsible->title->set("I'm a collapsible title!");
$collapsible->title->get();
```

#### Access/Set boolean fields
```php
$collapsible = new Collapsible();
$collapsible->collapsed->true();
$collapsible->collapsed->get();
```

#### Access/Set/Delete array fields
```php
$collapsible = new Collapsible();

$img = new Image();
$img->url->set('http://...');

$collapsible->add($img);
$collapsible->get(0);
$collapsible->delete(0);
```

#### Access/Set/Delete object fields
```php
$container = new Container();
$container->margins->responsive();

$detail = new Detail();
$detail->thumbnail->url->set('http://...');
$detail->thumbnail->crop->true();
```

#### Access/Set id field
```php
$collapsible = new Collapsible('collapse1');

// OR

$collapsible = new Collapsible();
$collapsible->setId('collapse1');
```
> **Note:** ids can only be set on elements that support it

#### Access elementType field
```php
$collapsible = new Collapsible();
$collapsible->getElementType();
```

# More Examples

#### Using elements with multiple array fields
```php
$table = new Table();

$row = new \XModule\Helpers\Row();
$table->addRow($row);
$table->getRow(0);
$table->deleteRow(0);

$columnOption = new \XModule\Helpers\ColumnOption();
$table->addColumnOption($columnOption);
$table->getColumnOption(0);
$table->deleteColumnOption(0);
```

#### Using forms
```php
// Create root response element
$response = new XModuleResponse();

// Create root form element
$form = new Form();
$form->relativePath->set('./');

// Create inputs
$nameInput = new TextInput();
$nameInput->name->set("first-name");
$nameInput->label->set("First Name");

$selectState = new SelectMenu();
$selectState->name->set("state");
$selectState->label->set("State");
$optionLabels = ['New York', 'Georgia', 'California'];
$optionValues = ['NY', 'GA', 'CA'];
$selectState->addOptionLabel($optionLabels);
$selectState->addOptionValue($optionValues);

// OR store in associative array

//$optionValues = [
//    //label - value
//    'New York'  => 'NY',
//    'Georgia'   => 'GA',
//    'California'    =>  'CA'
//];
//foreach($optionValues as $label => $value){
//    $selectState->addOptionLabel($label);
//    $selectState->addOptionValue($value);
//}

$comments = new TextArea();
$comments->name->set('comments');
$comments->label->set('Comments');

// Add fields to form
$form->add([$nameInput, $selectState, $comments]);

// Add form to root response element
$response->add($form);

// Print JSON response
echo json_encode($response);
```

#### Using MultiColumn
```php
// Create root response element
$response = new XModuleResponse();

// Create multicolumn element
$columns = new MultiColumn(2);

// Create content
$text = new Detail();
$text->title->set('Welcome');
$text->body->set('<p>See to the right</p>');
$image = new Image();
$image->url->set('https://image.shutterstock.com/image-photo/large-beautiful-drops-transparent-rain-260nw-668593321.jpg');

// Add content to multicolumn
$columns->add(0, $text);
$columns->add(1, $image);

// Add multicolumn to root response element
$response->add($columns);

// Print JSON response
echo json_encode($response);
```

## A few exceptions

Some fields/elements use a modified `add()` method. See their signatures below:
- `ProgressiveDisclosureItems` and `QueryParameters` fields: `add($key, $element)`.
- `MultiColumn` elements: `add($columnNum, $element)`.

# More Documentation
More documentation can be found by navigating to the `docs` folder in a browser after running the following command:

```sh
$ composer make-docs
```

> **Note:** Assumes that PHPDoc is installed in the project's 'vendor' folder and that you are executing on a Unix-based system. Command might need to be modified to work on Windows systems (located in `composer.json`).

# Element Reference

## Available Top-Level Elements:
- **Root Element:** XModuleResponse
- AutoUpdateAccessibility
- ButtonContainer
- Carousel
- Collapsible
- Container
- Detail
- GoogleMap
- Grid
- Heading
- HTML
- Image
- Link
- LinkButton
- LoadingIndicator
- MultiColumn
- Portlet
- Table
- Tabs
- Toolbar
- ToolbarContent
- XList (renamed from specification's List since that's a reserved word in PHP)

## Available Form Elements:
- **Root Element:** Form
- Checkbox
- Email
- FormButton
- HiddenField
- Label
- Password
- Phone
- RadioButtons
- SelectMenu
- TextArea
- TextInput
- Upload

## Available GoogleMaps Elements (namespace: XModule\GoogleMaps):
- MapPoint
- MapPolygon
- MapPolyline
- Point

(namespace: XModule\GoogleMaps\MapPoint)
- Anchor
- Icon
- Size

## Available Toolbar Elements (namespace: XModule\Toolbar):
- MenuItem
- ToolbarButton
- ToolbarLabel
- ToolbarMenu

## Available Helper Elements (namespace: XModule\Helpers)

### For use with `Table`
- ColumnOption
- Row
- Cell

### For use with `Carousel`
- CarouselItem

### For use with `Grid`
- GridItem

### For use with `XList`
- ListItem

### For use with `Tabs`
- Tab


# Concepts Not Currently Implemented
- DynamicPlacemarks field (in `GoogleMap`)
- XComponents
