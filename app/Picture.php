<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image; 

class Picture extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pictures';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'source', 'description', 'category_id'];
    
    public function category(){
        return $this->belongsTo('App\Category');
    }
    
    
    /**
     * Image Creating Function From Base64.
     *
     * @param file filedata
     * @param width image width
     * @param height image height
    */
    public function createImg($file, $width, $height){
        // Creating Image From Base64 
        $file = str_replace('data:image/png;base64,', '', $file);
        $img = str_replace(' ', '+', $file);
        $data = base64_decode($img);

        // Picking up image name and path
        $png_url = "pic-".time().".jpg";
        $path = public_path().'/img/gallery/' . $png_url;

        // Creating File
        $success = file_put_contents($path, $data);

        // Resizing File to save HDD space
        $returnData = public_path().'/img/gallery/' . $png_url;
        $image = Image::make(file_get_contents($returnData));
        $image = $image->resize($width,$height)->save($path);
        
        return '/img/gallery/' . $png_url;
    }
}
