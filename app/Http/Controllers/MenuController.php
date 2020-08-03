<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use Validator;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // $menus = Menu::all();
        $menus = Menu::orderBy('price')->get();
        return view('menu.index', ['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'menu_title' => ['required', 'min:3', 'max:64'],
            'menu_price' => ['required', 'min:1', 'max:3'],
            'menu_weight' => ['required', 'min:1', 'max:3'],
        ],
        [
        'menu_title.min' => 'per mazai raidziu',
        'menu_title.max' => 'per daug raidziu',
        'menu_price.min' => 'per mazai skaiciu',
        'menu_price.max' => 'per daug skaiciu',
        'menu_weight.min' => 'per mazai sveria',
        'menu_weight.max' => 'per daug sveria',
        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $menu = new Menu;
        $menu->title = $request->menu_title;
        $menu->price = $request->menu_price;
        $menu->weight = $request->menu_weight;
        $menu->meat = $request->menu_meat;
        $menu->about = $request->menu_about;
        $menu->save();
        return redirect()->route('menu.index')->with('success_message', 'Sekmingai įrašytas.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('menu.edit', ['menu' => $menu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $validator = Validator::make($request->all(),
        [
            'menu_title' => ['required', 'min:3', 'max:64'],
            'menu_price' => ['required', 'min:1', 'max:3'],
            'menu_weight' => ['required', 'min:1', 'max:3'],
        ],
        [
        'menu_title.min' => 'per mazai raidziu',
        'menu_title.max' => 'per daug raidziu',
        'menu_price.min' => 'per mazai skaiciu',
        'menu_price.max' => 'per daug skaiciu',
        'menu_weight.min' => 'per mazai sveria',
        'menu_weight.max' => 'per daug sveria',
        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $menu->title = $request->menu_title;
        $menu->price = $request->menu_price;
        $menu->weight = $request->menu_weight;
        $menu->meat = $request->menu_meat;
        $menu->about = $request->menu_about;
        $menu->save();
        return redirect()->route('menu.index')->with('success_message', 'Sekmingai updeitintas.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        if($menu->menuRestaurants->count()){
            return redirect()->route('menu.index')->with('info_message', 'Trinti negalima, restoranui priskirtas menu.');;
        }
        $menu->delete();
        return redirect()->route('menu.index')->with('success_message', 'Sekmingai panaikintas.');
    }
}
