<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	$data['socials']			= Socials::where('statuses_id', '=', 1)->orderBy('order', 'ASC')->get();

	$data['news_started']		= News::where('statuses_id', '=', 1)
									->where('started', '=', 1)
									->limit(4)
									->orderby('updated_at', 'DESC')
										->get();
	$data['news_noStarted']		= News::where('statuses_id', '=', 1)
									->limit(3)
									->orderby('updated_at', 'DESC')
										->get();

	$data['galleries_top']		= Galleries::where('statuses_id', '=', 1)
									->where('modules_id', '=', 5)
									->where('container', '=', 0)
										->get();
	$data['galleries_bottom']	= Galleries::where('statuses_id', '=', 1)
									->where('modules_id', '=', 5)
									->where('container', '=', 1)
										->get();

	return View::make('main/view', $data);
});
Route::get('about_us', function()
{
	$data['socials']	= Socials::where('statuses_id', '=', 1)->orderBy('order', 'ASC')->get();
	$data['contents']	= Contents::where('statuses_id', '=', 1)->where('modules_id', '=', 6)->get();

	return View::make('aboutus/view', $data);
});
Route::get('products', function()
{
	$data['socials']	= Socials::where('statuses_id', '=', 1)->orderBy('order', 'ASC')->get();
	$data['categories']	= Categories::where('statuses_id', '=', 1)->get();

	return View::make('products/view', $data);
});
Route::get('news', function()
{
	$data['socials']	= Socials::where('statuses_id', '=', 1)->orderBy('order', 'ASC')->get();
	$data['news']		= News::where('statuses_id', '=', 1)->where('modules_id', '=', 9)->get();

	return View::make('news/view', $data);
});
Route::get('out_team', function()
{
	$data['socials']	= Socials::where('statuses_id', '=', 1)->orderBy('order', 'ASC')->get();
	$data['news']		= News::where('statuses_id', '=', 1)->where('modules_id', '=', 8)->get();

	return View::make('ourteam/view', $data);
});
Route::get('contact_us', function()
{
	$data['socials']	= Socials::where('statuses_id', '=', 1)->orderBy('order', 'ASC')->get();

	return View::make('contactus/view', $data);
});
Route::post('contact_us', function()
{
	$data = "<b>HOla!</b>";
	Mail::send('emails.welcome', $data, function($message)
	{
	    $message->to('tantaroth@gmail.com', 'Edward Ramirez')->subject('Te han contactado en Ismo');
	});
	
	return Redirect::to('contactus/view');
});

Route::get('manager', function()
{
	if ( ! Session::has('logged')) return Redirect::to('manager/login');

	return View::make('manager/dashboard/list');
});
Route::get('manager/logout', function()
{
	Session::flush();

	return Redirect::to('manager/login');
});
Route::get('manager/login', function()
{
	if (Session::get('logged')) return Redirect::to('manager');
	
	return View::make('manager/signin');
});
Route::post('manager/login', function()
{
	$users = new Users;

	$auth = $users->where('email', '=', Input::get('email'))->where('password', '=', md5(Input::get('password')))->get();
	foreach ($auth as $user)
	{
		Session::put('logged', 1);
		Session::put('userId', $user->id);
	}

	return Redirect::to('manager');
});

# STATUSES
Route::get('manager/status', function()
{
	if ( ! Session::has('logged')) return Redirect::to('manager/login');
	
	$data['statuses'] = Statuses::all();

	return View::make('manager/statuses/list', $data);
});
Route::get('manager/status/{status}/{id}', function($status=null, $id=null)
{
	if ( ! Session::has('logged')) return Redirect::to('manager/login');
	
	$data['params_selected'] 	= array('id'=>$id);
	$data['status_frm'] 		= Statuses::find($id);
	$data['statuses'] 			= Statuses::all();

	return View::make('manager/statuses/list', $data);
});
Route::match(array('GET', 'POST'), 'manager/processStatus/{status?}/{id?}', function($status=NULL, $id=NULL)
{
	if ( ! Session::has('logged')) return Redirect::to('manager/login');
	
	switch ($status) {
		case 'edit':
			$status = Statuses::find($id);

			$status->title 			= Input::get('title');
			$status->description 	= Input::get('description');
			$status->status 		= Input::get('status');
			$status->save();
			break;
		case 'delete':
			$status = Statuses::find($id);

			$status->delete();
			break;
		
		default:
			$status = new Statuses;

			$status->title 			= Input::get('title');
			$status->description 	= Input::get('description');
			$status->status 		= (Input::get('status')=='')?0:1;
			$status->save();
			break;
	}
	
	return Redirect::to('manager/status');
});

