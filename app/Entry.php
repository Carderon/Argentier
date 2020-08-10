<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $fillable = ["label", "amount", "priority", "details"];

    protected $casts = [
        "is_in" => "boolean",
        "details" => "json"
    ];

    protected $appends = [
        "humanized_priority"
    ];

    public function account() {
        return $this->belongsTo("App\Account");
    }

    public function category() {
        return $this->belongsTo("App\Category");
    }

    public function getHumanizedPriorityAttribute() {
        if($this->priority == 0) {
            return "Faible";
        }

        if($this->priority == 1) {
            return "Moyenne";
        }

        if($this->priority == 2) {
            return "Forte";
        }

        return "Priorité";
    }
}
