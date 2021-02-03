<?php

use Illuminate\Database\Seeder;
use App\Room;
class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::create(['number'=>507,'name'=>'507','type'=>0,'capacity'=>60,'status'=>true,]);
        Room::create(['number'=>505,'name'=>'505','type'=>0,'capacity'=>60,'status'=>true,]);
        Room::create(['number'=>508,'name'=>'508','type'=>0,'capacity'=>60,'status'=>true,]);
        Room::create(['number'=>601,'name'=>'ecktl2','type'=>2,'capacity'=>30,'status'=>true,]);
        Room::create(['number'=>301,'name'=>'medcl','type'=>4,'capacity'=>30,'status'=>true,]);
        Room::create(['number'=>608,'name'=>'608','type'=>0,'capacity'=>60,'status'=>true,]);
        Room::create(['number'=>503,'name'=>'503','type'=>0,'capacity'=>60,'status'=>true,]);
        Room::create(['number'=>704,'name'=>'cl4','type'=>1,'capacity'=>30,'status'=>true,]);
        Room::create(['number'=>408,'name'=>'408','type'=>0,'capacity'=>60,'status'=>true,]);
        Room::create(['number'=>205,'name'=>'205','type'=>0,'capacity'=>60,'status'=>true,]);
        Room::create(['number'=>707,'name'=>'707','type'=>0,'capacity'=>60,'status'=>true,]);
        Room::create(['number'=>407,'name'=>'407','type'=>0,'capacity'=>60,'status'=>true,]);
        Room::create(['number'=>504,'name'=>'504','type'=>0,'capacity'=>60,'status'=>true,]);
        Room::create(['number'=>708,'name'=>'708','type'=>0,'capacity'=>60,'status'=>true,]);
        Room::create(['number'=>607,'name'=>'607','type'=>0,'capacity'=>60,'status'=>true,]);
        Room::create(['number'=>604,'name'=>'cl2','type'=>1,'capacity'=>30,'status'=>true,]);
        Room::create(['number'=>603,'name'=>'cl1','type'=>1,'capacity'=>30,'status'=>true,]);
        Room::create(['number'=>605,'name'=>'cl3','type'=>1,'capacity'=>30,'status'=>true,]);
        Room::create(['number'=>703,'name'=>'cl5','type'=>1,'capacity'=>30,'status'=>true,]);
        Room::create(['number'=>103,'name'=>'comml','type'=>3,'capacity'=>30,'status'=>true,]);
        Room::create(['number'=>705,'name'=>'phyl','type'=>5,'capacity'=>30,'status'=>true,]);



    }
}
//				created_at	updated_at
