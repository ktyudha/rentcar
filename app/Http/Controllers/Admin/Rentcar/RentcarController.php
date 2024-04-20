<?php

namespace App\Http\Controllers\Admin\Rentcar;

use App\Models\Car;
use App\Models\Rentcar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RentcarController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:rentcar read');
        $this->middleware('permission:rentcar create')->only('create', 'store');
        $this->middleware('permission:rentcar update')->only('edit', 'update');
        $this->middleware('permission:rentcar delete')->only('destroy');

        view()->share('menuActive', 'log-book');
        view()->share('subMenuActive', 'rentcar');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['models'] = Rentcar::orderBy('id', 'desc')->paginate(10);
        return view('admin.rentcar.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['cars'] = Car::all();
        return view('admin.rentcar.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'author' => ['required'],
            'car_id' => ['required'],
            'event' => ['required'],
            'destination' => ['required'],
            'start_time' => ['required'],
            'finish_time' => ['required'],
        ]);
        $rentcar = new Rentcar($request->all());
        $rentcar->key = Rentcar::generateRandomString(10);
        $rentcar->save();

        return redirect()->route('admin.rentcar.index')->with([
            'status' => 'success',
            'message' => 'New rentcar has been stored :)'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Rentcar $rentcar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rentcar $rentcar)
    {
        $data['model'] = $rentcar;
        $data['cars'] = Car::all();
        return view('admin.rentcar.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rentcar $rentcar)
    {
        $request->validate([
            'author' => ['required'],
            'car_id' => ['required'],
            'event' => ['required'],
            'destination' => ['required'],
            'start_time' => ['required'],
            'finish_time' => ['required'],
        ]);

        $payload = $request->all();
        $rentcar->update($payload);

        return redirect()->route('admin.rentcar.index')->with([
            'status' => 'success',
            'message' => 'Rentcar has been updated :)'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rentcar $rentcar)
    {
        if ($rentcar->delete()) {
            return redirect()->route('admin.rentcar.index')->with(['status' => 'success', 'message' => 'Delete Successfully']);
        }
        return redirect()->route('admin.rentcar.index')->with(['status' => 'danger', 'message' => 'Delete Failed, Contact Developer']);
    }
}
