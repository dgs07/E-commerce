<!DOCTYPE html>
<html>
<head>
 <script
src="C:\xampp\htdocs\webdoc\Mini-Project\Admin\aj.js">
table, td, th {
border: 2px;
margin:2px;
}
    </script>
</head>
<body>
 <button onclick="loadStudents()">Load 
Students</button>
 <div id="studentData"></div>
 <script>
 function loadStudents() {
 $.ajax({
 type: "GET",
 url: "students.xml",
 dataType: "xml",
 success: function(xml) {
 var data = "<table><tr><th>Name</th><th>Email</th><th>ID</th><th>Mobile</th></tr>";
 $(xml).find('student').each(function() {
 var name = $(this).find('name').text();
 var email = $(this).find('mail').text();
 var id = $(this).find('id').text();
 var mobile = 
$(this).find('mobile').text();
 data += "<tr><td>" + name + "</td><td>" + 
email + "</td><td>" + id + "</td><td>" + mobile + "</td></tr>";
 });
 data += "</table>";
 $("#studentData").html(data);
 },
 error: function(xhr, status, error) {
 console.error(xhr.responseText);
 }
 });
 }
 </script>
</body>
</html>
