<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\ProfileUpdateRequest;
    use App\Models\User;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Redirect;
    use Illuminate\View\View;

    class ProfileController extends Controller
    {
        /**
         * Display the user's profile form.
         */
        public function edit(Request $request): View
        {
            return view('profile.edit', [
                'user' => $request->user(),
            ]);
        }

        /**
         * Update the user's profile information.
         */
        public function update(ProfileUpdateRequest $request): RedirectResponse
        {
            $request->user()->fill($request->validated());

            if ($request->user()->isDirty('email')) {
                $request->user()->email_verified_at = null;
            }

            $request->user()->save();

            return Redirect::route('profile.edit')->with('status', 'profile-updated');
        }

        /**
         * Delete the user's account.
         */
        public function destroy(Request $request): RedirectResponse
        {
            $request->validateWithBag('userDeletion', [
                'password' => ['required', 'current_password'],
            ]);

            $user = $request->user();

            Auth::logout();

            $user->delete();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return Redirect::to('/');
        }

        public function users()
        {
            $datas = User::orderBy('created_at', 'desc')->get();
            return view('users.index', compact('datas'));
        }

        public function create()
        {
            return view('users.create');
        }

        public function store(Request $request)
        {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'code' => ['required', 'string', 'max:255', 'unique:'.User::class],
                'position' => ['required', 'integer'],
            ]);

            $status = User::create([
                'code' => $request->code,
                'position' => $request->position,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make(12345678),
            ]);

            if ($status) {
                return redirect()->route('users.index')->with('success', 'Thêm mới nhân viên thành công');
            } else {
                return back()->with('error', 'Lỗi thêm mới nhân viên');
            }
        }

        public function editUser(string $id)
        {
            $item = User::findOrFail($id);
            return view('users.edit', compact('item'));
        }

        public function updateUser(Request $request, string $id)
        {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class.',email,'.$id],
                'code' => ['required', 'string', 'max:255', 'unique:'.User::class.',code,'.$id],
                'position' => ['required', 'integer'],
            ]);

            $status = User::where('id', $id)->update([
                'code' => $request->code,
                'position' => $request->position,
                'name' => $request->name,
                'email' => $request->email,
            ]);

            if ($status) {
                return redirect()->route('users.index')->with('success', 'Cập nhật nhân viên thành công');
            } else {
                return back()->with('error', 'Lỗi cập nhật nhân viên');
            }
        }

        public function destroyUser(string $id)
        {
            $item = User::findOrFail($id);
            if ($item) {
                $status = $item->delete();
                if ($status) {
                    return redirect()->route('users.index')->with('success', 'Xóa nhân viên thành công!');
                } else {
                    return back()->with('error', 'Lỗi xóa nhân viên!');
                }
            } else {
                return back()->with('error', 'Không tồn tại nhân viên này!');
            }
        }
    }
