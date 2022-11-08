<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
                'title' => 'required|string|max:255',
                'description' => 'required',
                'published' => 'in:0,1',
                'category_id' => 'nullable|integer',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
