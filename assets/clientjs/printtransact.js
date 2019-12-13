$(document).ready(function(){




    function get()
    {

      console.log('asd');
        $.ajax({
            url : global.settings.url +'/MainController/printtransact',
            type : 'POST',
            dataType : 'json',
            success : function(data){
    

    

           var num = 1;
            var html_print;
            for(i=0;i<data.query.length;i++)
            {
                num = 1 + i;
                html_print += "<tr>";
                html_print += "<td>"+num+"</td>";
                html_print += "<td>"+data.query[i].trans_fullname+"</td>";
                html_print += "<td>"+data.query[i].trans_or+"</td>";
                html_print += "<td>"+data.query[i].trans_amount+"</td>";
                html_print += "<td>"+data.query[i].trans_date+"</td>";
                html_print +="</tr>";
            }

            $('#dft').text("Date From: "+data.sort.conDateFrom+" Date To: "+data.sort.conDateTo);
            
            $('#user').text("User: "+data.user);

                
            $('#thebody').append(html_print);

            window.print();
            
            },
            error : function(xhr){
             
            }
        
          });
     }
   get();

  

});