<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User as UserMod;
use App\Model\Shop as ShopMod;
use App\Model\Product as ProductMod;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	$mods = UserMod::paginate(10);
        return view('admin.user.lists', compact('mods'));
        // return 'Admin Controller';
	/*
	$mods = UserMod::all();
	$mods = UserMod::where('active', 1)->where('city', 'nakornpathom')->get();
	foreach ($mods as $item) {
		echo $item->name." ".$item->email;
	}
	*/
	/*
	$shop = ShopMod::find(1);
	echo $shop->name;
	echo "<br/>";
	echo $shop->user->name;
	echo "<br/>";

	$user = UserMod::find(1);
	echo $user->shop->name;
	*/

	/*
	$products = ShopMod::find(1)->products;
	foreach ($products as $product) {
		echo "Product: " . $product->name . "<br/>";
	}
	*/

	$shop = ProductMod::find(1)->shop;
	echo "Product is belongs to Shop :" . $shop->user;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

		request()->validate([
            'name' => 'required|min:2|max:50',
            'surname' => 'required|min:2|max:50',
            'mobile' => 'required|numeric',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|max:20|same:password',
        ], [
            'name.required' => 'Name is required',
            'name.min' => 'Name must be at least 2 characters.',
            'name.max' => 'Name should not be greater than 50 characters.',
        ]); 


		$mod = new UserMod;
		$mod->name = $request->name;
		$mod->surname = $request->surname;
		$mod->email = $request->email;
		$mod->password = bcrypt($request->password);
		$mod->mobile = $request->mobile;
		$mod->age = $request->age;
		$mod->address = $request->address;
		$mod->city = $request->city;
		
		$mod->save();
		return "success";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
