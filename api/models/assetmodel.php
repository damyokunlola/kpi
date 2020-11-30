<?php
include_once '../../models/basemodel.php';

class AssetModel extends BaseModel
{
    public function registerAsset($assetid, $name, $date, $description, $rate, $cost, $usefullife, $depreciationtype, $depreciationperiod, $amotize, $assetaccount, $cashaccount, $expenseaccount, $amotizationperiod, $status, $tlog)
    {
        return $this->create("assets", "`asset_id`,`name`, `commencement_date`,`description`, `depreciation_type`, `depreciation_rate`, `depreciation_period`, `useful_life`, `current_value`, `asset_cost`, `asset_account`, `cash_account`, `expense_account`, `amotized`, `amotized_period`, `status`,`tlog`", "'$assetid','$name', '$date','$description','$depreciationtype','$rate','$depreciationperiod','$usefullife','$cost','$cost','$assetaccount','$cashaccount','$expenseaccount','$amotize','$amotizationperiod', '$status', '$tlog'");
    }

    public function getAsset($assetid)
    {
        return $this->findOne("assets", "id='$assetid'");
    }

    public function getOpen()
    {
        return $this->findAllWhere("assets", "status='OPEN'", "*,(SELECT date FROM asset_depreciation WHERE assets.asset_id = asset_depreciation.asset_id ORDER BY id DESC LIMIT 1) as lastdepreciation");
    }

    public function getAll()
    {
        return $this->findAll("assets", "*,(SELECT date FROM asset_depreciation WHERE assets.asset_id = asset_depreciation.asset_id ORDER BY id DESC LIMIT 1) as lastdepreciation");
    }

    public function getAssetDepreciation($assetid)
    {
        return $this->findAllWhere("asset_depreciation", "asset_id='$assetid'");
    }

    public function getAssetReport($date, $location)
    {
        return $this->exec_query("SELECT DISTINCT accountnumber, accountname, (SELECT SUM(debit) - SUM(credit) FROM tdetail B WHERE A.accountnumber = B.accountnumber) as balance FROM tdetail A WHERE accountname IN (SELECT description FROM glaccount WHERE accounttype LIKE '%ASSET%') AND transactiondate <= '$date' AND status = 'POSTED' AND location LIKE '$location' GROUP BY accountnumber ORDER BY accountname ASC ");
    }

    public function doGLTransaction($account, $date, $credit, $debit, $asset, $desc)
    {
        $acc = explode("|", $account);
        $accountnumber = trim($acc[0]);
        $accountname = trim($acc[1]);
        $cd = $credit > 0 ? "cr" : "db";
        $ref = $cd . "|asset|depreciation" . $asset . "|" . $date . "|" . uniqid(rand());
        $location = $_SESSION["location"];
        $username = "automated_transaction";
        $hfield = "-";
        $tlog = "automated_transaction" . " " . date("D, d M Y  H:m:s");
        $status = "POSTED";
        $whicacc = "GLACCOUNT";
        $tag = "WITHDRAWAL";
        $bal = 2;

        $this->create("tdetail", "`accountname`, `accountnumber`, `accounttag`, `transactiondate`, `description`, `credit`, `debit`, `balance`, `reference`, `status`, `whichaccount`, `location`, `username`, `hfield`, `tlog`", "'$accountname', '$accountnumber', '$tag', '$date', '$desc', '$credit', '$debit','$bal', '$ref', '$status', '$whicacc', '$location', '$username', '$hfield', '$tlog'");
    }

    public function calculateDepreciation($type, $rate, $usefulife, $amount, $cycle, $currentvalue)
    {
        $depreciationamount = 0;

        if ($type == "STRAIGHT LINE METHOD") {
            $depreciationamount = ($rate / 100) * (1 / $usefulife) * $amount;
        } else {
            $depreciationamount = ($rate / 100) * (1 / $usefulife) * $currentvalue;
        }

        return $cycle == "MONTHLY" ? round(($depreciationamount / 12), 2) : round($depreciationamount, 2);
    }

    public function updatestatus($assetid)
    {
        $this->update("assets", "`status` = 'CLOSED'", "`asset_id`='$assetid'");
    }

    public function updatevalue($currentvalue, $assetid)
    {
        $this->update("assets", "`current_value` = '$currentvalue'", "`asset_id`='$assetid'");
    }

    public function registerDepreciation($assetid, $amount, $duedate)
    {
        $this->create("asset_depreciation", "`asset_id`,`amount`,`date`", "'$assetid', '$amount', '$duedate'");
    }

    public function updateAsset($name, $description, $rate, $usefullife, $status, $expenseaccount, $id)
    {
        return $this->update("assets", "`name`='$name',`description`='$description',`depreciation_rate`='$rate',`useful_life`='$usefullife',`status`='$status',`expense_account`='$expenseaccount'", "`id`='$id'");
    }

    public function GLTransaction($account, $date, $credit, $debit, $asset)
    {
        $acc = explode("|", $account);

        $accountname = trim($acc[1]);
        $accountnumber = trim($acc[0]);
        $tag = "WITHDRAWAL";
        $date = $date;
        $desc = $asset . "  - asset cost on $date";
        $credit = $credit;
        $debit = $debit;
        $bal = 2;
        $cd = $credit > 0 ? "cr" : "db";
        $ref = $cd . "|asset|" . $asset . "|" . $date . "|" . uniqid(rand());
        $status = "POSTED";
        $whicacc = "GLACCOUNT";
        $location = $_SESSION["location"];
        $username = $_SESSION["username"];
        $hfield = "-";
        $tlog = $_SESSION["username"] . " " . date("D, d M Y  H:m:s");

        $this->create("tdetail", "`accountname`, `accountnumber`, `accounttag`, `transactiondate`, `description`, `credit`, `debit`, `balance`, `reference`, `status`, `whichaccount`, `location`, `username`, `hfield`, `tlog`", "'$accountname', '$accountnumber', '$tag', '$date', '$desc', '$credit', '$debit','$bal', '$ref', '$status', '$whicacc', '$location', '$username', '$hfield', '$tlog'");
    }
}