# MODULES
Route::get('manager/module', function()
{
	if ( ! Session::has('logged')) return Redirect::to('manager/login');
	
	$data['modules'] = Modules::all();

	foreach (Statuses::where('status', '=', 1)->get() as $status) {
		$data['statuses'][$status->id] = $status->title;
	}

	return View::make('manager/modules/list', $data);
});
Route::get('manager/module/{module}/{id}', function($module=null, $id=null)
{
	if ( ! Session::has('logged')) return Redirect::to('manager/login');
	
	$data['params_selected'] 	= array('id'=>$id);
	$data['module_frm'] 		= Modules::find($id);
	$data['modules'] 			= Modules::all();

	foreach (Statuses::where('status', '=', 1)->get() as $status) {
		$data['statuses'][$status->id] = $status->title;
	}

	return View::make('manager/modules/list', $data);
});
Route::match(array('GET', 'POST'), 'manager/processModule/{module?}/{id?}', function($module=NULL, $id=NULL)
{
	if ( ! Session::has('logged')) return Redirect::to('manager/login');
	
	switch ($module) {
		case 'edit':
			$module = modules::find($id);

			$module->title 			= Input::get('title');
			$module->description 	= Input::get('description');
			$module->statuses_id 	= Input::get('status');
			$module->save();
			break;
		case 'delete':
			$module = modules::find($id);

			$module->delete();
			break;
		
		default:
			$module = new modules;

			$module->title 			= Input::get('title');
			$module->description 	= Input::get('description');
			$module->statuses_id 	= Input::get('status');
			$module->save();
			break;
	}
	
	return Redirect::to('manager/module');
});

# PERMISSIONS
Route::get('manager/permission', function()
{
	if ( ! Session::has('logged')) return Redirect::to('manager/login');
	
	$data['permissions'] = Permissions::all();
	
	foreach (Statuses::where('status', '=', 1)->get() as $status) {
		$data['statuses'][$status->id] = $status->title;
	}
	foreach (Modules::where('statuses_id', '=', 1)->get() as $module) {
		$data['modules'][$module->id] = $module->title;
	}

	return View::make('manager/permissions/list', $data);
});
Route::get('manager/permission/{permission}/{id}', function($permission=null, $id=null)
{
	if ( ! Session::has('logged')) return Redirect::to('manager/login');
	
	$data['params_selected'] 	= array('id'=>$id);
	$data['permission_frm'] 	= Permissions::find($id);
	$data['permissions'] 		= Permissions::all();

	foreach (Statuses::where('status', '=', 1)->get() as $status) {
		$data['statuses'][$status->id] = $status->title;
	}
	foreach (Modules::where('statuses_id', '=', 1)->get() as $module) {
		$data['modules'][$module->id] = $module->title;
	}

	return View::make('manager/permissions/list', $data);
});
Route::match(array('GET', 'POST'), 'manager/processpermission/{permission?}/{id?}', function($permission=NULL, $id=NULL)
{
	if ( ! Session::has('logged')) return Redirect::to('manager/login');
	
	switch ($permission) {
		case 'edit':
			$permission = Permissions::find($id);

			$permission->modules_id 	= Input::get('module');
			$permission->level 			= Input::get('consult').'-'.Input::get('insert').'-'.Input::get('edit').'-'.Input::get('delete');
			$permission->statuses_id 	= Input::get('status');
			$permission->save();
			break;
		case 'delete':
			$permission = Permissions::find($id);

			$permission->delete();
			break;
		
		default:
			$permission = new Permissions;

			$permission->modules_id 	= Input::get('module');
			$permission->level 			= Input::get('consult').'-'.Input::get('insert').'-'.Input::get('edit').'-'.Input::get('delete');
			$permission->statuses_id 	= Input::get('status');
			$permission->save();
			break;
	}
	
	return Redirect::to('manager/permission');
});

