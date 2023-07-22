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
 * 
 * @property ArchiveCharacteristic $archive_characteristic
 * @property ArchiveType $archive_type
 * @property User $user
 * @property Department $department
 *
 * @package App\Models
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
