<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\DocumentNotSetForApproval;
use App\Http\Controllers\Controller;
use App\Http\Resources\Document\ApprovedDocument;
use App\Http\Resources\Document\DeniedDocument;
use App\Http\Resources\Document\DocumentCollection;
use App\Http\Resources\Document\DocumentReadyForPrint;
use App\Http\Resources\Document\DocumentResource;
use App\Model\Document;
use App\Model\Batch;
use App\Model\DocumentList;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;


class PrintController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }


    public function index()
    {
       return DocumentReadyForPrint::collection( Document::where('can_print', true)->get() );


    }

    public function printedLog(Request $request)
    {
        Signature::updateOrCreate(['user_id'=>$request->user()->id],
            ['file' => $request->file, 'user_id', $request->user()->id]);
        return response([
            'data' =>  'successfully'
        ], Response::HTTP_CREATED );
    }

}
