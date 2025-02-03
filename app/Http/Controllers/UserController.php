<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Import the User model
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $users = User::paginate(5);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        // dd($request->all());
        // print_r($request->all());exit;
        // exit;
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);
    
        $validated['password'] = bcrypt($validated['password']); // Hash the password
        User::create($validated);
        // Redirect to a success page or back with a success message
        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user){
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);
        
        $user->update($validated);
        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user){
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
    public function downloadPdf(){
        $users = User::all();
        // Load the view for the PDF
        $pdf = Pdf::loadView('users.pdf', compact('users'));

        // Stream the generated PDF to the browser or download it directly
        return $pdf->download('users-list.pdf');
    }
    public function showLoginForm(){
        return view('users.login');
    }
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:4',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            session([
                'userId' => $user->id,
                'username' => $user->name,
                'userEmail' => $user->email,
            ]);
            // Authentication passed, redirect to intended route or dashboard
            return redirect()->intended('/users')->with('success', 'Logged in successfully!');
        }
        // Authentication failed, redirect back with an error
        return back()->withErrors(['email' => 'Invalid credentials.'])->onlyInput('email');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Logged out successfully!');
    }
    public function testRoute(){
        echo 'Testing the routes!';
    }

}
