<?php
namespace App\Http\Controllers;

    use App\Models\Subject;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use App\Models\User;
    use App\Models\Teacher;
    use App\Models\Student;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Str;
    use Illuminate\Support\Facades\Password;


    class RegisterController extends Controller
    {
        public function showRegistrationForm()
        {
            return view('register');
        }

        public function register(Request $request)
        {

            $validator = Validator::make($request->all(), [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'unique:users', 'email:rfc,dns'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'phone' => ['required', 'string', 'max:255'],
                'role' => 'required|in:student,teacher',
                'subject' => ($request->role == 'teacher') ? ['required', 'string'] : 'nullable|string',
                'photos' => ($request->role == 'teacher') ? ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'] : 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            ]);


            $code = ($request->role == 'teacher') ? Str::random(6) : null;


            if ($request->role == 'teacher') {
                $existingSubject = Subject::where('name', $request->subject)->first();
                if ($existingSubject) {
                    return redirect()->back()->withErrors(['subject' => 'مسموح لك التسجيل لماده واحده....اذا كنت تريد تسجيل ماده اخرى قم بتغير اسم الماده'])->withInput();
                }

                $imagePath = $request->file('photos')->store('public/img');
                $imageName = basename($imagePath);

                // حفظ الصورة في مجلد التخزين
                $request->photos->storeAs('public/img', $imageName);
            }


            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }


            if ($request->role == 'student' && (!empty($request->subject) || $request->hasFile('photos'))) {
                // Clear subject and photos fields
                $request->merge(['subject' => null, 'photos' => null]);
                return redirect()->back()->withErrors(['message' => 'غير مسموح لك بادخال قيم لحقل الصور والماده.'])->withInput();

            }


            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'code' => $code,
                'subject' => ($request->role == 'teacher') ? $request->subject : null,
                'photos' => ($request->role == 'teacher') ? 'img/' . $imageName : null,
                'role' => $request->role,


            ]);

            if ($request->role === 'teacher') {
                $teacher = Teacher::create([
                    'user_id' => $user->id,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'phone' => $request->phone,
                    'code' => $code,
                    'subject' => $request->subject,
                    'photos' => 'img/' . $imageName,


                ]);
                Subject::create([
                    'name' => $request->subject,
                    'teacher_name' => $request->first_name . ' ' . $request->last_name,
                    'photos' => ($request->role == 'teacher') ? 'img/' . $imageName : null,
                    'teacher_code' => $code,
                    'teacher_id' => $teacher->id,
                ]);


            } else {
                Student::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'phone' => $request->phone,
                    'user_id' => $user->id,

                ]);


            }

            // Redirect to a success page or login page

            return redirect()->route('login')->with('success', 'تم الاشتراك بنجاح');

        }

        public function login(Request $request)
        {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $user = Auth::user();

                if (!$user->role) {
                    Auth::logout();
                    return redirect()->route('home')->with('error', 'لم يتم العثور على الدور. يرجى تسجيل حساب جديد.');
                }

                if ($user->role === 'student') {
                    return redirect()->route('student.view', ['id' => $user->student->id]);
                } elseif ($user->role === 'teacher') {
                    $subject = $user->teacher->subject;

                    if ($subject) {
                        return redirect()->route('showSubjects', ['id' => $user->teacher->id]);
                    } else {
                        return redirect()->back()->with('error', 'لم يتم العثور على المادة.');
                    }
                }
            }

            return redirect()->route('login')->with('error', 'بيانات الدخول غير صحيحة.');
        }

//******************************************/*reset password*///***************************************************
        public function showResetForm()
        {
            return view('reset');
        }

        public function reset(Request $request)
        {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string|min:8|confirmed',
            ]);

            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return redirect()->back()->withErrors(['email' => 'المستخدم غير مسجل']);
            }

            $user->password = bcrypt($request->password);
            $user->save();

            return redirect()->route('login')->with('success', 'تم تغير كلمه السر بنجاح');
        }


//**********************************logout********************************/*/

        public function logout(Request $request)
        {
            $user = Auth::user();

            if ($user) {
                $user->delete();

                Auth::logout();

                return redirect()->route('home')->with('success', 'تم تسجيل الخروج وحذف الحساب بنجاح.');
            }

            return redirect()->route('login')->with('error', 'لم يتم العثور على المستخدم.');
        }

    }




