<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Children;
use App\Models\Pembimbing;
use App\Exports\AbsensiExport;
use App\Models\GoogleApiToken;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\AbsensiRequest;
use App\Http\Controllers\GoogleApiServiceController;
// use Illuminate\Http\Request;

class AbsensiController extends Controller
{

    protected $parents_id = '19eDlJijubSi6umscj_L689Fz7s_aE1UP';// PPl Kids
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bulan = array (1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);

        $sunday = strtotime('this sunday');
        $date = date('d',$sunday);
        $date = $date*=1;

        $sunday_month = date('m',$sunday );
        $sunday_month = $sunday_month*=1;
        $sunday_month = $bulan[$sunday_month];
        $sunday_year = date('Y',$sunday );
        $sunday = "$date $sunday_month $sunday_year";
        // today date
        $now = strtotime('now');
        $date_now = date('d',$now);
        $date_now = $date_now*=1;
        $now_month = date('m',$now);
        $now_month = $now_month*=1;
        $now_month = $bulan[$now_month];
        $now_year = date('Y',$now);
        $now_date = "$date_now $now_month $now_year";

        // thuesday date
        $tuesday = strtotime('next tuesday');
        $tuesday_date = date('d', $tuesday);
        $tuesday_date = $tuesday_date*=1;
        $tuesday_month = date('m',$tuesday);
        $tuesday_month = $tuesday_month*=1;
        $tuesday_month = $bulan[$tuesday_month];
        $this_tuesday = date('Y',$tuesday);
        $this_tuesday = "$tuesday_date $this_tuesday $this_tuesday";

        // last date
        $last_sunday = strtotime('last sunday');
        $last_date = date('d', $last_sunday);
        $last_date = $last_date*=1;
        $last_month = date('m',$last_sunday);
        $last_month = $last_month*=1;
        $last_month = $bulan[$last_month];
        $last_sundays = date('Y',$last_sunday);
        $las_sundays = "$last_date $last_month $last_sundays";

        // dd($las_sundays);
        $file_name = '';
        if($tuesday >= $now){

            if($date == $date_now){
                $file_name = $now_date;
            }elseif($date_now <= $date && $date_now<=$tuesday_date){
                $file_name = $las_sundays;
            }else{
                $file_name = $sunday;
            }
        }
        $bulans = explode(" ",$file_name)[1];
        $data = Absensi::with(['children','pembimbing'])->where('month',$bulans)->latest()->paginate(10);

