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
 * @property int $location_id
 * @property int $code_id
 * @property int $media_id
 * @property Carbon $dates
 * @property string $descriptions
 * @property string $notes
 * @property int $quantities
 * @property string $box_numbers
 * @property string|null $files
 * @property int|null $created_by
 * @property int|null $updated_by
 * 
 * @property ArchiveCharacteristic $archive_characteristic
 * @property ArchiveType $archive_type
 * @property User|null $user
 * @property Department $department
 * @property Location $location
 * @property Medium $medium
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
		'archive_status' => 'int',
		'location_id' => 'int',
		'code_id' => 'int',
		'media_id' => 'int',
		'dates' => 'datetime',
		'quantities' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'department_id',
		'code',
		'name',
		'archive_type_id',
		'description',
		'archive_characteristic_id',
		'creator_id',
		'archive_status',
		'location_id',
		'code_id',
		'media_id',
		'dates',
		'descriptions',
		'notes',
		'quantities',
		'box_numbers',
		'files',
		'created_by',
		'updated_by'
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

	public function code()
	{
		return $this->belongsTo(Code::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'updated_by');
	}

	public function department()
	{
		return $this->belongsTo(Department::class);
	}

	public function location()
	{
		return $this->belongsTo(Location::class);
	}

	public function medium()
	{
		return $this->belongsTo(Medium::class, 'media_id');
	}
}
