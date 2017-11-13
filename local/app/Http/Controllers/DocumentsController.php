<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;
use App\Search;
use Session;
use File;

class DocumentsController extends Controller
{ /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $document = Document::all();
        return view('admin.documents')->with('documents',$document);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_document');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $document = new Document();
        $max = Document::max('id');
        $max+=1;
        $lang = Session::get('lang');
        $search_pdf = '';
        if($lang=='en'){
            $this->validate($request,[
              'title_en'=>'required|max:255|unique:documents',
              'date_en'=>'required',
              'pdf_en'=>'required|mimes:pdf',
            ]);
            $document->title_en = $request->input('title');
            $document->date_en = $request->input('date');
            $pdfName = $max.'.'.$request->file('pdf_en')->getClientOriginalExtension();
            $request->file('pdf_en')->move('uploads/documents_en',$pdfName);
            $document->pdf_en = $pdfName;
            $search_pdf = 'uploads/documents_en/'.$pdfName;
        }
        else if($lang =='dr'){
            $this->validate($request,[
              'title_dr'=>'required|max:255|unique:documents',
              'date_dr'=>'required',
              'pdf_dr'=>'required|mimes:pdf',
            ]);
            $document->title_dr = $request->input('title_dr');
            $document->date_dr = $request->input('date_dr');
            $pdfName_dr = $max.'.'.$request->file('pdf_dr')->getClientOriginalExtension();
            $request->file('pdf_dr')->move('uploads/documents_dr',$pdfName_dr);
            $document->pdf_dr = $pdfName_dr;
            $search_pdf = 'uploads/documents_dr/'.$pdfName_dr;
        }
        else{
            $this->validate($request,[
              'title_pa'=>'required|max:255|unique:documents',
              'date_dr'=>'required',
              'pdf_pa'=>'required|mimes:pdf',
            ]);
            $document->title_pa = $request->input('title_pa');
            $document->date_pa = $request->input('date_dr');
            $pdfName_pa = $max.'.'.$request->file('pdf_pa')->getClientOriginalExtension();
            $request->file('pdf_pa')->move('uploads/documents_pa',$pdfName_pa);
            $document->pdf_pa = $pdfName_pa;
            $search_pdf = 'uploads/documents_pa/'.$pdfName_pa;
        }
        if($document->save()){
            $search = new Search();
            if($lang =='en'){
                $search->title_en = $request->input('title_en');
                $search->date_en = $request->input('date_en');
            }
            else if($lang=='dr'){
                $search->title_dr = $request->input('title_dr');
                $search->date_dr = $request->input('date_dr');
            }
            else{
                $search->title_pa = $request->input('title_pa');
                $search->date_pa = $request->input('date_dr');
            }

            $search->table_name = 'documents';
            $search->table_id = $document->id;
            $search->image_thumb = $search_pdf;
            $search->save();
        }
        Session::put('lang','');
        return Redirect()->route('documents.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $document = Document::findOrFail($id);
        return view('admin.edit_document')->with('document',$document);
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
        $document =Document::findOrFail($id);
        $max = $document->id;

         $pdfName = '';
         $pdfName_dr = '';
         $pdfName_pa = '';
         $search_pdf = '';

        $lang = Session::get('lang');
        if($lang=='en'){
            $this->validate($request,[
              'title_en'=>'required|max:255',
              'date_en'=>'required',
            ]);
            $document->title_en = $request->input('title_en');
            $document->date_en = $request->input('date_en');
            if($request->file('pdf_en') ==null){
                    $pdfName = $document->pdf_en;
                }
                else{
                    File::delete('uploads/documents_en/'.$document->pdf_en);
                    $pdfName = $max.'.'.$request->file('pdf_en')->getClientOriginalExtension();
                    $request->file('pdf_en')->move('uploads/documents_en',$pdfName);
                    $search_pdf = 'uploads/documents_en/'.$pdfName;
                }
                $document->pdf_en = $pdfName;
        }
        else if($lang=='dr'){
            $this->validate($request,[
              'title_dr'=>'required|max:255',
              'date_dr'=>'required',
            ]);
            $document->title_dr = $request->input('title_dr');
            $document->date_dr = $request->input('date_dr');
            if($request->file('pdf_dr') ==null){
                    $pdfName_dr = $document->pdf_dr;
            }
            else{
                File::delete('uploads/documents_dr/'.$document->pdf_dr);
                $pdfName_dr = $max.'.'.$request->file('pdf_dr')->getClientOriginalExtension();
                $request->file('pdf_dr')->move('uploads/documents_dr',$pdfName_dr);
                $search_pdf = 'uploads/documents_dr/'.$pdfName_dr;
            }
            $document->pdf_dr = $pdfName_dr;
        }
        else if($lang=='pa'){
            $this->validate($request,[
              'title_pa'=>'required|max:255',
              'date_dr'=>'required',
            ]);

            $document->title_pa = $request->input('title_pa');
            $document->date_pa = $request->input('date_dr');
            if($request->file('pdf_pa') ==null){
                $pdfName_pa = $document->pdf_pa;
            }
            else{
                File::delete('uploads/documents_pa/'.$document->pdf_pa);
                $pdfName_pa = $max.'.'.$request->file('pdf_pa')->getClientOriginalExtension();
                $request->file('pdf_pa')->move('uploads/documents_pa',$pdfName_pa);
                $search_pdf = 'uploads/documents_pa/'.$pdfName_pa;
            }
            $document->pdf_pa = $pdfName_pa;
        }
        if($document->save()){
            $search = Search::where('table_name','=','documents')->where('table_id','=',$id)->first();
            if ($lang=='en') {
                $search->title_en = $request->input('title_en');
                $search->date_en = $request->input('date_en');
            }
            else if($lang=='dr'){
                $search->title_dr = $request->input('title_dr');
                $search->date_dr = $request->input('date_dr');
            }
            else{
                 $search->title_pa = $request->input('title_pa');
                $search->date_pa = $request->input('date_dr');
            }
            $search->table_name = 'documents';
            $search->table_id = $document->id;
            $search->save();
        }
        Session::put('lang','');
        return Redirect()->route('documents.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $document = document::findOrFail($id);
        $search = Search::where('table_name','documents')->where('table_id',$id);
        $search->delete();
        $document->delete();
        return view('admin.documents');
    }
}
