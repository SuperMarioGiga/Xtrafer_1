<?php

namespace App\Model\api\Configuration;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Updater;

class ConstructionCategoryModel extends Model {
	use SoftDeletes;
	use Updater;

	protected $table = 'construction_category';

	public $fillable = [
		'description_pt',
		'description_en',
		'description_es',
		'created_by',
		'updated_by',
		'deleted_by',
	];

	protected $dates = ['deleted_at'];
}
