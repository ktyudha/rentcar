<?php

namespace App\Http\Controllers\Admin\Car;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:cars read');
        $this->middleware('permission:cars create')->only('create', 'store');
        $this->middleware('permission:cars update')->only('edit', 'update');
        $this->middleware('permission:cars delete')->only('destroy');

        view()->share('menuActive', 'cars');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['models'] = Car::orderBy('id', 'desc')->paginate(10);
        return view('admin.cars.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'bbm' => ['required'],
            'seat' => ['required'],
            'tahun_pembelian' => ['required'],
            'nopol' => ['required'],
            'image' => ['required', 'file', 'mimes:png,jpg,jpeg'],
        ]);

        $car = new Car($request->all());
        $path = $request->file('image')->store('ugc/cars');
        $car->image = $path;

        $car->save();

        return redirect()->route('admin.cars.index')->with([
            'status' => 'success',
            'message' => 'New car has been stored :)'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        $data['model'] = $car;
        return view('admin.cars.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $request->validate([
            'name' => ['required'],
            'bbm' => ['required'],
            'seat' => ['required'],
            'tahun_pembelian' => ['required'],
            'nopol' => ['required'],
            'image' => ['file', 'mimes:png,jpg,jpeg'],
        ]);

        $payload = $request->all();

        if ($request->hasFile('image')) {
            $newImage = $request->file('image')->store('ugc/cars');
            if (@$newImage) {
                $car->deleteImage(@$car->image->path);
                $payload['image'] = $newImage;
            }
        }

        $car->update($payload);
        return redirect()->route('admin.cars.index')->with([
            'status' => 'success',
            'message' => 'Car has been updated :)'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        if (Storage::exists($car->image)) {
            Storage::delete($car->image);
        }

        if ($car->delete()) {
            return redirect()->route('admin.cars.index')->with(['status' => 'success', 'message' => 'Delete Successfully']);
        }
        return redirect()->route('admin.cars.index')->with(['status' => 'danger', 'message' => 'Delete Failed, Contact Developer']);
    }
}
