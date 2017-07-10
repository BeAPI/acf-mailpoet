# Advanced Custom Fields Mailpoet #

## Description ##

This enhance ACF with a field Mailpoet. It allows you to select a particular form created with Mailpoet as an option and then you can use it in your templates with a shortcode for example.

## Important to know ##

In case you want to include this small plugin to your project running composer you can add this line to your composer.json :

```json
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/BeAPI/acf-mailpoet"
    }
  ]
```

then run the command :

```shell
composer require bea/acf-mailpoet
```

## Requirements

* [Mailpoet 2.7.10](https://fr.wordpress.org/plugins/wysija-newsletters/) 

not tested yet with beta version 3* of Mailpoet

## Screenshots

Select field type :

![Field in admin](/assets/img/screen2.png?raw=true)

Then select your Mailpoet Form :

![Field in admin](/assets/img/screen1.png?raw=true)

## Changelog ##

### 1.0.1
* 10 July 2017
* Initial
