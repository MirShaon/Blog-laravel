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

	Route::post('/subscribe', function(){

           $email =request('email');
           Newsletter::subscribe($email);
           Session::flash('subscribed','Successfully Subscribed');

           return redirect()->back();

	});
		Route::get('/',[

		          'uses' => 'FrontEndController@index',
		          'as' => 'index'


		 ]);
		Route::get('/post/{slug}',[

		          'uses' => 'FrontEndController@singlePost',
		          'as' => 'post.single'


		 ]);
		Route::get('/category/{id}',[

		          'uses' => 'FrontEndController@category',
		          'as' => 'category.single'


		 ]);
		Route::get('/tag/{id}',[

				          'uses' => 'FrontEndController@tag',
				          'as' => 'tag.single'


				 ]);
		Route::get('/results', function(){

            $posts = \App\Post::where('title', 'like', '%' . request('query') .'%')->get();

            return view('results')->with('posts', $posts)
                                  ->with('title', 'Search results:' .request('query'))
                                  ->with('settings', \App\Setting::first())
                                  ->with('categories', \App\Category::take(7)->get())
                                  ->with('query', request('query'));

		});



Auth::routes();

Route::group(['prefix' => 'admin','middleware' => 'auth'], function() {

		Route::get('/dashboard',[

		 'uses' => 'HomeController@index',
		  'as' => 'home'
		]);

		Route::get('/post/create',[


		        'uses' => 'PostsController@create',
		        'as' => 'post.create'

		]);

		Route::post('/post/store',[


		        'uses' => 'PostsController@store',
		        'as' => 'post.store'

		]);
		Route::get('/posts',[


		        'uses' => 'PostsController@index',
		        'as' => 'posts'

		]);
		Route::get('/posts/delete/{id}',[


		        'uses' => 'PostsController@destroy',
		        'as' => 'posts.delete'

		]);
		Route::get('/posts/trashed',[


				        'uses' => 'PostsController@trashed',
				        'as' => 'posts.trashed'

		]);
		Route::get('/posts/kill/{id}',[


				        'uses' => 'PostsController@kill',
				        'as' => 'post.kill'

		]);
		Route::get('/posts/restore/{id}',[


				        'uses' => 'PostsController@restore',
				        'as' => 'posts.restore'

		]);
		Route::get('/posts/edit/{id}',[


				        'uses' => 'PostsController@edit',
				        'as' => 'posts.edit'

		]);
		Route::post('/posts/update/{id}',[


				        'uses' => 'PostsController@update',
				        'as' => 'posts.update'

		]);

		Route::get('/category/create',[


		        'uses' => 'CategoryController@create',
		        'as' => 'category.create'

		]);

		Route::post('/category/store',[


		        'uses' => 'CategoryController@store',
		        'as' => 'category.store'

		]);

		Route::get('/categories',[


				        'uses' => 'CategoryController@index',
				        'as' => 'categories'

		]);
		Route::get('/category/edit/{id}',[


				        'uses' => 'CategoryController@edit',
				        'as' => 'category.edit'

		]);
		Route::get('/category/delete/{id}',[


				        'uses' => 'CategoryController@destroy',
				        'as' => 'category.delete'

		]);
		Route::post('/category/update/{id}',[


				        'uses' => 'CategoryController@update',
				        'as' => 'category.update'

		]);

		Route::get('/tags',[
                          
                          'uses' => 'TagsController@index',
                          'as' => 'tags'

		]);
		Route::get('/tags/create',[
                          
                          'uses' => 'TagsController@create',
                          'as' => 'tag.create'

		]);
		Route::post('/tags/store',[
                          
                          'uses' => 'TagsController@store',
                          'as' => 'tag.store'

		]);
		Route::get('/tags/edit/{id}',[
                          
                          'uses' => 'TagsController@edit',
                          'as' => 'tag.edit'

		]);
		Route::post('/tags/update/{id}',[
                          
                          'uses' => 'TagsController@update',
                          'as' => 'tag.update'

		]);
		Route::get('/tags/delete/{id}',[
                          
                          'uses' => 'TagsController@destroy',
                          'as' => 'tag.delete'

		]);
		Route::get('/users', [



                  'uses' => 'UsersController@index',
                  'as'   => 'users'
		]);
		Route::get('/user/create', [



		                  'uses' => 'UsersController@create',
		                  'as'   => 'user.create'
		]);
		Route::post('/user/store', [



		                  'uses' => 'UsersController@store',
		                  'as'   => 'user.store'
		]);
		Route::get('/user/admin/{id}', [



		                  'uses' => 'UsersController@admin',
		                  'as'   => 'user.admin'
		]);

		Route::get('/user/not-admin/{id}', [



		                  'uses' => 'UsersController@not_admin',
		                  'as'   => 'user.not_admin'
		]);
       Route::get('/user/profile', [



		                  'uses' => 'ProfilesController@index',
		                  'as'   => 'user.profile'
		]);
		 Route::post('/user/profile/update', [



		                  'uses' => 'ProfilesController@update',
		                  'as'   => 'user.profile.update'
		]);
		 Route::get('/user/delete/{id}', [



		                  'uses' => 'UsersController@destroy',
		                  'as'   => 'user.delete'
		]);
		 Route::get('/settings', [



		                  'uses' => 'SettingsController@index',
		                  'as'   => 'settings'
		]);
		 Route::post('/settings/update', [



		                  'uses' => 'SettingsController@update',
		                  'as'   => 'settings.update'
		]);


    
});

