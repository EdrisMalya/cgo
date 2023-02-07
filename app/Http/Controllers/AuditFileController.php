<?php

namespace App\Http\Controllers;

use App\Models\AuditFile;
use Illuminate\Http\Request;
use App\Models\AuditFormFilesAuthorizeDownloaderUser;

class AuditFileController extends Controller
{
    public function download($lang, $id, $type){
        try{
            $file = AuditFile::findOrFail(decrypt($id));
            $check = AuditFormFilesAuthorizeDownloaderUser::query()
                ->where('type', $type)
                ->where('user_id', auth()->id())
                ->where('audit_form_id', $file->audit_form_id)
                ->exists();
            if($check){
                return response()->download(storage_path("/app/private/".$file->file));
            }else{
                return redirect()->to(route('normal-audit.show', ['normal_audit'=>encrypt($file->audit_form_id), 'lang' => $lang, 'active' => 'all_information']))
                ->with(['message'=> translate('Something went wrong'), 'type' => 'error']);
            }

        }catch(Exception $e){
            abort(404);
        }
    }
}
