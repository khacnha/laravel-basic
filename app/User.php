<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Kyslik\ColumnSortable\Sortable;

class User extends Authenticatable
{
	use Notifiable, HasRoles, Sortable;

	public $sortable = ['id',
		'name',
		'email',
		'active',
		'username'
	];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password', 'active', 'username'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
	 * Get the profile record associated with the user.
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function profile(){
		return $this->hasOne('App\UserProfiles');
	}
	/**
	 * Scope a query to only include active users.
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeActive($query)
	{
		return $query->where('active', Config("settings.active"));
	}
	/**
	 * Show avatar
	 * @return string|void
	 */
	public function showAvatar($attrs = null,$default = ""){
		if(isset($this->profile) && !empty($this->profile->avatar)){
			$avatar = $this->profile->avatar;
			if(\Storage::exists($avatar))
				return '<img alt="avatar" class="'.$attrs["class"].'" src="'.asset(\Storage::url($avatar)).'" />';
		}
		if(!empty($default)) return '<img alt="avatar" class="'.$attrs["class"].'" src="'.$default.'" />';
		return;
	}

	public function findForPassport($username) {
		return $this->where('username', $username)->where('active', Config("settings.active"))->first();
	}
}
