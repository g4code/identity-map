identity-map
======

> identity-map - In-memory data store - [php](http://php.net) library

[![Build Status](https://travis-ci.org/g4code/identity-map.svg?branch=master)](https://travis-ci.org/g4code/identity-map)

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
$data = $identityMap->get($key);

// check if data is stored
$identityMap->has($key);

// remove data
$identityMap->delete($key);

// clear all
$identityMap->clear();

```

## Development

### Install dependencies

```sh
composer install
```

### Run tests

```sh
composer unit-test
```

## License

(The MIT License)
see LICENSE file for details...
