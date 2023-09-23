<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Code
 * 
 * @property int $id
 * @property string $code
 * @property string $names
 * @property int $retention
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $deleted_at
 * 
 * @property User|null $user
 * @property Collection|Archive[] $archives
 *
 * @package App\Models
 */
class Code extends Model
{
	use SoftDeletes;
	protected $table = 'codes';

	protected $casts = [
		'retention' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'code',
		'names',
		'retention',
		'created_by',
		'updated_by'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'updated_by');
	}

	public function archives()
	{
		return $this->hasMany(Archive::class);
	}
}
