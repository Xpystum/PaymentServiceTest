## Установка

```
php artisan key:generate

php artisan migrate

~ php artisan currencies:install | or | ~ php artisan install

```

## Валюты:

```


currencies:prices {source} - обновление валют
{source} - cbrf , manual


```


## GIT
```

    git branch -r | grep -v '\->' | while read remote; do git branch --track "${remote#origin/}" "$remote"; done
    git fetch --all
    git pull --all
    git@github.com:Xpystum/PaymentServiceTest.git

```