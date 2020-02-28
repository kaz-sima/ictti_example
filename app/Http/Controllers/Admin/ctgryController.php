<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Ctgry;
use App\Subctgry;
use App\Http\Controllers\Controller;

class ctgryController extends Controller
{
    /**
     * category manage screen
     */
    // display category and sub-category list
public function index(Request $request)
    {
        $items = Ctgry::orderBy('code', 'asc')->get();
        return view('admin.ctgry.index', ['items' => $items]);
    }
	// add category and sub-category
    public function add(Request $request)
    {
        $ctgries = Ctgry::orderBy('code','asc')->pluck('name', 'code');
        $ctgries = $ctgries -> prepend('ctgry', '');
        return view('admin.ctgry.add',['ctgries' => $ctgries]);
    }
	// adding processing of sub-category
    public function createsubctgry(Request $request)
    {
        $this->validate($request, Subctgry::$rules);
        $subctgry = new Subctgry;
        $form = $request->all();
        unset($form['_token']);
        $subctgry->fill($form)->save();
        return redirect('admin/ctgry/');
    }
	// adding processing of category
    public function createctgry(Request $request)
    {
        $this->validate($request, Ctgry::$rules);
        $ctgry = new Ctgry;
        $form = $request->all();
        unset($form['_token']);
        $ctgry->fill($form)->save();
        return redirect('admin/ctgry/');
    }
}
