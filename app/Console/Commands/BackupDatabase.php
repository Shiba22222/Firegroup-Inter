<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class BackupDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'BackupDatabase';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

//        DB::table('products')->orderBy('id')->chunk(50,function ($products, $i = 1){
//            $filename = 'backup/'.date('d-m-Y H-i-s')." - product".$i.".csv";
//            $handle = fopen($filename, 'w');
//            fputcsv($handle, array('id', 'name', 'status', 'price'));
//            foreach($products as $product){
//                fputcsv($handle, array($product->id, $product->name, $product->status, $product->price));
//            }
//            fclose($handle);
//            $headers = array(
//                'Content-Type' => 'text/csv',
//            );
//            $i++;
//        });
//        $this->info('Backup dữ liệu thành công!');


        $i = 1;
        $id = 0;
        $limit = 50;

        while ($limit == 50){
            $products = DB::table('products')->limit($limit)->get();
            $filename = 'backup/'.date('d-m-Y H-i-s')." - product".$i.".csv";
            $handle = fopen($filename, 'w');
            foreach($products as $product){
                fputcsv($handle, array($product->id, $product->name, $product->status, $product->price));
            }
            $limit = $products->count();
            $i++;
            fclose($handle);
        }

        $this->info('Backup dữ liệu thành công!');
//
//        while ($limit = 50){
//            $filename = 'backup/'.date('d-m-Y H-i-s')." - product".$i.".csv";
//            $handle = fopen($filename, 'w');
//            $products = DB::table('products')->where('id','>', $id)->limit($limit)->get();
//            foreach($products as $product){
//                fputcsv($handle, array($product->id, $product->name, $product->status, $product->price));
//            }
////            $id = $products->id;
//            $limit = $products->count();
//        }
//        fclose($handle);
//
//        $this->info('Backup dữ liệu thành công!');

    }
}
