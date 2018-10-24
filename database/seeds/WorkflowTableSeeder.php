<?php

use App\Model\Buildup;
use App\Model\Workflow;
use App\Model\WorkflowNextOwner;
use App\Model\WorkflowOwner;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class WorkflowTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->workflow();
    }

    public function workflow()
    {
    	Workflow::truncate();
    	WorkflowOwner::truncate();
    	WorkflowNextOwner::truncate();

    	/**
    	 * Stages
    	 */
    	$ST100 = $this->getBuildup('ST100');
    	$ST200 = $this->getBuildup('ST200');
    	$ST300 = $this->getBuildup('ST300');
    	$ST400 = $this->getBuildup('ST400');
    	$ST500 = $this->getBuildup('ST500');

    	$ST101 = $this->getBuildup('ST101');
    	$ST102 = $this->getBuildup('ST102');
    	$ST103 = $this->getBuildup('ST103');

    	$ST201 = $this->getBuildup('ST201');
    	$ST202 = $this->getBuildup('ST202');
    	$ST203 = $this->getBuildup('ST203');
    	$ST204 = $this->getBuildup('ST204');

    	$ST301 = $this->getBuildup('ST301');
    	$ST302 = $this->getBuildup('ST302');
    	$ST303 = $this->getBuildup('ST303');
    	$ST304 = $this->getBuildup('ST304');
    	$ST305 = $this->getBuildup('ST305');
    	$ST306 = $this->getBuildup('ST306');
    	$ST307 = $this->getBuildup('ST307');
    	$ST308 = $this->getBuildup('ST308');

    	$ST401 = $this->getBuildup('ST401');
    	$ST402 = $this->getBuildup('ST402');
    	$ST403 = $this->getBuildup('ST403');
    	$ST404 = $this->getBuildup('ST404');

    	$ST501 = $this->getBuildup('ST501');
    	$ST502 = $this->getBuildup('ST502');

    	/**
    	 * Actions
    	 */
    	$XS001 = $this->getBuildup('XS001');
    	$XS002 = $this->getBuildup('XS002');
    	$XS003 = $this->getBuildup('XS003');
    	$XS004 = $this->getBuildup('XS004');
    	$XS005 = $this->getBuildup('XS005');
    	$XS006 = $this->getBuildup('XS006');
    	$XS007 = $this->getBuildup('XS007');
    	$XS008 = $this->getBuildup('XS008');
    	$XS009 = $this->getBuildup('XS009');

    	$productAssistant = $this->getRole('product-assistant');
    	$productManager = $this->getRole('product-manager');
    	$categoryManager = $this->getRole('category-manager');
    	$groupHead = $this->getRole('group-head');
    	$vpFormktg = $this->getRole('vp-for-mktg');
    	$svpFormktg = $this->getRole('svp-for-mktg');
    	$rdEncoder = $this->getRole('r-d-encoder');
    	$rdManager = $this->getRole('r-d-manager');
    	$ctcAdmin = $this->getRole('ctc-admin');
    	$vpOperations = $this->getRole('vp-operations');
    	$vpSales = $this->getRole('vp-sales');
    	$president = $this->getRole('president');
    	$aomPlant = $this->getRole('aom-plant');
    	$satelliteHead = $this->getRole('satellite-head');

    	$idea = Workflow::create(['sort_order' => 1, 'stage_id' => $ST100, 'substage_id' => $ST101, 'action_id' => $XS001, 'nextstage_id' => $ST100, 'nextsubstage_id' => $ST102, 'nextaction_id' => $XS004]);
    	$idea->currentRoleOwner()->create(['user_role' => $productAssistant]);
    	$idea->nextRoleOwner()->create(['user_role' => $productAssistant]);
    	/**/
    	$scoring1 = Workflow::create(['sort_order' => 2, 'stage_id' => $ST100, 'substage_id' => $ST102, 'action_id' => $XS004, 'nextstage_id' => $ST100, 'nextsubstage_id' => $ST102, 'nextaction_id' => $XS005]);
    	$scoring1->currentRoleOwner()->create(['user_role' => $productAssistant]);
    	$scoring1->nextRoleOwner()->create(['user_role' => $productAssistant]);
    	/**/
    	$scoring2 = Workflow::create(['sort_order' => 3, 'stage_id' => $ST100, 'substage_id' => $ST102, 'action_id' => $XS005, 'nextstage_id' => $ST100, 'nextsubstage_id' => $ST102, 'nextaction_id' => $XS005]);
    	$scoring2->currentRoleOwner()->create(['user_role' => $productAssistant]);
    	$scoring2->nextRoleOwner()->create(['user_role' => $productManager]);
    	/**/
    	$scoring3 = Workflow::create(['sort_order' => 4, 'stage_id' => $ST100, 'substage_id' => $ST102, 'action_id' => $XS005, 'nextstage_id' => $ST100, 'nextsubstage_id' => $ST102, 'nextaction_id' => $XS005]);
    	$scoring3->currentRoleOwner()->create(['user_role' => $productAssistant]);
    	$scoring3->nextRoleOwner()->create(['user_role' => $productManager]);
    	/**/
    	$scoring4 = Workflow::create(['sort_order' => 5, 'stage_id' => $ST100, 'substage_id' => $ST102, 'action_id' => $XS005, 'nextstage_id' => $ST100, 'nextsubstage_id' => $ST102, 'nextaction_id' => $XS005]);
    	$scoring4->currentRoleOwner()->create(['user_role' => $productManager]);
    	$scoring4->nextRoleOwner()->create(['user_role' => $categoryManager]);
    	/**/
    	$scoring5 = Workflow::create(['sort_order' => 6, 'stage_id' => $ST100, 'substage_id' => $ST102, 'action_id' => $XS005, 'nextstage_id' => $ST100, 'nextsubstage_id' => $ST103, 'nextaction_id' => $XS008]);
    	$scoring5->currentRoleOwner()->create(['user_role' => $categoryManager]);
    	$scoring5->nextRoleOwner()->create(['user_role' => $productAssistant]);

    	/**/
    	$prioritization1 = Workflow::create(['sort_order' => 7, 'stage_id' => $ST100, 'substage_id' => $ST103, 'action_id' => $XS008, 'nextstage_id' => $ST100, 'nextsubstage_id' => $ST103, 'nextaction_id' => $XS005]);
    	$prioritization1->currentRoleOwner()->create(['user_role' => $productAssistant]);
    	$prioritization1->nextRoleOwner()->create(['user_role' => $productManager]);
    	/**/
    	$prioritization2 = Workflow::create(['sort_order' => 8, 'stage_id' => $ST100, 'substage_id' => $ST103, 'action_id' => $XS005, 'nextstage_id' => $ST100, 'nextsubstage_id' => $ST103, 'nextaction_id' => $XS005]);
    	$prioritization2->currentRoleOwner()->create(['user_role' => $productManager]);
    	$prioritization2->nextRoleOwner()->create(['user_role' => $categoryManager]);
    	/**/
    	$prioritization3 = Workflow::create(['sort_order' => 9, 'stage_id' => $ST100, 'substage_id' => $ST103, 'action_id' => $XS005, 'nextstage_id' => $ST100, 'nextsubstage_id' => $ST103, 'nextaction_id' => $XS005]);
    	$prioritization3->currentRoleOwner()->create(['user_role' => $categoryManager]);
    	$prioritization3->nextRoleOwner()->create(['user_role' => $groupHead]);
    	/**/
    	$prioritization4 = Workflow::create(['sort_order' => 10, 'stage_id' => $ST100, 'substage_id' => $ST103, 'action_id' => $XS005, 'nextstage_id' => $ST100, 'nextsubstage_id' => $ST103, 'nextaction_id' => $XS005]);
    	$prioritization4->currentRoleOwner()->create(['user_role' => $groupHead]);
    	$prioritization4->nextRoleOwner()->create(['user_role' => $vpFormktg]);
    	$prioritization4->nextRoleOwner()->create(['user_role' => $svpFormktg]);
    	/**/
    	$prioritization5 = Workflow::create(['sort_order' => 11, 'stage_id' => $ST100, 'substage_id' => $ST103, 'action_id' => $XS005, 'nextstage_id' => $ST100, 'nextsubstage_id' => $ST103, 'nextaction_id' => $XS005]);
    	$prioritization5->currentRoleOwner()->create(['user_role' => $vpFormktg]);
    	$prioritization5->currentRoleOwner()->create(['user_role' => $svpFormktg]);
    	$prioritization5->nextRoleOwner()->create(['user_role' => $rdManager]);
    	/**/
    	$prioritization6 = Workflow::create(['sort_order' => 12, 'stage_id' => $ST100, 'substage_id' => $ST103, 'action_id' => $XS005, 'nextstage_id' => $ST100, 'nextsubstage_id' => $ST103, 'nextaction_id' => $XS005]);
    	$prioritization6->currentRoleOwner()->create(['user_role' => $rdManager]);
    	$prioritization6->nextRoleOwner()->create(['user_role' => $ctcAdmin]);
    	/**/
    	$prioritization7 = Workflow::create(['sort_order' => 13, 'stage_id' => $ST100, 'substage_id' => $ST103, 'action_id' => $XS005, 'nextstage_id' => $ST100, 'nextsubstage_id' => $ST103, 'nextaction_id' => $XS005]);
    	$prioritization7->currentRoleOwner()->create(['user_role' => $ctcAdmin]);
    	$prioritization7->nextRoleOwner()->create(['user_role' => $vpOperations]);
    	/**/
    	$prioritization8 = Workflow::create(['sort_order' => 14, 'stage_id' => $ST100, 'substage_id' => $ST103, 'action_id' => $XS005, 'nextstage_id' => $ST100, 'nextsubstage_id' => $ST103, 'nextaction_id' => $XS005]);
    	$prioritization8->currentRoleOwner()->create(['user_role' => $vpOperations]);
    	$prioritization8->nextRoleOwner()->create(['user_role' => $president]);
    	/**/
    	$prioritization9 = Workflow::create(['sort_order' => 15, 'stage_id' => $ST100, 'substage_id' => $ST103, 'action_id' => $XS005, 'nextstage_id' => $ST200, 'nextsubstage_id' => $ST201, 'nextaction_id' => $XS002]);
    	$prioritization9->currentRoleOwner()->create(['user_role' => $president]);
    	$prioritization9->nextRoleOwner()->create(['user_role' => $productAssistant]);
    }

    public function getBuildup($value)
    {
    	$buildup = Buildup::select('id')->whereCode($value)->first();

        return $buildup->id;
    }

    public function getRole($value)
    {
    	$role = Role::select('name')->whereName($value)->first();

        return $role->name;
    }
}
