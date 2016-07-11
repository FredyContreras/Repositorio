<? php
//select * from users;
$users = DB::table('users')->get();

//select * from users where name = `John' limit 1;
$user = DB::table('users')->where('name', 'John')->first();

//select email from users where name = 'John';
$email = DB::table('users')->where('name', 'John')->value('email');

//select count(*) from users;
$users = DB::table('users')->count();

//select max(price) from orders;
$price = DB::table('orders')->max('price');

//select avg(price) from orders where finalized = 1;
$price = DB::table('orders')
                ->where('finalized', 1)
                ->avg('price');
                
//select name, email as user_email from users;
$users = DB::table('users')->select('name', 'email as user_email')->get();

//select distinct(*) from from users;
$users = DB::table('users')->distinct()->get();

//select name,age from users;
$query = DB::table('users')->select('name');
$users = $query->addSelect('age')->get();

//select users.*, contacts.phone,orders.price from users
//  inner join contacts on users.id = contacts.user_id
//  inner join orders on user.id = orders.user_id;
$users = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.*', 'contacts.phone', 'orders.price')
            ->get();
            
//select * from users where first_name = null;
//union
//select * from users where last_name = null;
$first = DB::table('users')
            ->whereNull('first_name');

$users = DB::table('users')
            ->whereNull('last_name')
            ->union($first)
            ->get();

//select * from users where votes = 100;
$users = DB::table('users')->where('votes', '=', 100)->get();
$users = DB::table('users')->where('votes', 100)->get();


//diferentes tipos de comparaciones
$users = DB::table('users')
                ->where('votes', '>=', 100)
                ->get();

$users = DB::table('users')
                ->where('votes', '<>', 100)
                ->get();

$users = DB::table('users')
                ->where('name', 'like', 'T%')
                ->get();
$users = DB::table('users')->where([
    ['status','1'],
    ['subscribed','<>','1'],
])->get();


//select * from users where votes > 100 or name = 'John';
$users = DB::table('users')
                    ->where('votes', '>', 100)
                    ->orWhere('name', 'John')
                    ->get();

//otros tipos de clausulas
$users = DB::table('users')
                    ->whereBetween('votes', [1, 100])->get();
$users = DB::table('users')
                    ->whereNotBetween('votes', [1, 100])
                    ->get();
$users = DB::table('users')
                    ->whereIn('id', [1, 2, 3])
                    ->get();
$users = DB::table('users')
                    ->whereNotIn('id', [1, 2, 3])
                    ->get();
$users = DB::table('users')
                    ->whereNull('updated_at')
                    ->get();
$users = DB::table('users')
                    ->whereNotNull('updated_at')
                    ->get();
$users = DB::table('users')
                ->whereColumn('first_name', 'last_name');
$users = DB::table('users')
                ->whereColumn('updated_at', '>', 'created_at');
$users = DB::table('users')
                ->whereColumn([
                    ['first_name', 'last_name'],
                    ['updated_at', '>', 'created_at']
                ]);

//select * from users where name = 'John' or (votes > 100 and title <> 'Admin')
DB::table('users')
            ->where('name', '=', 'John')
            ->orWhere(function ($query) {
                $query->where('votes', '>', 100)
                      ->where('title', '<>', 'Admin');
            })
            ->get();

//select * from users order by name desc;
$users = DB::table('users')
                ->orderBy('name', 'desc')
                ->get();

$randomUser = DB::table('users')
                ->inRandomOrder()
                ->first();

//select *from users having sum(account_id) > 100 group by account_id;
$users = DB::table('users')
                ->groupBy('account_id')
                ->having('account_id', '>', 100)
                ->get();

?>
