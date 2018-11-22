<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Permission;
use App\Role;
use App\Traits\Authorizable;
use Illuminate\Http\Request;
use Session;

class RolesController extends Controller
{
	//use Authorizable;
	/**
	 * Display a listing of the resource.
	 *
	 * @return void
	 */
	public function index(Request $request)
	{
		$keyword = $request->get('search');
		$perPage = 15;

		if (!empty($keyword)) {
			$roles = Role::where('name', 'LIKE', "%$keyword%")->orWhere('label', 'LIKE', "%$keyword%")
			             ->paginate($perPage);
		} else {
			$roles = Role::paginate($perPage);
		}

		return view('admin.roles.index', compact('roles'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return void
	 */
	public function create()
	{
		$permissions = Permission::select('id', 'name', 'label')->get();

		return view('admin.roles.create', compact('permissions'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return void
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'name' => 'required',
			//'permissions' => 'required',
			'label' =>  'required'
		]);

		$role = Role::create($request->all());
		if(!empty($request->permissions)) {
			foreach ( $request->permissions as $permission_name ) {
				$permission = Permission::whereName( $permission_name )->first();
				$role->givePermissionTo( $permission );
			}
		}

		Session::flash('flash_message', 'Vai trò người dùng đã được thêm mới!');

		return redirect('admin/roles');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 *
	 * @return void
	 */
	public function show($id)
	{
		$role = Role::findOrFail($id);

		return view('admin.roles.show', compact('role'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 *
	 * @return void
	 */
	public function edit($id)
	{
		$role = Role::findOrFail($id);
		$permissions = Permission::select('id', 'name', 'label')->get();

		return view('admin.roles.edit', compact('role', 'permissions'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int      $id
	 * @param  \Illuminate\Http\Request  $request
	 *
	 * @return void
	 */
	public function update($id, Request $request)
	{
		$this->validate($request, [
			'name' => 'required',
			//'permissions' => 'required',
			'label' =>  'required'
		]);

		$role = Role::findOrFail($id);
		$role->update($request->all());

		$role->permissions()->detach();
		if(!empty($request->permissions)) {
			foreach ( $request->permissions as $permission_name ) {
				$permission = Permission::whereName( $permission_name )->first();
				$role->givePermissionTo( $permission );
			}
		}

		Session::flash('flash_message', 'Vai trò người dùng đã được cập nhật!');

		return redirect('admin/roles');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 *
	 * @return void
	 */
	public function destroy($id)
	{
		Role::destroy($id);

		Session::flash('flash_message', 'Vai trò người dùng đã được xóa!');

		return redirect('admin/roles');
	}
}
