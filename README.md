# Maptive Rest Api (PHP)


## Install

Via Composer

``` bash
composer require alfredog1976/maptive-rest-api
```

# Intro
Maptive allows you to create Custom Google Maps from spreadsheet data. The API will allow you to write data to custom fields that can be translated to specific map data. For more information, go to https://www.maptive.com/

# Getting Started

1. Create a Maptive account. You'll need a paid account to receive an API key.
2. E-mail support@maptive.com to receive your API key. 
3. Create a map. The map ID will be the "map_id" parameter in the URL. 

```bash
https://fortress.maptive.com/ver4/new_ui/index.php?&map_id=xxxxxx
```

# Setup

Authentication

```bash
    $maptive = new \alfredog1976\Maptive\Maptive('MAPTIVE API KEY', 'MAP ID');
```

Add

```bash
	// Array index must match your Maptive map column index
    $my_column_array = array("Field 1 Data", "Field 2 Data", "Field 3 Data");
    
    $maptive->add($my_column_array);
```

Add (Specific Columns)

```bash
    
    // Maptive columns data in associative array can be in any order 
    $my_column_array = array("2"=>"Field 3 Data", "1"=>"Field 2 Data");
    
    $maptive->addSpecificCols($my_column_array);
```

Update

```bash
    // Update 1 column using your Maptive index    
    $maptive->update("My Maptive Index", "column_1", "Field 1 Data");
    
```
Update (Specific Columns)

```bash
    // Update multiple columns using your Maptive index. Columns can be in any order 
    $my_column_array = array("2"=>"Field 3 Data", "1"=>"Field 2 Data");
    
    $maptive->addSpecificCols("My Maptive Index", $my_column_array);
    
```

Delete

```bash
    $maptive->delete("My Maptive Index");

```
Patch

```bash
    $maptive->patch();

```

```Alfred Garcia``` ```alfredog1976``` ```alfredog1976@yahoo.com```
