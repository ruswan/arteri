<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Circulation
 * 
 * @property int $id
 * @property string $archive_id
 * @property string $user_id
 * @property string|null $purposes
 * @property Carbon $borrow_dates
 * @property Carbon $due_dates
 * @property Carbon|null $return_dates
 * @property Carbon $transaction_dates
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $deleted_at
 * 
 * @property User|null $user
 *
 * @package App\Models
 */
class Circulation extends Model
{
	use SoftDeletes;
	protected $table = 'circulations';

	protected $casts = [
		'borrow_dates' => 'datetime',
		'due_dates' => 'datetime',
		'return_dates' => 'datetime',
		'transaction_dates' => 'datetime',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'archive_id',
		'user_id',
		'purposes',
		'borrow_dates',
		'due_dates',
		'return_dates',
		'transaction_dates',
		'created_by',
		'updated_by'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'updated_by');
	}
}
