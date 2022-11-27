<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Company;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function companies()
    {
        return response()->json([
            "data" => Company::query()->select('id','name')->fastPaginate()
        ]);
    }

    public function get_clients_from_company($company)
    {
        $company = Company::query()->where('id', $company)->with(["company_clients"=>function($q){
            return $q->fastPaginate();
        }])->firstOrFail();
        return response()->json($company);
    }

    public function get_companies_from_client($client)
    {
        $client = Client::query()->where('id', $client)->with(["client_companies"=>function($q){
            return $q->fastPaginate();
        }])->firstOrFail();
        return response()->json($client);
    }
}
