<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Todolist;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_todolist = Todolist::all();
        $title = 'Todolist App';
        return view('admin.todolist.index', compact([
            'title',
            'data_todolist',
        ]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create Todo';
        return view('admin.todolist.create', compact([
            'title',
        ]));
    }


    public function store(Request $request)
    {
        $request->validate([
            'tugas'         => 'required|min:2',
            'deskripsi'   => 'required|min:2',
            'tanggal'         => 'required|date',
        ], [
            'tugas.required' => 'Tugas harus diisi',
            'tugas.min' => 'Tugas minimal 2 karakter',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'deskripsi.min' => 'Deskripsi minimal 2 karakter',
            'tanggal.required' => 'Tanggal harus diisi',
            'tanggal.date' => 'Format Tanggal salah',
        ]);
        //create product
        Todolist::create([
            'tugas' => $request->tugas,
            'deskripsi' => $request->deskripsi,
            'tanggal'   => $request->tanggal,
        ]);
        //redirect to index
        return redirect()->route('todolist.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    public function show(string $id)
    {
        $data_todolist = Todolist::find($id);
        // dd($data_todolist);
        $title = 'Show Todolist App';
        return view('admin.todolist.show', compact([
            'title',
            'data_todolist',
        ]));
    }

    public function edit(string $id)
    {
        $data_todolist = Todolist::find($id);
        // dd($data_todolist);
        $title = 'Edit Todolist App';
        return view('admin.todolist.edit', compact([
            'title',
            'data_todolist',
        ]));
    }

    public function update(Request $request, string $id)
    {
        $data_todolist = Todolist::find($id);
        $request->validate([
            'tugas'         => 'required|min:2',
            'deskripsi'   => 'required|min:2',
            'tanggal'         => 'required|date',
        ], [
            'tugas.required' => 'Tugas harus diisi',
            'tugas.min' => 'Tugas minimal 2 karakter',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'deskripsi.min' => 'Deskripsi minimal 2 karakter',
            'tanggal.required' => 'Tanggal harus diisi',
            'tanggal.date' => 'Format Tanggal salah',
        ]);

        $data_todolist->update([
            'tugas' => $request->tugas,
            'deskripsi' => $request->deskripsi,
            'tanggal'   => $request->tanggal,
        ]);
        //redirect to index
        return redirect()->route('todolist.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy(string $id)
    {
        $data_todolist = Todolist::find($id);
        $data_todolist->delete();
        //redirect to index
        return redirect()->route('todolist.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
