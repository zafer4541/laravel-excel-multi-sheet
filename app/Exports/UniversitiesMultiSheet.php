<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithTitle;
use Illuminate\Support\Facades\Http;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
class UniversitiesMultiSheet implements FromView, WithTitle,WithColumnWidths
{
    private $title;
    private $country;

    public function __construct(string $title, string $country)
    {
        $this->title = $title;
        $this->country  = $country;
    }
    public function columnWidths(): array
    {
        return [
            'A' => 60,
            'B' => 60,     
            'C'=>  60       
        ];
    }
    /**
     * @return Builder
     */
    public function view(): View
    {
        $response= Http::get('http://universities.hipolabs.com/search?country='.$this->country);
        $universities=json_decode($response->getBody()->getContents());
    
        return view('export',compact('universities'));
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Country ' . $this->title;
    }
}
