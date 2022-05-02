<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Ru2lat;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceStoreRequest;
use App\Http\Requests\Admin\ServiceUpdateRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        try {
            $services = Service::all();
            return view('admin.service.index', compact('services'));
        } catch (\Exception $e) {
            return response()->view('errors.500', [
                'exception' => $e->getMessage(),
            ], 500);
        }
    }
    public function create()
    {
        return view('admin.service.create');
    }
    public function store(ServiceStoreRequest $request)
    {
        try {
            $data = $request->validated();
            $data['chpu'] = Ru2lat::convert($data['title']);
            Service::create($data);
            return redirect()->route('admin.service.index');
        } catch (\Exception $e) {
            return response()->view('errors.500', [
                'exception' => $e->getMessage(),
            ], 500);
        }
    }
    public function edit(Service $service)
    {
        return view('admin.service.edit', compact('service'));
    }
    public function update(Service $service, ServiceUpdateRequest $request)
    {
        try {
            $data = $request->validated();
            $service->update($data);
            return redirect()->route('admin.service.index');
        } catch (\Exception $e) {
            return response()->view('errors.500', [
                'exception' => $e->getMessage(),
            ], 500);
        }
    }
    public function delete(Service $service)
    {
        try {
            $service->delete();
            return redirect()->route('admin.service.index');
        } catch (\Exception $e) {
            return response()->view('errors.500', [
                'exception' => $e->getMessage(),
            ], 500);
        }
    }
}
