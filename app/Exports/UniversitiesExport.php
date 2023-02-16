<?php

namespace App\Exports;

use App\Exports\UniversitiesMultiSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class UniversitiesExport implements WithMultipleSheets
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    protected $sheetTitle;
    protected $country;

    public function __construct(string $sheetTitle,string $country)
    {
        $this->sheetTitle = $sheetTitle;
        $this->country = $country;
    }
    public function sheets(): array
    {
        $sheets = [];
        $titles= explode(',',$this->sheetTitle);
        $countries= explode('/',$this->country);
        for ($i=0;$i<count($titles);$i++){
            $sheets[] = new UniversitiesMultiSheet($titles[$i],$countries[$i]);
        }
        return $sheets;
    }
}
