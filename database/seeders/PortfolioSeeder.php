<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\PersonalDetail;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Achievement;
use App\Models\Education;
use App\Models\Experience;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a default admin user
        $user = User::create([
            'name' => 'Noman',
            'email' => 'admin@portfolio.com',
            'password' => Hash::make('password123'),
        ]);

        // Create personal details
        PersonalDetail::create([
            'user_id' => $user->id,
            'description' => 'I am a passionate Full-Stack Developer with expertise in modern web technologies. I love creating innovative solutions and contributing to open source projects.',
            'blood_group' => 'B+',
            'department' => 'Computer Science',
            'age' => 25,
            'dob' => '1999-01-15',
            'address' => 'Dhaka, Bangladesh',
            'gender' => 'male'
        ]);

        // Create skills
        $technicalSkills = [
            ['name' => 'Laravel', 'level' => 'expert'],
            ['name' => 'PHP', 'level' => 'expert'],
            ['name' => 'JavaScript', 'level' => 'expert'],
            ['name' => 'React', 'level' => 'intermediate'],
            ['name' => 'Vue.js', 'level' => 'intermediate'],
            ['name' => 'MySQL', 'level' => 'expert'],
            ['name' => 'PostgreSQL', 'level' => 'intermediate'],
            ['name' => 'Docker', 'level' => 'intermediate'],
            ['name' => 'Git', 'level' => 'expert'],
            ['name' => 'AWS', 'level' => 'intermediate'],
        ];

        foreach ($technicalSkills as $skill) {
            Skill::create([
                'user_id' => $user->id,
                'name' => $skill['name'],
                'level' => $skill['level'],
                'category' => 'technical'
            ]);
        }

        $softSkills = [
            ['name' => 'Leadership', 'level' => 'expert'],
            ['name' => 'Communication', 'level' => 'expert'],
            ['name' => 'Problem Solving', 'level' => 'expert'],
            ['name' => 'Team Collaboration', 'level' => 'expert'],
            ['name' => 'Project Management', 'level' => 'intermediate'],
        ];

        foreach ($softSkills as $skill) {
            Skill::create([
                'user_id' => $user->id,
                'name' => $skill['name'],
                'level' => $skill['level'],
                'category' => 'soft'
            ]);
        }

        // Create projects
        Project::create([
            'user_id' => $user->id,
            'name' => 'Dynamic Portfolio Website',
            'description' => 'A full-stack dynamic portfolio website built with Laravel 12, featuring admin panel for content management, image uploads, and responsive design.',
            'github_url' => 'https://github.com/noman5713/Full-Stack-Dynamic-Portfolio',
            'demo_url' => 'https://portfolio.example.com',
            'images' => ['portfolio-1.jpg', 'portfolio-2.jpg'],
            'type' => 'personal',
            'tools' => ['Laravel', 'PHP', 'MySQL', 'Tailwind CSS', 'JavaScript'],
            'keywords' => ['portfolio', 'laravel', 'full-stack', 'responsive'],
            'status' => 'active'
        ]);

        Project::create([
            'user_id' => $user->id,
            'name' => 'E-Commerce Platform',
            'description' => 'A comprehensive e-commerce solution with inventory management, payment processing, and customer management features.',
            'github_url' => 'https://github.com/noman5713/ecommerce-platform',
            'demo_url' => 'https://shop.example.com',
            'images' => ['ecommerce-1.jpg', 'ecommerce-2.jpg'],
            'type' => 'client',
            'tools' => ['Laravel', 'Vue.js', 'Stripe API', 'Redis'],
            'keywords' => ['ecommerce', 'laravel', 'vue', 'payment'],
            'status' => 'active'
        ]);

        // Create achievements
        Achievement::create([
            'user_id' => $user->id,
            'title' => 'Best Web Developer Award',
            'description' => 'Recognized for outstanding contribution to web development projects.',
            'date_achieved' => '2024-12-01',
            'organization' => 'Tech Excellence Awards',
            'type' => 'award'
        ]);

        Achievement::create([
            'user_id' => $user->id,
            'title' => 'AWS Certified Developer',
            'description' => 'Successfully completed AWS Developer Associate certification.',
            'date_achieved' => '2024-08-15',
            'organization' => 'Amazon Web Services',
            'certificate_url' => 'https://aws.amazon.com/verification',
            'type' => 'certification'
        ]);

        // Create education
        Education::create([
            'user_id' => $user->id,
            'institution' => 'University of Dhaka',
            'degree' => 'Bachelor of Science',
            'field_of_study' => 'Computer Science and Engineering',
            'start_date' => '2020-01-01',
            'end_date' => '2024-06-30',
            'grade' => '3.75/4.00',
            'description' => 'Specialized in software engineering and web development.'
        ]);

        Education::create([
            'user_id' => $user->id,
            'institution' => 'Dhaka College',
            'degree' => 'Higher Secondary Certificate',
            'field_of_study' => 'Science',
            'start_date' => '2017-07-01',
            'end_date' => '2019-06-30',
            'grade' => 'GPA 5.00',
            'description' => 'Completed with distinction in Mathematics and Physics.'
        ]);

        // Create experiences
        Experience::create([
            'user_id' => $user->id,
            'company' => 'TechCorp Solutions',
            'position' => 'Senior Full-Stack Developer',
            'start_date' => '2024-01-01',
            'end_date' => null,
            'description' => 'Leading development of enterprise web applications using Laravel and React. Managing a team of junior developers and collaborating with clients.',
            'location' => 'Dhaka, Bangladesh',
            'is_current' => true
        ]);

        Experience::create([
            'user_id' => $user->id,
            'company' => 'Digital Innovations Ltd.',
            'position' => 'Junior Web Developer',
            'start_date' => '2023-06-01',
            'end_date' => '2023-12-31',
            'description' => 'Developed and maintained multiple client websites using Laravel, PHP, and JavaScript. Collaborated with design team to implement responsive UI/UX.',
            'location' => 'Dhaka, Bangladesh',
            'is_current' => false
        ]);
    }
}
