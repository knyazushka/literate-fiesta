Тестовое задание **Библиотека**

# Суть
Реализовать REST api для ведения библиотеки, где есть модели:
1. Книги
```text
- название
- описание
- год издания
- связь с автором (или несколбкими)
```
2. Авторы
```text
- имя
- фамилия
- отчество
- год рождения
- год смерти (если есть)
```

# Требования
1. Для каждой модели должен быть CRUD с поиском и пагинацией
2. Вывод книг должен быть дополнительно со списком авторов в виде "Фамилия И.О., Фамилия И.О."
3. Вывод авторов должен быть с количеством его книг
4. Интерфейс необязателен, можно работать через постман или просто ссылки
5. Заполнить тестовые данные в сидерах (необязательно)

# Как запускать
1. Подготовка
```bash
git clone ...
cd library
composer install
```
2. Прописываем данные в **.env**
3. Запускаем генерацию тестовых данных (100 авторов и 500 книг)
```bash
php artisan db:seed
```

# Роутинги
```bash
+--------+-----------+--------------------------+---------------------+-----------------------------------------------------+------------+
| Domain | Method    | URI                      | Name                | Action                                              | Middleware |
+--------+-----------+--------------------------+---------------------+-----------------------------------------------------+------------+
|        | GET|HEAD  | /                        |                     | Closure                                             | web        |
|        | GET|HEAD  | api/authors              | authors.index       | App\Http\Controllers\API\AuthorController@index     | api        |
|        | POST      | api/authors              | authors.store       | App\Http\Controllers\API\AuthorController@store     | api        |
|        | GET|HEAD  | api/authors/{author}     | authors.show        | App\Http\Controllers\API\AuthorController@show      | api        |
|        | PUT|PATCH | api/authors/{author}     | authors.update      | App\Http\Controllers\API\AuthorController@update    | api        |
|        | DELETE    | api/authors/{author}     | authors.destroy     | App\Http\Controllers\API\AuthorController@destroy   | api        |
|        | GET|HEAD  | api/books                | books.index         | App\Http\Controllers\API\BookController@index       | api        |
|        | POST      | api/books                | books.store         | App\Http\Controllers\API\BookController@store       | api        |
|        | GET|HEAD  | api/books/{book}         | books.show          | App\Http\Controllers\API\BookController@show        | api        |
|        | PUT|PATCH | api/books/{book}         | books.update        | App\Http\Controllers\API\BookController@update      | api        |
|        | DELETE    | api/books/{book}         | books.destroy       | App\Http\Controllers\API\BookController@destroy     | api        |
|        | GET|HEAD  | api/books/{book}/authors | books.authors.index | App\Http\Controllers\API\BookAuthorController@index | api        |
|        | POST      | api/books/{book}/authors | books.authors.store | App\Http\Controllers\API\BookAuthorController@store | api        |
|        | GET|HEAD  | api/user                 |                     | Closure                                             | api        |
|        |           |                          |                     |                                                     | auth:api   |
+--------+-----------+--------------------------+---------------------+-----------------------------------------------------+------------+
```
