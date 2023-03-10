<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentProject extends Model
{
    use HasFactory;

    public function industryById()
    {
        return $this->hasOne('App\Models\Industry', 'id', 'industry_id');
    }
    public function referenceStyleById()
    {
        return $this->hasOne('App\Models\ReferenceStyles', 'id', 'reference_style_id');
    }
    public function numberOfWordsById()
    {
        return $this->hasOne('App\Models\NumberOfWords', 'id', 'number_of_words_id');
    }
    public function academicLevelById()
    {
        return $this->hasOne('App\Models\AcademicLevels', 'id', 'academic_level_id');
    }
    public function contentProjectType()
    {
        return $this->hasOne('App\Models\ContentProjectTypes', 'id', 'content_project_type');
    }
}
