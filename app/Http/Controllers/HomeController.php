<?php namespace App\Http\Controllers;

use App\Http\Requests\CreateSiteRequest;
use App\Site;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$sites = Site::where('user_id', Auth::user()->id)->get();

		return view('site.index')->with('sites',$sites);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('site.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateSiteRequest $request)
	{
		$input = $request->get('url');
		$site = new Site();
		$site->url = $input;
		$site->user_id = Auth::user()->id;
		$site->save();

		return redirect('sites');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$site = Site::findOrFail($id);

		return view('site.edit')->with('site',$site);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, CreateSiteRequest $request)
	{
		$input = $request->get('url');
		$site = Site::findOrFail($id);
		$site->url = $input;
		$site->save();

		return redirect('sites');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$site = Site::findOrFail($id);

		$site->delete();

		return redirect('sites');
	}
}
