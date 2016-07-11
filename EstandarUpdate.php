<?php
//update users set votes = 1 where id = 1;
DB::table('users')
            ->where('id', 1)
            ->update(['votes' => 1]);

//incrementos y decrementos
DB::table('users')->increment('votes');
DB::table('users')->increment('votes', 5);
DB::table('users')->decrement('votes');
DB::table('users')->decrement('votes', 5);

//incrementos con diferentes asignaciones
DB::table('users')->increment('votes', 1, ['name' => 'John']);


?>
