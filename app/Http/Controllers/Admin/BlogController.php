<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data  = [
            'blogs' => Blog::orderBy('id', 'desc')->get(),
        ];

        // dd($data['blogs']);

        return view('admin.blog.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'thumbnail' => 'required',
        ], [
            'judul.required' => 'judul postingan tidak boleh kosong !',
            'deskripsi.required' => 'deskripsi postingan tidak boleh kosong !',
            'thumbnail.required' => 'thumbnail postingan tidak boleh kosong !',
        ]);

        $dom = new DOMDocument();
        $dom->loadHTML($request->deskripsi, 9);

        $images  = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
            $image_name = "/upload/" . time() . $key . '.png';
            file_put_contents(public_path() . $image_name, $data);

            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }

        $deskripsi = $dom->saveHTML();


        try {

            if ($request->hasFile('thumbnail')) {
                $gambar = $request->file('thumbnail');
                $randomString = Str::random(10);
                $gambarName = $randomString . '_' . $gambar->getClientOriginalName();
                $gambar->move(public_path('assets/images/thumbnail-blog/'), $gambarName);
            }


            $blog = Blog::create([
                'judul' => $request->input('judul'),
                'deskripsi' => $deskripsi,
                'thumbnail' => $gambarName,
            ]);

            flash()->addSuccess("Postingan $blog->nama berhasil dibuat");
            return redirect()->back();
        } catch (\Throwable $th) {
            throw $th;
            flash()->addError("Gagal membuat data postingan pastikan sudah benar!");
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'blog' => Blog::where('id', $id)->first(),
        ];

        // dd($data['blog'][0]);

        return view('admin.blog.detail', $data);
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $blog = Blog::findOrFail($id);
            $data = [
                'blog' => $blog,
            ];

            return view('admin.blog.edit', $data);
        } catch (\Throwable $th) {
            // Handle error jika ID tidak ditemukan
            // Misalnya, tampilkan pesan error atau redirect ke halaman lain
            flash()->addError("Data postingan tidak ditemukan.");
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ], [
            'judul.required' => 'Judul postingan tidak boleh kosong!',
            'deskripsi.required' => 'Deskripsi postingan tidak boleh kosong!',
        ]);

        // Ambil data blog yang akan diupdate berdasarkan ID
        $blog = Blog::find($id);

        if (!$blog) {
            flash()->addError("Postingan tidak ditemukan!");
            return redirect()->back();
        }

        // Lakukan pemrosesan gambar jika ada perubahan
        if ($request->hasFile('thumbnail')) {
            $gambar = $request->file('thumbnail');
            $randomString = Str::random(10);
            $gambarName = $randomString . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('assets/images/thumbnail-blog/'), $gambarName);
            // Hapus thumbnail lama jika ada
            if ($blog->thumbnail) {
                unlink(public_path('assets/images/thumbnail-blog/') . $blog->thumbnail);
            }
            $blog->thumbnail = $gambarName;
        }

        // Update data postingan
        try {
            $dom = new DOMDocument();
            $dom->loadHTML($request->deskripsi, 9);
            $images = $dom->getElementsByTagName('img');
            foreach ($images as $key => $img) {
                if (strpos($img->getAttribute('src'), 'data:image/') === 0) {
                    $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                    $image_name = "/upload/" . time() . $key . '.png';
                    file_put_contents(public_path() . $image_name, $data);

                    $img->removeAttribute('src');
                    $img->setAttribute('src', $image_name);
                }
            }
            $deskripsi = $dom->saveHTML();
        } catch (\Throwable $th) {
            flash()->addError("Data postingan yang anda masukan tidak valid.");
            return redirect()->back()->with('deskripsi', 'Copy/Paste data dari microsoft word dapat menyebabkan kerusakan code HTML, sehingga data postingan tidak dapat disimpan dengan benar !');
        }

        $blog->judul = $request->input('judul');
        $blog->deskripsi = $deskripsi;
        $blog->save();

        flash()->addSuccess("Postingan $blog->judul berhasil diupdate");
        return redirect()->to(route('admin.blog.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);

        if (!$blog) {
            flash()->addError("Postingan tidak ditemukan!");
            return redirect()->back();
        }
        if ($blog->thumbnail) {
            unlink(public_path('assets/images/thumbnail-blog/') . $blog->thumbnail);
        }

        $blog->delete();

        flash()->addSuccess("Postingan $blog->judul berhasil dihapus");
        return redirect()->back();
    }
}
