<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;

class OpencontextIdsExport implements FromCollection, WithMapping, WithTitle
{

    public $ids;

    public function __construct($ids)
    {
        $this->ids = $ids;
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Open content ids';
    }

    /**
     * @param mixed $row
     *
     * @return array
     */
    public function map($row): array
    {
        return [
            $row
        ];
    }

    /**
     * @return Collection
     */
    public function collection(): Collection
    {
        return $this->ids;
    }
}
