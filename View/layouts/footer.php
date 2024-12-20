
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  
      <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  
  <script>
  
// Debounce function to limit how frequently a function is executed
function debounce(func, delay) {
    let timer;
    return function(...args) {
        clearTimeout(timer);
        timer = setTimeout(() => func.apply(this, args), delay);
    };
}

// The function to refresh the page and get notifications
const refreshPage = () => {
    $.ajax({
        url: "/get-new-user-notification",
        type: "post",
        success: function(res) {
          console.log(res);
       if (res.success) {
   
            let { message , senior_msg } = res.data ;
       
        let msg = message == null ? senior_msg : message;   
        
         if(res.type == "admin"){
        
           
sendNotification(`${res.data.team_name} - 
  ${res.data.project_name}
  ${res.data.name} : 
${res.data.message} 
 status: ${res.data.status_name}`,  res.data.avtar);
         }else{
           
           console.log(res.data.senior_sended);
           
      let message  = res.data.senior_sended == 1 ?  res.data.msg : res.data.message ;
      
sendNotification(`${res.data.team_name} - ${res.data.project_name}: ${message}` , res.data.avtar);
         }
            }
        }
    });
}


const debouncedRefresh = debounce(refreshPage, 500); // 1 second delay

setInterval(() => {
    debouncedRefresh();
}, 10000); // Check every 10 seconds


$(document).ready(function(){

   


   $(document).on("click", ".bars_icon" , function(){
     
        const sidenav = $(".sidenav");

   const bars_icon = $(this);
   

  sidenav.toggleClass("expand_nav");
 
  if (sidenav.hasClass("expand_nav")) {
            bars_icon.removeClass("fas fa-bars").addClass("fas fa-close");
         
        } else {
            bars_icon.removeClass("fa-close").addClass("fa-bars");
            
        }
   });
   
});
  </script>
</body>
</html>