<?php
// use Carbon\Carbon;

class BaseModel extends Eloquent {

    public function getCreatedAtAttribute($attr) {        
        return Carbon::parse($attr)->format('d/m/Y - h:ia'); //Change the format to whichever you desire
    }

        public function getCompletedAtTimeAttribute($completedtime) {        
        return Carbon::parse($completedtime)->format('d/m/Y - h:ia'); //Change the format to whichever you desire
    }
}