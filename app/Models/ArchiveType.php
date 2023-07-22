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
 * Class ArchiveType
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property Collection|Archive[] $archives
 * @package App\Models
 * @property-read int|null $archives_count
 * @method static \Illuminate\Database\Eloquent\Builder|ArchiveType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArchiveType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArchiveType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ArchiveType query()
 * @method static \Illuminate\Database\Eloquent\Builder|ArchiveType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArchiveType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArchiveType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArchiveType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArchiveType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArchiveType withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ArchiveType withoutTrashed()
 * @mixin \Eloquent
 */
class ArchiveType extends Model
{
	use SoftDeletes;
	protected $table = 'archive_types';

	protected $fillable = [
		'name'
	];

	public function archives()
	{
		return $this->hasMany(Archive::class);
	}
}
