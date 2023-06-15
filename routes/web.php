<?php

use App\classes\Fascade\TestFascade;
use App\classes\TestClass;
use App\Exceptions\CustomException;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TestingController;
use App\isop\isop;
use App\isop\isopfacade;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request as FacadesRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('toQuery',function(){
 return   $user=User::all();
    $user->toQuery()->update([
        'updated_at' =>now(),
    ]);
});

Route::get('test-trait',function(){
    resolve(TestClass::class)->title();
});

Route::get('test-gate',[TestingController::class,'index']);


Route::get('cookies-test',function(Request $request){
try{


}catch(Exception $e){
    dd($e);
}
});
Route::get('fascade-test', function (Request $request) {
    return    TestFascade::greet();
});
Route::get('/testing', [TestController::class, 'index']);


Route::get('var-check', function (Request $request) {
    try {

        return view('js');
    } catch (Exception $e) {
        dd($e);
    }
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('array-addition', function (Request $request) {

    throw new CustomException("Testing Message");
});

Route::view('alpine-js', 'alpine-js');
Route::get('test', function (Request $request) {
    try {
        $collection = collect([
            ['product' => 'Desk', 'price' => 200],
            ['product' => 'Chair', 'price' => 100],
            ['product' => 'Bookcase', 'price' => 150],
            ['product' => 'Door', 'price' => 100],
        ]);
        $filtered = $collection->where('price', 100);
        dd($filtered);
    } catch (Exception $e) {
        dd($e->getMessage());
    }
});



Route::get('test-fillable',function(){
// ///////////////////* to check that l eik coloumn agr ap fillable main nhe rkhty and insert krty fir kia hota ////////////////
// $array=
// [
//     'name'=>'hamzi',
//     'email'=>'hamzi@gmail.com',
//     'password'=>Hash::make('password')
// ];

// $record = User::create($array) /* The name was mising in model fillable so it showed an error that field name doesnot have a default value*/
//     $record=User::save($array);   /* for this statment we cannot pass directly an array to save method because save is an object level like we first need a model instance */
// return $record;

// ///////////////////* to check that l eik coloumn agr ap fillable main nhe rkhty and insert krty fir kia hota ////////////////


// /////////////////* can we pass directly an array to save method? /*///////////////
// $array=
// [
//     'name'=>'hamzi',
//     'email'=>'hamzi@gmail.com',
//     'password'=>Hash::make('password')
// ];
//     $model=resolve(User::class);
//     $record=$model->fill($array);
// return $record->save();   // works correctly as fill is object level and we need a model for that */

// ///////////////////* to check that l eik coloumn agr ap fillable main nhe rkhty and insert krty fir kia hota ////////////////


// /////////////////* can we update a column that is not in fillable  /*///////////////
// $array=
// [
//     'name'=>'shamzi',

// ];
// $user=User::find(11);
// // $user->fill($array);
// $user->name="nawaz";
// return $user->save();
//  // is mian agr ap fillable main  s name miss krty tu woh sae s update ho jata **/
////////////can we update a column that is not in fillable  /*///////////////

// /////////////////* can we create a record with save without adding a column in fillable   /*///////////////

// $userModel=app()->make("App\Models\User" );
// $userModel->name="ertugrul";
// $userModel->email="ertugrul@gmail.com";
// $userModel->password=Hash::make("password");
// $userModel->save();   // it worked
//////////// can we create a record with save without adding a column in fillable   /*///////////////

});

Route::get('check-elqoquent-mothods',function(){
try{
    $user=User::find(1);
    dump($user)->toArray();


    /************* ISDirty, model fetch krny k bad koi value change tu nhe hui before saving  **************/
    // dump($user);
    // $user->name="ameer";
    // dump($user->isdirty()); //true
    // dump($user->isdirty("name")); //true
    // dump($user->isdirty("email"));   //false
    // $user->save();
    // dump($user->isdirty()); //false
    // dump($user->isdirty("name")); //false
    // dump($user->isdirty("email"));   //false

    /************* wasChanged, model save krny k bad koi column update hua ya nhe   **************/
    $user->update([
        'name'=>'faqeer',
    ]);
    dump($user->wasChanged());  // true age pehly user ka name aur tha and ab aur h

}catch(Exception $e){

}
});


Route::get('test-transaction',function(){
//   return rescue(function(){
//     User::findOrFail(90);
//   },function($e){
//     return $e;
//   },true);
// try{
    User::findOrFail(90);

// }catch(Exception $e){
// report($e);
// }

});


