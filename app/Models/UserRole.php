<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Endroid\QrCode\QrCode;
class UserRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'role',
        'company_name',
        'street',
        'city',
        'country',
        'zip'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        /**
         * User::class related model
         * user_id ownerKey
         * id relation
         */
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i:s');
    }

    public function businessRoleList(){
        $list = UserRole::where('role',1)->get();
        return $list;
    }

    public function generateQR(){

        $qrCode = new QrCode('Life is too short to be generating QR codes');
        header('Content-Type: '.$qrCode->getContentType());
        //echo $qrCode->writeString();
        //$qrCode->writeFile(__DIR__.'/qrcode.png');
        return $dataUri = $qrCode->writeDataUri();

    }
}
