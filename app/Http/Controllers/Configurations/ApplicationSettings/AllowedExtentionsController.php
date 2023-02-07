<?php

namespace App\Http\Controllers\Configurations\ApplicationSettings;

use App\Http\Controllers\Controller;
use App\Models\AllowedExtension;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AllowedExtentionsController extends Controller
{
    public function index()
    {
        return Inertia::render('Configuration/ApplicationSettings/ApplicationSettingsIndex', [
            'active_module' => 'allowed-extensions',
            'active' => 'application-settings',
            'extensions' => AllowedExtension::query()->get()
        ]);
    }

    public function store(Request $request)
    {
        $this->allowed('allowed-extensions-add-extension');
        $data = $request->validate([
            'name' => ['required', 'string', 'min:1', 'max:5', 'unique:allowed_extensions'],
        ]);
        $data['name'] = strtoupper($data['name']);
        AllowedExtension::query()->create($data);
        return back()->with(['message' => translate('Created successfully'), 'type' => 'success']);
    }
    public function destroy($lang, AllowedExtension $allowedExtension)
    {
        $this->allowed('allowed-extensions-delete-extension');
        $allowedExtension->delete();
        return back()->with(['message' => translate('Deleted successfully'), 'type' => 'success']);
    }
}
