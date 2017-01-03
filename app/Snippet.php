<?php

namespace App;



class Snippet extends Model
{
    /**
     * Each snippt can have many (other) snippets/forks
     * that have its original ID as their 'forked_id'
     * @return Collections App\Snippet
     */
    public function forks()
    {
        return $this->hasMany(Snippet::class, 'forked_id');
    }

    /**
     * Each forked snippet belongs to an 'original' snippet
     * whose ID is this snippet's forked_id
     * @return App\Snippet
     */
    public function originalSnippet()
    {
        return $this->belongsTo(Snippet::class, 'forked_id');
    }

    /**
     * If there exists an original snippet then !! will cast it to true
     * otherwise, !! null, will return null
     * @return boolean
     */
    public function isAFork()
    {
        return !! $this->originalSnippet;
    }
}
