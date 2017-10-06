# Whip

A sweet CLI tool that whips up image ads for whatever keywords you choose. It's backed by a whopping 1Kb JSON data file, but can easily be extended to run off MySQL or any other database of your choice.

## Requirements

All you need is PHP 7.1.0+ and [Composer](https://getcomposer.org/) for autoload dependencies.

* PHP 7.1.0+
* Composer

## Installation

There are two ways: by downloading the ZIP file or by cloning this repository.

### Install from ZIP file

The easiest way is just to download and extract the ZIP file and then from the command line **cd** to the directory with the **composer.json** file and run the following:

```sh
$ composer install
```

### Install via git clone

Alternatively, you can use git to clone this repository.
To clone this repository, run the following in the command line:

```sh
$ git clone https://github.com/slicvic/whip.git
```

When it's finished, run the following two commands:

```sh
$ cd whip
$ composer install
```

## Usage
To start whipping run the following in the command line and follow the prompt.

```sh
$ cd whip/src
$ php whip-cli.php
```

Enjoy!

Here's what it all looks like:

```
#######################################################
                  Now watch me whip!
#######################################################


Data file (leave blank for default) [/home/vagrant/Code/whip/src/../data/cars.json]:
Number of images to display: 5
Keywords to match: (comma-separated, i.e. red, honda, 2017): honda,red


#######################################################
        Woot woot! Total of 4 result(s) found!
   You asked for 5 but we can only give you that!
#######################################################


#1
	URL: https://red-honda-civic-2017.png
	Width: 100
	Height: 100
#2
	URL: https://2018-honda-fit.png
	Width: 200
	Height: 200
#3
	URL: https://honda-accord-sedan-2018-yellow.png
	Width: 300
	Height: 300
#4
	URL: https://2013-cooper-red.png
	Width: 500
	Height: 500
```
