<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use PDF;
use App\Models\User;
use App\Models\CompanySettings;
use App\Models\Notification;
use App\Charts\GrafikChart;
use App\Models\ProfilPegawai;
use App\Notifications\UserFollowNotification;
use App\Notifications\UlangTahunNotification;
use App\Notifications\MasaBerlakuSIPNotification;
use App\Notifications\MasaBerlakuSPKDokterNotification;
use App\Notifications\MasaBerlakuSPKPerawatNotification;
use App\Notifications\MasaBerlakuSPKNakesLainNotification;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // main dashboard
    public function index(GrafikChart $chart)
    {
        // Mendapatkan peran pengguna saat ini
        $user = auth()->user();

        // Memeriksa peran pengguna dan mengarahkannya ke halaman yang sesuai
        if ($user->role_name === 'Admin')
        {
            $user = auth()->user();
            $role = $user->role_name;
            
            $unreadNotifications = Notification::where('notifiable_id', $user->id)
                ->where('notifiable_type', get_class($user))
                ->whereNull('read_at')
                ->get();

            $readNotifications = Notification::where('notifiable_id', $user->id)
                ->where('notifiable_type', get_class($user))
                ->whereNotNull('read_at')
                ->get();

            $dataPegawai = User::where('role_name', 'User')->count();
            $dataPNS = ProfilPegawai::where('jenis_pegawai', 'PNS')->count();
            $dataCPNS = ProfilPegawai::where('jenis_pegawai', 'CPNS')->count();
            $dataPPPK = ProfilPegawai::where('jenis_pegawai', 'PPPK')->count();
            $datanonASN = ProfilPegawai::where('jenis_pegawai', 'Non ASN')->count();
            return view('dashboard.Halaman-admin', [
                'chart' => $chart->build(),
                'grafikAgama' => $chart->grafikAgama(),
                'grafikJenisKelamin' => $chart->grafikJenisKelamin(),
                'grafikPangkat' => $chart->grafikPangkat(),
                'dataPegawai' => $dataPegawai,
                'unreadNotifications' => $unreadNotifications,
                'readNotifications' => $readNotifications,
                'dataPNS'=> $dataPNS,
                'dataCPNS' => $dataCPNS,
                'dataPPPK' => $dataPPPK,
                'datanonASN' => $datanonASN,
            ]);
            
        }
        elseif ($user->role_name === 'Super Admin' || $user->role_name === 'Kepala Ruangan')
        {
            $user = auth()->user();
            $role = $user->role_name;
            
            $unreadNotifications = Notification::where('notifiable_id', $user->id)
                ->where('notifiable_type', get_class($user))
                ->whereNull('read_at')
                ->get();
            
            $readNotifications = Notification::where('notifiable_id', $user->id)
                ->where('notifiable_type', get_class($user))
                ->whereNotNull('read_at')
                ->get();

            $dataPegawai = User::where('role_name', 'User')->count();
            return view('dashboard.Halaman-super-admin', [
                'chart' => $chart->build(),
                'grafikAgama' => $chart->grafikAgama(),
                'grafikJenisKelamin' => $chart->grafikJenisKelamin(),
                'grafikPangkat' => $chart->grafikPangkat(),
                'dataPegawai' => $dataPegawai,
                'unreadNotifications' => $unreadNotifications,
                'readNotifications' => $readNotifications
            ]);
        }
        elseif ($user->role_name === 'User')
        {
            $user = auth()->user();
            $role = $user->role_name;
            
            $unreadNotifications = Notification::where('notifiable_id', $user->id)
                ->where('notifiable_type', get_class($user))
                ->whereNull('read_at')
                ->get();

            $readNotifications = Notification::where('notifiable_id', $user->id)
                ->where('notifiable_type', get_class($user))
                ->whereNotNull('read_at')
                ->get();

            $tampilanPerusahaan = CompanySettings::where('id',1)->first();
            return view('dashboard.Halaman-user',compact('tampilanPerusahaan', 'unreadNotifications', 'readNotifications'));
        }
    }

    public function bacaNotifikasi($id){
        if($id)
        {
            auth()->user()->notifications->where('id',$id)->markAsRead();
            Toastr::success('Notifikasi Telah Dibaca :)','Success');
        }
        return back();
    }

    public function bacasemuaNotifikasi()
    {
        $user = auth()->user();
        $user->notifications->markAsRead();
        Toastr::success('Semua Notifikasi Telah Dibaca :)','Success');
        return redirect()->back();
    }

    public function ulangtahun()
    {
        if (auth()->user())
        {
            $user = User::first();
            $notification = auth()->user()->notifications->where('data.user_id', $user->id)->first();
        
                if (!$notification) {
                    $notification = new UlangTahunNotification($user);
                    $notification->data['user_id'] = $user->id;
                    auth()->user()->notify($notification);
                }
        }
        return back();
    }

    public function masaberlakuSIP()
    {
        if (auth()->user())
        {
            $user = User::first();
            $notification = auth()->user()->notifications->where('data.user_id', $user->id)->first();
        
                if (!$notification) {
                    $notification = new MasaBerlakuSIPNotification($user);
                    $notification->data['user_id'] = $user->id;
                    auth()->user()->notify($notification);
                }
        }
        return back();
    }

    public function masaberlakuSPKDokter()
    {
        if (auth()->user())
        {
            $user = User::first();
            $notification = auth()->user()->notifications->where('data.user_id', $user->id)->first();
        
                if (!$notification) {
                    $notification = new MasaBerlakuSPKDokterNotification($user);
                    $notification->data['user_id'] = $user->id;
                    auth()->user()->notify($notification);
                }
        }
        return back();
    }

    public function masaberlakuSPKPerawat()
    {
        if (auth()->user())
        {
            $user = User::first();
            $notification = auth()->user()->notifications->where('data.user_id', $user->id)->first();
        
                if (!$notification) {
                    $notification = new MasaBerlakuSPKPerawatNotification($user);
                    $notification->data['user_id'] = $user->id;
                    auth()->user()->notify($notification);
                }
        }
        return back();
    }

    public function masaberlakuSPKNakesLain()
    {
        if (auth()->user())
        {
            $user = User::first();
            $notification = auth()->user()->notifications->where('data.user_id', $user->id)->first();
        
                if (!$notification) {
                    $notification = new MasaBerlakuSPKNakesLainNotification($user);
                    $notification->data['user_id'] = $user->id;
                    auth()->user()->notify($notification);
                }
        }
        return back();
    }
}
