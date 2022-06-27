<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Http\Requests\TypeRequest;

class TypeController extends Controller
{
    /* Pas utilisées */
    public function index() {
        $types = Type::get();
        return view('home');
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

