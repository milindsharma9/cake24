<?php
print_r($this->passedArgs);
 $this->Paginator->url($this->passedArgs);
						  
?>
<table style="width:80%"id="content">
<thead>
<tr>
<th style="width:50%;text-align:left">
<?php  echo $this->Paginator->sort('id','ID');?>
</th>
<th style="width:50%;text-align:left">
Title
</th>
</tr>
</thead>
<tbody>
<?php
if(is_array($uploads) && count($uploads)>0){

	
	foreach($uploads as $k){
	
	echo("<tr>");
	echo("<td style=\"width:50%;text-align:left\">");
	echo($k['Upload']['id']);
	echo("</td>");
	echo("<td style=\"width:50%\">");
	echo($k['Upload']['title']);
	echo("</td>");
	
	echo("</tr>");
	
	}


}
?>
<tr>
<td>
<?php 

if($this->Paginator->hasPrev()){
	echo($this->Paginator->prev("Previous")); 
} 
?>
&nbsp; <?php echo $this->Paginator->numbers();?>&nbsp;
<?php 
if($this->Paginator->hasNext()){
echo($this->Paginator->next("Next")); 

}
?>
</td>
<td>
<?php
/*echo $this->Paginator->counter(
'Page {:page} of {:pages}, showing {:current} records out of
{:count} total, starting on record {:start}, ending on {:end}'
);*/

echo $this->Paginator->counter(array(
'separator' => ' of a total of '
));
?>
</td>
</tr>
</tbody>
</table>
