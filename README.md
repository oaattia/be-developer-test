# PHP Image Processing Library

A PHP library for basic image processing operations, including cropping and resizing.

## Requirements

- PHP 7.2 or later
- GD extension for PHP

## Installation

The project contain a `Dockerfile` and `docker-compose.yml` That can be used to build the env for the project, 

```
docker-compose up -d
```

Install packages

```
docker-compose run --rm php composer install
```

Copy the env file 

```
cp .env.dist .env
```

## Usage

To call the routes you need first to place an image in `public/img` dir, and then 

```
GET /sample.jpg/crop/x/10/y/10/w/100/h/100  
```
This redirect to a cropped image 

```
/cropped_sample.jpg
```

For Resize url

```
GET /sample.jpg/resize/w/100/h/100  
```
This redirect to a resized image 

```
/resized_sample.jpg
```

## Tests

```
docker-compose run --rm php vendor/bin/phpunit
```
