<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipment;

class EquipmentsController extends Controller
{
    public function index() {

        $equipments = Equipment::all();

        return view('equipments.equipment-list', compact('equipments') );

    }
}
