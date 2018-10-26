<?php


Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');

/**
 * Backend
 */
Route::group(['namespace' => 'Admin', 'as' => 'admin.'], function() {
	
	/**
	 * Roles Permission
	 */
	Route::prefix('access/')->group(function() {
		Route::get('roles/data', 'Role\RolesTableController')->name('roles.data');
		Route::resource('roles', 'Role\RolesController');

		Route::get('permissions/data', 'Permission\PermissionsTableController')->name('permissions.data');
		Route::resource('permissions', 'Permission\PermissionsController');
	});

	/**
	 * CMS
	 */
	Route::prefix('cms/')->group(function() {
		Route::get('users/data', 'User\UsersTableController')->name('users.data');
		Route::resource('users', 'User\UsersController');

		Route::get('category/data', 'Category\CategoriesTableController')->name('category.data');
		Route::resource('category', 'Category\CategoriesController');

		Route::get('buildup/data', 'Buildup\BuildupsTableController')->name('buildup.data');
		Route::resource('buildup', 'Buildup\BuildupsController');

		Route::get('company/data', 'Company\CompaniesTableController')->name('company.data');
		Route::resource('company', 'Company\CompaniesController');

		Route::get('department/data', 'Department\DepartmentsTableController')->name('department.data');
		Route::resource('department', 'Department\DepartmentsController');

		Route::get('workflow/data', 'Workflow\WorkflowTableController')->name('workflow.data');
		Route::resource('workflow', 'Workflow\WorkflowController');
	});

});

Route::group(['namespace' => 'Stages', 'as' => 'stages.'], function() {
	Route::get('ideas/data', 'Idea\IdeasTableController')->name('ideas.data');
	Route::resource('ideas', 'Idea\IdeasController');
});

	// Route::get('ideas/data', 'Idea\IdeasTableController')->name('ideas.data');
	Route::resource('assessment', 'Assessment\AssessmentController');

