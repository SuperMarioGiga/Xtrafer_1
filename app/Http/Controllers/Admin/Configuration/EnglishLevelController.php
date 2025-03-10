<?php

namespace App\Http\Controllers\Admin\Configuration;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseMethodController;
use App\Model\api\Configuration\EnglishLevelModel;

class EnglishLevelController extends BaseMethodController {

	function __construct() {
		$this->pageKey = 'englishLevel';

		$this->apiModel = new EnglishLevelModel();

		$this->config = (object) [
			'pathView' => 'admin/configuration/englishLevel',
			'urlAction' => 'admin/configuration/englishlevel',
		];
	}

	public function list(Request $request) {
		$this->config->fileView = 'list';
		$this->config->toView['title_page'] = 'Listar';
		$this->config->toView['url_page_action'] = '';

		$dataTable = new \stdClass();
		$dataTable->data = EnglishLevelModel::withTrashed()->get();

		$dataTable->header = [
			(object) [
				'label' => 'ID',
				'column' => 'id',
			],
			(object) [
				'label' => 'Descrição pt',
				'column' => 'description_pt',
			],
			(object) [
				'label' => 'Descrição en',
				'column' => 'description_en',
			],
			(object) [
				'label' => 'Descrição es',
				'column' => 'description_es',
			],
		];

		$this->config->toView['dataTable'] = $dataTable;

		return parent::list($request);
	}
}
