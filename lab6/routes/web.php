<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;

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

Route::get('/insert', function () {
    DB::insert("insert into Students(name, date_of_birth, GPA, advisor)values('Aruzhan', '2002-01-01', 4.0, 'Kurmangazy')");
});

Route::get('/select', function() {
    $result = DB::select('select * from Students where id=1');
    foreach($result as $students){
        echo "Name : ".$students->name;
        echo "<br>";
        echo "Date of birth : ".$students->date_of_birth;
        echo "<br>";
        echo "GPA : ".$students->GPA;
        echo "<br>";
        echo "Advisor : ".$students->advisor;
    }
});

Route::get('/update', function(){
    $update=DB::update('update Students set name="Aida" where id=2');
    return $update;
});

Route::get('/delete', function(){
    $delete=DB::delete('delete from Students where id=3');
    return $delete;
});

Route::get('/find', function(){
    $students=Student::where('id', 1)->first();
    return $students;
});

Route::get('/insert2', function(){
    $student=new Student;
    $student->name='Dana';
    $student->date_of_birth='2002-05-07';
    $student->GPA=3.5;
    $student->advisor='Dina';
    $student->save();
});

Route::get('/update2', function(){
    $student=Student::find(4);
    $student->name='Dina';
    $student->date_of_birth='2001-10-14';
    $student->GPA=3.5;
    $student->advisor='Dana';
    $student->save();
});

Route::get('/delete2', function(){
    $student=Student::find(9);
    $student->delete();
});


