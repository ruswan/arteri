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
 * Class ArchiveStatus
 * 
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Archive[] $archives
 *
 * @package App\Models
 */
class ArchiveStatus extends Model
{
	use SoftDeletes;
	protected $table = 'archive_statuses';

	protected $fillable = [
		'name'
	];

	public function archives()
	{
		return $this->hasMany(Archive::class, 'archive_status');
	}
}
