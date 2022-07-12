<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Invoices extends Model {

    protected $table = 'Invoices';

    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date) {
        return $date->format('Y-m-d H:i:s');
    }

    public function setpaymentDueAttribute($value) {
        $this->attributes['payment_due'] = date('Y-m-d', strtotime(strtolower($value)));
    }

    public function getpaymentDueAttribute($value) {
        return date('d-m-Y', strtotime($value));
    }

    public function setrenewalDateAttribute($value) {
        $this->attributes['renewal_date'] = date('Y-m-d', strtotime(strtolower($value)));
    }

    public function getrenewalDateAttribute($value) {
        return date('d-m-Y', strtotime($value));
    }

    public function details() {
        return $this->hasMany('App\Invoicedetails', 'invoice_id', 'id');
    }

}
