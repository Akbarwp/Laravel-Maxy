<?php

namespace App\Http\Controllers\Admin;

use App\Models\Auth\User\User;
use Arcanedev\LogViewer\Entities\Log;
use Arcanedev\LogViewer\Entities\LogEntry;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Routing\Route;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counts = [
            'users' => \DB::table('users')->count(),
            'users_unconfirmed' => \DB::table('users')->where('confirmed', false)->count(),
            'users_inactive' => \DB::table('users')->where('active', false)->count(),
            'protected_pages' => 0,
        ];

        foreach (\Route::getRoutes() as $route) {
            foreach ($route->middleware() as $middleware) {
                if (preg_match("/protection/", $middleware, $matches)) $counts['protected_pages']++;
            }
        }

        return view('admin.dashboard', ['counts' => $counts]);
    }


    public function getLogChartData(Request $request)
    {
        \Validator::make($request->all(), [
            'start' => 'required|date|before_or_equal:now',
            'end' => 'required|date|after_or_equal:start',
        ])->validate();

        $start = new Carbon($request->get('start'));
        $end = new Carbon($request->get('end'));

        $dates = collect(\LogViewer::dates())->filter(function ($value, $key) use ($start, $end) {
            $value = new Carbon($value);
            return $value->timestamp >= $start->timestamp && $value->timestamp <= $end->timestamp;
        });


        $levels = \LogViewer::levels();

        $data = [];

        while ($start->diffInDays($end, false) >= 0) {

            foreach ($levels as $level) {
                $data[$level][$start->format('Y-m-d')] = 0;
            }

            if ($dates->contains($start->format('Y-m-d'))) {
                /** @var  $log Log */
                $logs = \LogViewer::get($start->format('Y-m-d'));

                /** @var  $log LogEntry */
                foreach ($logs->entries() as $log) {
                    $data[$log->level][$log->datetime->format($start->format('Y-m-d'))] += 1;
                }
            }

            $start->addDay();
        }

        return response($data);
    }

    public function getRegistrationChartData()
    {

        $data = [
            'registration_form' => User::whereDoesntHave('providers')->count(),
            'google' => User::whereHas('providers', function ($query) {
                $query->where('provider', 'google');
            })->count(),
            'facebook' => User::whereHas('providers', function ($query) {
                $query->where('provider', 'facebook');
            })->count(),
            'twitter' => User::whereHas('providers', function ($query) {
                $query->where('provider', 'twitter');
            })->count(),
        ];

        return response($data);
    }

    public function getReportingPage()
    {
        return view('admin.reporting', [
            'products' => Product::all(),
        ]);
    }

    public function getAllDataProduct()
    {
        $product = Product::all();
        for ($i = 0; $i < count($product); $i++) {
            if ($product[$i]['price'] < 100000) {
                $product[$i]['price_range'] = 'less_100000';

            } else if ($product[$i]['price'] >= 100000 && $product[$i]['price'] <= 500000) {
                $product[$i]['price_range'] = '_100000_500000';
                
            } else if ($product[$i]['price'] > 500000 && $product[$i]['price'] <= 1000000) {
                $product[$i]['price_range'] = '_500001_1000000';
                
            } else if ($product[$i]['price'] > 1000000) {
                $product[$i]['price_range'] = 'more_1000000';
            }

            $product[$i]['created_range'] = substr($product[$i]['created_at'], 0, 7);
        }
        return response($product);
    }

    public function getChartProduct()
    {
        $data = [
            "less_100000" => Product::where('price', '<', 100000)->count(),
            "_100000_500000" => Product::where('price', '>=', 100000)->where('price', '<=', 500000)->count(),
            "_500001_1000000" => Product::where('price', '>', 500000)->where('price', '<=', 1000000)->count(),
            "more_1000000" => Product::where('price', '>', 1000000)->count(),
        ];

        return response($data);
    }
}
