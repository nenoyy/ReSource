<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class WebController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function admin(){
        if(auth()->user() && auth()->user()->isAdmin()){

            $orders = DB::table('order')
                ->where('id_manager','=',null)
                ->get();
            $drivers = DB::table('Worker')
                ->join('users','users.id','Worker.id_user')
                ->where('id_role','=',3)
                ->get();
            $workers = DB::table('worker')
                ->join('users','worker.id_user','users.id')
                ->join('role','role.id_role','worker.id_role')
                ->get();
            return view('admin',['orders'=>$orders],['drivers'=>$drivers]);
        }
        return redirect(route('index'));
    }

    public function admin2(){
        if(auth()->user() && auth()->user()->isAdmin()){

            $workers = DB::table('worker')
                ->join('users','worker.id_user','users.id')
                ->join('role','role.id_role','worker.id_role')
                ->get();
            return view('admin2',['workers'=>$workers]);
        }
        return redirect(route('index'));
    }

    public function adminSayYes(Request$request){
        if(auth()->user() && auth()->user()->isAdmin()){
            $value = DB::table('coins')
                ->where('id_category','=',$request->id_category)
                ->first();
            DB::table('users')
                ->where('id','=',$request->id_user)
                ->update([
                'count_point'=>$value->value*$request->weight,

            ]);

            DB::table('order')
                ->where('id_order','=',$request->id_order)
                ->update([
                    'id_reception'=>1,
                    'id_manager'=>auth()->user()->id,
                    'id_driver'=>$request->id_driver,
                ]);

            return redirect(route('admin'));
        }
        return redirect(route('admin'));
    }
    public function personInformation()
    {
        return view('person');
    }
    public function guide()
    {
        return view('guide');
    }

    protected function changeProfil(Request $request)
    {
        $data=$request->all();
        DB::table('users')
            ->where('id','=',auth()->user()->id)
            ->update ([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'patronymic' => $data['patronymic'],
            'login' => $data['login'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        return redirect(route('personal'));
    }

    public function shop()
    {
        $user = DB::table('users')
            ->where('id','=',auth()->user()->id)
            ->first();

        $products = DB::table('Bonuses')
            ->where('price','<=',$user->count_point)
            ->get();

        return view('shop',[
        'products' => $products
        ]);
    }
    public function pay($id)
    {
        DB::table('Bonus_Person')->insert([
            'id_user'=>auth()->user()->id,
            'id_bonus'=>$id,
        ]);

        $bonus=DB::table('Bonuses')
            ->where('id_bonus','=',$id)
            ->first();

        $user=DB::table('users')
            ->where('id','=',auth()->user()->id)
            ->first();
        DB::table('users')
            ->where('id','=',auth()->user()->id)
            ->update([
                'count_point'=>$user->count_point - $bonus->price,
            ]);

        return redirect(route('shop'));
    }

    public function personal()
    {
        $orders = DB::table('order')
            ->where('id_user','=',auth()->user()->id)
            ->get();
        return view('personal',[
            'orders' => $orders
        ]);
    }
    public function personalDelete($id)
    {
        DB::table('order')
            ->where('id_order','=',$id)
            ->delete();

        $orders = DB::table('order')
            ->where('id_user','=',auth()->user()->id)
            ->get();
        return view('personal',[
            'orders' => $orders
        ]);
    }

    public function addCategory(Request$request){
        $data = $request->all();
        DB::table('categories')->insert([
            'name_category'=>$data['name_category'],
            'description'=>'новая категория',
            'picture'=>'новая картинка',
        ]);
        return redirect(url()->previous())->with(['msgForCategory'=>'Категория добавлена']);
    }

    public function delCategory(Request$request){
        $id_category = $request->id_category;

        DB::table('categories')->where('id_category',$id_category)->delete();
        return redirect(url()->previous())->with(['msgForcategory'=>'Категория удалена']);
    }

    public function material()
    {
        $categories = DB::table('categories')
            ->get();
        return view('material',['categories'=>$categories]);
    }

    public function map($id_category)
    {
        $categories = DB::table('categories')
            ->where('id_category','=',$id_category)
            ->get();
        return view('map',['categories'=>$categories, 'id_category'=>$id_category]);
    }

    public function address(Request $request)
    {
        $data = $request->all();
        DB::table('order')
            ->insert([
                'id_user' => auth()->user()->id,
                'id_category' => $data['id_category'],
                'weight' => $data['weight'],
                'date' => $data['date'],
                'time' => $data['time'],
                'address' => $data['demo'],
            ]);
        return redirect(route('personal'));
    }
}
