<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_data extends Model
{
    public function scopeAvailable($query, $avail, $availNow)
    {
      $user = $query->where('availability', '>=', $avail);
      if($availNow==1)
        $user=$user->where('availNow', 1);
      return $user;
    }

    public function scopePayRate($query, $minPay, $maxPay, $withoutPay)
    {
      $queryCopy = clone $query;
      $user = $query->whereBetween('payRate', [$minPay, $maxPay]);
      if($withoutPay == 1)
        $user = $user->union($queryCopy->whereNull('payRate'));
      return $user;
    }

    public function scopeYearsOfExp($query, $maxYears)
    {
      return $query->where('yearsOfExp', '<=', $maxYears);
    }

    public function scopeFindSkills($query, $skills)
    {
      return $query->where(function ($q) use ($skills) {
        foreach ($skills as $skill) {
          $q->orWhere('skills', 'like', "%".$skill."%");
        }
      });
    }
}
