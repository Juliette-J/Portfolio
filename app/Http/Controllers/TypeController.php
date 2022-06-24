<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Image;
use App\Http\Requests\TypeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TypeController extends Controller
{
    public function index(Request $request) {
        $image = Image::where('id', $request->get('id'))->first();
        $types = DB::table('types')->get();
        return view('update_image', ['image' => $image, 'types' => $types]);
    }

    public function store(TypeRequest $request) {
        $types = new Type();
        $types->name = $request->input('name');
        if($types->save()) {
            return view('home');
        }
    }

    public function update(TypeRequest $request, Type $types) {
        if($types->fill($request->all())->save()) {
            return view('home');
        }
    }

    public function show(Type $type) {
        return $type;
    }

    public function destroy(Type $type) {
        if($type->delete()) {
            return true;
        }
    }
}

