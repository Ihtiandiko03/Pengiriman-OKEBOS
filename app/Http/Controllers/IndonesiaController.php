<?php

namespace App\Http\Controllers;
use App\Models\Provinces;
use App\Models\PostalCode;
use Illuminate\Support\Facades\DB;



use Illuminate\Http\Request;

class IndonesiaController extends Controller
{
    public function provinsi(){
        $data = Provinces::where('province_name', 'LIKE', '%'.request('q').'%')->where('is_active', 1)->paginate(10);

        return response()->json($data);
    }

    public function kabkota($id){
        $data = PostalCode::where('province_code', $id)->where('city', 'LIKE', '%' . request('q') . '%')->where('is_active', 1)->groupByRaw('city')->paginate(10);

        return response()->json($data);
    }

    public function kecamatan($id)
    {
        $data = PostalCode::where('city', $id)->where('sub_district', 'LIKE', '%' . request('q') . '%')->where('is_active', 1)->groupByRaw('sub_district')->paginate(10);

        return response()->json($data);
    }

    public function kelurahan($id, $kabkota)
    {
        $data = PostalCode::where('city', $kabkota)->where('sub_district', $id)->where('urban', 'LIKE', '%' . request('q') . '%')->where('is_active', 1)->paginate(10);

        return response()->json($data);
    }

    public function kodepos(Request $request){
        $provinsi = $request['provinsi'];
        $kabkota = $request['kabkota'];
        $kecamatan = $request['kecamatan'];
        $kelurahan = $request['kelurahan'];

        $kueri = "SELECT `postal_code` FROM `db_postal_code_data` WHERE  province_code = '$provinsi' AND city = '$kabkota' AND sub_district = '$kecamatan' AND urban = '$kelurahan'";
        $getData = DB::select($kueri);

        $kirim =  '<input type="text" class="form-control" id="kodepos_pengirim" name="kodepos_pengirim" value="'.$getData[0]->postal_code.'" readonly>';

        echo json_encode($kirim);
    }

    public function kodepospenerima(Request $request)
    {
        $provinsi = $request['provinsi'];
        $kabkota = $request['kabkota'];
        $kecamatan = $request['kecamatan'];
        $kelurahan = $request['kelurahan'];

        $kueri = "SELECT `postal_code` FROM `db_postal_code_data` WHERE  province_code = '$provinsi' AND city = '$kabkota' AND sub_district = '$kecamatan' AND urban = '$kelurahan'";
        $getData = DB::select($kueri);

        $kirim =  '<input type="text" class="form-control" id="kodepos_penerima" name="kodepos_penerima" value="' . $getData[0]->postal_code . '" readonly>';

        echo json_encode($kirim);
    }
}
