<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Income;
use App\Models\Cat;
use App\Models\Type;
use Illuminate\Support\Facades\DB;


class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Cat::all();
        $colors = Color::paginate(20);
        return view('income.index', ['colors'=>$colors, 'cats'=>$cats]);
    }





    public function stat(Request $req)
    {
        $cats = Cat::paginate();
        return view('income.stat', ['cats'=>$cats]);
    }

     function sanaajax(Request $req)
    {
        $cololrs=DB::select("select colors.*, colors.id as cid, cats.*,types.* from cats
        left join types on cats.id=types.cat_id left join colors on types.id=colors.type_id where colors.cat_id=".$req->cat);
        $types = Type::where('cat_id',$req->cat)->get();
    }


    public function search(Request $req){
        $colors=DB::select("select colors.*, colors.id as cid, cats.*,types.* from cats
        left join types on cats.id=types.cat_id left join colors on types.id=colors.type_id where colors.color like '%".$req->test."%' or cats.cat like '%".$req->test."%' or types.type like '%".$req->test."%'");
        return response()->json(['colors'=>$colors]);
    }

//    public function catsel(Request $req)
//    {
//        $colors=DB::table('cats')->leftJoin('types', 'cats.id', '=', 'types.cat_id')->leftJoin('colors', 'types.id', '=', 'colors.type_id')->where('colors.cat_id', $req->cat)->select('colors.*','cats.*','types.*'.$req->cat);

//     //    select("select colors.*,colors.id as cid,
//     //    cats.*,types.* from cats left join types on
//     //     cats.id=types.cat_id left join colors on
//     //     types.id=colors.type_id where colors.cat_id=".$req->cat);
//        return response()->json(['colors'=>$colors]);
//    }

public function catsel(Request $req)
{
    if ($req->cat ==0) {
        $cololrs=DB::select("select colors.*, colors.id as cid, cats.*,types.* from cats
    left join types on cats.id=types.cat_id left join colors on types.id=colors.type_id");
    $types = Type::all();
    }
    else {
        $cololrs=DB::select("select colors.*, colors.id as cid, cats.*,types.* from cats
        left join types on cats.id=types.cat_id left join colors on types.id=colors.type_id where colors.cat_id=".$req->cat);
        $types = Type::where('cat_id',$req->cat)->get();
    }

    return response()->json(['colors'=>$cololrs, 'types'=>$types]);
}
public function sarUp(Request $req)
{
    if ($req->cat ==0) {
        $cololrs=DB::select("select colors.*, colors.id as cid, cats.*,types.* from cats
    left join types on cats.id=types.cat_id left join colors on types.id=colors.type_id order by c_amount DESC");
    $types = Type::all();
    }
    else {
        $cololrs=DB::select("select colors.*, colors.id as cid, cats.*,types.* from cats
        left join types on cats.id=types.cat_id left join colors on types.id=colors.type_id where colors.cat_id=".$req->cat."order by c_amount DESC");
        $types = Type::where('cat_id',$req->cat)->get();
    }
    return response()->json(['colors'=>$cololrs, 'types'=>$types]);
}
public function sarDown(Request $req)
{
    if ($req->cat ==0) {
        $cololrs=DB::select("select colors.*, colors.id as cid, cats.*,types.* from cats
    left join types on cats.id=types.cat_id left join colors on types.id=colors.type_id order by c_amount ASC");
    $types = Type::all();
    }
    else {
        $cololrs=DB::select("select colors.*, colors.id as cid, cats.*,types.* from cats
        left join types on cats.id=types.cat_id left join colors on types.id=colors.type_id where colors.cat_id=".$req->cat."order by c_amount ASC");
        $types = Type::where('cat_id',$req->cat)->get();
    }
    return response()->json(['colors'=>$cololrs, 'types'=>$types]);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function minus($id)
    {
        $color = Color::find($id);
        return view('income.minus', ['color' => $color]);
    }
    public function minusstore(Request  $req)
    {
        $data=$req->validate([
            'cat_id'=>'required',
            'type_id'=>'required',
            'color_id'=>'required',
            'amount'=>'required|integer',
            'r_soni'=>'required|integer',
            'desc'=>'nullable',
            'status'=>'required',
            'vaqt'=>'required',
        ]);
        Income::create($data);
        $color= Color::find($data['color_id']);
        $color->c_amount=$color->c_amount-$data['amount'];
        $color->cr_soni=$color->cr_soni-$data['r_soni'];
        $color->update();
        return back();
    }


     public function plus($id)
     {
         $color = Color::find($id);
         return view('income.plus', ['color' => $color]);
     }
     public function plusstore(Request  $req)
     {
         $data=$req->validate([
             'cat_id'=>'required',
             'type_id'=>'required',
             'color_id'=>'required',
             'amount'=>'required|integer',
             'r_soni'=>'required|integer',
             'desc'=>'nullable',
             'status'=>'required',
             'vaqt'=>'required',
         ]);
         Income::create($data);
         $color= Color::find($data['color_id']);
         $color->c_amount=$color->c_amount+$data['amount'];
         $color->cr_soni=$color->cr_soni+$data['r_soni'];
         $color->update();
         return back();
     }



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
      //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function full($id)
    {
        $colors=Income::where('color_id',$id)->get();
        return view('income.full',['colors'=>$colors]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('income.edit', ['income'=>Income::find($id)]);
    }
    public function delincome(Request  $req)
    {
        $income=Income::find($req->id);
        $color = Color::find($req->color_id);
        if ($req->status==1) {
            $color->c_amount=$color->c_amount-$income->amount;
            $color->cr_soni=$color->cr_soni-$income->r_soni;
        }
        if ($req->status==0) {
            $color->c_amount=$color->c_amount+$income->amount;
            $color->cr_soni=$color->cr_soni+$income->r_soni;
        }
        $color->update();
        $income->delete();
        return back();
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $data=$req->validate([
            'cat_id'=>'required',
            'type_id'=>'required',
            'color_id'=>'required',
            'amount'=>'required|integer',
            'r_soni'=>'required|integer',
            'desc'=>'nullable',
            'status'=>'required',
            'vaqt'=>'required',
        ]);
        $income = Income::find($id);
        $color= Color::find($data['color_id']);
        if ($data['status']==0) {
        $color->c_amount=$color->c_amount+$req->oldamount-$data['amount'];
        $color->cr_soni=$color->cr_soni+$req->oldr_soni-$data['r_soni'];
        }
        else {
            $color->c_amount=$color->c_amount-$req->oldamount+$data['amount'];
        $color->cr_soni=$color->cr_soni-$req->oldr_soni+$data['r_soni'];
        }
        $color->update();
        $income->update($data);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
