<?php

namespace App\Exports;

use App\Models\StudentByAgent;
use Maatwebsite\Excel\Concerns\FromCollection;

class LeadExport implements FromCollection
{
    protected $leads;

    public function __construct($leads)
    {
        $this->leads = $leads;
    }

    public function collection()
    {
        return $this->leads;
    }
}
