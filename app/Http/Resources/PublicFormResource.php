<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PublicFormResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'uuid' => $this->uuid,
            'name' => $this->name,
            'description' => $this->description,
            'language' => $this->language ?? 'en',
            'preview_image_path' => $this->preview_image_path,
            'brand_color' => $this->brand_color,
            'background_color' => $this->background_color,
            'text_color' => $this->text_color,
            'contrast_color' => $this->contrast_color,
            'privacy_link' => $this->privacy_link,
            'legal_notice_link' => $this->legal_notice_link,
            'eoc_text' => $this->eoc_text,
            'eoc_headline' => $this->eoc_headline,
            'cta_label' => $this->cta_label,
            'cta_link' => $this->cta_link,
            'cta_append_params' => $this->cta_append_params,
            'cta_append_session_id' => $this->cta_append_session_id,
            'use_cta_redirect' => (bool) $this->use_cta_redirect,
            'linkedin' => $this->linkedin,
            'github' => $this->github,
            'instagram' => $this->instagram,
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
            'show_cta_link' => $this->show_cta_link,
            'show_social_links' => $this->show_social_links,
            'show_form_progress' => $this->show_form_progress,
            'is_published' => $this->is_published,
            'avatar' => $this->avatar,
            'background' => $this->background,
            'company_name' => $this->company_name,
            'company_description' => $this->company_description,
        ];
    }
}
