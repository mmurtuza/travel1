<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
class EnterDataController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function insert(){
        $urlData = getURLList();
        return view('insertData');
    }

    public function index(){
        $dates = DB::select('select * from purchase_data');
        $service_names = DB::select('select * from services_list');
        $air_lists = DB::select('select * from air_list');
        return view('insertData',['dates'=>$dates, 'service_names'=>$service_names, 'air_lists'=>$air_lists]);
    }

    public function create(Request $request){

        $rules= [
            'PAX'=>'required|string|min:3|max:255',
            'SERVICE'=>'required|string|min:3|max:255',
            'PNR'=>'required|string|min:3|max:255',
            'P_P_NO'=>'required|string',
            'SECTOR'=>'required|string',
            'AIR'=>'required|string',
            'TKT_NO'=>'required|string',
            'VENDOR'=>'required|string',
            'CLIENTS'=>'required|string',
            'PAYABLE'=>'required|int',
            'PAID'=>'required|int',
            'RECEIVEABLE'=>'required|int',
            'RECEIVED'=>'required|int'
        ];
        $validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect('insert')
			->withInput()
			->withErrors($validator);
		}else{
            $PAX= $request->input('PAX');
            $SERVICE= $request->input('SERVICE');
            $PNR= $request->input('PNR');
            $P_P_NO= $request->input('P_P_NO');
            $SECTOR= $request->input('SECTOR');
            $AIR= $request->input('AIR');
            $TKT_NO= $request->input('TKT_NO');
            $VENDORE= $request->input('VENDOR');
            $CLIENT = $request->input('CLIENTS');
            $PAYABLE= $request->input('PAYABLE');
            $PAID= $request->input('PAID');
            $DUE = $PAYABLE - $PAID;
            $RECEIVEABLE= $request->input('RECEIVEABLE');
            $RECEIVED= $request->input('RECEIVED');
            $TO_PAY = $RECEIVEABLE - $RECEIVED;
            $time =date("Y-m-d");
            
            try{
                $datas = DB::insert('insert into purchase_data (DATE, PAX, SERVICE, PNR, P_P_NO, SECTOR, AIR, TKT_NO, VENDOR, PAYABLE, PAID, DUE, CLIENT, RECEIVEABLE, RECEIVED, TO_PAY) 
                values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$time, $PAX, $SERVICE, $PNR, $P_P_NO, $SECTOR, $AIR, $TKT_NO, $VENDORE, $PAYABLE, $PAID, $DUE, $CLIENT, $RECEIVEABLE, $RECEIVED, $TO_PAY]);
                return redirect('insert')->with('status',"Insert successfully");
            }catch(Exception $e){
                return redirect('insert')->with('failed',"operation failed");
            }
        }

        // $PAX= $request->input('PAX');
        // $SERVICE= $request->input('SERVICE');
        // $PNR= $request->input('PNR');
        // $P_P_NO= $request->input('P_P_NO');
        // $SECTOR= $request->input('SECTOR');
        // $AIR= $request->input('AIR');
        // $TKT_NO= $request->input('TKT_NO');
        // $VENDORE= $request->input('VENDOR');
        // $CLIENT = $request->input('CLIENTS');
        // $PAYABLE= $request->input('PAYABLE');
        // $PAID= $request->input('PAID');
        // $DUE = $PAYABLE - $PAID;
        // $RECEIVEABLE= $request->input('RECEIVEABLE');
        // $RECEIVED= $request->input('RECEIVED');
        // $TO_PAY = $RECEIVEABLE - $RECEIVED;
        // $time =date("Y-m-d");

        // try{
        //     $datas = DB::insert('insert into purchase_data (DATE, PAX, SERVICE, PNR, P_P_NO, SECTOR, AIR, TKT_NO, VENDOR, PAYABLE, PAID, DUE, CLIENT, RECEIVEABLE, RECEIVED, TO_PAY) 
        //     values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$time, $PAX, $SERVICE, $PNR, $P_P_NO, $SECTOR, $AIR, $TKT_NO, $VENDORE, $PAYABLE, $PAID, $DUE, $CLIENT, $RECEIVEABLE, $RECEIVED, $TO_PAY]);
        //     return redirect('insert')->with('status',"Insert successfully");
        // }catch(Exception $e){
        //     return redirect('insert')->with('failed',"operation failed");
        // }

        
        // $rules = [
		// 	'first_name' => 'required|string|min:3|max:255',
		// 	'city_name' => 'required|string|min:3|max:255',
		// 	'email' => 'required|string|email|max:255'
		// ];
		// $validator = Validator::make($request->all(),$rules);
		// if ($validator->fails()) {
		// 	return redirect('insert')
		// 	->withInput()
		// 	->withErrors($validator);
		// }
		// else{
        //     $data = $request->input();
		// 	try{
		// 		$student = new ticket_info;
        //         $student->first_name = $data['first_name'];
        //         $student->last_name = $data['last_name'];
		// 		$student->city_name = $data['city_name'];
		// 		$student->email = $data['email'];
		// 		$student->save();
		// 		return redirect('insert')->with('status',"Insert successfully");
		// 	}
		// 	catch(Exception $e){
		// 		return redirect('insert')->with('failed',"operation failed");
		// 	}
		// }
    }
    

    public function create2(Request $request){

        $PAX= $request->input('PAX');
        $SERVICE= $request->input('SERVICE');
        $PNR= $request->input('PNR');
        $P_P_NO= $request->input('P_P_NO');
        $SECTOR= $request->input('SECTOR');
        $AIR= $request->input('AIR');
        $TKT_NO= $request->input('TKT_NO');
        $VENDORE= $request->input('VENDOR');
        $PAYABLE= $request->input('PAYABLE');
        $PAID= $request->input('PAID');
        $DUE = $PAYABLE - $PAID;
        $time =date("Y-m-d H:i:s");

        try{
            $datas = DB::insert('insert into sells_data (DATE, pax, service, pnr, ppno, sector, air, tktno, vendor, receivable, received, due) 
            values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$time, $PAX, $SERVICE, $PNR, $P_P_NO, $SECTOR, $AIR, $TKT_NO, $VENDORE, $PAYABLE, $PAID, $DUE]);
            return redirect('sell')->with('status',"Insert successfully");
        }catch(Exception $e){
            return redirect('sell')->with('failed',"operation failed");
        }

        
        // $rules = [
		// 	'first_name' => 'required|string|min:3|max:255',
		// 	'city_name' => 'required|string|min:3|max:255',
		// 	'email' => 'required|string|email|max:255'
		// ];
		// $validator = Validator::make($request->all(),$rules);
		// if ($validator->fails()) {
		// 	return redirect('insert')
		// 	->withInput()
		// 	->withErrors($validator);
		// }
		// else{
        //     $data = $request->input();
		// 	try{
		// 		$student = new ticket_info;
        //         $student->first_name = $data['first_name'];
        //         $student->last_name = $data['last_name'];
		// 		$student->city_name = $data['city_name'];
		// 		$student->email = $data['email'];
		// 		$student->save();
		// 		return redirect('insert')->with('status',"Insert successfully");
		// 	}
		// 	catch(Exception $e){
		// 		return redirect('insert')->with('failed',"operation failed");
		// 	}
		// }
    }

}