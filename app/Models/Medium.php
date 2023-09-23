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
 * Class Medium
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $deleted_at
 * @property User|null $user
 * @property Collection|Archive[] $archives
 * @package App\Models
 * @property-read int|null $archives_count
 * @method static \Illuminate\Database\Eloquent\Builder|Medium newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Medium newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Medium onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Medium query()
 * @method static \Illuminate\Database\Eloquent\Builder|Medium whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medium whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medium whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medium whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medium whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medium whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medium whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medium withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Medium withoutTrashed()
 * @mixin \Eloquent
 */
class Medium extends Model
{
	use SoftDeletes;
	protected $table = 'media';

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

	public function archives()
	{
		return $this->hasMany(Archive::class, 'media_id');
	}
}
