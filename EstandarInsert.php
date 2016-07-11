<?php
//insert into users(email,votes) values('john@example.com',0);
DB::table('users')->insert(
    ['email' => 'john@example.com', 'votes' => 0]
);

//doble insert
DB::table('users')->insert([
    ['email' => 'taylor@example.com', 'votes' => 0],
    ['email' => 'dayle@example.com', 'votes' => 0]
]);

//obtiene el id con el que se almaceno la tupla en una tabla con id autoincrementable
//se puede pasar el nombre de la secuencia como segundo parametro para obtener el valor
$id = DB::table('users')->insertGetId(
    ['email' => 'john@example.com', 'votes' => 0]
);


?>
