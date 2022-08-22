<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {
        Gate::authorize('create-action');
        $pending = 0;
        $allProducts = 0;
        $total_vendors = 0;
        $users = User::all();
        $pending_orders = 0;
        $admin_request = null;
        $first_admin_req = null;

        if (Auth::user()->role_id == Role::$SUPER_ADMIN) {
            $allProducts = count(Product::all());
            foreach ($users as $user) {
                if ($user->role_id == Role::$VENDOR) {
                    $total_vendors += 1; //total vendor count
                }
                if ($user->role_checker == 2) {
                    $pending += 1; //total pending request count
                }
            }
            $notification_request = User::where('role_checker', 2)->get();
            $first_notification_req =  User::where('role_checker', 2)->first();
        }

        if (Auth::user()->role_id == Role::$VENDOR) {
            $pending_orders = count(Order::join('users', 'orders.user_id', '=', 'users.id')
                ->join('order_Items', 'orders.id', '=', 'order_Items.order_id')
                ->join('product', 'order_Items.product_id', '=', 'product.id')
                ->select('orders.*', 'users.*', 'order_Items.*', 'product.*')
                ->where(['users_id' => Auth::id(), 'order_status' => 'purchased', 'vendor_status' => 'not_approved'])
                ->get());

            session(['order_req' => $pending_orders]);
            $notification_request = $pending_orders;
            $first_notification_req =  User::where('role_checker', 2)->first();
        }
        $total_users = count($users);
        $total_Products = Product::latest()->where('users_id', Auth::id())->get();


        if (Auth::user()->role_id == Role::$VENDOR || Auth::user()->role_id == Role::$SUPER_ADMIN) {
        }

        return view('Admin.dashboard', compact([
            'total_Products', 'pending', 'allProducts', 'total_vendors',
            'total_users', 'pending_orders', 'notification_request', 'first_notification_req'
        ]));
    }


    //superAdmin all users info display
    public function assignRole()
    {
        Gate::authorize('super_admin-action');
        $users = User::orderBy('role_checker', 'desc')->get();
        return view('Admin.role_list', compact(['users']));
    }


    //SuperAdmin accept user's request to be admin
    public function role_Accepted($id)
    {
        Gate::authorize('super_admin-action');

        $user =  User::find($id);
        $user->role_checker = Role::$ACCEPTED;
        $user->role_id = Role::$VENDOR;
        if ($user->save()) {
            return redirect(route('dashboard_roles'))->with('success', 'User accepted as Vendor');
        }
        return redirect(route('dashboard_roles'))->with('failure', "Failed to Accept User's request");
    }


    //SuperAdmin reject user's request to be admin
    public function role_Rejected($id)
    {
        Gate::authorize('super_admin-action');

        $user =  User::find($id);
        $user->role_checker = Role::$DEFAULT;
        $user->role_id = Role::$USER;
        if ($user->save()) {
            return redirect(route('dashboard_roles'))->with('success', "You have Rejected User's request to be Vendor");
        }
        return redirect(route('dashboard_roles'))->with('failure', "Failed to Reject User's request");
    }


    //SuperAdmin delete users
    public function delete_User($id)
    {
        Gate::authorize('super_admin-action');

        if ($id != null) {
            User::where('id', ['id' => $id])->delete();
            return redirect(route('dashboard_roles'))->with('success', 'User Deleted Successfully ');
        }
        return redirect(route('dashboard_roles'))->with('failure', 'Failed to Delete User');
    }

    public function dummy()
    {
        return view('Admin.dummy');
    }
}
