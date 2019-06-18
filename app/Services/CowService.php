<?php

namespace App\Services;

class CowService
{    
    public function __construct() {
        //TODO
    }
    
    public function getSummary($order = 'today')
    {
        return  \DB::select(
                    'select cows.id, 
                        cows.name,
                        ifnull(today.output, 0) today,
                        ifnull(this_month.output, 0) month,
                        ifnull(this_year.output, 0) year
                    from cows
                    left join 
                            (select cow_id, sum(output) output from milk_output
                            where date(date) =  curdate()
                            group by cow_id) as today on today.cow_id = cows.id
                    left join 
                            (select cow_id, sum(output) as output from milk_output
                            where month(date) = month(now())
                            group by cow_id) as this_month on this_month.cow_id = cows.id
                    left join 
                            (select cow_id, sum(output) output from milk_output
                            where year(date) = year(now())
                            group by cow_id) as this_year on this_year.cow_id = cows.id
                            order by ' .$order. ' desc, id;'
                );
    }
    
    public function getDailyOutputs($date, $cow_id)
    {
        return \DB::select(
                'SELECT * 
                    FROM milk_output output
                    inner join cows on cows.id = output.cow_id
                where cow_id = ' .$cow_id. 
                ' and month(date) = ' .date('m', strtotime($date)).
                ' order by date'
                );
    }
}

