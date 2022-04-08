<?php 
$path = base_url('public/img1644471976.jpg');// Modify this part (your_img.png
$type = pathinfo($path, PATHINFO_EXTENSION);
$data9 = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data9);
?>
<div style="width: 1000px;margin: 0 auto;">
	<table width="100%">
		<tr>
			<th style="text-align: left;">
				<img src="<?php echo $base64;?>"  style="height: 50px;" />
			</th>
			<th style="text-align: right;">Invoice #<?=$invoice_unique_id?></th>
		</tr>
		<tr>
			<td style="text-align: left;" colspan="2">
				<p style="margin: 5px 0px"><?=$company_info->company_address?></p>
                <p style="margin: 5px 0px"><?=$company_info->company_owner?></p>
                <p style="margin: 5px 0px"><?=$company_info->company_phone?></p>
			</td>
		</tr>
		<tr>
			<td style="text-align: left;" colspan="2">
				<hr style="margin: 0px;border: 1px solid #ccc;">
			</td>
		</tr>
		<tr>
			<th style="text-align: left;padding-top: 15px;">Billed To:</th>
			<th style="text-align: right; padding-top: 15px;">Invoice #<?=$invoice_unique_id?></th>
		</tr>
		<tr>
			<td style="text-align: left;">
				<p style="margin: 5px 0px"><?=$user_info->first_name.' '.$user_info->last_name?> (<?=$user_info->designation?>)</p>
                <p style="margin: 5px 0px"><?=$user_info->address?></p>
                <p style="margin: 5px 0px"><?=$user_basic_info->email?></p>
                <p style="margin: 5px 0px"><?=$user_info->phone_no?></p>
			</td>
			<td style="text-align: right;"><b>Invoice Date :</b><br><?=date_format(date_create($invoice_info->invoice_date),"d M, Y")?></td>
		</tr>
		<tr>
			<td style="text-align: left;" colspan="2">
				<hr style="margin: 0px;border: 1px solid #ccc;">
			</td>
		</tr>
		<tr>
			<td style="text-align: left;" colspan="2">
				 <h3>Invoice summary</h3>
			</td>
		</tr>
		<tr>
			<td style="text-align: left;" colspan="2">
				 <table width="100%" border="1">
                        <thead>
                            <tr>
                                <th style="width: 70px;">No.</th>
                                <th>Project ID</th>
                                <th>Project Name</th>
                                <th>Price Type</th>
                                <th>Total Hours</th>
                                <th>Amount</th>
                                <th class="text-end" style="width: 120px;">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">01</th>
                                <td><?=$invoice_info->project_unique_id?></td>
                                <td><?=$invoice_info->project_title?></td>
                                <td><?=$invoice_info->price_type?></td>
                                <?php  $total_hours    =  $invoice_info->price_type == 'Fixed' ? 'N/A' : $invoice_info->total_hours; ?>
                                <td><?=$total_hours?></td>
                                <td><?=$invoice_info->total_amount?></td>
                                <td style="text-align: right;">$<?=$invoice_info->total_amount?></td>
                            </tr>
                            
                            


                            <tr>
                                <th scope="row" colspan="6" style="text-align: right;">Sub Total</th>
                                <td style="text-align: right;">$<?=$invoice_info->total_amount?></td>
                            </tr>
                            <tr>
                                <th scope="row" colspan="6" style="text-align: right;">
                                    Discount :</th>
                                <td style="text-align: right;">- $0.00</td>
                            </tr>
                            <tr>
                                <th scope="row" colspan="6" style="text-align: right;">
                                    Tax</th>
                                <td style="text-align: right;">$0.00</td>
                            </tr>
                            <tr>
                                <th scope="row" colspan="6" style="text-align: right;">Total</th>
                                <td style="text-align: right;"><h4 style="margin: 0;">$<?=$invoice_info->total_amount?></h4></td>
                            </tr>
                        </tbody>
                </table>
			</td>
		</tr>
	</table>
</div>