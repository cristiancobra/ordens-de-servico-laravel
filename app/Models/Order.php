<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // RELATIONSHIPS

    /**
     * Get the customer associated with the order service.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the product associated with the order service.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
    // PUBLIC METHODS

    /**
     *  Convert standard date
     */
    public function convertDate($date) {

        return date( 'Y-m-d', strtotime( $date ) );

    }

    /**
     *  Convert standard date to brazilian format
     */
    public function convertDateToBr($date) {

        return date( 'd/m/yy', strtotime( $date ) );

    }


    /**
     * Change finished field
     * 
     * @param id
     * @return json
     */
    public static function filterOrders( $request ) {

    $customers = Customer::where( 'name', 'LIKE', $request->name )
        ->get();

    $orders = Order::where( function( $query ) use ( $request, $customers ) {
        if( $request->id ) {
            $query->where('id', $request->id);
        }
        // if( $request->customer_id ) {
        //     $query->where( 'customer_id', 'Like', $request->customer_id );
        // }
        if( $request->date_min ) {
            $query->where( 'start_date', '>=', date( 'Y-m-d', strtotime( $request->date_min ) ) );
        }
        if( $request->date_max ) {
            $query->where( 'start_date', '<=', date( 'Y-m-d', strtotime( $request->date_max ) ) );
        }
        if( $customers ) {
            $query->where( function( $query ) use( $customers ) {
                foreach( $customers as $customer ) {
                    $query->orWhere( 'customer_id', 'LIKE', $customer->id );
                }
            });
        }
    })
        ->get();
// dd($orders);
    return $orders;

    }
}

// $query->where(function ($query) use ($attributes) 
// {
//     foreach ($attributes as $key=>value)
//     {
//         //you can use orWhere the first time, doesn't need to be ->where
//         $query->orWhere($key,$value);
//     }
// });

// $items = ['condition1', 'condition2', 'condition3'];
//         $results = App\Model::where(function ($query) use ($items) {
//             foreach($items as $item) {
//                 $query->orWhere('dbfield', 'LIKE', "%$item%");
//             }
//         })
//             ->get();