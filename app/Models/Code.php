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
 * @property User|null $user
 * @property Collection|Archive[] $archives
 * @package App\Models
 * @property-read int|null $archives_count
 * @method static \Illuminate\Database\Eloquent\Builder|Code newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Code newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Code onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Code query()
 * @method static \Illuminate\Database\Eloquent\Builder|Code whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Code whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Code whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Code whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Code whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Code whereNames($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Code whereRetention($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Code whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Code whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Code withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Code withoutTrashed()
 * @mixin \Eloquent
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
