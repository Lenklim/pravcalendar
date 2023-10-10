<h1 align="center"></h1>




<h2 align="center">Запуск сервиса:</h2>
<p>
<code>
env.local.dist - переименовываем в env.local
</code>
рекомендую утилиту make и команды для старта:

<code>make up</code> - старт всех сервисов <br />
<code>make cli</code>  - php терминал <br />
<code>make down</code> - стоп и удаление всех сервисов <br />


Можно использовать обычные команды стандартного докера, тут кому что удобно.
</p>

<h3>Устанавливаем composer зависимости.</h3>

Генерим и выполняем миграции<br />
<code>bin/console make:migration</code><br />
<code>bin/console doctrine:migrations:migrate</code>

Смотрим фикстуры - там начальные данные для старта. Выставляем роли и права на сервисы.

Далее запускаем их выполнение:<br>
<code>bin/console doctrine:fixtures:load</code>


<h2 align="center">Полезные скрипты для командной строки (make-dev-cli)</h2>
<code>bin/console app:get-polices</code> - отладочный скрипт для написания кода 
и проверки его сразу в консоли.

<code>bin/console app:app:undo</code> - удалить файлы миграций 
и удалить таблицы в базе. Экономит время.


sudo chown lena:lena -Rf Entity

