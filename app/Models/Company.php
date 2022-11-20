<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

		protected $fillable = ['name', 'email', 'logo', 'website'];

		// Relationship With Employees
		public function employee(){
			return $this->hasMany(Employee::class);
		}

		/**
		 * The table associated with the model.
		 *
		 * @var string
		 */
		protected $table = 'company';
}
