<?php

namespace App\Http\Controllers;

use Alert;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index($param)
    {
        try {
            $data         = DB::connection($param)->getPDO();
            $pasien       = $this->pasienToday($param);
            $sevenDay     = $this->pasien7day($param);
            $user         = $this->user($param)->count();
            $pasienMonth  = $this->pasienMonth($param);
            $jumlahDokter = $this->jumlahDokter($param);
            $poli         = $this->jumlahPoli($param);
            $duser     = $this->user($param);
            $datauser = $duser->map(function($item)use ($param){
                $check = DB::connection($param)->table('h_loginlog')->where('user_id', $item->username)->get()->sortByDesc('id')->first();
                $item->aktif = $check == null ? null : $check;
                $tgl         = date_create($check->tanggal.' '.$check->jam);
                $tgl2        = date_create(Carbon::now()->format('Y-m-d h:i:s'));
                $diff        = date_diff($tgl2, $tgl);
                
                $item->y = $diff->y;
                $item->m = $diff->m;
                $item->d = $diff->d;
                $item->h = $diff->h;
                $item->i = $diff->i;
                $item->s = $diff->s;
                return $item;
            });
            
            return view('report',compact('param','pasien','sevenDay','user','pasienMonth','jumlahDokter','datauser','poli'));
          } catch (\Exception $e) {
            toast('Tidak Terkoneksi Dengan Database', 'info');
            return back();
          }
    }

    public function pasienToday($param)
    {
        $today = Carbon::now()->format('Y-m-d')." 00:00:00";
        $data  = DB::connection($param)->table('t_pendaftaran')->where('tanggal', '>=', $today)->get();
        $count = $data->count();
        return $count;
    }

    public function pasien7day($param)
    {
        $today = Carbon::today()->format('Y-m-d');
        $sevenDay = CarbonImmutable::now()->add(-7, 'day')->format('Y-m-d');
        $data  = DB::connection($param)->table('t_pendaftaran')->whereBetween('tanggal', [$sevenDay." 00:00:00",$today." 23:59:59"])->get();
        $count = $data->count();
        return $count;
    }
    
    public function pasienMonth($param)
    {
        $year = Carbon::today()->format('Y');
        $month = Carbon::today()->format('m');
        $data  = DB::connection($param)->table('t_pendaftaran')->whereYear('tanggal', '=', $year)
        ->whereMonth('tanggal', '=', $month)->get()->count();
        return $data;
    }

    public function jumlahDokter($param)
    {
        $data  = DB::connection($param)->table('m_pegawai')->get();
        $count = $data->count();
        return $count;
    }

    public function jumlahPoli($param)
    {
        $data  = DB::connection($param)->table('m_ruangan')->where('is_aktif', 'Y')->get();
        $count = $data->count();
        return $count;
    }

    public function user($param)
    {
        $data = DB::connection($param)->table('users')->get();
        return $data;
    }
}
