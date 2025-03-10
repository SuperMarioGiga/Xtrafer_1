<?php

namespace App\Http\Controllers\site\xtrafer;

use App\Model\api\Configuration\ContentPageModel;
use Illuminate\Http\Request;
use App\Model\api\contactModel;
use App\Model\api\SlideModel;
use App\Model\api\FeatureModel;
use App\Model\api\ContentModel;
use Illuminate\Support\Facades\App;

class ContactController extends _Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$flgPage = $request->get('flgPage');

		$pageComponents = ContentPageModel::getByComponent($flgPage);

		// $content = ContentModel::whereHas('contentPage', function ($query) use ($flgPage) {
		// 	$query->where('flg_page', $flgPage);
		// })->get();

		// $features = FeatureModel::whereHas('contentPage', function($query) use ($flgPage) {
		// 	$query->where('flg_page', $flgPage);
		// })->get();

		// $contact = contact();

		// $features = [
		// 	(object) [
		// 		'icon' => 'pe-7s-phone',
		// 		'title' => 'Telefone',
		// 	],
		// 	(object) [
		// 		'icon' => 'pe-7s-mail',
		// 		'title' => 'E-mail',
		// 	],
		// 	(object) [
		// 		'icon' => 'pe-7s-map',
		// 		'title' => 'Endereço',
		// 	],
		// ];

			// return $pageComponents;

		return view('site/pages/contact')
			->with('flgPage', $flgPage)
			->with('pageComponents', $pageComponents);
			// ->with('contact', $contact)
			// ->with('features', $features)
			// ->with('banner', SlideModel::whereHas('contentPage', function($query) use ($flgPage) {
			// 	$query->where('flg_page', $flgPage);
			// })->first())
			// ->with('content', $content)
			// ->with('footerLinks', $this->generateFooterLinks());
	}

	public function save(Request $request) {

		$contact = contact();

		\Illuminate\Support\Facades\Mail::to($contact->email1, 'Contato - ' . $contact->name)->send(new \App\Mail\SendMail($request->all()));

		return redirect()->back()->withInput(['savedSuccessfully' => true]);
	}
}
