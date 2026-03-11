<?php ob_start(); ?>
<link rel="stylesheet" href="/include/components/customer-goal/CustomerGoalStyle.css">
<div class="customer-goal-row">
    <div class="top-customer">
        <h3 class="top-title">TOP CUSTOMER</h3>
        <div class="top-player">
            <img src="https://mc-heads.net/body/ItzRepsac_" class="top-skin">
            <div class="top-info">
                <strong>ItzRepsac_</strong>
                <span>Paid the most this week.</span>
            </div>
        </div>
    </div>
    <div class="community-goal">
        <h3 class="goal-title">COMMUNITY GOAL</h3>
        <div class="goal-percent">77% completed</div>
        <div class="goal-bar">
            <div class="goal-progress" style="width:77%"></div>
        </div>
    </div>
</div>
<?php return ob_get_clean(); ?>