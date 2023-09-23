<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Creator
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $deleted_at
 * @property User|null $user
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|Creator newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Creator newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Creator onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Creator query()
 * @method static \Illuminate\Database\Eloquent\Builder|Creator whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Creator whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Creator whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Creator whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Creator whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Creator whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Creator whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Creator withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Creator withoutTrashed()
 * @mixin \Eloquent
 */
class Creator extends Model
{
	use SoftDeletes;
	protected $table = 'creators';

	protected $casts = [
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'name',
		'created_by',
		'updated_by'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'updated_by');
	}
}