# ROLES
Route::get('manager/role', function()
{
	if ( ! Session::has('logged')) return Redirect::to('manager/login');
	
	$data['roles'] = Roles::all();
	
	foreach (Statuses::where('status', '=', 1)->get() as $status) {
		$data['statuses'][$status->id] = $status->title;
	}
	foreach (Modules::where('statuses_id', '=', 1)->get() as $module) {
		$data['modules'][$module->id] = $module->title;
	}

	return View::make('manager/roles/list', $data);
});
Route::get('manager/role/{role}/{id}', function($role=null, $id=null)
{
	if ( ! Session::has('logged')) return Redirect::to('manager/login');
	
	$data['params_selected'] 	= array('id'=>$id);
	$data['role_frm'] 	= Roles::find($id);
	$data['roles'] 		= Roles::all();

	foreach (Statuses::where('status', '=', 1)->get() as $status) {
		$data['statuses'][$status->id] = $status->title;
	}
	foreach (Modules::where('statuses_id', '=', 1)->get() as $module) {
		$data['modules'][$module->id] = $module->title;
	}

	return View::make('manager/roles/list', $data);
});
Route::match(array('GET', 'POST'), 'manager/processrole/{role?}/{id?}', function($role=NULL, $id=NULL)
{
	if ( ! Session::has('logged')) return Redirect::to('manager/login');
	
	switch ($role) {
		case 'edit':
			$role = Roles::find($id);

			if (Input::file('image')) {
				$role->image		= base64_encode(file_get_contents(Input::file('image')->getRealPath()));
				$role->image_ext 	= Input::file('image')->getClientOriginalExtension();
			}
			$role->title 		= Input::get('title');
			$role->description 	= Input::get('description');
			$role->level 		= Input::get('consult').'-'.Input::get('insert').'-'.Input::get('edit').'-'.Input::get('delete');
			$role->statuses_id 	= Input::get('status');
			$role->save();
			break;
		case 'delete':
			$role = Roles::find($id);

			$role->delete();
			break;
		
		default:
			$role = new Roles;

			if (Input::file('image')) {
				$role->image		= base64_encode(file_get_contents(Input::file('image')->getRealPath()));
				$role->image_ext 	= Input::file('image')->getClientOriginalExtension();
			}
			$role->title 		= Input::get('title');
			$role->description 	= Input::get('description');
			$role->level 		= Input::get('consult').'-'.Input::get('insert').'-'.Input::get('edit').'-'.Input::get('delete');
			$role->statuses_id 	= Input::get('status');
			$role->save();
			break;
	}
	
	return Redirect::to('manager/role');
});