        return view('absensi.index',[
            'data' => $data,
        ]);

    }

    public function export(){
        $bulan = array (1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);

        $sunday = strtotime('this sunday');
        $date = date('d',$sunday);
        $date = $date*=1;

        $sunday_month = date('m',$sunday );
        $sunday_month = $sunday_month*=1;
        $sunday_month = $bulan[$sunday_month];
        $sunday_year = date('Y',$sunday );
        $sunday = "$date $sunday_month $sunday_year";
        // today date
        $now = strtotime('now');
        $date_now = date('d',$now);
        $date_now = $date_now*=1;
        $now_month = date('m',$now);
        $now_month = $now_month*=1;
        $now_month = $bulan[$now_month];
        $now_year = date('Y',$now);
        $now_date = "$date_now $now_month $now_year";

        // thuesday date
        $tuesday = strtotime('next tuesday');
        $tuesday_date = date('d', $tuesday);
        $tuesday_date = $tuesday_date*=1;
        $tuesday_month = date('m',$tuesday);
        $tuesday_month = $tuesday_month*=1;
        $tuesday_month = $bulan[$tuesday_month];
        $this_tuesday = date('Y',$tuesday);
        $this_tuesday = "$tuesday_date $this_tuesday $this_tuesday";

        // last date
        $last_sunday = strtotime('last sunday');
        $last_date = date('d', $last_sunday);
        $last_date = $last_date*=1;
        $last_month = date('m',$last_sunday);
        $last_month = $last_month*=1;
        $last_month = $bulan[$last_month];
        $last_sundays = date('Y',$last_sunday);
        $las_sundays = "$last_date $last_month $last_sundays";

        // dd($las_sundays);
        $file_name = '';
        if($tuesday >= $now){

            if($date == $date_now){
                $file_name = $now_date;
            }elseif($date_now <= $date && $date_now<=$tuesday_date){
                $file_name = $las_sundays;
            }else{
                $file_name = $sunday;
            }
        }
        $bulans = explode(" ",$file_name)[1];
        $data = Absensi::with(['children','pembimbing'])->where('month',$bulans)->get();
        $tanggal_awal = $data[0]->sunday_date;
        $data_semua = [];
        $data_beda = [];
        $beda_akhir = [];
        foreach ($data as $absen) {
            if($absen->sunday_date != $tanggal_awal){
                $data_beda[] = $absen->sunday_date;
            }
            if($absen->sunday_date == $tanggal_awal){

                $data_baru = [
                    'Nama Anak'       => $absen->children->name,
                    'Code Anak'       => $absen->children->code,
                    'Kelas'           => $absen->children->role,
                    'Nama Pembimbing' => $absen->pembimbing->name,
                    'Absen Foto'      => $absen->image,
                    'Absen Video'     => $absen->video,
                    'Children Quiz'   => $absen->quiz,
                    'Tanggal Minggu'  => $absen->sunday_date,
                ];
                $data_semua[] = $data_baru;
            }
        }
        $beda_akhir = array_unique($data_beda);

        foreach($beda_akhir as $tanggal){
            $data_baru = [
                'Nama Anak'       => ' ',
                'Code Anak'       => ' ',
                'Kelas'           => ' ',
                'Nama Pembimbing' => ' ',
                'Absen Foto'      => ' ',
                'Absen Video'     => ' ',
                'Children Quiz'   => ' ',
                'Tanggal Minggu'  => ' ',
            ];
            $data_semua[] = $data_baru;
           $datas = Absensi::with(['children','pembimbing'])->where('sunday_date',$tanggal)->get();
            foreach($datas as $data){
                $data_baru = [
                    'Nama Anak'       => $data->children->name,
                    'Code Anak'       => $data->children->code,
                    'Kelas'           => $data->children->role,
                    'Nama Pembimbing' => $data->pembimbing->name,
                    'Absen Foto'      => $data->image,
                    'Absen Video'     => $data->video,
                    'Children Quiz'   => $data->quiz,
                    'Tanggal Minggu'  => $data->sunday_date,
                ];
                $data_semua[] = $data_baru;
            }
        }

        $export = new AbsensiExport($data_semua);
        return Excel::download($export, 'Absensi '. $bulans .'.xlsx');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $childrens = Children::all();
       return view('absensi.create',[
           'childrens' => $childrens,
       ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AbsensiRequest $request)
    {
        $get_children = $request->all();
        $id_children = $get_children['children_id'];
        $children_quiz = $get_children['quiz'];
        $response = Children::find($id_children);

        $id_pembimbing = $response->id_pembimbing;
        $token = GoogleApiToken::all()->first();
        $refresh_token =  strval($token->refresh_token);
        $token_access = strval($token->access_token);
        $services = new GoogleApiServiceController($refresh_token,$token_access);
        // // folder Parents date name

        $bulan = array (1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);

        $sunday = strtotime('this sunday');
        $date = date('d',$sunday);
        $date = $date*=1;

        $sunday_month = date('m',$sunday );
        $sunday_month = $sunday_month*=1;
        $sunday_month = $bulan[$sunday_month];
        $sunday_year = date('Y',$sunday );
        $sunday = "$date $sunday_month $sunday_year";
        // today date
        $now = strtotime('now');
        $date_now = date('d',$now);
        $date_now = $date_now*=1;
        $now_month = date('m',$now);
        $now_month = $now_month*=1;
        $now_month = $bulan[$now_month];
        $now_year = date('Y',$now);
        $now_date = "$date_now $now_month $now_year";

        // thuesday date
        $tuesday = strtotime('next tuesday');
        $tuesday_date = date('d', $tuesday);
        $tuesday_date = $tuesday_date*=1;
        $tuesday_month = date('m',$tuesday);
        $tuesday_month = $tuesday_month*=1;
        $tuesday_month = $bulan[$tuesday_month];
        $this_tuesday = date('Y',$tuesday);
        $this_tuesday = "$tuesday_date $this_tuesday $this_tuesday";

        // last date
        $last_sunday = strtotime('last sunday');
        $last_date = date('d', $last_sunday);
        $last_date = $last_date*=1;
        $last_month = date('m',$last_sunday);
        $last_month = $last_month*=1;
        $last_month = $bulan[$last_month];
        $last_sundays = date('Y',$last_sunday);
        $las_sundays = "$last_date $last_month $last_sundays";

        // dd($las_sundays);
        $file_name = '';
        if($tuesday >= $now){

            if($date == $date_now){
                $file_name = $now_date;
            }elseif($date_now <= $date && $date_now<=$tuesday_date){
                $file_name = $las_sundays;
            }else{
                $file_name = $sunday;
            }
        }
        $bulans = explode(" ",$file_name)[1];
        $children_id = $id_children;
        $pembimbing_id = $id_pembimbing;
        $foto = $request->file('foto') ;
        $video = $request->file('video');
        $is_video = '';
        $is_foto = '';

        if(!$foto){
            $is_foto = 'no';
        }else{
            $is_foto = 'yes';
        }

        if(!$video){
            $is_video = 'no';
        }else{
            $is_video = 'yes';
        }



        $children = Children::find($children_id);
        $children_name = $children->name;


        $video_info = '';
        if($video){
            $video_info = pathinfo($video->getClientOriginalName());
        }

        $foto_info = '';
        if($foto){
            $foto_info = pathinfo($foto->getClientOriginalName());
        }

        // // variables
        $sunday_date_id = '';
        $region_id = '';
        $role_besar_id = '';
        $foto_besar_id = '';
        $video_besar_id = '';
        // create parents date folder
        $sunday_date_id = $services->search_parents_date_folder($file_name,$this->parents_id);

        // create parents Region
        $region_id = $services->search_parents_date_folder('Kopo',$sunday_date_id);
        // create parents role Besar
        $role_besar_id = $services->search_parents_date_folder('Besar',$region_id);
        // create foto + video role besar
        $foto_besar_id = $services->search_parents_date_folder('Foto',$role_besar_id);
        $video_besar_id = $services->search_parents_date_folder('Video',$role_besar_id);

        $response = '';

            if($video){
                  $services->push_file($children_name,$video_besar_id,$video_info,$video);
            }
            if($foto){
                $services->push_file($children_name,$foto_besar_id,$foto_info,$foto);
            }

        Absensi::create([
            'children_id' => $children_id,
            'pembimbing_id' => $pembimbing_id,
            'video' => $is_video,
            'image' => $is_foto,
            'quiz' => $children_quiz,
            'month' => $bulans,
            'sunday_date' => $file_name,
        ]);

        return redirect()->route('absensi.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Absensi $absensi)
    {


       $anak = Children::where('id',$absensi->children_id)->get()->first();

       $children = Children::all();

        return view('absensi.edit',[
            'child' => $anak,
            'childrens' => $children,
            'absensi' => $absensi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AbsensiRequest $request, $id)
    {

        $data = $request->all();
        $children_id = $id;
        $quiz_data = $data['quiz'];
        Absensi::where('children_id',$children_id)->update([
            'quiz' => $quiz_data,
        ]);
        return redirect()->route('absensi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        Absensi::where('id',$id)->forceDelete();
        return redirect()->route('absensi.index');
    }
}
