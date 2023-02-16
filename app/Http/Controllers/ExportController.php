<?php

namespace App\Http\Controllers;

use App\Exports\UniversitiesExport;
class ExportController extends Controller
{
   public function show(){
    return (new UniversitiesExport('Turkey,United States,Germany,Afghanistan','Turkey/United+States/Germany/Afghanistan'))->download('universities.xlsx');
   }
}
