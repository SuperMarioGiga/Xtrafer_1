<?php

namespace App\Http\Controllers\site\xtrafer;

use Illuminate\Http\Request;
use App\Model\api\Configuration\ContentPageModel;
use App\Model\api\SchoolInformationModel;
use App\Model\api\SlideModel;

class AccreditationController extends _Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$flgPage = $request->get('flgPage');

		// return ContentPageModel::getByComponent($flgPage);
		return view('site/xtrafer/pages/default')
			->with('flgPage', $flgPage)
			->with('photoGalery', isset($request->id) ? \App\Model\api\GaleryModel::with('photoGalery')->find($request->id) : false)
			->with('banner', SlideModel::whereHas('contentPage', function($query) use ($flgPage) {
				$query->where('flg_page', $flgPage);
			})->first())
			->with('pageComponents', ContentPageModel::getByComponent($flgPage))
			->with('footerLinks', $this->generateFooterLinks());
	}
}
