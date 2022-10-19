<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<tr><td>Dear {{$name}}!<br></td></tr>
	<tr><td> &nbsp;<br></td></tr>
	<tr><td>Please click on the below link to confirm your Vendor Account :-<br></td></tr>
	<tr><td><a href="{{url('vendor/confirm/'.$code)}}">{{url('vendor/confirm/'.$code)}}</a><br></td></tr>
	<tr><td>&bnsp;</td></tr>
	<tr><td>Thanks & Regards,<br></td></tr>
	<tr><td>PCs & Parts</td></tr>

</body>
</html>