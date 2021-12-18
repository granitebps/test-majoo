<?php

namespace App\Http\Controllers\API\v1;

use App\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Merchant;
use App\Models\Outlet;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function reportMerchant(Request $request): JsonResponse
    {
        $userId = auth()->id();
        $start = Carbon::createFromDate(2021, 11, 1);
        $end = Carbon::createFromDate(2021, 11, 30);
        $period = collect(CarbonPeriod::create($start, $end));

        $data = collect();
        foreach ($period as $date) {
            $collect = [];
            $collect['date'] = $date->format('Y-m-d');

            $merchants = Merchant::withSum(['transactions as omzet' => function ($query) use ($date) {
                $query->whereDate('created_at', $date->format('Y-m-d'));
            }], 'bill_total')
                ->where('user_id', $userId)
                ->get()
                ->transform(function ($item) {
                    return [
                        'merchant_name' => $item->merchant_name,
                        'omzet' => $item->omzet ?? 0
                    ];
                });

            $collect['merchants'] = $merchants;

            $data->push($collect);
        }

        $page = $request->page ?? 1;
        $per_page = $request->per_page ?? 10;

        $response = Helpers::paginate($data, $per_page, $page);

        return Helpers::paginateResponse('Get Transaction Report Success', $response->toArray());
    }

    public function reportOutlet(Request $request): JsonResponse
    {
        $userId = auth()->id();
        $start = Carbon::createFromDate(2021, 11, 1);
        $end = Carbon::createFromDate(2021, 11, 30);
        $period = collect(CarbonPeriod::create($start, $end));

        $data = collect();
        foreach ($period as $date) {
            $collect = [];
            $collect['date'] = $date->format('Y-m-d');

            $outlets = Outlet::with('transactions', 'merchant')
                ->withSum(['transactions as omzet' => function ($query) use ($date) {
                    $query->whereDate('created_at', $date->format('Y-m-d'));
                }], 'bill_total')
                ->whereRelation('merchant', 'user_id', $userId)
                ->get()
                ->transform(function ($item) {
                    return [
                        'merchant_name' => $item->merchant->merchant_name,
                        'outlet_name' => $item->outlet_name,
                        'omzet' => $item->omzet ?? 0
                    ];
                });

            $collect['outlets'] = $outlets;

            $data->push($collect);
        }

        $page = $request->page ?? 1;
        $per_page = $request->per_page ?? 10;

        $response = Helpers::paginate($data, $per_page, $page);

        return Helpers::paginateResponse('Get Transaction Report Success', $response->toArray());
    }
}