# USERS
Route::get('manager/user', function()
{
	if ( ! Session::has('logged')) return Redirect::to('manager/login');
	
	$data['users'] = Users::all();
	
	foreach (Statuses::where('status', '=', 1)->get() as $status) {
		$data['statuses'][$status->id] = $status->title;
	}
	foreach (Roles::where('statuses_id', '=', 1)->get() as $role) {
		$data['roles'][$role->id] = $role->title;
	}

	return View::make('manager/users/list', $data);
});
Route::get('manager/user/{user}/{id}', function($user=null, $id=null)
{
	if ( ! Session::has('logged')) return Redirect::to('manager/login');
	
	$data['params_selected'] 	= array('id'=>$id);
	$data['user_frm'] 	= Users::find($id);
	$data['users'] 		= Users::all();

	foreach (Statuses::where('status', '=', 1)->get() as $status) {
		$data['statuses'][$status->id] = $status->title;
	}
	foreach (Roles::where('statuses_id', '=', 1)->get() as $role) {
		$data['roles'][$role->id] = $role->title;
	}

	return View::make('manager/users/list', $data);
});
Route::match(array('GET', 'POST'), 'manager/processuser/{user?}/{id?}', function($user=NULL, $id=NULL)
{
	if ( ! Session::has('logged')) return Redirect::to('manager/login');
	
	switch ($user) {
		case 'edit':
			$user = Users::find($id);

			if (Input::file('image')) {
				$user->image		= base64_encode(file_get_contents(Input::file('image')->getRealPath()));
				$user->image_ext 	= Input::file('image')->getClientOriginalExtension();
			}
			$user->email 		= Input::get('email');
			if ( ! Input::get('password') == '') {
				$user->password = md5(Input::get('password'));
			}
			$user->fname 		= Input::get('fname');
			$user->lname 		= Input::get('lname');
			$user->company 		= Input::get('company');
			$user->phone 		= Input::get('phone');
			$user->roles_id 	= Input::get('role');
			$user->statuses_id 	= Input::get('status');
			$user->save();
			break;
		case 'delete':
			$user = Users::find($id);

			$user->delete();
			break;
		
		default:
			$user = new Users;

			if (Input::file('image')) {
				$user->image		= base64_encode(file_get_contents(Input::file('image')->getRealPath()));
				$user->image_ext 	= Input::file('image')->getClientOriginalExtension();
			}
			$user->email 		= Input::get('email');
			if ( ! Input::get('password') == '') {
				$user->password = md5(Input::get('password'));
			}
			$user->fname 		= Input::get('fname');
			$user->lname 		= Input::get('lname');
			$user->company 		= Input::get('company');
			$user->phone 		= Input::get('phone');
			$user->roles_id 	= Input::get('role');
			$user->statuses_id 	= Input::get('status');
			$user->save();
			break;
	}
	
	return Redirect::to('manager/user');
});

# GALLERIES
Route::get('manager/gallery', function()
{
	if ( ! Session::has('logged')) return Redirect::to('manager/login');
	
	$data['galleries'] = Galleries::all();
	
	foreach (Statuses::where('status', '=', 1)->get() as $status) {
		$data['statuses'][$status->id] = $status->title;
	}
	foreach (Modules::where('statuses_id', '=', 1)->get() as $module) {
		$data['modules'][$module->id] = $module->title;
	}

	return View::make('manager/galleries/list', $data);
});
Route::get('manager/gallery/{gallery}/{id}', function($gallery=null, $id=null)
{
	if ( ! Session::has('logged')) return Redirect::to('manager/login');
	
	$data['params_selected'] 	= array('id'=>$id);
	$data['gallery_frm'] 	= Galleries::find($id);
	$data['galleries'] 		= Galleries::all();

	foreach (Statuses::where('status', '=', 1)->get() as $status) {
		$data['statuses'][$status->id] = $status->title;
	}
	foreach (Modules::where('statuses_id', '=', 1)->get() as $module) {
		$data['modules'][$module->id] = $module->title;
	}

	return View::make('manager/galleries/list', $data);
});
Route::match(array('GET', 'POST'), 'manager/processgallery/{gallery?}/{id?}', function($gallery=NULL, $id=NULL)
{
	if ( ! Session::has('logged')) return Redirect::to('manager/login');
	
	switch ($gallery) {
		case 'edit':
			$gallery = Galleries::find($id);

			if (Input::file('image')) {
				$gallery->image		= base64_encode(file_get_contents(Input::file('image')->getRealPath()));
				$gallery->image_ext 	= Input::file('image')->getClientOriginalExtension();
			}
			$gallery->container 		= Input::get('container');
			$gallery->title 		= Input::get('title');
			$gallery->description 	= Input::get('description');
			$gallery->modules_id 	= Input::get('module');
			$gallery->statuses_id 	= Input::get('status');
			$gallery->save();
			break;
		case 'delete':
			$gallery = Galleries::find($id);

			$gallery->delete();
			break;
		
		default:
			$gallery = new Galleries;

			if (Input::file('image')) {
				$gallery->image		= base64_encode(file_get_contents(Input::file('image')->getRealPath()));
				$gallery->image_ext 	= Input::file('image')->getClientOriginalExtension();
			}
			$gallery->container 		= Input::get('container');
			$gallery->title 		= Input::get('title');
			$gallery->description 	= Input::get('description');
			$gallery->modules_id 	= Input::get('module');
			$gallery->statuses_id 	= Input::get('status');
			$gallery->save();
			break;
	}
	
	return Redirect::to('manager/gallery');
});

