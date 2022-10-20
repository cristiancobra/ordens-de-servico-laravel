<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'address',
        'address_number',
    ];

    /**
     * format cpf number to display in view
     * 
     * @param string
     */
    public function formatCpf($cpf) {
        $cpf = preg_replace("/[^0-9]/", "", $cpf);

        $cpfGroup1 = substr($cpf,0,3);
        $cpfGroup2 = substr($cpf,3,3);
        $cpfGroup3 = substr($cpf,6,3);
        $cpfGroup4 = substr($cpf,-2);

        $cpfFormatted = $cpfGroup1.".".$cpfGroup2.".".$cpfGroup3."-".$cpfGroup4;

        return $cpfFormatted;
    }

    public static function findIdOrCreate( $validated ) {

        $customer = Customer::where('cpf', $validated['cpf'])
            ->first();

        if( !$customer ) {
            $customer = new Customer;
            $customer->name = $validated['name'];
            $customer->cpf = $validated['cpf'];
            $customer->save();
        }
        
        return $customer->id;
    }

    public function convertDateToBr($date) {

        return date( 'd/m/yy', strtotime( $date ) );

    }
}