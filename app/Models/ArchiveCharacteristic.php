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
 * Class ArchiveCharacteristic
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property Collection|Archive[] $archives
 * @package App\Models
 * @property-read int|null $archives_count
 * @method static \Illuminate\Database\Eloquent\Builder|ArchiveCharacteristic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArchiveCharacteristic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArchiveCharacteristic onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ArchiveCharacteristic query()
 * @method static \Illuminate\Database\Eloquent\Builder|ArchiveCharacteristic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArchiveCharacteristic whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArchiveCharacteristic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArchiveCharacteristic whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArchiveCharacteristic whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArchiveCharacteristic withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ArchiveCharacteristic withoutTrashed()
 * @mixin \Eloquent
 */
class ArchiveCharacteristic extends Model
{
	use SoftDeletes;
	protected $table = 'archive_characteristics';

	protected $fillable = [
		'name'
	];

	public function archives()
	{
		return $this->hasMany(Archive::class);
	}
}
