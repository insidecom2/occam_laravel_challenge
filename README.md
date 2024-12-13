# OCCAM Laravel Challange

Laravel app full stack for manage user.

## Technology

-   php 8.2
-   mariadb 10
-   docker
-   boostrap 5

## Installation

Use the docker to manage [docker](https://www.docker.com/).

Localhost

```bash
docker-compose -f docker-compose.dev.yaml up -d --build
```

More detail config in localhost [detail >>](https://docs.google.com/document/d/1hnPrc-Z2h8u7D_cXPeGZGtX3m3LuIiuoEMIx7YpRh8c/edit?tab=t.0#bookmark=id.wcsnpnh2qgos)

Production

```bash
docker-compose -f docker-compose.prod.yaml up -d --build
```

More detail config in production [detail >>](https://docs.google.com/document/d/1hnPrc-Z2h8u7D_cXPeGZGtX3m3LuIiuoEMIx7YpRh8c/edit?tab=t.0#bookmark=id.hecr17v4f5s0)

Seed data

```bash
docker exec -it laravel-app php artisan db:seed
```

Open localhost application run with browser.

```bash
http://localhost
```

## License

[MIT](https://choosealicense.com/licenses/mit/)
