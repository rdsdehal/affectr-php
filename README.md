affectr-php
===========

A simple PHP client for [TheySay AffectR API](http://docs.theysay.apiary.io).

# Dependencies

The client has been tested on `PHP 5.3.15` on `OS X 10.8.2`.
The following additional packages are used:

```
"underscore/underscore.php": "1.3.1"
"mashape/unirest-php": "1.2.1"
```

Install the above packages with `composer`:

```
php composer.phar install
```

# Running Examples

```
php affectr_api_client.php yourAPIUserName yourAPIPassWord
```

The API client submits the sample texts from the `text.php` file to [TheySay AffectR API](http://docs.theysay.apiary.io) and displays the results in the console.

# Licence

[Apache 2 Licence](http://www.apache.org/licenses/LICENSE-2.0.html). Copyright 2014 TheySay Ltd.

For further details, see the [LICENCE](LICENCE) file.
