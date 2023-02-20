<?php
namespace Framework;

Router::addRoute(new Route('delete/{test_data}', 'MyController@index', Route::METHOD_GET));
Router::addRoute(new Route('delete/{test_data}/id/{test_value}', 'MyController@index', Route::METHOD_GET));
Router::addRoute(new Route('wellcome/{name}/text/{text}', 'HelloController@hello', Route::METHOD_GET));
Router::addRoute(new Route('rooms/{text}', 'homeController@rooms', Route::METHOD_GET));
echo "Маршруты добавлены<br>";