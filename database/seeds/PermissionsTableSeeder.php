<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$per = [
			"1" => ["BackupController@create", "Sao lưu - thêm mới"],
			"2" => ["BackupController@delete", "Sao lưu - xóa"],
			"3" => ["BackupController@download", "Sao lưu - download"],
			"4" => ["BackupController@index", "Sao lưu - danh sách"],

			"5" => ["HomeController@index", "Trang chủ"],

			"6" => ["RolesController@destroy", "Phân quyền: Vai trò - xóa"],
			"7" => ["RolesController@index", "Phân quyền: Vai trò - danh sách"],
			"8" => ["RolesController@show", "Phân quyền: Vai trò - chi tiết"],
			"9" => ["RolesController@store", "Phân quyền: Vai trò - thêm mới"],
			"10" => ["RolesController@update", "Phân quyền: Vai trò - chỉnh sửa"],

			"11" => ["UsersController@destroy", "Quản trị người dùng - xóa"],
			"12" => ["UsersController@index", "Quản trị người dùng - danh sách"],
			"13" => ["UsersController@show", "Quản trị người dùng - chi tiết"],
			"14" => ["UsersController@store", "Quản trị người dùng - thêm mới"],
			"15" => ["UsersController@update", "Quản trị người dùng - chỉnh sửa"],

			"16" => ["UsersController@postProfile", "Chỉnh sửa thông tin cá nhân"],

			//BỔ SUNG THÊM QUYỀN NẾU CÓ, chú ý key là ID của permission
		];
		$addPermissions = [];
		foreach ($per as $id => $label){
			if(\App\Permission::where('name',$label[0])->count() == 0)
				$addPermissions[] = [
					'name' => $label[0],
					'label' => $label[1],
					'id' => $id
				];
		}
		if (count($addPermissions) > 0)
			DB::table('permissions')->insert($addPermissions);

		//ADD ROLE - Them vai tro
		DB::table( 'roles' )->delete();//empty role
		$datenow = date( 'Y-m-d H:i:s' );
		DB::table( 'roles' )->insert( [
			[ 'id' => 1, 'name' => 'admin', 'label' => 'admin', 'created_at' => $datenow, 'updated_at' => $datenow ],
			[ 'id' => 2, 'name' => 'company', 'label' => 'company', 'created_at' => $datenow, 'updated_at' => $datenow ]
		] );

		//BỔ SUNG ID QUYỀN NẾU CÓ
		//Quyền của Admin
		$permissionsAdmin = [
			1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16
		];
		//Quyền của công ty
		$permissionsCompany = [
			16
		];
		//Gán quyền vào Vai trò Admin
		$rolePermission = \App\Role::findOrFail(1);
		$rolePermission->permissions()->sync($permissionsAdmin);
		//Gán quyền vào Vai trò Công ty
		$rolePermission2 = \App\Role::findOrFail(2);
		$rolePermission2->permissions()->sync($permissionsCompany);

		//Set tài khoản ID=1 là Admin
		$roleUser = \App\User::findOrFail(1);
		$roleUser->roles()->sync([1]);

		/*
		$permissionsID = \App\Permission::pluck('id');
		$roleAdmin = \App\Role::findOrFail(1);
		$roleAdmin->permissions()->attach($permissionsID);
		*/
	}
}
