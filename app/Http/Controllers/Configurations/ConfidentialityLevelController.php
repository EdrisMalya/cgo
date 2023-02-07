<?php

namespace App\Http\Controllers\Configurations;

use App\Http\Controllers\Controller;
use App\Models\ConfidentialityLevel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class ConfidentialityLevelController extends Controller
{
    public function index(){
        $this->allowed('confidentiality-level-access');
        return Inertia::render('Configuration/ConfidentialityLevel/ConfidentialityLevelIndex', [
            'active' => 'confidentiality-level',
            'levels' => ConfidentialityLevel::query()->get()
        ]);
    }

    public function store($lang, Request $request)
    {
        $this->allowed('confidentiality-level-create');
        $data = $request->validate([
            'name' => ['required', 'string', 'min:1', 'max:150', 'unique:confidentiality_levels']
        ]);
        ConfidentialityLevel::query()->create($data);
        return back()->with(['message' => translate('Created successfully'), 'type' => 'success']);
    }

    public function update($lang, Request $request, ConfidentialityLevel $confidentiality_level)
    {
        $this->allowed('confidentiality-level-edit');
        $data = $request->validate([
            'name' => ['required', 'string', 'min:1', 'max:150', Rule::unique('confidentiality_levels')->ignore($confidentiality_level)]
        ]);
        $confidentiality_level->update($data);
        return back()->with(['message' => translate('Updated successfully'), 'type' => 'success']);
    }

    public function destroy($lang, Request $request, ConfidentialityLevel $confidentialityLevel)
    {
        $this->allowed('confidentiality-level-delete');
        $confidentialityLevel->delete();
        return back()->with(['message' => translate('Deleted successfully'), 'type' => 'success']);

    }
}
