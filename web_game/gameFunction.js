function fetchSkills()
		{	
			if($('#skillTable tr > td:contains("Name")').length > 0){
				$("#skillTable tr").remove();
				$('#showskill').html("Show your skills");
			}else{
				var x=userId;
				$.ajax({                                      
				      url: 'fetchSkills.php',                  //the script to call to get data       
				      data: {prof:profession,lv:lvl},                        //you can insert url argumnets here to pass to api.php
				                                       //for example "id=5&parent=6"
				      dataType: 'json',                //data format      
				      success: function(data)          //on recieve of reply
				      {
				        
				        var result = data;
					var length = result.length/4;
						$('#skillTable > tbody').append("<tr><td>Name</td><td>Damage</td><td>Mana cost</td><td>Type</td></tr>");
						for(var i=0;i<length;i++){
							$('#skillTable > tbody').append("<tr><td>" +result[4*i] + "</td><td>" + result[4*i+1] + "</td><td>" + result[4*i+2] + "</td><td>" + result[4*i+3] + "</td></tr>");
							
						}
					}
				});
				
				$('#showskill').html("Hide your skills");
			} 
		}