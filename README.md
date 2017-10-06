# Whip

A sweet CLI tool that whips up image ads for any keywords you choose. It's backed by a whopping 1Kb JSON data file but can easily be extended to support MySQL or any other database of your choice.

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
Enjoy!

```sh
$ cd whip/src
$ php whip-cli.php
```

Here it is in action:

```
#######################################################
                  Now watch me whip!
#######################################################


1) Data file (leave blank for default) [/home/vagrant/Code/whip/src/../data/cars.json]:
2) Number of images to display: 5
3) Keywords to match: (comma-separated, i.e. red, honda, 2017): honda,red


#######################################################
        Woot woot! Total of 4 result(s) found!
        You asked for 5 but that's all we got!
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
