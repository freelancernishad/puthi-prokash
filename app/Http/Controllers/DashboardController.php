<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getDashboardStats(Request $request)
{
    $totalUsers = User::count();
    $totalUniqueCustomers = Order::distinct('user_id')->count('user_id');
    $totalWriters = User::where('position', 'writer')->count();
    $totalBooks = Product::count();

    $totalOrders = Order::count();
    $todayOrders = Order::whereDate('created_at', Carbon::today())->count();
    $pendingOrders = Order::where('status', 'pending')->count();
    $processingOrders = Order::where('status', 'processing')->count();
    $completedOrders = Order::where('status', 'completed')->count();

    $shippingCompleted = Order::where('status', 'completed')->sum('total_quantity');
    $totalStock = Product::sum('stock');
    $visitorCounting = 0;

    $totalSalesAmount = Order::sum('total_amount');

    // Calculate month-wise sales variance
    $currentYear = Carbon::now()->year;
    $monthWiseSalesVariance = Order::whereYear('created_at', $currentYear)
        ->selectRaw('MONTH(created_at) as month, SUM(total_amount) as total_sales')
        ->groupBy('month')
        ->orderBy('month')
        ->get();

    // Calculate year-wise sales variance
    $yearWiseSalesVariance = Order::selectRaw('YEAR(created_at) as year, SUM(total_amount) as total_sales')
        ->groupBy('year')
        ->orderBy('year')
        ->get();

    // Get top sales category
    $topSalesCategory = Category::withCount('products')->orderBy('products_count', 'desc')->first();

    $dashboardStats = [
        'totalUsers' => $totalUsers,
        'totalUniqueCustomers' => $totalUniqueCustomers,
        'totalWriters' => $totalWriters,
        'totalBooks' => $totalBooks,
        'totalOrders' => $totalOrders,
        'todayOrders' => $todayOrders,
        'pendingOrders' => $pendingOrders,
        'processingOrders' => $processingOrders,
        'completedOrders' => $completedOrders,
        'shippingCompleted' => $shippingCompleted,
        'totalStock' => $totalStock,
        'visitorCounting' => $visitorCounting,
        'totalSalesAmount' => $totalSalesAmount,
        'monthWiseSalesVariance' => $monthWiseSalesVariance,
        'yearWiseSalesVariance' => $yearWiseSalesVariance,
        'topSalesCategory' => $topSalesCategory,
    ];

    return response()->json($dashboardStats, 200);
}
}
