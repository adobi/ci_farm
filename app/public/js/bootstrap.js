$(function() {
    
   if (App.Subs.length) {
       for (var obj in App.Subs) {
           obj.Run();
       }
   } 
});