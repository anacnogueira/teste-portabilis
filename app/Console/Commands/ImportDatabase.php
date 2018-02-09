<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Entities\Student;
use App\Entities\Course;
use App\Entities\Registration;
use DB;
use Carbon\Carbon;

class ImportDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import registrers from students, courses and registrations to database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info("Importing students registers");
        $this->importStudents();
        $this->info("Done!");

        $this->info("Importing courses registers");
        //$this->importCourses();
        $this->info("Done!");

        $this->info("Importing registrations registers");
        //$this->importRegistrations();
        $this->info("Done!");
    }

    private function importStudents()
    {

        $excel = \App::make('excel');
        // $spreadsheets = \Excel::load('public/storage/csv/students_file.csv', function($reader) {

        // })->get();
        
        // DB::beginTransaction();
        // DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        // DB::table('students')->truncate();
        // DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        // DB::commit();

        // foreach ($spreadsheets as $spreadsheet) {
        //     foreach ($spreadsheet as $line) {
        //         $fields = explode(";",$line);

        //         $student = Student::where('cpf',$fields[2])->get();

        //         if (count($student) == 0){
        //             Student::create([
        //                 'rg' => $fields[3],
        //                 'cpf' => $fields[2],
        //                 'date_birth' => Carbon::parse($fields[5])->format('d/m/Y'),
        //                 'name' => $fields[1],
        //                 'phone' => $fields[4]
        //             ]);

        //         }    

        //     }            
        // }    

    }

    // private function importCourses()
    // {
      
    //     $excel = \App::make('excel');
    //     $spreadsheets = \Excel::load('public/storage/csv/courses_file.csv', function($reader) {

    //     })->get();

        
    //     DB::beginTransaction();
    //     DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    //     DB::table('courses')->truncate();
    //     DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    //     DB::commit();

    //     foreach ($spreadsheets as $line) {               
    //         Course::create([
    //             'name' => $line["course_name"],
    //             'monthly_amount' => $line['monthly_amount'],
    //             'registration_tax' => $line['registration_tax'],
    //             'period' => $line['period'],
    //             'duration' => $line['duration']
    //         ]);              
    //     }    

    // }


    // private function importRegistrations()
    // {
      
    //     $excel = \App::make('excel');
    //     $spreadsheets = \Excel::load('public/storage/csv/registrations_file.csv', function($reader) {

    //     })->get();

        
    //     DB::beginTransaction();
    //     DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    //     DB::table('registrations')->truncate();
    //     DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    //     DB::commit();

    //     foreach ($spreadsheets as $spreadsheet) {
    //         foreach ($spreadsheet as $line) {
    //             $fields = explode(";",$line);

    //             if ($fields[1] > 0 and $fields[2] > 0){

    //                 $student = Student::find($fields[1]);
    //                 $course = Course::find($fields[2]);

    //                 if (count($student) > 0 and count($course) > 0) {
    //                     Registration::create([
    //                         'student_id' => $fields[1],
    //                         'course_id' => $fields[2],
    //                         'year' => $fields[3],
    //                         'active' => 1,
    //                         'paid' => 0
    //                     ]); 
    //                 }
                    
  
    //             }
                
    //         }
    //     }    
                

    // }
}
