<?php

// app/models/Task.php

class Task extends BaseModel
{
protected $fillable = array('name', 'complete', 'completed_at_time');



  // public function user() {
  //       # Book belongs to Author
  //       # Define an inverse one-to-many relationship.
  //       return $this->belongsTo('User');
    // }

public function user() {
    return $this->belongsTo('User');
}

}