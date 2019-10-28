$(document).ready(function() {
  var skills, index;
  determine= function(){
    $("#minPay").attr({
       "max" : $("#maxPay").val()-1, // substitute your own
       "min" : 1 // values (or variables) here
    });
    $("#maxPay").attr({
       "min" : parseInt($("#minPay").val())+1,
    });
  }
  $('#addTag').click(function(){
    var tags = $("#tags").val().split(",").map(function(item) {
      return item.trim().toLowerCase();
    });
    var skills = $("#skills").val().split(",");
    tags.forEach(function(tag){
      if(tag!==""){
        if($("#skills").val()==""){
          $("#skills").val(tag);
          skills[0]=tag;
        }
        else if (!skills.includes(tag)){
          $("#skills").val($("#skills").val()+","+tag);
            skills.push(tag);
        }
      }
    });
    var index = '';
    skills.forEach(function(skill){
      index+='<button type="button" class="btn btn-light tag">'+skill+'</button>&nbsp;&nbsp;';
    });
    $("#skillsCard").html(index);
    $('.tag').click(function() {
              skills.splice(skills.indexOf(this.innerHTML), 1);
              $("#skills").val(skills.join());
              this.remove();
        });
    });
});
