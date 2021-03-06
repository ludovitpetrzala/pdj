<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Sport
 *
 * @property integer $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Sport whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Sport whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Sport whereIsActive($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Sport whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Sport whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Sport extends Model
{

	const VOLLEYBALL = 1;
	const BEACH_VOLLEYBALL = 2;
	const SOCCER = 3;
	const SWIMMING = 4;
	const RUNNING = 5;
	const BADMINTON = 6;
	const SINGING = 7;
	const VISITOR = 8;

	public function levels() {
		return $this->hasMany(\App\Level::class);
	}

	public function disciplines() {
		return $this->hasMany(\App\Discipline::class);
	}

	public function teams() {
		return $this->hasMany(\App\Team::class);
	}

	public function price() {
		return $this->belongsTo(\App\Price::class);
	}

	public static function getMainSportIds() {
		return [self::BADMINTON, self::SOCCER, self::SWIMMING, self::VOLLEYBALL];
	}

	public function registrations() {
		return $this->hasMany(\App\RegistrationSport::class);
	}

}
