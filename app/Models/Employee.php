<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

		protected $fillable = ['first_name', 'last_name', 'company_id', 'email', 'phone_number'];

		// Relationship To Company
		public function company(){
				return $this->belongsTo(Company::class);
		}

		/**
		 * The table associated with the model.
		 *
		 * @var string
		 */
		protected $table = 'employee';
}
