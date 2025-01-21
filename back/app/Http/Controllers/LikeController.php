<?php

namespace App\Http\Controllers;

use App\Http\Resources\ImageResource;
use App\Models\Image;
use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function images()
    {
        $images = Image::query()
            ->baseQuery()
            ->get();

        return response()->json(ImageResource::collection($images));
    }

    public function like(Request $request)
    {
        $validated = $request->validate([
            'image_id' => ['required', 'exists:' . (new Image())->getTable() . ',id'],
            'is_like' => ['required', 'bool']
        ]);

        /**
         * @var User
         */
        $user = Auth::user();
        $like = $user->likesAndDislikes()->where('image_id', $validated['image_id'])->first();
        
        $isLike = true;
        if ($like) {
            if ($like->is_like != $validated['is_like']) {
                $like->is_like = $validated['is_like'];
                $like->save();
            } else {
                $like->delete();
                $isLike = false;
            }
        } else {
            $like = new Like();
            $like->user()->associate(Auth::user()->id);
            $like->image()->associate($validated['image_id']);
            $like->is_like = $validated['is_like'];
            $like->save();
        }

        $image = Image::query()
            ->baseQuery()
            ->where('id', $like->image_id)
            ->first();

        return response()->json(ImageResource::make($image));
    }
}