# ITEMS
Route::get('manager/item', function()
{
	if ( ! Session::has('logged')) return Redirect::to('manager/login');
	
	$data['items'] = Items::all();
	
	foreach (Statuses::where('status', '=', 1)->get() as $status) {
		$data['statuses'][$status->id] = $status->title;
	}
	foreach (Modules::where('statuses_id', '=', 1)->get() as $module) {
		$data['modules'][$module->id] = $module->title;
	}
	foreach (Categories::where('statuses_id', '=', 1)->get() as $category) {
		$data['categories'][$category->id] = $category->title;
	}

	return View::make('manager/items/list', $data);
});
Route::get('manager/item/{item}/{id}', function($item=null, $id=null)
{
	if ( ! Session::has('logged')) return Redirect::to('manager/login');
	
	$data['params_selected'] 	= array('id'=>$id);
	$data['item_frm'] 	= Items::find($id);
	$data['items'] 		= Items::all();

	foreach (Statuses::where('status', '=', 1)->get() as $status) {
		$data['statuses'][$status->id] = $status->title;
	}
	foreach (Modules::where('statuses_id', '=', 1)->get() as $module) {
		$data['modules'][$module->id] = $module->title;
	}
	foreach (Categories::where('statuses_id', '=', 1)->get() as $category) {
		$data['categories'][$category->id] = $category->title;
	}

	return View::make('manager/items/list', $data);
});
Route::match(array('GET', 'POST'), 'manager/processitem/{item?}/{id?}', function($item=NULL, $id=NULL)
{
	if ( ! Session::has('logged')) return Redirect::to('manager/login');
	
	switch ($item) {
		case 'edit':
			$item = Items::find($id);

			if (Input::file('image')) {
				$item->image		= base64_encode(file_get_contents(Input::file('image')->getRealPath()));
				$item->image_ext 	= Input::file('image')->getClientOriginalExtension();
			}
			$item->title 			= Input::get('title');
			$item->description 		= Input::get('description');
			$item->body 			= Input::get('body');
			$item->url 				= Input::get('url');
			$item->categories_id 	= Input::get('category');
			$item->modules_id 		= Input::get('module');
			$item->statuses_id 		= Input::get('status');
			$item->save();
			break;
		case 'delete':
			$item = Items::find($id);

			$item->delete();
			break;
		
		default:
			$item = new Items;

			if (Input::file('image')) {
				$item->image		= base64_encode(file_get_contents(Input::file('image')->getRealPath()));
				$item->image_ext 	= Input::file('image')->getClientOriginalExtension();
			}
			$item->title 			= Input::get('title');
			$item->description 		= Input::get('description');
			$item->body 			= Input::get('body');
			$item->url 				= Input::get('url');
			$item->categories_id 	= Input::get('category');
			$item->modules_id 		= Input::get('module');
			$item->statuses_id 		= Input::get('status');
			$item->save();
			break;
	}
	
	return Redirect::to('manager/item');
});

