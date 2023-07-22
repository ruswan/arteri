<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Archive
 *
 * @property int $id
 * @property int $department_id
 * @property string $code
 * @property string $name
 * @property int $archive_type_id
 * @property string $description
 * @property int $archive_characteristic_id
 * @property int $creator_id
 * @property int $archive_status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property ArchiveCharacteristic $archive_characteristic
 * @property ArchiveType $archive_type
 * @property User $user
 * @property Department $department
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|Archive newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Archive newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Archive onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Archive query()
 * @method static \Illuminate\Database\Eloquent\Builder|Archive whereArchiveCharacteristicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Archive whereArchiveStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Archive whereArchiveTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Archive whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Archive whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Archive whereCreatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Archive whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Archive whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Archive whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Archive whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Archive whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Archive whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Archive withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Archive withoutTrashed()
 * @mixin \Eloquent
 */
class Archive extends Model
{
	use SoftDeletes;
	protected $table = 'archives';

	protected $casts = [
		'department_id' => 'int',
		'archive_type_id' => 'int',
		'archive_characteristic_id' => 'int',
		'creator_id' => 'int',
		'archive_status' => 'int'
	];

	protected $fillable = [
		'department_id',
		'code',
		'name',
		'archive_type_id',
		'description',
		'archive_characteristic_id',
		'creator_id',
		'archive_status'
	];

	public function archive_characteristic()
	{
		return $this->belongsTo(ArchiveCharacteristic::class);
	}

	public function archive_status()
	{
		return $this->belongsTo(ArchiveStatus::class, 'archive_status');
	}

	public function archive_type()
	{
		return $this->belongsTo(ArchiveType::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'creator_id');
	}

	public function department()
	{
		return $this->belongsTo(Department::class);
	}
}
