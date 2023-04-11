

v.0.0.2

___
### Pre - Install
- Clone `git clone https://github.com/coderdlcg/cto-test.git`
- Run command on Windows OS `cp .env.example .env` or
- Run command on Linux OS `make env`
- Fill file `.env`

### Install on Linux
- Run `make init`

### Install on Windows
- Run `composer install && npm install && npm run build`
- Run `php artisan key:generate && php artisan migrate --seed`

___
#### Test user
- email: `test@test.com`
- password: `asdfasdf`

#### API
- API Documentation route [/api/v1](http://localhost:8000/api/v1)
- In console will be showed the Bearer token for testing API, after running the migration command. Use this is token for auth your requests in API routes.
- Add in Headers to your Http request next header `Authorization` with the value `Bearer YourKeyWhenWillBeGeneratedInConsole`.
- run command for update API docs `php artisan l5-swagger:generate`
___


### Постановка
Нужно написать приложение API по учёту рабочего времени на Laravel.

В приложении должны быть следующие функции:

- загрузка списка сотрудников из CSV-файла
- просмотр списка сотрудников
- два вызова для API: сотрудник приступил к работе, сотрудник закончил работу
- просмотр отчётов о рабочем времени каждого сотрудника по неделям
- для просмотра списка сотрудников и отчётов авторизация не требуется
- для взаимодействия с API и загрузки списка сотрудников авторизация требуется

### Технические требования:

- PHP 8+
- Laravel
- Любая СУБД

### Требования к коду:

- код должен быть покрыт функциональными тестами
- API должно быть документировано в формате OpenAPI или JSON:API
- код решения должен быть размещён в публично доступном git-репозитории
