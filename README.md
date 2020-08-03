# APIserver2

Данное приложение представляет собой API сервер для чтения, редактирования, и удаление статей.

Получение всех статей (метод GET):
  GET http://yourdomain/api/articles/getarticles
  
Получение определенной статьи (метод GET):
  GET http://yourdomain/api/articles/getarticles?id=n
    Где n - идентификатор статьи

Добавить статью (метод POST):
   POST http://yourdomain/api/articles/addarticle

Обновить статью (метод PUT):
  PUT http://yourdomain/api/articles/editarticle
 
Удалить статью (метод DELETE):
  DELETE http://yourdomain/api/articles/deletearticle
  
Работа с категориями

Получение всех категорий (метод GET):
  GET http://yourdomain/api/categories/getcategories
  
Получение категорий с количеством статей не меньшим, чем указано в параметре запроса (метод GET):
  GET http://yourdomain/api/categories/getcategories?articlecount=n
    Где n - количество статей

Получение определенной категории (метод GET):
  GET http://yourdomain/api/categories/getcategories?id=n
    Где n - идентификатор категории
    
 
cURL примеры:
Во всех cURL запросах используется параметр -i для получения заголовков ответа сервера для полной информативности. Вы можете не указывать его. В POST, PUT и DELETE
запросах, в качестве тела запроса используется определенный файл формата json для повышения читаемости вместо прописывания тела запроса непосредственно в консоли.

Работа со статьями

Получение всех статей (метод GET):
  curl http://yourdomain/api/articles/getarticles -i

Получение определенной статьи (метод GET):
  curl http://yourdomain/api/articles/getarticles?id=n -i
  
Добавить статью (метод POST):
  curl -d @addarticle.json -H "Content-Type: application/json" -X POST http://yourdomain/api/articles/addarticle

Обновить статью (метод PUT):
  curl -d @editarticle.json -H "Content-Type: application/json" -X PUT http://yourdomain/api/articles/editarticle

Удалить статью (метод DELETE):
  curl -d @deletearticle.json -H "Content-Type: application/json" -X DELETE http://yourdomain/api/articles/deletearticle
  
Работа с категориями

Получение всех категорий (метод GET):
  curl http://yourdomain/api/categories/getcategories
  
Получение категорий с количеством статей не меньшим, чем указано в параметре запроса (метод GET):
  curl curl http://yourdomain/api/categories/getcategories?articlecount=n
  
Получение определенной категории (метод GET):
  curl http://anotherserver1/api/categories/getcategory?id=n
  

Критерии для тела запроса при работе с методами POST,PUT и DELETE

POST:
  Количество ключей - 3;
  cat_id - int;
  title - string;
  description - string;
  
PUT:
  Количество ключей -3;
  cat_id - int;
  title - string;
  description - string;
  
DELETE:
  Количество ключей -1;
  id - int;

  

  
  


