<?php
//delete from users;
DB::table('users')->delete();

//delete from users where votes > 100;
DB::table('users')->where('votes', '>', 100)->delete();

//truncate table users;
DB::table('users')->truncate();

?>
