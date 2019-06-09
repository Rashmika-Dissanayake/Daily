function initMap(lat,lng,city,open,close,map) {

        var time=new Date().toLocaleTimeString();
        var newTime;
        var status;
        if(time.includes('PM')){
            var hour=time.substr(0,2);
            if(hour!='12'){
                var intHour=parseInt(hour);
                var subStr=time.substr(2,8);
                intHour+=12;
                newTime=String(intHour)+subStr;
            }
            else{
              var intHour=parseInt(hour);
              var subStr=time.substr(2,7);
              newTime=String(intHour)+subStr;
            }

        }

        else if(time.includes('AM')){
            var addZero=false;
            var hour=time.substr(0,1);
            if(time.includes('10')||time.includes('11')||time.includes('12')){
             hour=time.substr(0,2);
             addZero=true;
            }
            if(hour=='12'){
              var intHour=parseInt(hour);
              var subStr=time.substr(2,8);
              intHour-=12;
              newTime="0"+String(intHour)+subStr;
            }

            else{
              var intHour=parseInt(hour);
              if(!addZero){
              var subStr=time.substr(1,7);
              newTime="0"+String(intHour)+subStr;
              }
              else{
                  var subStr=time.substr(2,7);
                  newTime=String(intHour)+subStr;
                  // alert(newTime);

              }
              
            }
        }

      //   alert(newTime);

      //   alert(String(close)>newTime);

        if(newTime>=String(open) && String(close)>newTime){
           status='open';
        }

        else
         status='close';

        var string;
        if(status=='open')
        string="<ul><li><h5>Opens:<b>"+open+"</b></h5></li>"+"<li><h5>Closes:<b>"+close+"</b></h5></li>"
                   +"<li><h6><b  style='color:#32CD32!important'>"+status+"</b></h6></li></ul>";
        else
        string="<h5>Opens:<b>"+open+"</b></h5>"+"<h5>Closes:<b>"+close+"</b></h5>"
                   +"<h6><b  style='color:red!important'>"+status+"</b></h6>";
        var infowindow = new google.maps.InfoWindow(); 
        var uluru = {lat: lat, lng: lng};
      
        // The marker, positioned at Uluru
        var marker = new google.maps.Marker({position: uluru, map: map,label:{text:city,color: "#483d8b",fontWeight: "bold"}});

         google.maps.event.addListener(marker, 'click', function() {
                infowindow.setContent(string);      
                infowindow.open(map, this);
                       });
    

      }





     //submit button
    $("#submitBtn").click(function(){
     
        //  e.preventDefault();
         $garage_name=document.getElementById('garage_name').value;
         $address=document.getElementById('address').value;
    // Returns successful data submission message when the entered information is stored in database.
       if ($garage_name == '' || $address == '') {
    
       alert("Please Fill All Fields");
    
         } 
    
    //    else{  
         
        
    // // AJAX code to submit form.
    
        //  $.ajax({
        //  type: "POST",
        //  action: "Controller@insert",
        //  data: dataString,
        //  cache: false,
        //  success: function(html) {
        //  alert('Uploaded');
        //    }
        //      });
    
        // }
    
    });

           //page load
           $(document).ready(function(){
            alert('hi');
            var addressCount=document.getElementById('myAddress').childElementCount;
            var locationCount=document.getElementById('myLocations').childElementCount;
           // alert($("#city2").length);
            var city=new Array();
            var openTime=new Array();
            var closeTime=new Array();
            var address=[];
            var i=0,j=0,count_o_time=0,count_c_time=0;
               $('#myAddress').find('input[type=text]').each(function(){
                
                address[i]=$(this).val();
                //  alert(address[i]);
                i+=1;
               
                });
    
                $('#myLocations').find('input[type=text]').each(function(){
                    
                   city.push($(this).val());
                
                   });
    
                $('#openT').find('input[type=time]').each(function(){
                    
                    openTime.push($(this).val());
                 
                    });
    
                $('#closeT').find('input[type=time]').each(function(){
                    
                    closeTime.push($(this).val());
                 
                    });
    
              //  for(var i=0;i<locationCount;i++)
              //    alert(city[i]+" "+i);
    
              // for(var i=0;i<addressCount;i++)
              // alert(address[i]);
    
               var latitude=0.0;
               var longitude=0.0;
         //    alert("Op"+address);
               var uluru={lat:6.9271,lng:79.8612};
                 // The map, centered at Uluru
                 var map = new google.maps.Map(
                      document.getElementById('map'), {zoom: 8, center: uluru});
                var geocoder = new google.maps.Geocoder();
               //alert(locationCount);
               var m;
               for(m=0;m<locationCount;m++){
              
               geocoder.geocode( { 'address': address[m]}, function(results, status) {
    
                 
                // $('#myLocations').find('input[type=text]').each(function(){
                    
                //     city[j]=$(this).val();
                //     alert(city[j]);
                //     j+=1;
                
                //   });
                 
               if (status == google.maps.GeocoderStatus.OK) {
                 
                 latitude = results[0].geometry.location.lat();
                 longitude = results[0].geometry.location.lng();
                // alert("latitude"+i+"="+latitude+city[i]);
                 initMap(latitude,longitude,city[j++],openTime[count_o_time++],closeTime[count_c_time++],map);
    
                    }
    
                  });
    
               }
    
    
           });