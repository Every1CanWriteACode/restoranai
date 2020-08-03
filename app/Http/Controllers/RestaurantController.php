<?php

namespace App\Http\Controllers;

use App\Restaurant;
use Illuminate\Http\Request;
use App\Menu;
use Validator;

class RestaurantController extends Controller
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
    public function index(Request $request)
    {
        // -------------------------------\
        $menus = Menu::all();
        $selectId = 0;
        $sort = '';

        if ($request->menu_id) {

            if ($request->sort) {
                if ($request->sort == 'title') {
                    $restaurants = Restaurant::where('menu_id', $request->menu_id)->orderBy('title')->get();
                    $sort = 'title';
                }
                elseif ($request->sort == 'price') {
                    $restaurants = Restaurant::where('menu_id', $request->menu_id)->orderBy('price')->get();
                    $sort = 'price';
                }
                else {
                    $restaurants = Restaurant::all();
                }

            }
            else {
                $restaurants = Restaurant::where('menu_id', $request->menu_id)->get();
            }

            
            $selectId = $request->menu_id;
        }

        else {
            
            if ($request->sort) {
                if ($request->sort == 'title') {
                    $restaurants = Restaurant::orderBy('title')->get();
                    $sort = 'title';
                }
                elseif ($request->sort == 'price') {
                    $restaurants = Restaurant::orderBy('price')->get();
                    $sort = 'price';
                }
                else {
                    $restaurants = Restaurant::all();
                }

            }
            else {
                $restaurants = Restaurant::all();
            }
        }

        


        return view('restaurant.index', compact('restaurants','menus', 'selectId', 'sort'));
        // =========================
        // $restaurants = Restaurant::all();
        // return view('restaurant.index', ['restaurants' => $restaurants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::orderBy('title')->get();
        // $menus = Menu::all();
        return view('restaurant.create', ['menus' => $menus]);
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
            'restaurant_title' => ['required', 'min:3', 'max:64'],
            'restaurant_customers' => ['required', 'min:1', 'max:3'],
            'restaurant_employe' => ['required', 'min:1', 'max:2'],
        ],
        [
        'restaurant_title.min' => 'per mazai raidziu',
        'restaurant_title.max' => 'per daug raidziu',
        'restaurant_customers.min' => 'per mazai lankytoju',
        'restaurant_customers.max' => 'per daug lankytoju',
        'restaurant_employe.min' => 'per mazai darbuotoju',
        'restaurant_employe.max' => 'per daug darbuotoju',
        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $restaurant = new Restaurant;
        $restaurant->title = $request->restaurant_title;
        $restaurant->customers = $request->restaurant_customers;
        $restaurant->employe = $request->restaurant_employe;
        $restaurant->menu_id = $request->menu_id;
        $restaurant->save();
        return redirect()->route('restaurant.index')->with('success_message', 'Sekmingai patalpintas.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $menus = Menu::all();
       return view('restaurant.edit', ['restaurant' => $restaurant, 'menus' => $menus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $validator = Validator::make($request->all(),
        [
            'restaurant_title' => ['required', 'min:3', 'max:64'],
            'restaurant_customers' => ['required', 'min:1', 'max:3'],
            'restaurant_employe' => ['required', 'min:1', 'max:2'],
        ],
        [
        'restaurant_title.min' => 'per mazai raidziu',
        'restaurant_title.max' => 'per daug raidziu',
        'restaurant_customers.min' => 'per mazai lankytoju',
        'restaurant_customers.max' => 'per daug lankytoju',
        'restaurant_employe.min' => 'per mazai darbuotoju',
        'restaurant_employe.max' => 'per daug darbuotoju',
        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $restaurant->title = $request->restaurant_title;
        $restaurant->customers = $request->restaurant_customers;
        $restaurant->employe = $request->restaurant_employe;
        $restaurant->save();
        
        return redirect()->route('restaurant.index')->with('success_message', 'Sekmingai updeitintas.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
       
        $restaurant->delete();
        return redirect()->route('restaurant.index')->with('success_message', 'Sekmingai panaikintas.');
    }
}
