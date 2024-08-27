<?php

namespace App\Observers;
use App\Models\Student;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
class StudentObserver
{
    protected $userId,$softdelete;

    public function __construct()
    {
        $this->userId = 3; // Set a static user ID for testing
    }



    /**
    * Handle the Product "created" event.
    *
    * @param  \App\Models\Product  $product
    * @return void
    */
    public function creating(Student $student)
    {
        $student->created_by = $this->userId;
    }
    public function updating(Student $student)
    {
        $student->updated_by = $this->userId;
      
    }
   
    /**
     * Handle the Student "created" event.
     */
    // public function created(Student $student): void
    // {
        
    // }

    /**
     * Handle the Student "updated" event.
     */
    // public function updated(Student $student): void
    // {
        
    // }

    /**
     * Handle the Student "deleted" event.
     */
    // public function deleted(Student $student): void
    // {
        
    // }

    /**
     * Handle the Student "restored" event.
     */
    // public function restored(Student $student): void
    // {
        
    // }

    /**
     * Handle the Student "force deleted" event.
     */
    // public function forceDeleted(Student $student): void
    // {
        
    // }
}
