<?php

namespace App\Http\Controllers;

use App\Comments;
use App\DailyBook;
use App\Student;
use App\Helper\WebHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DailyBooksController extends Controller
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

    public function addDailyBooksDayCare(Request $request, $student_id)
    {
        $user = auth()->user();
        if ($user == null) {
            return redirect()->route('index');
        } else if ($user->roles()->first()->name == 'Orangtua') {
            return redirect()->route('orangtua.home');
        } else {
            $student = Student::where('id', $student_id)->first();
            $image = WebHelper::saveImageToPublic($request->file('lampiran'), '/picture/daily_books');
            $dailyBook = new DailyBook;
            $dailyBook->pembuat             = $request->pembuat;
            $dailyBook->tanggal             = $request->tanggal;
            $dailyBook->tema                = $request->tema;
            $dailyBook->subtema             = $request->subtema;
            $dailyBook->snack               = $request->snack;
            $dailyBook->keterangan_fisik    = $request->keteranganFisik;
            $dailyBook->keterangan_kognitif = $request->keteranganKognitif;
            $dailyBook->keterangan_sosial   = $request->keteranganSosial;
            $dailyBook->makan_siang         = $request->makanSiang;
            $dailyBook->tidur_siang         = $request->tidurSiang;
            $dailyBook->catatan_khusus      = $request->catatanKhusus;
            $dailyBook->url_lampiran        = $image;
            $dailyBook->kelas               = 'Day Care';
            $dailyBook->dibaca              = False;
            $dailyBook->dipublish              = False;
            $student->dailyBook()->save($dailyBook);
            return redirect()->route('success');
        }
    }

    public function addDailyBooksKelompokBermain(Request $request, $student_id)
    {
        $user = auth()->user();
        if ($user == null) {
            return redirect()->route('index');
        } else if ($user->roles()->first()->name == 'Orangtua') {
            return redirect()->route('orangtua.home');
        } else {
            $student = Student::where('id', $student_id)->first();
            $image = WebHelper::saveImageToPublic($request->file('lampiran'), '/picture/daily_books');
            $dailyBook = new DailyBook;
            $dailyBook->pembuat             = $request->pembuat;
            $dailyBook->tanggal             = $request->tanggal;
            $dailyBook->tema                = $request->tema;
            $dailyBook->subtema             = $request->subtema;
            $dailyBook->kegiatan            = $request->kegiatan;
            $dailyBook->catatan_khusus      = $request->catatanKhusus;
            $dailyBook->url_lampiran        = $image;
            $dailyBook->kelas               = 'Kelompok Bermain';
            $dailyBook->dibaca              = False;
            $dailyBook->dipublish           = False;
            $student->dailyBook()->save($dailyBook);
            return redirect()->route('success');
        }
    }

    public function publishDailyBookDayCare(Request $request, $student_id, $dailyBook)
    {
        $user = auth()->user();
        if ($user == null) {
            return redirect()->route('index');
        } else if ($user->roles()->first()->name == 'Orangtua') {
            return redirect()->route('orangtua.home');
        } else {
            // $student = Student::where('id', $student_id)->first();
            $dailyBook->pembuat             = $request->pembuat;
            $dailyBook->tanggal             = $request->tanggal;
            $dailyBook->tema                = $request->tema;
            $dailyBook->subtema             = $request->subtema;
            $dailyBook->snack               = $request->snack;
            $dailyBook->keterangan_fisik    = $request->keteranganFisik;
            $dailyBook->keterangan_kognitif = $request->keteranganKognitif;
            $dailyBook->keterangan_sosial   = $request->keteranganSosial;
            $dailyBook->makan_siang         = $request->makanSiang;
            $dailyBook->tidur_siang         = $request->tidurSiang;
            $dailyBook->catatan_khusus      = $request->catatanKhusus;
            $dailyBook->kelas               = 'Day Care';
            $dailyBook->dipublish           = True;
            $dailyBook->save();
            // $student->dailyBook()->save($dailyBook);
            return redirect()->route('success');
        }
    }

    public function publishDailyBookKelompokBermain(Request $request, $student_id, $dailyBook)
    {
        $user = auth()->user();
        if ($user == null) {
            return redirect()->route('index');
        } else if ($user->roles()->first()->name == 'Orangtua') {
            return redirect()->route('orangtua.home');
        } else {
            // $student = Student::where('id', $student_id)->first();
            $dailyBook->pembuat             = $request->pembuat;
            $dailyBook->tanggal             = $request->tanggal;
            $dailyBook->tema                = $request->tema;
            $dailyBook->subtema             = $request->subtema;
            $dailyBook->kegiatan            = $request->kegiatan;
            $dailyBook->catatan_khusus      = $request->catatanKhusus;
            $dailyBook->kelas               = 'Kelompok Bermain';
            $dailyBook->dipublish           = True;
            $dailyBook->save();
            // $student->dailyBook()->save($dailyBook);
            return redirect()->route('success');
        }
    }

    public function isRead($student_id, $dailyBook)
    {
        // $student = Student::where('id', $student_id)->first();
        $dailyBook->dibaca           = True;
        $dailyBook->save();
        // $student->dailyBook()->save($dailyBook);
        return redirect()->route('orangtua.home');
    }

    public function addComments (Request $request, $daily_book_id)
    {
        $user = auth()->user();
        if ($user == null) {
            return redirect()->route('index');
        } else {
            $comment = new Comments;
            $comment->message = $request->message;
            $comment->user()->associate($user);
            $comment->dailyBook()->associate($daily_book_id);
            $comment->save();
            return redirect()->route('success');
        }
    }
}
