# LABS.ITECH
LAB 2 ITECH

Вариант 5. Создать и заполнить БД товаров интернет–магазина (в одной коллекции). Для товара обязательно указывается название, цена товара, количество единиц на складе. Возможные поля - фирма-производитель, категория товара (процессоры, материнские платы и т.д.), отзывы (могут быть и более одного), состояние (новое или б/у) и т.д.

Предоставить пользователю возможность получения следующей информации:
- перечень производителей, с которыми работает магазин;
- товары, отсутствующие на складе (т.е. вообще они есть, но сейчас количество 0);
- товары в выбранном ценовом диапазоне.


!!!!!!!!!!!!!!!!!  ДАМП БАЗЫ ДАННЫХ - файл online_shop_bd.js  !!!!!!!!!!!!!!!!!

Демонстрация работы веб-приложения:

Нажимаем на кнопку 'get_vendors', чтобы получить список производителей:

![img.png](demonstration/press_get_vend.png)

Получен список производителей:

![img.png](demonstration/vend_tabl.png)

Нажимаем на кнопку 'get_prev_vendors', чтобы получить последний сформированый список производителей:

![img.png](demonstration/press_prev_vend.png)

Получен последний сформированый список производителей:

![img.png](demonstration/prev_vend.png)

Нажимаем на кнопку 'get_items', чтобы получить товары отсутствующие на складе:

![img.png](demonstration/press_items_zero.png)

Получены товары отсутствующие на складе:

![img.png](demonstration/items_zero.png)

Нажимаем на кнопку 'get_prev_zero', чтобы получить товары отсутствующие на складе из последнего сделаного запроса:

![img.png](demonstration/press_prev_zero.png)

Получены товары отсутствующие на складе из последнего сделаного запроса:

![img.png](demonstration/prev_zero.png)


Нажимаем на кнопку 'get_prev_price', чтобы получить товары в заданом диапазоне из последнего сделаного запроса:

![img.png](demonstration/press_prev_price_1.png)

Получаем сообщение, так как запрос на выборку товаров в ценовом диапазоне ранее не проводился:

![img.png](demonstration/press_prev_prise_1_rez.png)

Вводим ценовой диапазон(500 - 5000) и нажимаем на кнопку 'get_items':

![img.png](demonstration/press_get_price.png)

Получены товары в заданом ценовом диапазоне(500 - 5000):

![img.png](demonstration/get_price.png)

Нажимаем на кнопку 'get_prev_price', чтобы получить товары получить товары в заданом диапазоне из последнего сделаного запроса:

![img.png](demonstration/press_get_prev_price_2.png)

Получены товары в заданом ценовом диапазоне из последнего сделаного запроса:

![img.png](demonstration/get_prev_price_2_rez.png)






