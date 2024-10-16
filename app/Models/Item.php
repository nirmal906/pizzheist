<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Item extends Model{
    use HasFactory;
    # GET SIDE BAR MENU LIST
    public static function getMenuList(){ 
        $query = DB::table('cw_items')
            ->join('cw_sub_items', 'cw_items.prime_items_id', '=', 'cw_sub_items.items_id')
            ->select('cw_items.prime_items_id as id','cw_items.items as item', DB::raw('count(cw_sub_items.items_id) as total'))
            ->where('cw_items.trans_status', 1)
            ->where('cw_sub_items.trans_status', 1)
            ->groupBy('cw_sub_items.items_id') 
            ->get();
        return $query;
    }
    # GET ITEM BAR SUB MENU LIST
    public static function getSubMenuList(){ 
        $query = DB::table('cw_items')
            ->join('cw_sub_items', 'cw_items.prime_items_id', '=', 'cw_sub_items.items_id')
            ->select('*')
            ->where('cw_items.trans_status', 1)
            ->where('cw_sub_items.trans_status', 1)
            ->get();
        $subMenuList  = [];
        foreach($query as $smenu){
            $itemName = $smenu->prime_items_id; 
            $smenu->subitems = str_replace('`pizz`', '🍕', $smenu->subitems);
            if(!isset($subMenuList[$itemName])){
                $subMenuList[$itemName] = [
                    'total' => 1,
                    'subitems' => [$smenu]
                ];
            }else{
                $subMenuList[$itemName]['total']++;
                $subMenuList[$itemName]['subitems'][] = $smenu; 
            }
        }
        return $subMenuList; 
    }
}

