<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Voice;
class VoiceUploadController extends Controller
{
  public function createForm(){
    return view('voiceUpload');
  }
  public function voiceUpload(Request $req){
    $req->validate([
      'file' => 'required|max:8192'
    ]);
    $voiceModel = new Voice;
    if($req->file()) {
      $mp3Name = time().'_'.$req->file->getClientOriginalName();
      $mp3Path = $req->file('file')->storeAs(date("Y-m"), $mp3Name, 'public');
      $voiceModel->num = $req->input('num');
      $voiceModel->mp3_path = '/storage/' . $mp3Path;
      $voiceModel->lrc_path = $req->input('lrc_path');
      $voiceModel->album = $req->input('album');
      $voiceModel->save();
      return back()
      ->with('success','File has been uploaded.')
      ->with('mp3Path', $voiceModel->mp3_path);
    }
   }
}