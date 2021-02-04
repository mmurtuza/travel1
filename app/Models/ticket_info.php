<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ticket_info extends Model
{
	protected $table = 'sheet1';
	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'PAX', 'SERVICE','PNR', 'P.P NO','SECTOR','AIR','TKT NO','VENDORE','PAYABLE','PAID',
	];
}

