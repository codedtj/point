<?php

namespace App\Nova\Actions\Export;

use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel as DownloadExcelPackage;

class DownloadExcel extends DownloadExcelPackage
{
    public function name(): string
    {
        return __('Download Excel');
    }
}
