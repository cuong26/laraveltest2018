<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('user/create','Usercontroller@create');
Route::post('user/create','Usercontroller@store');
Route::get('dlt',function(){
Schema::drop('student');
echo "xóa bảng thành công";
});


Route::get('any',function(){
	Schema::create('Theloai',function($table){
 			$table->increments('id',11);
            $table->string('name',30);
	});
	echo "Tạo Bảng Thành Công";
 });            
Route::get('viewrc','StudViewController@index');
Route::get('edit-records','StudUpdateController@index');
Route::get('edit/{id}','StudUpdateController@show');
Route::get('edic/{id}','StudUpdateController@show1');
Route::post('edic/{id}','testcontroller@edit');
Route::post('edit/{id}','StudUpdateController@edit');
Route::get('index',function(){
		return view('stud_view');
});
Route::get('delete/{id}','StudDeleteController@destroy');
Route::get('sp', function () {
	Schema::create('student',function($table){
$table -> increments('id');
$table  ->	string('name');
$table  ->	string('password');
$table  ->	string('email');
 $table->rememberToken();
 $table->timestamps();
});
	echo "Tạo bảng thành công rồi nhé ";

});



Route::get('adt', function(){
	Schema::table('student' ,function($table){
		$table -> increments('id');
		$table->string('name');
		$table->string('password');
		$table->string('email');
		$table->rememberToken();
 		$table->timestamps();
});

echo "thêm bảng thành công!";
});
Route::get('insertf',function(){
	DB::table('users')->insert(['username'=>'xedien','password'=>bcrypt('12345')
		]);
	echo "<h1>insert thành công</h1>";
});
Route::get('hoa',function(){
	return view('dangnhap');
});
Route::get('inse',function(){
	DB::table('student')->insert(['name'=>'xedien','password'=>bcrypt('12345678'),'email'=> 'linh92@gmail.com'
		]);
	echo "<h1>insert thành công</h1>";
});
Route::get('truncate',function(){
	DB::table('tintuc')->truncate();
	echo "Đã xóa hết dữ liệu!";
});
Route::post('l','LoggController@login')->name('l');
Route::get('dangnhap',function(){
	return view('dangnhap');
});
Route::get("dangnhap",function(){
	return view("dangnhap");
});

Route::get('thu',function(){
return view('check');
});
Route::get('insert',function(){
	return view('stud_create');
});
Route::post('insert','StudInsertController@insert')->name('create');
Route::get('log','Au/LoginController@logout');
Route::get('spp', function () {
	Schema::create('tintuc', function ($table){
$table -> increments('id');
$table  ->	string('tieude');
$table  ->	string('noidung');
$table->rememberToken();
$table->timestamps();
});
	echo "Tạo bảng thành công rồi nhé ";

});

Route::post('login','AuthController@postLogin')->name('login');
Route::get('delete',function(){
		Schema::dropIfExists('student');
});
Route::get('logout','AuthController@logout')->name('logout');
Route::get('dangnhap1',function(){
		return view('dangnhap1');
});
Route::get('dangnhap2',function(){
		return view('dangnhap2');
});
Route::get('dangky',function(){
		return view('dangky');
});
Route::get('edit',function(){
		return view('edit_user');
});
Route::get('dangky1',function(){
	return view('register');
});
/*Route::post("register",function(){
	$rules =array(
		"name"=>"required|min:3",
		"password"=>"required|min:6",
		"email"=>"required|email");
if (!validator:: make(Input::all(),$rules)->fails()

 {
	$user= new User();
	$user -> "name" = Input::get("name");
	$user -> "password" =md5(sha1(Input::get("password")));
	$user -> "email" = Input::get("email");
	$user ->save();
	echo "Thanh cong";
}

})->name('register1');*/
Route::post('register','Registercontroller@storeUser') -> name('register');	
Route::get('regis',function(){
		return view('test');
});
Route::get('jqr',function(){
		return redirect('dangky1');
});
Route::get('test',function(){
	return view('test');
});
Route::get('chel','testcontroller@index');
Route::get('',function(){
	return view('footer');
});
Route::post('tintuc','ttrecordcontroller@add')->name('tin');
Route::get('texxt',function(){
	return view('testt');
});
Route::get('tec',function(){
	return view('baiviet1');
});
Route::get('pro','qlttcontroller@index');
Route::get('dltt/{id}','DtController@Delete') ;
Route::post('dltc/{id}','updatecontroller@Update') ;
Route::get('idm/{id}','updatecontroller@show')->name('show') ;

Route::get('index/{id}','baivietcontroller@show');
Route::post('timkiem','timkiemcontroller@search')->name('timkiem');
Route::get('trangchu',function(){
		return view('trangchu');
});
Route::get('addcot',function(){

	Schema::table('tintuc', function($table)
{
  $table ->integer('theloai_id');
    echo "thêm cột thành công";
});});
Route::get('index','trangchucontroller@show');
Route::get('theloai',function(){
	return view('atheloai');
});
Route::post('addtl','theloaicontroller@add')->name('theloai');
Route::get('qltheloai','theloaicontroller@show');
Route::get('udtl/{id}','updatetlcontroller@index');
Route::post('udtl/{id}','updatetlcontroller@edit');
Route::get('deltl/{id}','deltlcontroller@destroy')->name('deltl');
Route::get('text','thu1controller@show');
// Route::get('thu2', 'testcontroller@shows');
Route::get('theloaitt/{id}','baivietcontroller@tet');
Route::get('dtheloai/{id}','dltttController@cat');
//Route::get('thu2/{id}','baivietcontroller@shows');

	
