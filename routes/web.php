
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

<<<<<<< HEAD
  Route::get('/', [
    'uses' => 'PostController@getIndex',
    'as' => 'blog.index'
]);
Route::get('post/{id}', [
    'uses' => 'PostController@getPost',
    'as' => 'blog.post'
]);
Route::get('about', function () {
    return view('others.about');
})->name('other.about');
Route::group(['prefix' => 'admin'], function() {
    Route::get('', [
        'uses' => 'PostController@getAdminIndex',
        'as' => 'admin.index'
    ]);
    Route::get('create', [
        'uses' => 'PostController@getAdminCreate',
        'as' => 'admin.create'
    ]);
    Route::post('create', [
        'uses' => 'PostController@postAdminCreate',
        'as' => 'admin.create'
    ]);
    Route::get('edit/{id}', [
        'uses' => 'PostController@getAdminEdit',
        'as' => 'admin.edit'
    ]);
    Route::post('edit', [
        'uses' => 'PostController@postAdminUpdate',
        'as' => 'admin.update'
    ]);
=======
Route::get('/', function () {
    return view('blog.index');
>>>>>>> fa447230ae34e94aa295d85b2c4350901594e2e9
});
Route::post('create', function (\Illuminate\Http\Request $request,
           \Illuminate\Validation\Factory $validator) {
$validation=$validator->make($request->all(),[
'title'=>'required|min:5',
'content'=>'required|min:10'
]);
if($validation->fails()) {
return redirect()->back()->withErrors($validation);
}
return redirect()
          ->route('admin.index')
          ->with('info', 'Post created, Title:'.$request->input('title'));})->name('admin.create');

Route::post('edit', function(\Illuminate\Http\Request $request,
\Illuminate\Validation\Factory $validator){
                      $validation=$validator->make($request->all(), [
                       'title'=>'required|min:5',
                       'content'=>'required|min:10']);
                 if($validation->fails()){
                  return redirect()->back()->withErrors($validation);
                  }
            return redirect ()
                  ->route('admin.index')->with('info', 'Post edited, new Title:'.$request->input('title'));
})->name('admin.update');