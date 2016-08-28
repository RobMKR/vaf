<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'type'];
    
    public function picture(){
        return $this->hasOne('App\Picture');
    }
    
    public function getByType(){
        $data['rooms'] = $this->where('type', '=', 'room')->get();
        $data['piece'] = $this->where('type', '=', 'piece')->get();
        foreach($data['rooms'] as $_rooms){
            $return['Rooms Furniture'][$_rooms->id] =$_rooms->name;
        }
        foreach($data['piece'] as $_piece){
            $return['Pieces Furniture'][$_piece->id] = $_piece->name;
        }
        return $return;
    }
    
}
