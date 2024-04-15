<?php

namespace App\Http\Controllers;

use App\Exports\OpencontextIdsExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;


class OpencontextController extends Controller
{
    public $ids = [];


    public function read(Request $request)
    {
        $openContext = Http::baseUrl('https://opencontext.org')->get('/query/Asia/Turkey/Kenan+Tepe.json');
        if ($openContext->successful()) {
            $this->getIds($openContext->collect());
            $ids = collect($this->ids)->unique();

            return Excel::download(new OpencontextIdsExport($ids), 'OpencontextIdsExport-ids.xlsx');
        } else {
            return redirect()->back()->with(['status' => false, 'message' => "simething went wrong"]);
        }
    }

    /**
     * Find ids in multidimentional array
     *
     * @param $openContexts
     *
     * @return void
     */
    private function getIds($openContexts)
    {
        if (isset($openContexts['id'])) {
            $this->ids[] = $openContexts['id'];
        }
        foreach ($openContexts as $openContext) {
            if (is_array($openContext)) {
                $this->getIds($openContext);
            }
            if (isset($openContext['id'])) {
                $this->ids[] = $openContext['id'];
            }
        }
    }
}
