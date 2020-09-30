# Symfony Helm

## Docker Compose

```bash
export "$(grep -v '^#' .env | xargs)"

docker-compose up
```

- [localhost:8000](http://localhost:8000)
- [localhost:8000/products/1](http://localhost:8000/products/1)

```bash
docker build . -t bramalho/symfony-helm-mysql -f ./docker/mysql/Dockerfile \
    --build-arg VERSION=8.0.21
docker push bramalho/symfony-helm-mysql

docker build . -t bramalho/symfony-helm-nginx -f ./docker/nginx/Dockerfile \
    --target prod \
    --build-arg VERSION=1.19.2
docker push bramalho/symfony-helm-nginx

docker build . -t bramalho/symfony-helm-php-fpm -f ./docker/php-fpm/Dockerfile \
    --target prod \
    --build-arg VERSION=7.4.10
docker push bramalho/symfony-helm-php-fpm
```
