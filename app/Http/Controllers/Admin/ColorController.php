<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ColorRequest;
use App\Models\Color;
use App\Repositories\ColorRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class ColorController extends Controller
{
    protected $colorRepository;

    public function __construct(ColorRepository $colorRepository)
    {
        $this->colorRepository = $colorRepository;
    }

    public function index()
    {
        $this->authorize('view', Color::class);

        $attribute = [
            'name',
            'id',
        ];
        $colors = $this->colorRepository->getAll($attribute);

        return view('admin.color.index', [
            'colors' => $colors
        ]);
    }

    public function store(ColorRequest $request)
    {
        $this->authorize('create', Color::class);

        try {
            $data = $request->only('name');
            $this->colorRepository->create($data);

            return redirect()->route('colors.index')
                ->with('message', trans('admin.color.success_add'));
        } catch (Exception $ex) {
            Log::useDailyFiles(config('app.file_log'));
            Log::error($ex->getMessage());

            return redirect()->route('colors.index')
                ->with('error', trans('admin.color.error'));
        }
    }

    public function update(ColorRequest $request, Color $color)
    {
        $this->authorize('update', Color::class);

        try {
            $data = $request->only('name');
            $this->colorRepository->update($color, $data);

            return redirect()->route('colors.index')
                ->with('message', trans('admin.color.success_update'));
        } catch (Exception $ex) {
            Log::useDailyFiles(config('app.file_log'));
            Log::error($ex->getMessage());

            return redirect()->route('colors.index')
                ->with('error', trans('admin.color.error'));
        }
    }

    public function destroy(Color $color)
    {
        try {
            $this->colorRepository->delele($color);

            return redirect()->route('colors.index')
                ->with('message', trans('admin.color.success_delete'));
        } catch (Exception $ex) {
            Log::useDailyFiles(config('app.file_log'));
            Log::error($ex->getMessage());

            return redirect()->route('colors.index')
                ->with('error', trans('admin.color.error'));
        }
    }
}
