<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>CV Europass Upload</title>
</head>
<body  style="background-image: url(./images/bg_win5.jpg); background-repeat: repeat-x;">
<font face="Arial Narrow">
<center><img src="./images/cv_top_banner1.jpg" alt="Europass CV" /></center><br/>
<HR size="2"/><br/>
	<form enctype="multipart/form-data" action="upload.php" method="POST">
		<input type="hidden" name="MAX_FILE_SIZE" value="1024000" /><b>Select file: </b>
		<input name="uploadedxml" type="file"/>
		<input type="hidden" name="upload" value="sql" />
		<input type="submit" value="Upload to DB" style="width: 110px;"/>
	</form>
	<br>
	<form enctype="multipart/form-data" action="upload.php" method="POST">
		<input type="hidden" name="MAX_FILE_SIZE" value="1024000" /><b>Select file: </b>
		<input name="uploadedxml" type="file"/>
		<input type="hidden" name="upload" value="form" />
		<input type="submit" value="Upload to Form" style="width: 110px;"/>
	</form>
<p><img alt="note" src="./images/small_idea.gif"/><b>Note:</b> You can upload only XML <img alt="XML" src="./images/ico_xml.gif" /> or PDF+XML <img alt="PDF+XML" src="./images/ico_pdf.gif"/>
generated by the <a href="http://europass.cedefop.europa.eu">Europass CV Editor</a>
</p>
</font>
</body>
</html>