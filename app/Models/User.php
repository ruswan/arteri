<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Collection|Archive[] $archives
 * @property Collection|Circulation[] $circulations
 * @property Collection|Code[] $codes
 * @property Collection|Creator[] $creators
 * @property Collection|Location[] $locations
 * @property Collection|Medium[] $media
 * @package App\Models
 * @property-read int|null $archives_count
 * @property-read int|null $circulations_count
 * @property-read int|null $codes_count
 * @property-read int|null $creators_count
 * @property-read int|null $locations_count
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Model
{
	protected $table = 'users';

	protected $casts = [
		'email_verified_at' => 'datetime'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'email_verified_at',
		'password',
		'remember_token'
	];

	public function archives()
	{
		return $this->hasMany(Archive::class, 'updated_by');
	}

	public function circulations()
	{
		return $this->hasMany(Circulation::class, 'updated_by');
	}

	public function codes()
	{
		return $this->hasMany(Code::class, 'updated_by');
	}

	public function creators()
	{
		return $this->hasMany(Creator::class, 'updated_by');
	}

	public function locations()
	{
		return $this->hasMany(Location::class, 'updated_by');
	}

	public function media()
	{
		return $this->hasMany(Medium::class, 'updated_by');
	}
}
