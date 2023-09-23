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
 * @property Collection|Archive[] $archives
 * @package App\Models
 * @property-read int|null $archives_count
 * @method static \Illuminate\Database\Eloquent\Builder|ArchiveStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArchiveStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArchiveStatus onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ArchiveStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|ArchiveStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArchiveStatus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArchiveStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArchiveStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArchiveStatus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArchiveStatus withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ArchiveStatus withoutTrashed()
 * @mixin \Eloquent
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
