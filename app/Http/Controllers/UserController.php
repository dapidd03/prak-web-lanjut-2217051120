<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    // In your controller method for displaying the list of users
    public function index()
    {
        // Assuming you have a User model to fetch users from the database
        $users = UserModel::with('kelas')->get();  // Make sure to load users with related class (kelas)

        // Return the view and pass the users variable
        return view('list_user', compact('users'));  // Pass $users to the view
    }

    public function create()
    {
        $kelasModel = new Kelas();
        $kelas = $this->kelasModel->getKelas();
        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];

        return view('create_user', $data);
    }

    public function edit($id){
        $user = UserModel::findOrFail($id);
        $kelasModel = new Kelas ();
        $kelas = $kelasModel->getKelas();
        $title = 'Edit User';

        return view('edit_user', compact('user', 'kelas', 'title'));
    }

    public function destroy($id)
    {
        $user = UserModel::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User berhasil dihapus');
    }

    public function update(Request $request, $id){
        $user = UserModel::findOrFail($id);

        $user->nama = $request->nama;
        $user->ipk = $request->ipk;
        $user->kelas_id = $request->kelas_id;

        if ($request->hasFile('foto')) {
            // Delete old photo if exists
            if ($user->foto && \Storage::disk('public')->exists($user->foto)) {
            \Storage::disk('public')->delete($user->foto);
            }

            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('assets/uploads/img', $filename, 'public');
            $data['foto'] = $path;
        }

        $user->save();

        return redirect()->to('/user')->with('success', 'User berhasil di update');
    }

    public function show ($id){
        $user = UserModel::findOrFail($id);
        $kelas = Kelas::find($user->kelas_id);
        $title = 'Detail '.$user->nama;

        return view('show_user', compact('user', 'kelas', 'title'));
    }


    public function store(Request $request){
        $request->validate([
            'nama' => 'required|string|max:255',
            'ipk' => 'required|numeric|min:0|max:4.00',
            'kelas_id' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi untuk foto
        ]);
    
        // Meng-handle upload foto
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            // Simpan foto dalam public/assets/uploads/img
            $fotoName = time() . '_' . $foto->getClientOriginalName();
            $fotoPath = $foto->storeAs('assets/uploads/img', $fotoName, 'public');
        } else {
            $fotoPath = null;
        }
    
        // Menyimpan data ke database termasuk path foto
        $this->userModel->create([
            'nama' => $request->input('nama'),
            'ipk' => $request->input('ipk'),
            'kelas_id' => $request->input('kelas_id'),
            'foto' => $fotoPath, // Menyimpan path foto
        ]);
        
        return redirect()->to('/user')->with('success', 'User berhasil ditambahkan');
    }    
}