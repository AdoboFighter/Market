$(document).ready(function(){




    function get()
    {

      console.log('asd');
        $.ajax({
            url : global.settings.url +'/MainController/printconsexceltenant',
            type : 'POST',
            data:{id:1},
            dataType : 'json',
            success : function(data){




           var num = 1;
            var html_print;
            var count = 0;
            for(i=0;i<data.query.length;i++)
            {
                num = 1 + i;
                html_print += "<tr>";
                html_print += "<td>"+num+"</td>";
                html_print += "<td>"+data.query[i].pay_fullname+"</td>";
                html_print += "<td>"+data.query[i].pay_or+"</td>";
                html_print += "<td class='text-right'>"+data.query[i].pay_amount+"</td>";
                html_print += "<td>"+data.query[i].pay_date+"</td>";
                html_print += "<td>"+data.query[i].pay_stall+"</td>";
                html_print += "</tr>";
                count = count + parseFloat(data.query[i].pay_amount);

            }

            $('#dft').text("Date From: "+data.sort.conDateFrom+" Date To: "+data.sort.conDateTo);

            $('#user').text("Collector: "+data.user);

            $('#thebody').append(html_print);

            var total;
            total += "<tr class='border-0'>";
            total += "<td colspan=1></td><td></td>";
            total += "<td class='text-right h6'>TOTAL: Php. </td>";
            total += "<td><p class='border-bottom 'style='text-decoration:underline;display:inline-block;float:right;'>"+count+"</p></td>";
            total += "<td></td>";
            total += "<td></td></tr>";
            $('#thebody').append(total);

            window.print();

            },
            error : function(xhr){

            }

          });
     }
   get();



});
