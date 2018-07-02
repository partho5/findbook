<?php

namespace App\Http\Controllers;

use App\Menu;
use App\SubMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = Menu::all();
        return view('pages/menu/index', compact('menu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('menu_form')){
            //"create menu" form submitted
            $menuName = $request->input('menu_name');
            $menus = Menu::where('menu_name', $menuName)->get();
            if(count($menus) > 0){
                return Redirect::back()->with('warning1', "<b>$menuName</b> already exists");
            }
            Menu::create($request->all());
            return Redirect::back()->with('success1', "<b>$menuName</b> has been added");
        }
        elseif($request->has('submenu_form')){
            //"create sub-menu" submitted
            $subMenuName = $request->input('submenu_name');
            $parentMenuId = explode(":", $request->input('menu_id'))[0];
            $parentMenuName = explode(":", $request->input('menu_id'))[1];

            $request['menu_id'] = $parentMenuId;

            $sub = SubMenu::where('menu_id', $parentMenuId)->where('submenu_name', $subMenuName)->get();
            if(count($sub) > 0){
                return Redirect::back()->with('warning2', "<b>$subMenuName</b> is already under <b>$parentMenuName</b>");
            }
            SubMenu::create($request->all());
            return Redirect::back()->with('success2', "<b>$subMenuName</b> has been added under <b>$parentMenuName</b>");
        }
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
