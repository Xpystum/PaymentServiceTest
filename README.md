## Установка

```
php artisan key:generate

php artisan migrate

~ php artisan currencies:install | or | ~ php artisan install

```

## GIT
```

    git branch -r | grep -v '\->' | while read remote; do git branch --track "${remote#origin/}" "$remote"; done
    git fetch --all
    git pull --all

```