# SOCIALS
Route::get('manager/social', function()
{
	if ( ! Session::has('logged')) return Redirect::to('manager/login');
	
	$data['socials'] = Socials::orderBy('order', 'ASC')->get();
	
	foreach (Statuses::where('status', '=', 1)->get() as $status) {
		$data['statuses'][$status->id] = $status->title;
	}

	return View::make('manager/socials/list', $data);
});
Route::get('manager/social/{social}/{id}', function($social=null, $id=null)
{
	if ( ! Session::has('logged')) return Redirect::to('manager/login');
	
	$data['params_selected'] 	= array('id'=>$id);
	$data['social_frm'] 	= Socials::find($id);
	$data['socials'] = Socials::orderBy('order', 'ASC')->get();

	foreach (Statuses::where('status', '=', 1)->get() as $status) {
		$data['statuses'][$status->id] = $status->title;
	}

	return View::make('manager/socials/list', $data);
});
Route::match(array('GET', 'POST'), 'manager/processsocial/{social?}/{id?}', function($social=NULL, $id=NULL)
{
	if ( ! Session::has('logged')) return Redirect::to('manager/login');
	
	switch ($social) {
		case 'edit':
			$social = Socials::find($id);

			if (Input::file('image')) {
				$social->image		= base64_encode(file_get_contents(Input::file('image')->getRealPath()));
				$social->image_ext 	= Input::file('image')->getClientOriginalExtension();
			}
			if (Input::file('image_hover')) {
				$social->image_hover		= base64_encode(file_get_contents(Input::file('image_hover')->getRealPath()));
				$social->image_hover_ext 	= Input::file('image_hover')->getClientOriginalExtension();
			}
			$social->order 		= Input::get('order');
			$social->title 		= Input::get('title');
			$social->url 		= Input::get('url');
			$social->statuses_id 	= Input::get('status');
			$social->save();
			break;
		case 'delete':
			$social = Socials::find($id);

			$social->delete();
			break;
		
		default:
			$social = new socials;

			if (Input::file('image')) {
				$social->image		= base64_encode(file_get_contents(Input::file('image')->getRealPath()));
				$social->image_ext 	= Input::file('image')->getClientOriginalExtension();
			}
			if (Input::file('image_hover')) {
				$social->image_hover		= base64_encode(file_get_contents(Input::file('image_hover')->getRealPath()));
				$social->image_hover_ext 	= Input::file('image_hover')->getClientOriginalExtension();
			}
			$social->order 		= Input::get('order');
			$social->title 		= Input::get('title');
			$social->url 		= Input::get('url');
			$social->statuses_id 	= Input::get('status');
			$social->save();
			break;
	}
	
	return Redirect::to('manager/social');
});

# CATEGORIES
Route::get('manager/category', function()
{
	if ( ! Session::has('logged')) return Redirect::to('manager/login');
	
	$data['categories'] = Categories::all();
	
	foreach (Statuses::where('status', '=', 1)->get() as $status) {
		$data['statuses'][$status->id] = $status->title;
	}
	foreach (Modules::where('statuses_id', '=', 1)->get() as $module) {
		$data['modules'][$module->id] = $module->title;
	}

	return View::make('manager/categories/list', $data);
});
Route::get('manager/category/{category}/{id}', function($category=null, $id=null)
{
	if ( ! Session::has('logged')) return Redirect::to('manager/login');
	
	$data['params_selected'] 	= array('id'=>$id);
	$data['category_frm'] 	= Categories::find($id);
	$data['categories'] 		= Categories::all();

	foreach (Statuses::where('status', '=', 1)->get() as $status) {
		$data['statuses'][$status->id] = $status->title;
	}
	foreach (Modules::where('statuses_id', '=', 1)->get() as $module) {
		$data['modules'][$module->id] = $module->title;
	}

	return View::make('manager/categories/list', $data);
});
Route::match(array('GET', 'POST'), 'manager/processcategory/{category?}/{id?}', function($category=NULL, $id=NULL)
{
	if ( ! Session::has('logged')) return Redirect::to('manager/login');
	
	switch ($category) {
		case 'edit':
			$category = Categories::find($id);

			$category->title 		= Input::get('title');
			$category->description 	= Input::get('description');
			$category->statuses_id 	= Input::get('status');
			$category->save();
			break;
		case 'delete':
			$category = Categories::find($id);

			$category->delete();
			break;
		
		default:
			$category = new Categories;

			$category->title 		= Input::get('title');
			$category->description 	= Input::get('description');
			$category->statuses_id 	= Input::get('status');
			$category->save();
			break;
	}
	
	return Redirect::to('manager/category');
});

