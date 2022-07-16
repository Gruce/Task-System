<?php

namespace App\Models;

use App\Traits\HelperTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Task extends Model
{
    use HasFactory, SoftDeletes, HelperTrait;


    protected $fillable = [
        'project_id', 'title', 'description', 'is_active', 'state',
        'importance', 'start_at', 'end_at' , 'change_at' , 'is_hold'
    ];

    protected $appends = ['state_title'];
    //protected $hidden = ['created_at', 'updated_at', 'delete_at'];



    /****************************************************/
    /******************* RELATIONSHIPS ******************/
    /****************************************************/

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function labels()
    {
        return $this->morphMany(Label::class, 'labelable');
    }



    /****************************************************/
    /******************* END RELATIONSHIPS **************/
    /****************************************************/

    public function comment($body)
    {
        $comment = new Comment;
        $comment->body = $body;
        $comment->user_id = auth()->id();
        $this->comments()->save($comment);
    }

    protected function stateTitle(): Attribute
    {
        return Attribute::make(
            get: function () {
                switch ($this->state) {
                    case 1: return __('ui.tasks'); break;
                    case 2: return __('ui.in_progress'); break;
                    case 3: return __('ui.completed_tasks'); break;

                    default: return __('ui.unknown'); break;
                }
            },
        );
    }
}
