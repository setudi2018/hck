<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'department_id', 'department_id', 'name', 'password', 'last_name', 'email', 'role', 'profile_photo', 'gender', 'age', 'dob', 'address', 'city', 'state', 'country', 'time_zone', 'phone', 'pincode', 'mobile', 'active', 'file', 'date_of_today', 'post_applied', 'reference', 'department', 'notice_period', 'nationality', 'blood_group', 'expected_ctc', 'current_ctc', 'res_address', 'per_address', 'marital_status'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setFileAttribute($file) {
        $source_path = upload_tmp_path($file);
        if ($file && file_exists($source_path)) 
        {
            upload_move($file,'interviewer');
            @unlink($source_path);
            $this->deleteFile();
        }
        $this->attributes['file'] = $file;
        if ($file == '') 
        {
            $this->deleteFile();
            $this->attributes['file'] = "";
        }
    }
    public function file_url($type='original') 
    {
        if (!empty($this->file))
            return upload_url($this->file,'interviewer',$type);
        elseif (!empty($this->file) && file_exists(tmp_path($this->file)))
            return tmp_url($this->$file);
        else
            return asset('images/default-interviewer.jpg');
    }
    public function deleteFile() 
    {
        upload_delete($this->file,'interviewer',array('original','thumb','medium'));
    }
}
