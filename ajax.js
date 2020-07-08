
	$(document).ready(function() {
	
      $("#course").change(function() {
        var course_id = $(this).val();
       
          $.ajax({
            url:"getsem.php",
            data:{c_id:course_id},
            type:'POST',
            success:function(response) {
				var r= $.trim(response);
				$("#semester").html(r);
				/*if(response!=undefined)
				{
					callback(response);
              var length = response.length;
			  var i;
			  for(i=0;i<2;i++)
			  {	var r= $.trim(response);
				  var sid = r[i]['sid'];
				  var snm = r[i]['name'];
              $("#semester").append("<option value='"+sid+"'>"+snm+"</option>");
			  }
				}*/
            }
          });
       
      });
	});
	  

   