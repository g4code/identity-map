identity-map
======

> identity-map - [php](http://php.net) library

In-memory data store

## Install
```sh
composer require g4/identity-map
```

## Usage

```php
use G4\IdentityMap\IdentityMap;

$identityMap = new IdentityMap();

$key = 'some_unique_key';
$data = 'some_data';

// add data 
$identityMap->set($key, $data);

// retrieve data
$data = $identityMap->set($key);

// check if data is stored
$identityMap->has($key);

// remove data
$identityMap->delete($key);

// clear all
$identityMap->clear();

```

## Development

### Install dependencies

    $ make install

### Run tests

    $ make test

## License

(The MIT License)
see LICENSE file for details...
