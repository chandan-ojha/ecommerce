<?php
namespace App\Http\Controllers\Modules\UserManagement;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display the User List Page
     */
    public function index()
    {
        $users = User::with(['roles:id,name'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        $roles = Role::select('id', 'name')->get();

        return Inertia::render('Modules/UserManagement/User/Index', [
            'title' => 'User Setup',
            'users' => $users,
            'roles' => $roles,

        ]);
    }

    /**
     * User Add
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required',
            'password' => 'required',
            'role_id'  => 'required',
        ], [
            'role_id.required' => 'Select User Role',
        ]);

        try {
            DB::beginTransaction();

            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => bcrypt($request->password),
            ]);

            $user->roles()->sync([$request->role_id]);

            DB::commit();

            return redirect()->back()->with('success', 'User created successfully!');

        } catch (Exception $e) {

            DB::rollBack();

            Log::error('Expenditure Type Create failed', ['error' => $e->getMessage()]);

            return redirect()->back()->with('error', 'Failed to create User: ' . $e->getMessage());
        }
    }

    /**
     * Delete a User.
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);

            $user->roles()->detach();

            $user->delete();

            return redirect()->back()->with('success', 'User deleted successfully!');

        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete User: ' . $e->getMessage());
        }
    }
}
