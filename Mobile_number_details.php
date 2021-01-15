<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<?php
if(isset($_POST['submit']))
{
    $mobile=$_POST['mobile'];
    $countryCode=$_POST['country_code'];
    $url="http://apilayer.net/api/validate?access_key=aedd9407d2d45944cb2c48bb001bd602&number=$countryCode+$mobile";
    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $result=curl_exec($ch);
    //echo $result;
    curl_close($ch);
    $result=json_decode($result,true);
    if($result['valid']==1)
    {
      echo "Country Name: ".$result['country_name'].'<br/>';
      echo "Location: ".$result['location'].'<br/>';
      echo "Carrier: ".$result['carrier'].'<br/>';
    
    }
    else
    {
      echo "No data found";
    }
}
?>
<form  style="padding-top: 50px; margin: 0 auto; width:80% " method="post">
<div class="form-group row">
   <div class="col-sm-10">
    <label for="searchnummber"  class="col-sm-2 col-form-label">Enter Country Code</label>
    <input type="text" name="country_code" class="form-control" id="" placeholder="Country Code" required><br>
   </div>

   <div class="col-sm-10">
      <label for="searchnummber"  class="col-sm-2 col-form-label">Enter Phone Number</label>
      <input type="text" name="mobile" class="form-control" id="" placeholder="Phone Number" required>
      <br>
   </div>
      <button type="submit" name="submit" class="btn btn-secondary btn-lg btn-block col-sm-10">Search</button>
   </div>

    <!--<input type="text" name="mobile" placeholder="Enter mobile number with country code" required style="width:300;"/>
    <input type="submit" name="submit">-->
</form>