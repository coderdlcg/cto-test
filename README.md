

 v.0.0.1 

___
### Local Deploy

 - `git clone `
 - `composer install`
 - `cp .env.example .env`
 - Fill .env
 - `php artisan key:generate`
 - `npm install && npm run build`
 - `php artisan migrate --seed`

___
#### Test user
- email: `test@test.com`
- password: `asdfasdf`
- In console will be showed the Bearer token for testing API, after running the migration command.
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
