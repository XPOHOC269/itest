<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Monitoring;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MonitoringController extends Controller {

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
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
 		$strok = 1;
		$monitoring = Monitoring::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();

		return view('site.monitoring')->with([
			'monitoring'=>$monitoring,
			'strok'=>$strok
		]);
	}
}
