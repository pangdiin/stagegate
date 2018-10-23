<?php

use App\Model\Buildup;
use Illuminate\Database\Seeder;

class BuildupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Buildup::truncate();

        $this->uom();
        $this->sec();
        $this->demographics();
        $this->distribution();
        $this->stages();
        $this->actions();
    }

    public function uom()
    {
    	$measurements = [
            ['code' => 'TIN','name' => 'TIN', 'description' => 'TIN','type' => 'UOM'],
            ['code' => 'CTN','name' => 'CTN', 'description' => 'CTN','type' => 'UOM'],
            ['code' => 'BDL','name' => 'BDL', 'description' => 'BDL','type' => 'UOM'],
            ['code' => 'BAG','name' => 'BAG', 'description' => 'BAG','type' => 'UOM'],
            ['code' => 'PACK','name' => 'PACK', 'description' => 'PACK','type' => 'UOM'],
            ['code' => 'PCS','name' => 'PCS', 'description' => 'PCS','type' => 'UOM'],
            ['code' => 'SACKS','name' => 'SACKS', 'description' => 'SACKS','type' => 'UOM'],
            ['code' => 'JARS','name' => 'JARS', 'description' => 'JARS','type' => 'UOM'],
            ['code' => '1/2 KL','name' => '1/2 KL', 'description' => '1/2 KL','type' => 'UOM'],
            ['code' => '1 kl','name' => '1 kl', 'description' => '1 kl','type' => 'UOM'],
            ['code' => 'BOXES','name' => 'BOXES', 'description' => 'BOXES','type' => 'UOM'],
            ['code' => 'HP','name' => 'HP', 'description' => 'HP','type' => 'UOM'],
            ['code' => 'BUCKT','name' => 'BUCKT', 'description' => 'BUCKT','type' => 'UOM'],
            ['code' => 'BTL','name' => 'BTL', 'description' => 'BTL','type' => 'UOM'],
            ['code' => 'CANISTER','name' => 'CANISTER', 'description' => 'CANISTER','type' => 'UOM'],
    	];

        Buildup::insert($measurements);
    }

    public function sec()
    {
    	$sec = [
            ['code' => 'AB','name' => 'AB', 'description' => 'AB','type' => 'SEC'],
            ['code' => 'C','name' => 'C', 'description' => 'C','type' => 'SEC'],
            ['code' => 'DE','name' => 'DE', 'description' => 'DE','type' => 'SEC'],
    	];

        Buildup::insert($sec);
    }


    public function demographics()
    {
    	$demographics = [
            ['code' => '7 & Below','name' => '7 & Below', 'description' => '7 & Below','type' => 'DEMOGRAPHICS'],
            ['code' => '8-19','name' => '8-19', 'description' => '8-19','type' => 'DEMOGRAPHICS'],
    	];

    	Buildup::insert($demographics);
    }

    public function distribution()
    {
        $distributions = [
            ['code' => 'General Trade','name' => 'General Trade', 'description' => 'General Trade','type' => 'DISTRIBUTION'],
            ['code' => 'Supermarket','name' => 'Supermarket', 'description' => 'Supermarket','type' => 'DISTRIBUTION'],
        ];

        Buildup::insert($distributions);
    }

    public function stages()
    {
        $stages = [
            ['code' => 'ST100' , 'name' => 'ST100', 'description' => 'Stage One Ideation', 'type' => 'STAGES'],
            ['code' => 'ST200' , 'name' => 'ST200', 'description' => 'Stage Two Feasibility', 'type' => 'STAGES'],
            ['code' => 'ST300' , 'name' => 'ST300', 'description' => 'Stage Three Development', 'type' => 'STAGES'],
            ['code' => 'ST400' , 'name' => 'ST400', 'description' => 'Stage Four Test Launch', 'type' => 'STAGES'],
            ['code' => 'ST500' , 'name' => 'ST500', 'description' => 'Stage Five Full Launch', 'type' => 'STAGES'],
            /**
             * Stage 1 Ideation
             */
            ['code' => 'ST101' , 'name' => 'ST101', 'description' => 'Ideas', 'type' => 'STAGES'],
            ['code' => 'ST102' , 'name' => 'ST102', 'description' => 'Scoring', 'type' => 'STAGES'],
            ['code' => 'ST103' , 'name' => 'ST103', 'description' => 'Prioritization', 'type' => 'STAGES'],
            /**
             * Stage 2 feasibility
             */
            ['code' => 'ST201' , 'name' => 'ST201', 'description' => 'Initial Product Design', 'type' => 'STAGES'],
            ['code' => 'ST202' , 'name' => 'ST202', 'description' => 'Consumer and Market Acceptability', 'type' => 'STAGES'],
            ['code' => 'ST203' , 'name' => 'ST203', 'description' => 'Working Product Design', 'type' => 'STAGES'],
            ['code' => 'ST204' , 'name' => 'ST204', 'description' => 'Technical Feasibility', 'type' => 'STAGES'],
            /**
             * Stage 3 development
             */
            ['code' => 'ST301' , 'name' => 'ST301', 'description' => 'Packaging Design', 'type' => 'STAGES'],
            ['code' => 'ST302' , 'name' => 'ST302', 'description' => 'Product Prototype', 'type' => 'STAGES'],
            ['code' => 'ST303' , 'name' => 'ST303', 'description' => 'Consumer and Product Test', 'type' => 'STAGES'],
            ['code' => 'ST304' , 'name' => 'ST304', 'description' => 'Product Stability Test', 'type' => 'STAGES'],
            ['code' => 'ST305' , 'name' => 'ST305', 'description' => 'Physico-Chemical and Microbiological Analysis', 'type' => 'STAGES'],
            ['code' => 'ST306' , 'name' => 'ST306', 'description' => 'New Final Product Concensus Form', 'type' => 'STAGES'],
            ['code' => 'ST307' , 'name' => 'ST307', 'description' => 'Production Readiness', 'type' => 'STAGES'],
            ['code' => 'ST308' , 'name' => 'ST308', 'description' => 'Test Launch Plan', 'type' => 'STAGES'],
            /**
             * Stage 4 Test Launch
             */
            ['code' => 'ST401' , 'name' => 'ST401', 'description' => 'Test Launch Monitoring', 'type' => 'STAGES'],
            ['code' => 'ST402' , 'name' => 'ST402', 'description' => 'Test Launch Evaluation', 'type' => 'STAGES'],
            ['code' => 'ST403' , 'name' => 'ST403', 'description' => 'Production Readiness', 'type' => 'STAGES'],
            ['code' => 'ST404' , 'name' => 'ST404', 'description' => 'Full Launch Plan', 'type' => 'STAGES'],
            /**
             * Stage 5 Full Launch
             */
            ['code' => 'ST501' , 'name' => 'ST501', 'description' => 'Full Launch Monitoring', 'type' => 'STAGES'],
            ['code' => 'ST502' , 'name' => 'ST502', 'description' => 'Full Launch Evaluation', 'type' => 'STAGES'],
        ];

        Buildup::insert($stages);
    }

    public function actions()
    {
        $actions = [
            ['code' => 'XS001' , 'name' => 'XS001', 'description' => 'New', 'type' => 'ACTION'],
            ['code' => 'XS002' , 'name' => 'XS002', 'description' => 'For Assessment', 'type' => 'ACTION'],
            ['code' => 'XS003' , 'name' => 'XS003', 'description' => 'Saved', 'type' => 'ACTION'],
            ['code' => 'XS004' , 'name' => 'XS004', 'description' => 'For Accomplishment', 'type' => 'ACTION'],
            ['code' => 'XS005' , 'name' => 'XS005', 'description' => 'For Approval', 'type' => 'ACTION'],
            ['code' => 'XS006' , 'name' => 'XS006', 'description' => 'Killed', 'type' => 'ACTION'],
            ['code' => 'XS007' , 'name' => 'XS007', 'description' => 'Launched', 'type' => 'ACTION'],
            ['code' => 'XS008' , 'name' => 'XS008', 'description' => 'For Prioritization', 'type' => 'ACTION'],
            ['code' => 'XS009' , 'name' => 'XS009', 'description' => 'Approved', 'type' => 'ACTION'],
        ];

        Buildup::insert($actions);
    }
    
}
