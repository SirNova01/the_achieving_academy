(function($) {
  'use strict';
  var form = $("#example-form");
  form.children("div").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    onFinished: function(event, currentIndex) {
      var task_title = document.getElementById("task_title").value;
      var task_description = document.getElementById("task_description").value;
      var sample_input1 = document.getElementById("sample_input1").value;
      var sample_output1 = document.getElementById("sample_output1").value;
      var sample_input2 = document.getElementById("sample_input2").value;  
      var sample_output2 = document.getElementById("sample_output2").value;   
      var difficulty = document.getElementById("difficulty").value; 
      var level = document.getElementById("level").value; 
      var points = document.getElementById("points").value;
      var code_java = editor.getValue();
      var code_cpp = editor_cpp.getValue();

      var dataString = 'task_title=' + task_title + '&task_description=' + task_description + '&sample_input1=' + sample_input1 
      + '&sample_output1=' + sample_output1 + '&sample_input2=' + sample_input2 + '&sample_output2=' + sample_output2 
      + '&difficulty=' + difficulty + '&level=' + level + '&points=' + points + '&code_java=' + code_java + '&code_cpp=' + code_cpp;

      if (task_title == '' || task_description == '' || sample_input1 == '' || sample_output1 == '' || sample_input2 == ''|| sample_output2 == ''|| difficulty == ''||
      level == '' || points == '' || code_java == '' || code_cpp == '') {
        alert("Please Fill All Fields");
      } else {
        $.ajax({
          type: "POST",
          url: "create_task.php",
          data: dataString,
          cache: false,
          success: function(message_resp){
           
           console.log(message_resp);
           if(message_resp == "success"){
             alert("Task Successfully Created");
             window.location.href = "view_task";
           }else{
             alert(message_resp);
           }
           
         }
       });
      }

      
    }
  });
  var validationForm = $("#example-validation-form");
  validationForm.val({
    errorPlacement: function errorPlacement(error, element) {
      element.before(error);
    },
    rules: {
      confirm: {
        equalTo: "#password"
      }
    }
  });
  validationForm.children("div").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    onStepChanging: function(event, currentIndex, newIndex) {
      validationForm.val({
        ignore: [":disabled", ":hidden"]
      })
      return validationForm.val();
    },
    onFinishing: function(event, currentIndex) {
      validationForm.val({
        ignore: [':disabled']
      })
      return validationForm.val();
    },
    onFinished: function(event, currentIndex) {
      alert("Submitted");
    }
  });
  var verticalForm = $("#example-vertical-wizard");
  verticalForm.children("div").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    stepsOrientation: "vertical",
    onFinished: function(event, currentIndex) {
      alert("Submitted!");
    }
  });
})(jQuery);