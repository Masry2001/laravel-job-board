<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    public static function all($columns = ['*'])
    {
        return [
            [
                'title' => 'Senior Laravel Developer',
                'description' => 'We are looking for a senior Laravel developer to join our team. Must have 5+ years of experience.'
            ],
            [
                'title' => 'Frontend Developer',
                'description' => 'Seeking a skilled frontend developer with expertise in React and Vue.js.'
            ],
            [
                'title' => 'Backend Developer',
                'description' => 'Looking for a backend developer proficient in Node.js and Express.'
            ],
            [
                'title' => 'Full Stack Developer',
                'description' => 'Hiring a full stack developer with experience in both frontend and backend technologies.'
            ],
            [
                'title' => 'DevOps Engineer',
                'description' => 'We need a DevOps engineer to manage our cloud infrastructure and CI/CD pipelines.'
            ]
        ];
    }






}
