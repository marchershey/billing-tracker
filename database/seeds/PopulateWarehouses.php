<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PopulateWarehouses extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('warehouses')->insert([
            [
                'name' => 'KNOXVILLE, TN',
            ],
            [
                'name' => 'NORTHWOOD, OH',
            ],
            [
                'name' => 'LONDON THRIFT',
            ],
            [
                'name' => 'PADUCAH, KY',
            ],
            [
                'name' => 'CLARKSVILLE, TN',
            ],
            [
                'name' => 'COLUMBUS, OH',
            ],
            [
                'name' => 'WEST INDY',
            ],
            [
                'name' => 'NEW ALBANY, IN',
            ],
            [
                'name' => 'ASHLAND, KY',
            ],
            [
                'name' => 'CHARLESTON, WV',
            ],
            [
                'name' => 'HAZARD, KY',
            ],
            [
                'name' => 'KEEN MOUNTAIN, VA',
            ],
            [
                'name' => 'PARKERSBURG, WV',
            ],
            [
                'name' => 'PORTSMOUTH, KY',
            ],
            [
                'name' => 'PRESTONSBURG, KY',
            ],
            [
                'name' => 'WILLIAMSON, WV',
            ],
            [
                'name' => 'RUSSELL SPRINGS, KY',
            ],
            [
                'name' => 'SEYMOUR, IN',
            ],
            [
                'name' => 'EAST INDY',
            ],
            [
                'name' => 'LAFAYETTE, IN',
            ],
            [
                'name' => 'DANVILLE, KY',
            ],
            [
                'name' => 'TERRE HAUTE, IN',
            ],
            [
                'name' => 'MARION, IN',
            ],
            [
                'name' => 'CAMPBELLSVILLE, KY',
            ],
            [
                'name' => 'GLASSGOW, KY',
            ],
            [
                'name' => 'LONDON, KY',
            ],
            [
                'name' => 'MOREHEAD, KY',
            ],
            [
                'name' => 'MOUNT STERLING, KY',
            ],
            [
                'name' => 'LEXINGTON, KY',
            ],
            [
                'name' => 'LOUISVILLE, KY',
            ],
            [
                'name' => 'BOWLING GREEN, KY',
            ],
            [
                'name' => 'OWENSBORO, KY',
            ],
            [
                'name' => 'ERLANGER, KY',
            ],
            [
                'name' => 'DAYTON, OH',
            ],
            [
                'name' => 'NORTH CINCINNATI, OH',
            ],
            [
                'name' => 'EVANSVILLE, IN',
            ],

            // [
            //     'name' => 'KNOXVILLE FBC',
            //     'address' => '3100 NW Park Dr',
            //     'city' => 'Knoxville',
            //     'state' => 'TN',
            //     'zip' => '37921',
            // ],
            // [
            //     'name' => 'WONDER BREAD THRIFT',
            //     'address' => '3818 Woodville Rd',
            //     'city' => 'Northwood',
            //     'state' => 'OH',
            //     'zip' => '43619',
            // ],
            // [
            //     'name' => 'LONDON THRIFT',
            //     'address' => 'UNKNOWN ADDRESS',
            //     'city' => 'London',
            //     'state' => 'KY',
            //     'zip' => '00000',
            // ],
            // [
            //     'name' => 'PADUCAH FBC',
            //     'address' => '3545 Starlite Dr',
            //     'city' => 'Paducah',
            //     'state' => 'KY',
            //     'zip' => '42003',
            // ],
            // [
            //     'name' => 'CLARKSVILLE FBC',
            //     'address' => '2545 Madison St',
            //     'city' => 'Clarksville',
            //     'state' => 'TN',
            //     'zip' => '37043',
            // ],
            // [
            //     'name' => 'COLUMBUS FBC',
            //     'address' => '1345 W Mound St',
            //     'city' => 'Columbus',
            //     'state' => 'OH',
            //     'zip' => '43223',
            // ],
            // [
            //     'name' => 'WEST INDY FBC',
            //     'address' => '2462 S West St',
            //     'city' => 'Indianapolis',
            //     'state' => 'IN',
            //     'zip' => '46225',
            // ],
            // [
            //     'name' => 'ASHLAND FBC',
            //     'address' => '3300 Winchester Ave',
            //     'city' => 'Ashland',
            //     'state' => 'KY',
            //     'zip' => '41101',
            // ],
            // [
            //     'name' => 'CHARLESTON FBC',
            //     'address' => '7400 MacCorkle Ave SE',
            //     'city' => 'Charleston',
            //     'state' => 'WV',
            //     'zip' => '25304',
            // ],
            // [
            //     'name' => 'PARKERSBURG FBC',
            //     'address' => '1506 Blizzard Dr, Parkersburg, WV 26101',
            //     'city' => 'Parkersburg',
            //     'state' => 'WV',
            //     'zip' => '26101',
            // ],
            // [
            //     'name' => 'PRESTONBURG FBC',
            //     'address' => '2106 KY-321',
            //     'city' => 'Prestonsburg',
            //     'state' => 'KY',
            //     'zip' => '41653',
            // ],
            // [
            //     'name' => 'RUSSELL SPRINGS FBC',
            //     'address' => '218 Powell Rd',
            //     'city' => 'Russell Springs',
            //     'state' => 'KY',
            //     'zip' => '42642',
            // ],
            // [
            //     'name' => 'SEYMOUR FBC',
            //     'address' => '757 A Ave E',
            //     'city' => 'Seymour',
            //     'state' => 'IN',
            //     'zip' => '47274',
            // ],
            // [
            //     'name' => 'EAST INDY FBC',
            //     'address' => '3131 N Franklin Rd # H, Indianapolis, IN 46226',
            //     'city' => 'Indianapolis',
            //     'state' => 'IN',
            //     'zip' => '46226',
            // ],
            // [
            //     'name' => 'MARION FBC',
            //     'address' => '1006 E 22nd St',
            //     'city' => 'Marion',
            //     'state' => 'IN',
            //     'zip' => '46952',
            // ],
            // [
            //     'name' => 'GLASGOW FBC',
            //     'address' => '417 Samson St',
            //     'city' => 'Glasgow',
            //     'state' => 'KY',
            //     'zip' => '42141',
            // ],
            // [
            //     'name' => 'GLASGOW FBC',
            //     'address' => '417 Samson St',
            //     'city' => 'Glasgow',
            //     'state' => 'KY',
            //     'zip' => '42141',
            // ],
        ]);
    }
}
