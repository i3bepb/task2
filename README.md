### Запуск

Для быстрого запуска пректа использовался [Laravel sail](https://laravel.com/docs/10.x/sail)

Копируем файл **.env.example** с примерами переменных окружения в **.env** 
```shell
cp .env.example .env
```

На запускаемой машине должен присутствовать **docker**, **docker compose**. Запускаем команду ниже, она скачает если необходимо образы и запустить контейнеры
```shell
./vendor/laravel/sail/bin/sail up -d
```
Накатываем миграции и тестовые данные
```shell
./vendor/laravel/sail/bin/sail artisan migrate --seed
```

Результат можно посмотреть открыв в браузере http://localhost/

![Внизу лог запросов](https://raw.githubusercontent.com/i3bepb/task2/main/screenshot1.png)

### Задание

Даны две модели **Order** и **Manager**
```php
class Order extends Model
{
    public function manager()
    {
        return $this->hasOne('App\Manager');
    }
}

class Manager extends Model
{
}
```
Каждый **Order** имеет **manager_id**. **Manager** имеет **id**, **firstName**, **lastName**

Необходимо вывести 50 заказов (Order) + fullName менеджера с минимальным кол-вом запросов к бд.

Дополните класс **Order**.

Реализовать нужно без использование join.
