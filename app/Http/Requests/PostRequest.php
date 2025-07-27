<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PostRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->slug ?? $this->title),
        ]);
        // Automatically generate a slug from the title
        // This will be used when creating or updating a post
    }
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts',
            'content' => 'required|string|min:10',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Optional thumbnail image
            // 'thumbnail' => '
            'category_id' => 'required|exists:categories,id',
            'tags_ids' => 'array|exists:tags,id',
            // 'tags_ids' => 'exists:tags,id',

        ];
    }
    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Le titre est obligatoire.',
            'content.required' => 'Le contenu est obligatoire.',
            'slug.required' => 'Le slug est obligatoire.',
            'slug.unique' => 'Le slug doit être unique.',
            'thumbnail.image' => 'La vignette doit être une image.',
            'thumbnail.mimes' => 'La vignette doit être au format jpeg, png, jpg, gif ou svg.',
            'thumbnail.max' => 'La vignette ne doit pas dépasser 2 Mo.',
            'category_id.required' => 'La catégorie est obligatoire.',
            'category_id.exists' => 'La catégorie sélectionnée n\'existe pas.',
            'tags.array' => 'Les tags doivent être un tableau.',
            'tags.*.exists' => 'Un ou plusieurs tags sélectionnés n\'existent pas.',
        ];
    }
}
