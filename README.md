# Portfolio

## About the project 

It is for my online-portfolio. It aims to show some drawings that I did and some pictures I took. In the future, it will also present some projects that I did in my current school. There is an admin space (logging) to add images in the database.

## Tools for installation

For this project, I use :
- `Laravel (PHP, Blade...)`
- `PGSQL`
- `JQuery`

## Database organisation

| IMAGES      | HASHTAGS    | TYPES       | IMAGE_HASHS |
| ----------- | ----------- | ----------- | ----------- |
| id          | id          | id          | id          |
| title       | label       | name        | id_image    |
| path        | (timestamp) | (timestamp) | id_hashtag  |
| id_type     | label_fr    |             | (timestamp) |
| date        |
| desc        |
| desc_fr     |
| (timestamp) |