# CONTENTS
Route::get('manager/content', function()
{
	if ( ! Session::has('logged')) return Redirect::to('manager/login');
	
	$data['contents'] = contents::all();
	
	foreach (Statuses::where('status', '=', 1)->get() as $status) {
		$data['statuses'][$status->id] = $status->title;
	}
	foreach (Modules::where('statuses_id', '=', 1)->get() as $module) {
		$data['modules'][$module->id] = $module->title;
	}

	return View::make('manager/contents/list', $data);
});
Route::get('manager/content/{content}/{id}', function($content=null, $id=null)
{
	if ( ! Session::has('logged')) return Redirect::to('manager/login');
	
	$data['params_selected'] 	= array('id'=>$id);
	$data['content_frm'] 	= contents::find($id);
	$data['contents'] 		= contents::all();

	foreach (Statuses::where('status', '=', 1)->get() as $status) {
		$data['statuses'][$status->id] = $status->title;
	}
	foreach (Modules::where('statuses_id', '=', 1)->get() as $module) {
		$data['modules'][$module->id] = $module->title;
	}

	return View::make('manager/contents/list', $data);
});
Route::match(array('GET', 'POST'), 'manager/processcontent/{content?}/{id?}', function($content=NULL, $id=NULL)
{
	if ( ! Session::has('logged')) return Redirect::to('manager/login');
	
	switch ($content) {
		case 'edit':
			$content = contents::find($id);

			$content->name 			= Input::get('name');
			$content->title 		= Input::get('title');
			$content->container 	= Input::get('container');
			$content->body 			= Input::get('body');
			$content->modules_id 	= Input::get('module');
			$content->statuses_id 	= Input::get('status');
			$content->save();
			break;
		case 'delete':
			$content = contents::find($id);

			$content->delete();
			break;
		
		default:
			$content = new contents;

			$content->name 			= Input::get('name');
			$content->title 		= Input::get('title');
			$content->container 	= Input::get('container');
			$content->body 			= Input::get('body');
			$content->modules_id 	= Input::get('module');
			$content->statuses_id 	= Input::get('status');
			$content->save();
			break;
	}
	
	return Redirect::to('manager/content');
});

# NEWS
Route::get('manager/new', function()
{
	if ( ! Session::has('logged')) return Redirect::to('manager/login');
	
	$data['news'] = News::all();
	
	foreach (Statuses::where('status', '=', 1)->get() as $status) {
		$data['statuses'][$status->id] = $status->title;
	}
	foreach (Modules::where('statuses_id', '=', 1)->get() as $module) {
		$data['modules'][$module->id] = $module->title;
	}

	return View::make('manager/news/list', $data);
});
Route::get('manager/new/{new}/{id}', function($new=null, $id=null)
{
	if ( ! Session::has('logged')) return Redirect::to('manager/login');
	
	$data['params_selected'] 	= array('id'=>$id);
	$data['new_frm'] 	= News::find($id);
	$data['news'] 		= News::all();

	foreach (Statuses::where('status', '=', 1)->get() as $status) {
		$data['statuses'][$status->id] = $status->title;
	}
	foreach (Modules::where('statuses_id', '=', 1)->get() as $module) {
		$data['modules'][$module->id] = $module->title;
	}

	return View::make('manager/news/list', $data);
});
Route::match(array('GET', 'POST'), 'manager/processnew/{new?}/{id?}', function($new=NULL, $id=NULL)
{
	if ( ! Session::has('logged')) return Redirect::to('manager/login');
	
	switch ($new) {
		case 'edit':
			$new = News::find($id);

			if (Input::file('image')) {
				$new->image		= base64_encode(file_get_contents(Input::file('image')->getRealPath()));
				$new->image_ext 	= Input::file('image')->getClientOriginalExtension();
			}
			$new->started 		= Input::get('started');
			$new->name 			= Input::get('name');
			$new->title 		= Input::get('title');
			$new->description 	= Input::get('description');
			$new->body 			= Input::get('body');
			$new->container 	= Input::get('container');
			$new->statuses_id 	= Input::get('status');
			$new->modules_id 	= Input::get('module');
			$new->save();
			break;
		case 'delete':
			$new = News::find($id);

			$new->delete();
			break;
		
		default:
			$new = new News;

			if (Input::file('image')) {
				$new->image			= base64_encode(file_get_contents(Input::file('image')->getRealPath()));
				$new->image_ext 	= Input::file('image')->getClientOriginalExtension();
			}
			$new->started 		= Input::get('started');
			$new->name 			= Input::get('name');
			$new->title 		= Input::get('title');
			$new->description 	= Input::get('description');
			$new->body 			= Input::get('body');
			$new->container 	= Input::get('container');
			$new->statuses_id 	= Input::get('status');
			$new->modules_id 	= Input::get('module');
			$new->save();
			break;
	}
	
	return Redirect::to('manager/new');
});