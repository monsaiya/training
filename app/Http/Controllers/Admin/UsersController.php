<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User as UserMod;
use App\Model\Shop as ShopMod;
use App\Model\product as ProductMod;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         /*$mods = UserMod::where('active', 1)
               ->where('city', 'bangkok')
               ->orderBy('name', 'desc')
               //->take(10)
               ->get();*/


       /* $mods = UserMod::find([1, 2, 3]);




        foreach ($mods as $item) {

            echo $item->name ." ".$item->password."<br>";
        }

        $count = UserMod::where('active', 1)->count();
        echo "Total Count = ".$count."" ;*/
        

        /*$data = [
            'name' => 'My Name',
            'surname' => 'My SurName',
            'email' => 'myemail@gmail.com'
        ];

        $item = [
            'item1' => 'My Value1',
            'item2' => 'My Value2'
        ];

        $results = [
            'data' => $data,
            'item' => $item
        ];

        return view('test', $results);*/

       /* $data = [
           'name' => 'My Name',
           'surname' => 'My SurName',
           'email' => 'myemail@gmail.com'
       ];

        $user = UserMod::find(1);
        $mods = UserMod::all();

        return view('test', compact('data', 'user', 'mods'));*/

       // return view('admin.user.lists');

        $mods = UserMod::paginate(10);
        return view('admin.user.lists', compact('mods') );





        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request); exit;
        $mod = new UserMod;
        $mod->name = $request->name;
        $mod->email = $request->email;
        $mod->password = bcrypt($request->password);
        $mod->save();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       /* $mod = UserMod::find($id);
        echo $mod->name ." ".$mod->password."<br>";*/
       

       /* $shop = UserMod::find($id)->shop;
        echo $shop->name;

        echo "<br>";

        $user = UserMod::find($id);
        echo $user->shop->name;*/

       /* $mod = ShopMod::find($id);
        echo $mod->name;

        echo "<br>";

        echo $mod->user->name; */

        $products = ProductMod::find($id);

        echo $products->name;
        echo "<br>";
        echo $products->shop->name;
 
       /* foreach ($products as $product) {
            echo $product ->name;
            echo "<br>";
        }*/




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
        
        $mod = UserMod::find($id);
        $mod->name = $request->name;
        $mod->email = $request->email;
        $mod->password = bcrypt($request->password);
        $mod->save();

        return "update"; 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mod = UserMod::find($id);
        $mod -> delete();
        return "delete";
    }
}
